<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Models\BtcStatistic;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function index() {
        return view('home');
    }

    public function subscribe(SubscribeRequest $subscribeRequest) {

        $subscriber = Subscriber::query()->firstOrNew(['email' => $subscribeRequest->email]);
        $subscriber->price_above_limit_to_be_notified = $subscribeRequest->target_price;
        $subscriber->save();

        return response()->json([
            'message' => 'Successfully subscribed for updates at target price ' . $subscribeRequest->target_price
        ]);
    }

    public function chartData() {

        $labels = [];
        $dataset = [];

        $btcStatistics = BtcStatistic::query()->whereBetween('created_at', [now()->subWeek(1), now()])->get();

        foreach ($btcStatistics as $btcStatistic) {
            $labels[] = $btcStatistic->created_at->format('d.m.Y H:i');
            $dataset[] = $btcStatistic['last_price'];
        }

        return response()->json([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Bitcoin Price Linear in US Dollars',
                    'backgroundColor' => '#f87979',
                    'data' => $dataset
                ]
            ]
        ]);
    }
}
