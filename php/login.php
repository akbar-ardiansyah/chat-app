<?php
session_start(); //memulai sesi registrasi user
include_once "config.php";   //memanggil database dari file config.php
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");

    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $status = "Active now";
        $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
        if ($sql2) {
            $_SESSION['unique_id'] = $row['unique_id']; //dengan unique_id di session kami gunakan untuk file php lainya
            echo "success";
        }
    } else {
        echo "Email dan Password salah";
    }
} else {
    echo "Email harus di isi!";
}
