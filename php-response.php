<?php
// myworld.php

// Get the user's choice from GET parameter
$choice = isset($_GET['choice']) ? htmlspecialchars($_GET['choice']) : '';

// Array of available images
$images = ["images/beach.jpg", "images/forest.jpg", "images/lake.jpg", "images/mountain.jpg", "images/plains.jpg"];

// Filter images based on the user's choice
$filteredImages = array_filter($images, function($image) use ($choice) {
    $imageName = basename($image); // Get the image name without the path
    return stripos($imageName, $choice) !== false;
});

// Randomly select one image
$randomImage = $images[array_rand($images)];

// Generate the response HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Choice Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
        }
        .choice-text {
            font-size: 24px;
            margin: 20px 0;
            color: #333;
        }
        .image-container {
            margin: 20px 0;
        }
        img {
            max-width: 100%;
            height: auto;
            border: 2px solid #ddd;
            border-radius: 8px;
        }
        .back-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Your Submission Result</h1>
    
    <div class="choice-text">
        You entered: <?php echo $choice; ?>
    </div>
    
    <div class="image-container">
        <?php if (!empty($filteredImages)): ?>
            <h2>Matching Images</h2>
            <?php foreach ($filteredImages as $image): ?>
                <img src="<?php echo $image; ?>" alt="Matching Image">
            <?php endforeach; ?>
        <?php else: ?>
            <h2>No Matching Images Found</h2>
            <p>Here is a random image instead:</p>
            <img src="<?php echo $randomImage; ?>" alt="Random Image">
        <?php endif; ?>
    </div>
    
    <a href="web-assignment.html" class="back-button">Make Another Choice</a>
</body>
</html>
