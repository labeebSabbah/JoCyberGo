<?php

namespace App\Controllers;

use App\Config\Thingworx;
use App\Models\ProductionLine;

class ThingworxController extends Controller
{

    public function api() {
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        $PL = new ProductionLine;
        $PL->i_wanna_die($data->id, $data->station, $data->value);
    }

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

    public function WWS()
    {
        $id = $_POST['id'];
        $body = json_encode(["id" => "$id"]);
        $ch = curl_init(Thingworx::$WWS);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'appKey: ' . Thingworx::$key,
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        sleep(2);

        $this->add();

        sleep(1);

        $this->start();
    }

    public function WWR()
    {
        $id = $_POST['id'];
        $body = json_encode(["id" => "$id"]);
        $ch = curl_init(Thingworx::$WWR);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
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

    public function WBS()
    {
        $id = $_POST['id'];
        $body = json_encode(["id" => "$id"]);
        $ch = curl_init(Thingworx::$WBS);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
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

    public function WBR()
    {
        $id = $_POST['id'];
        $body = json_encode(["id" => "$id"]);
        $ch = curl_init(Thingworx::$WWS);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
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

    public function BBR()
    {
        $id = $_POST['id'];
        $body = json_encode(["id" => "$id"]);
        $ch = curl_init(Thingworx::$BBR);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
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

    public function BBS()
    {
        $id = $_POST['id'];
        $body = json_encode(["id" => "$id"]);
        $ch = curl_init(Thingworx::$BBS);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
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

    public function BWS()
    {
        $id = $_POST['id'];
        $body = json_encode(["id" => "$id"]);
        $ch = curl_init(Thingworx::$BWS);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
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

    public function BWR()
    {
        $id = $_POST['id'];
        $body = json_encode(["id" => "$id"]);
        $ch = curl_init(Thingworx::$BWR);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
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
