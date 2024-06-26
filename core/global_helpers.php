<?php

function base_url() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $script_name = $_SERVER['SCRIPT_NAME'];
    
    // Find the position of 'index.php'
    $index_pos = strpos($script_name, 'index.php');
    
    if ($index_pos !== false) {
        // If 'index.php' is found, include it in the base URL
        $base_path = substr($script_name, 0, $index_pos) . 'index.php/';
    } else {
        // If 'index.php' is not found, use the directory of the script
        $base_path = rtrim(dirname($script_name), '/') . '/';
    }
    
    return $protocol . $host . $base_path;
}

function site_url($path = '') {
    return base_url() . $path;
}

function asset_url($path) {
    /* remove index.php from the base_url */
    $base_url = base_url();
    $base_url = str_replace('index.php/', '', $base_url);

    return $base_url . $path;
}

function isCurrentUrl ($url) {
    $currentUrl = $_SERVER['REQUEST_URI'];
    return strpos($currentUrl, $url) !== false;
}

function redirect($path) {
    header('Location: ' . $path);
    exit();
}