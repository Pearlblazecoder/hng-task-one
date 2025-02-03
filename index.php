<?php
header("Access-Control-Allow-Origin: *"); // Enable CORS
header("Content-Type: application/json"); // Response format

// Check if 'number' parameter exists
if (!isset($_GET['number']) || !is_numeric($_GET['number'])) {
    echo json_encode(["number" => $_GET['number'] ?? null, "error" => true]);
    // http_response_code(400);
    exit;
}

$number = (int) $_GET['number'];

// Function to check if a number is prime
function isPrime($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

// Function to check if a number is perfect
function isPerfect($n) {
    $sum = 0;
    for ($i = 1; $i < $n; $i++) {
        if ($n % $i == 0) $sum += $i;
    }
    return $sum === $n;
}

// Function to check if a number is an Armstrong number
function isArmstrong($n) {
    $sum = 0;
    $digits = str_split((string)$n);
    $power = count($digits);
    foreach ($digits as $digit) {
        $sum += pow((int)$digit, $power);
    }
    return $sum === $n;
}

// Function to get digit sum
function digitSum($n) {
    return array_sum(str_split((string)$n));
}

// Function to fetch fun fact
function getFunFact($n) {
    $apiUrl = "http://numbersapi.com/$n/math";
    $response = @file_get_contents($apiUrl);
    return $response ? trim($response) : "No fun fact available";
}

// Determine properties
$properties = [];
if (isArmstrong($number)) $properties[] = "armstrong";
$properties[] = ($number % 2 === 0) ? "even" : "odd";

// Construct response
$response = [
    "number" => $number,
    "is_prime" => isPrime($number),
    "is_perfect" => isPerfect($number),
    "properties" => $properties,
    "digit_sum" => digitSum($number),
    "fun_fact" => getFunFact($number),
];

// Return JSON response
echo json_encode($response, JSON_PRETTY_PRINT);
// http_response_code(200);
