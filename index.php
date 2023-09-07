<?php
// Function to check if a query parameter is set and return its value
function getQueryParam($name) {
    return isset($_GET[$name]) ? $_GET[$name] : null;
}

// Get the values of the query parameters
$slackName = getQueryParam('slack_name');
$track = getQueryParam('track');

// Get the current day of the week and UTC time
$currentDay = date('l');
$utcTime = gmdate('Y-m-d H:i:s');

// Check if slack_name and track parameters are provided
if (!$slackName || !$track) {
    http_response_code(400);
    echo json_encode(array('error' => 'slack_name and track parameters are required.'));
    exit();
}

// Create the response array
$response = array(
    'slack_name' => $slackName,
    'current_day' => $currentDay,
    'utc_time' => $utcTime,
    'track' => $track,
    'github_file_url' => 'https://github.com/Gozyvee/Hamster-Shop/blob/main/index.php',
    'github_repo_url' => 'https://github.com/Gozyvee/Hamster-Shop',
    'status_code' => 200
);

// Set the response content type to JSON
header('Content-Type: application/json');

// Return the response as JSON
echo json_encode($response);
?>