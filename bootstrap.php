<?php

require_once __DIR__.'/vendor/autoload.php';

(new Dotenv\Dotenv(__DIR__))->load();

$client = new Google_Client([
    'client_id'     => getenv('GOOGLE_CLIENT_ID'),
    'client_secret' => getenv('GOOGLE_CLIENT_SECRET'),
]);
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
$client->setIncludeGrantedScopes(true);
$client->setAccessType('offline');

// NOTE: 必要なスコープを下記のように追加すること
$client->addScope(\Google_Service_Blogger::BLOGGER);
