<?php

class LastFM {
    public $apiKey;

    function __construct($api) {
        $this->apiKey = $api;
    }

    function getRecentTracks($user) {
        $curl = curl_init("https://accounts.spotify.com/authorize?client_id=652947a6a7384fada812338d9f242a29&response_type=code");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($curl);
        curl_close($curl);
        print_r($data);
    }
}