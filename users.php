<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>

    <div class="wrapper">
        <section class="users">
            <!-- begin:header -->
            <header>
                <?php
                include_once "php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <div class="content">
                    <img src="./image/<?php echo $row['avatar']; ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['full_name'] . " " . $row['last_name']; ?></span>
                        <p style="color:cadetblue;"><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Log Out</a>
            </header>
            <!-- end:header -->
            <!-- begin:search -->
            <div class="search">
                <span class="text">Select an users to start a chat</span>
                <input type="text" placeholder="Cari...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <!-- end:search -->
            <div class="users-list">
                <!-- begin:user -->

                <!-- end:user -->
            </div>
        </section>
    </div>
    <!-- begin script users -->
    <script src="js/users.js"></script>
</body>

</html>