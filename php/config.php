<?php


$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "latihan_chat"
);

if (!$conn) {
    echo "database connected" . mysqli_connect_error();
}
