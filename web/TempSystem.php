<?php
include 'db.php';
$conn = OpenCon();
$temp = mysqli_query($conn,"SELECT temperature FROM iot_ ORDER BY id DESC LIMIT 1");
$temp = $result = mysqli_fetch_assoc($temp);
$temp = $temp['temperature'];
echo $temp;
?>