<?php
@include('../../../connect.php');
$id = $_GET['id'];

$query = "DELETE FROM plans WHERE id='$id'";

$res = mysqli_query($conn, $query);

?>