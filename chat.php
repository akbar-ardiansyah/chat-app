<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>

    <div class="wrapper">
        <section class="chat-area">
            <!-- begin:header -->
            <header>
                <?php
                include_once "php/config.php";
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="./image/<?php echo $row['avatar']; ?>">
                <div class="details">
                    <span><?php echo $row['full_name'] . " " . $row['last_name']; ?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </header>
            <!-- end:header -->
            <!-- begin:chat-box -->
            <div class="chat-box">
                <!-- begin:chat outgoing -->

                <!-- end:chat incoming -->
            </div>
            <!-- end:chat-box -->
            <form action="" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Pesan text...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>



    <!-- begin script chat -->
    <script>
        const form = document.querySelector(".typing-area"),
            inputField = form.querySelector(".input-field"),
            sendBtn = form.querySelector("button"),
            chatBox = document.querySelector(".chat-box");

        form.onsubmit = (e) => {
            e.preventDefault();
        }

        sendBtn.onclick = () => {
            // alert('oke');
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/insert-chat.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        inputField.value = ""; //satu pesan masuk kemudian meninggalkan form kosong
                        scrollBottom();
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }

        chatBox.onmouseenter = () => {
            chatBox.classList.add("active");
        }
        chatBox.onmouseleave = () => {
            chatBox.classList.remove("active");
        }

        setInterval(() => {
            //begin ajax
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/get-chat.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        chatBox.innerHTML = data;
                        if (!chatBox.classList.contains("active")) {
                            scrollBottom();
                        }
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }, 500);

        function scrollBottom() {
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
</body>

</html>