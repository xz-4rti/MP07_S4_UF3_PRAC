<?php
// setup_database.php

// Database connection configuration (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";

try {
    // Connect to MySQL server (without selecting a database)
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database
    $conn->exec("CREATE DATABASE IF NOT EXISTS crud_pdo");
    echo "Database 'crud_pdo' created successfully or already exists.<br>";

    // Select the database
    $conn->exec("USE crud_pdo");

    // Create table
    $sql = "CREATE TABLE IF NOT EXISTS usuaris (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        edat INT NOT NULL
    )";

    $conn->exec($sql);
    echo "Table 'usuaris' created successfully or already exists.<br>";

    // Optionally insert sample data
    $conn->exec("INSERT IGNORE INTO usuaris (nom, email, edat) VALUES 
        ('John Doe', 'john@example.com', 30),
        ('Jane Smith', 'jane@example.com', 25)");
    echo "Sample data inserted (if table was empty).<br>";

    echo "<h2>Setup completed successfully!</h2>";
} catch (PDOException $e) {
    echo "<h2>Error during setup:</h2> " . $e->getMessage();
}

// Close connection
$conn = null;
