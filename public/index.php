<?php

require_once __DIR__.'/../bootstrap.php';

session_start();

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    var_dump($_SESSION['access_token']);
    exit;
}

$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
