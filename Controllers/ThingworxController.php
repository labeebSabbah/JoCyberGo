<?php

namespace App\Controllers;

use App\Config\Thingworx;

class ThingworxController extends Controller
{

    public function test()
    {
        $ch = curl_init(Thingworx::$main);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'appKey: ' . Thingworx::$key
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        $data = $data["rows"][0]["InJoDemoFactroy_Master_RFID_RFID_IMS1_B0"];

        echo $data;
    }

    public function test1()
    {
        $data = json_encode([
            'value' => "Labeeb"
        ]);

        $ch = curl_init(Thingworx::$main);
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

    public function full_white()
    {
        $ch = curl_init(Thingworx::$fullWhite);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'appKey: ' . Thingworx::$key,
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        sleep(1);

        $this->add();

        sleep(1);

        $this->start();
    }

    public function full_black()
    {
        $ch = curl_init(Thingworx::$fullBlack);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'appKey: ' . Thingworx::$key,
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        sleep(1);

        $this->add();

        sleep(1);

        $this->start();
    }

    public function add()
    {
        $ch = curl_init(Thingworx::$add);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'appKey: ' . Thingworx::$key,
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);
    }

    public function start()
    {
        $ch = curl_init(Thingworx::$start);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'appKey: ' . Thingworx::$key,
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);
    }

    public function reset()
    {
        $ch = curl_init(Thingworx::$reset);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'appKey: ' . Thingworx::$key,
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);
    }
}
