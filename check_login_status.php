<?php
session_start();

$response = array('isLoggedIn' => isset($_SESSION['id']));

header('Content-Type: application/json');
echo json_encode($response);
?>
