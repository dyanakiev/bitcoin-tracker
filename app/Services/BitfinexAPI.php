<?php

namespace App\Services;

use App\Exceptions\BitfinexPubTickerNotOk;
use Illuminate\Support\Facades\Http;

class BitfinexAPI {

    /**
     * Retrieve response from the Bitfinex pubticker API endpoint
     * @param $symbol
     * @return array
     * @throws BitfinexPubTickerNotOk
     */
    public function pubticker($symbol): array {
        $response = Http::get('https://api.bitfinex.com/v1/pubticker/' . $symbol);
        if (!$response->ok()) throw new BitfinexPubTickerNotOk();

        return $response->json();
    }
}
