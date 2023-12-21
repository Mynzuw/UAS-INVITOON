<?php
session_start();
include "../modules/config.php";
  $sql = "SELECT comments.id, users.user_id as user_id, users.username, comments.comment_text, comments.created_at
  FROM comments
  LEFT JOIN users ON comments.user_id = users.user_id
  WHERE comments.parent_comment_id IS NULL
  ORDER BY comments.created_at DESC";

  // Proses formulir komentar utama jika dikirimkan
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['main_comment_text']) && isset($_POST['chapter_id'])) {
      $main_comment_text = $_POST['main_comment_text'];
      $chapter_id = $_POST['chapter_id'];
      $user_id = $_SESSION['user_id'];

      // Masukkan komentar utama ke database
      $main_comment_sql = "INSERT INTO comments (user_id, comment_text, chapter_id) VALUES ('$user_id', '$main_comment_text', '$chapter_id')";

      if ($conn->query($main_comment_sql) === TRUE) {
          echo "Komentar utama berhasil ditambahkan.";
          header("Location: ../views/baca-chapter.php?id=$chapter_id#komen");
      } else {
          echo "Error: " . $main_comment_sql . "<br>" . $conn->error;
      }
  }
?>