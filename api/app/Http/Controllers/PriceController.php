<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    const API_URL = 'https://prices.runescape.wiki/api/v1/osrs/latest';

    public function getItemPrice(Request $request){

        if(empty($request->itemID)){
            return response(['message' => 'You must provide an itemID']);
        }
        $json = file_get_contents(self::API_URL);
        $data = from(json_decode($json, true))->where(function ($e) use ($request) {
            return $e['id'] == $request->itemID;
        })->select(function ($e) {
            return $e['high'];
        })->toList();

        return response($data[0]);
    }
}
