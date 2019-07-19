<?php

$forumChat = $_POST['forumChat'];
$forumName_id = $_POST['forumName_id'];
$user_id = $_POST['user_id'];

$connection = mysqli_connect("localhost", "root", "Jayluv3139", "shopup");

if (isset($_POST['forumChat'])) {

    $query = mysqli_query($connection, "INSERT INTO forum(forumChat, forumName_id, user_id) values ('$forumChat', '$forumName_id', '$user_id')");
}
mysqli_close($connection);

?>