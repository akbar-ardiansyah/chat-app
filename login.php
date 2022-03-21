<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: ../user.php");
}
?>
<?php include_once "header.php"; ?>

<body>

    <div class="wrapper">
        <section class="form login">
            <header>WhatTheFuck Chat</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="field input">
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup Now</a> </div>
        </section>
    </div>

    <!-- begin show password script -->
    <script src="js/pass-show-hide.js"></script>
    <!-- begin login script -->
    <script>
        const form = document.querySelector(".login form"),
            contineBtn = form.querySelector(".button input"),
            errorText = form.querySelector(".error-txt");

        form.onsubmit = (e) => {
            e.preventDefault();
        }

        contineBtn.onclick = () => {
            // alert('oke');
            let xhr = new XMLHttpRequest();
            xhr.open("post", "php/login.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        // console.log(data);
                        if (data == 'success') {
                            location.href = "users.php"
                        } else {
                            errorText.textContent = data;
                            errorText.style.display = "block";
                        }
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }
    </script>

</body>

</html>