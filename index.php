<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: ../user.php");
}
?>

<?php include_once "header.php"; ?>

<body>

    <div class="wrapper">
        <section class="form signup">
            <header>WhatTheFuck Chat</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">This is an error message!</div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">first name</label>
                        <input type="text" name="fullname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label for="">Last name</label>
                        <input type="text" name="lastname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Enter new email" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter new password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="">Select image</label>
                    <input type="file" name="image" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>
            </form>
            <div class="link">Already sign up? <a href="login.php">Login Now</a> </div>
        </section>
    </div>



    <script src="js/pass-show-hide.js"></script>
    <script src="js/signup.js"></script>

</body>

</html>