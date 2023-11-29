<?php

namespace App\Controllers;

use App\Config\Thingworx;

class ThingworxController extends Controller
{

    public function test()
    {
        $ch = curl_init(Thingworx::$host);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'appKey: ' . Thingworx::$key
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        $data = $data["rows"][0]["value"];

        echo $data;
    }

    public function test1()
    {
        $data = json_encode([
            'value' => "Labeeb"
        ]);

        $ch = curl_init(Thingworx::$host);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data),
            'appKey: ' . Thingworx::$key
        ]);

        $response = curl_exec($ch);
        curl_close($ch);
    }
}
