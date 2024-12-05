<?php
// Set the content type to JSON
header('Content-Type: application/json');

// Path to your JSON file
$blogDataFile = 'blogs.json';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $rawData = file_get_contents("php://input");

    // Decode the JSON data from the request body
    $newBlogData = json_decode($rawData, true);

    // Check if the data is valid
    if ($newBlogData && isset($newBlogData['title']) && isset($newBlogData['description']) && isset($newBlogData['url'])) {
        
        // Check if the JSON file exists and read the existing data
        if (file_exists($blogDataFile)) {
            $currentData = json_decode(file_get_contents($blogDataFile), true);
        } else {
            $currentData = [];
        }

        // Add the new blog data to the array
        $currentData[] = $newBlogData;

        // Save the updated data back to the JSON file
        if (file_put_contents($blogDataFile, json_encode($currentData, JSON_PRETTY_PRINT))) {
            // Respond with success
            echo json_encode(['message' => 'Blog data updated successfully']);
        } else {
            // Respond with failure
            echo json_encode(['message' => 'Failed to update the blog data']);
        }
    } else {
        // Respond with error if data is invalid
        echo json_encode(['message' => 'Invalid data']);
    }
} else {
    // Respond with error if method is not POST
    echo json_encode(['message' => 'Invalid request method']);
}
?>
