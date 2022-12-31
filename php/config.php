<?php
$conn = mysqli_connect("localhost", "root", "", "CodingNepal");

if($conn)
{
   
}
else{
    echo "Error Datanase No Connection";
    echo "Error Mess" . mysqli_connect_error();
}
?>