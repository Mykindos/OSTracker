<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    const API_URL = 'https://prices.runescape.wiki/api/v1/osrs/latest';

    public function getItemPrice(Request $request){

        if(empty($request->itemID)){
            return response(['message' => 'You must provide an itemID!']);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::API_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mykindos/1.0.0');

        $json  = curl_exec($ch);

        curl_close($ch);

        $data = from(json_decode($json, true))->select(function ($e) use ($request) {
            return $e[$request->itemID]['high'];
        })->toList();

        return count($data) > 0 ? response($data[0]) : response(0);
    }
}
