<?php
require 'db.php';

// Get the user's IP address
$ip = $_SERVER['REMOTE_ADDR'];

// Check if the user has already voted
$stmt = $pdo->prepare("SELECT COUNT(*) FROM votes WHERE ip = ?");
$stmt->execute([$ip]);
$count = $stmt->fetchColumn();

if ($count > 0) {
    // User has already voted

    // Set a cookie to remember that the user has voted
    setcookie('voted', 'true', time() + (86400 * 30), "/");
} else {
    // User has not voted yet
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vote'])) {
        // Handle the form submission
        $vote = $_POST['vote'];

        // Insert the vote into the database
        $stmt = $pdo->prepare("INSERT INTO votes (ip, vote) VALUES (?, ?)");
        $stmt->execute([$ip, $vote]);

        // Set a cookie to remember that the user has voted
        setcookie('voted', 'true', time() + (86400 * 30), "/");
    }
}

// Redirect back to the home page
header("Location: index.php");
exit();
