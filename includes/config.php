<?php

ob_start();

$timezone = date_default_timezone_set("Europe/Zagreb");


$con = mysqli_connect("localhost", "root", "", "musix");

if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_error();
}
