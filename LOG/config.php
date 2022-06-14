<?php

$conn = mysqli_connect("localhost", "root", "", "petroen");

if (!$conn) {
    echo "Connection Failed";
}