<?php

// Check if the file was uploaded successfully
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['image'];

    // Get the temporary file name
    $tmpFilePath = $file['tmp_name'];

    // Specify the directory to which you want to save the image
    $uploadDir = 'path/to/upload/directory/';

    // Generate a unique file name to avoid conflicts
    $fileName = uniqid() . '_' . $file['name'];

    // Move the uploaded file to the desired directory
    $uploadPath = $uploadDir . $fileName;
    move_uploaded_file($tmpFilePath, $uploadPath);

    // Insert the file path into the database table
    $dbHost = 'localhost';
    $dbName = 'booking_web';
    $dbUser = 'root';
    $dbPass = '';

    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

    $query = "INSERT INTO images (image_path) VALUES (:imagePath)";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':imagePath', $uploadPath);
    $statement->execute();

    echo 'Image uploaded successfully.';
    }
?>
