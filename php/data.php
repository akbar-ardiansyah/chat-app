<?php
while ($row = mysqli_fetch_assoc($sql)) {
    $sql2 = "SELECT * FROM message 
             WHERE (incoming_message_id = {$row['unique_id']} OR outgoing_message_id = {$row['unique_id']}) 
             AND (outgoing_message_id = {$outgoing_id} OR outgoing_message_id = {$outgoing_id}) 
             ORDER BY message_id 
             DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2   = mysqli_fetch_assoc($query2);
    if (mysqli_num_rows($query2) > 0) {
        $result = $row2['message'];
    } else {
        $result = "Tidak ada pesan";
    }

    (strlen($result) > 28) ? $msg = substr($result, 0, 28) . '...' : $msg = $result;
    ($outgoing_id == $row2['outgoing_message_id']) ? $you = "Anda: " : $you = "";
    //cek user daring / luring
    ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";


    $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                        <div class="content">
                            <img src="./image/' . $row['avatar'] . '" alt="">
                            <div class="details">
                                <span>' . $row['full_name'] . " " . $row['last_name'] . '</span>
                                <p>' . $you . $msg . '</p>
                            </div>
                        </div>
                        <div class="status-dot ' . $offline . ' "><i class="fas fa-circle"></i></div>
                    </a>
                 ';
}
