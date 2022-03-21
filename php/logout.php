<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include "config.php";
    $loguot_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if (isset($loguot_id)) { //jika logout maka stattus berubah menjadi offline
        $status = "Offline now";
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$loguot_id}");
        if ($sql) {
            session_unset();
            session_destroy();
            header("location: ../login.php");
        }
    } else {
        header("location: ../user.php");
    }
} else {
    header("location: ../login.php");
}
