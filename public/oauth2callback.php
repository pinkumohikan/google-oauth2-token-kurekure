<?php

require_once __DIR__.'/../bootstrap.php';

session_start();

if (! isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    exit;
}

$client->authenticate($_GET['code']);
$_SESSION['access_token'] = $client->getAccessToken();
$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
