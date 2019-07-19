<?php

$forumChat = $_POST['forumChat'];
$forumName_id = $_POST['forumName_id'];
$user_id = $_POST['user_id'];

$connection = mysqli_connect("localhost", "root", "Jayluv3139", "shopup");

$sql = "SELECT * FROM forum";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
mysqli_close($connection);

?>