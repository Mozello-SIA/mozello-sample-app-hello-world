<?php

session_start();

require '../libs/mozelloappsapi.php';
require '../libs/mozelloappshelpers.php';

$config = include 'config.php';
require 'app.php';

$appID = $_GET['appId'] ?? null;
$language = $_GET['language'] ?? 'en';
$callback = $_GET['callback'] ?? '';
$authCode = $_GET['authCode'] ?? null;
$hash = $_GET['hash'] ?? null;

if (!AppsHelpers::isValidHash($_GET, $hash, $config['secret'])) {
    exit;
}

if ($callback) {

    if (!$authCode) {

        // Step 1 add-on installation

        $parameters = $_GET;
        unset($parameters['callback']);
        unset($parameters['hash']);

        $authorizeUrl = $callback . '?' . http_build_query($parameters);

        header('Location: ' . $authorizeUrl);
        exit;
    }
    else {

        // Step 2 add-on installation

        $parameters = $_GET;
        unset($parameters['callback']);
        unset($parameters['hash']);

        $api = new AppsAPI($config['api_key'], $authCode);

        $api->installed();

        $api->setData($config['defaults']);
        $snippet = createSnippet($config['defaults']);
        $api->setSnippet($snippet);

        $finishedUrl = $callback . '?' . http_build_query($parameters);
        header('Location: ' . $finishedUrl);

        exit;
    }
}

exit;