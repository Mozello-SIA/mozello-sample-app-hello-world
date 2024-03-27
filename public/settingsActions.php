<?php

session_start();

require '../libs/mozelloappsapi.php';
require '../libs/mozelloappshelpers.php';

$config = include 'config.php';
require 'app.php';

if (strtolower($_SERVER['REQUEST_METHOD']) != 'post') {
    exit;
}

$authCode = $_POST['authCode'] ?? null;

if ($authCode) {

    $api = new AppsAPI($config['api_key'], $authCode);

    $data = [
        'hello_test_setting'   => $_POST['hello_test_setting'] ?? ''
    ];

    $api->setData($data);
    $api->setSnippet(createSnippet($data));
}

exit;