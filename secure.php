<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('location: logout.php');
} else {
    echo 'Secure page!.';
    echo '<a href="logout.php">logout';
}
