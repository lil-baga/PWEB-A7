<?php
include_once 'function/main.php';
include_once 'config/static.php';
include_once 'models/Sempro.php';

class DashboardController {
    static function landing() {
        view('layout', ['url' => 'landing', 'title' => 'Landing Page']);
    }

    static function index() {
        view('layout', ['url' => 'dashboard', 'title' => 'Beranda', 'sempro' => Sempro::getSempro(), 'jadwal' => Sempro::getJadwal(), 'record' => Sempro::getRecord(), 'dosen' => Dosen::getDosen()]);
    }
}