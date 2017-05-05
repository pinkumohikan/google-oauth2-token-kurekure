<?php

require_once __DIR__.'/vendor/autoload.php';

(new Dotenv\Dotenv(APP_ROOT))->load();

$client = new Google_Client([
    'client_id'     => getenv('GOOGLE_CLIENT_ID'),
    'client_secret' => getenv('GOOGLE_CLIENT_SECRET'),
]);
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
$client->addScope(\Google_Service_Blogger::BLOGGER);
