<?php
// Include Composer's autoloader
require __DIR__ . '/../vendor/autoload.php';

// Include the Database model class (adjust path as necessary)
require __DIR__ . '/../database.php';

// Initialize Faker
$faker = Faker\Factory::create();

// Get PDO connection from Database class
$pdo = Database::getConnection();

// Prepare SQL statement
$stmt = $pdo->prepare("INSERT INTO tb_login (username, email, password, level) 
VALUES (:username, :email, :password, :level)");

//Insert 100 rows of random data
for ($i = 0; $i < 6; $i++) {
    $username = $faker->userName;
    $password = password_hash($username, PASSWORD_BCRYPT);
    $email = $faker->email;
    //$level = $faker->randomElement(['admin', 'rektorat', 'bauk', 'kaprodi', 'p2m', 'p3m']); // Updated levels
    $level = ['admin', 'rektorat', 'bauk', 'kaprodi', 'p2m', 'p3m']; // Updated levels

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':level', $level[$i], PDO::PARAM_STR);

    $stmt->execute();
}

echo "Seeding completed!";
