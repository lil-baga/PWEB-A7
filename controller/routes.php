<?php

Router::url('login', 'get', 'AuthController::login');
Router::url('login', 'post', 'AuthController::sessionLogin');
Router::url('register', 'get', 'AuthController::register');
Router::url('register', 'post', 'AuthController::newRegister');
Router::url('logout', 'get', 'AuthController::logout');

Router::url('jadwalsempro', 'get', 'SemproController::indexJadwal');
Router::url('addsempro', 'post', 'SemproController::store');
Router::url('addlink', 'post', 'SemproController::storeLink');
Router::url('editsempro', 'get', 'SemproController::edit');
Router::url('editsempro', 'post', 'SemproController::update');
Router::url('deletesempro', 'post', 'SemproController::delete');

Router::url('/', 'get', 'DashboardController::landing');
Router::url('dashboard', 'get', 'DashboardController::index');