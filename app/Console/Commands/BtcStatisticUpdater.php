<?php

namespace App\Console\Commands;

use App\Models\BtcStatistic;
use App\Models\Subscriber;
use App\Notifications\PriceAboveLimit;
use App\Services\BitfinexAPI;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\RateLimiter;

class BtcStatisticUpdater extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:statistics:btc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch API data from Bitfinex API to update the statistics table and notify subscribers for changes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $bitfinexAPI = new BitfinexAPI();

        $pubtickerResponse = $bitfinexAPI->pubticker('BTCUSD');
        $this->info('Successfully fetched data from Bitfinex for BTCUSD');

        BtcStatistic::query()->create($pubtickerResponse);
        $this->info('Successfully saved data from Bitfinex for BTCUSD ');

        // Fetch all subscribers that have limit set lower than current price in USD
        Subscriber::query()->where('price_above_limit_to_be_notified', '<', $pubtickerResponse['last_price'])->chunkById(1000, function ($subscribers) use ($pubtickerResponse) {
            foreach ($subscribers as $subscriber) {
                // Attempt to send notification to user, allow only one notification every hour.
                RateLimiter::attempt(
                    'send-notification:' . $subscriber->email,
                    1,
                    function () use ($subscriber, $pubtickerResponse) {
                        $subscriber->notify(new PriceAboveLimit($pubtickerResponse));
                    },
                    3600
                );
            }
        });
        $this->info('Sent notification to subscribers');
    }
}
