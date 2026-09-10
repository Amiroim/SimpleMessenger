<?php
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'] ?? 0;

$sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY status ASC";
$query = mysqli_query($conn, $sql);

$chats = [];

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $sql2 = "SELECT * FROM messages WHERE (outgoing_msg_id = {$row['unique_id']} AND incoming_msg_id = {$outgoing_id}
                OR incoming_msg_id = {$row['unique_id']} AND outgoing_msg_id = {$outgoing_id}) 
                ORDER BY time DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);

        $result = (mysqli_num_rows($query2) > 0) ? $row2['msg'] : "No message available";
        $msg = (strlen($result) > 17) ? substr($result, 0, 17) . '...' : $result;

        $you = ($row2 && $outgoing_id == $row2['outgoing_msg_id']) ? "You: " : "";
        $time = $row2 ? $row2['time'] : null;
        $offline = ($row['status'] == "Offline now") ? "offline" : "";
        $hid_me = ($outgoing_id == $row['unique_id']) ? "hide" : "";

        $chats[] = [
            'user' => $row,
            'msg' => $msg,
            'you' => $you,
            'time' => $time,
            'offline' => $offline,
            'hid_me' => $hid_me
        ];
    }

    usort($chats, function($a, $b) {
        return strtotime($b['time']) - strtotime($a['time']);
    });
}

$output = "";
$lastMessage = null;

foreach ($chats as $chat) {
    if ($lastMessage) {
        $output .= '<div class="centralLine"></div>';
    }

    $row = $chat['user'];
    $msg = $chat['msg'];
    $you = $chat['you'];
    $time = $chat['time'];
    $time = date('M d H:i', strtotime($time));
    $offline = $chat['offline'];
    $hid_me = $chat['hid_me'];

    $output .= '
    <script>
    </script>
    <a href="chat.php?user_id='. $row['unique_id'] .'">
        <div class="content">
            <div class="status-dot '. $offline .'"></div>
            <img src="./images/'. $row['img'] .'" alt="">
            <div class="details">
                <span>'. $row['fname'] . " " . $row['lname'] .'</span>
                <p>'. $you . $msg .'</p>
            </div>
            </div>
            <p class="lastMessageTime">'. $time .'</p>
    </a>
    ';
    $lastMessage = $chat;
}
?>
