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
$mozelloVersion = $_GET['mozelloVersion'] ?? 0.001;
$hash = $_GET['hash'] ?? null;

if (!AppsHelpers::isValidHash($_GET, $hash, $config['secret'])) {
    exit;
}

if ($appID && $authCode) {

    $api = new AppsAPI($config['api_key'], $authCode);

    $HTML_LanguageUI = $language;
    $HTML_Data = json_decode($api->getData(), true);
    $HTML_Callback = $callback;
    $HTML_AppInfo = json_decode($api->getAppInfo(), true);
    $HTML_DisplayTitle = sayArr('app_display_title', $language, $HTML_AppInfo['info']);

    if (ifSetOr($HTML_Data, 'error', true) == false) {
        $HTML_Config = $HTML_Data['data'] ?? [];
        $HTML_Hello_Test_setting = $HTML_Config['hello_test_setting'] ?? '';
        include 'settingsForm.php';
    }
}

exit;