<?php
session_start();
include "../modules/config.php";
$user_id = $_SESSION['user_id'];
$parent_comment_id = $_POST['parent_comment_id'];
$reply_text = $_POST['reply_text'];
$chapter_id = $_POST['chapter_id'];

$reply_sql = "INSERT INTO comments (user_id, parent_comment_id, comment_text, chapter_id) VALUES ('$user_id', '$parent_comment_id', '$reply_text', '$chapter_id')";

if ($conn->query($reply_sql) === TRUE) {
    echo "Balasan berhasil ditambahkan.";
    header("Location: ../views/baca-chapter.php?id=$chapter_id#komen");
} else {
    echo "Error: " . $reply_sql . "<br>" . $conn->error;
}
?>