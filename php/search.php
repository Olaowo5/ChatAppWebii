<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['UserID'];//to send the the userid across to data php
$searchTerm =  mysqli_real_escape_string($conn, $_POST['searchTerm']);

$output = "";
$sql = mysqli_query($conn, "SELECT * From users WHERE NOT unique_id = {$outgoing_id}
AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%')");

if(mysqli_num_rows($sql) > 0){
    include "data.php";
    
    //$output .="User foun f";
}else{
    
    $output .= "No User found related to your search term";
}

echo $output;
?>