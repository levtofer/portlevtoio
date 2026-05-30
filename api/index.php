<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Test 1: Can PHP run at all?
echo "PHP is working: " . phpversion() . "<br>";

// Test 2: Can we find the autoloader?
$autoload = __DIR__ . '/../vendor/autoload.php';
echo "Autoloader exists: " . (file_exists($autoload) ? 'YES' : 'NO') . "<br>";

// Test 3: Can we find public/index.php?
$index = __DIR__ . '/../public/index.php';
echo "public/index.php exists: " . (file_exists($index) ? 'YES' : 'NO') . "<br>";

// Test 4: ENV vars set?
echo "APP_KEY set: " . (!empty($_ENV['APP_KEY']) ? 'YES' : 'NO') . "<br>";
echo "APP_ENV: " . ($_ENV['APP_ENV'] ?? 'NOT SET') . "<br>";

// Now try booting Laravel
require __DIR__ . '/../public/index.php';