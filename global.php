<?php

// Function to get the base URL
function base_url($path = '') {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $baseDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');

    return "{$protocol}://{$host}{$baseDir}/{$path}";
}

// Another example function
function example_function() {
    echo "hello world";
}
