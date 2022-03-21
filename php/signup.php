<?php
session_start(); //memulai sesi registrasi user
include_once "config.php";   //memanggil database dari file config.php
$full_name = mysqli_real_escape_string($conn, $_POST['fullname']);
$last_name = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


//pengecekan isi table dalam database
if (!empty($full_name) && !empty($last_name) && !empty($email) && !empty($password)) {
    //validasi user valid atau tidak
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //jika email valit
        //pastikan tersedia atau tidak di database
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE Email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {                        //jika email sudah ada
            echo "$email - Sudah ada";
        } else {
            //upload gambar
            if (isset($_FILES['image'])) {                      //jika file di upload oleh user
                $img_name = $_FILES['image']['name'];           //mengambil nama file gambar yang di upload user
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);
                $extensions = ['png', 'jpeg', 'jpg'];
                if (in_array($img_ext, $extensions) === true) { //jika user user mengunggah gambar $ext akan sama dengan array extensioons apapun
                    $time = time();                             //ini akan mengembalikan(return) waktu saat ini
                    //kami perlu waktu ini ketika user mengunggah gambar di folder yg telah kami sediakan
                    //kami mengubah nama file user dengan waktu saat ini, jadi semua file image memilki kode unik
                    $new_img_name =  $time . $img_name;
                    if (move_uploaded_file($tmp_name, "../image/" . $new_img_name)) { //jika upload berhasil gambar masuk ke direktori ../image
                        $status = "Sedang aktif";                //ketika user masuk status akan berubah menjadi sedang aktiv
                        $random_id = rand(time(), 10000000);
                        $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, full_name, last_name, email, password, avatar, status)
                                                    VALUES({$random_id},'{$full_name}','{$last_name}','{$email}','{$password}','{$new_img_name}','{$status}')");
                        if ($sql2) {
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id']; //dengan unique_id di session kami gunakan untuk file php lainya
                                echo "success";
                            }
                        } else {
                            echo "terjadi kesalahan!";
                        }
                    }
                } else {
                    echo "Silahkan pilih file JPG,JPEG atau PNG";
                }
            } else {
                echo "Silahkan pilih file gambar!";
            }
        }
    } else {
        echo "$email - Tidak benar! ";
    }
} else {
    echo "Field harus di isi!";
}
