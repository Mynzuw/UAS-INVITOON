<?php


//fetch.php;

if(isset($_GET["term"]))
{
 $connect = new PDO("mysql:host=localhost; dbname=invitoon", "root", "12345678");

 $query = "
 SELECT * FROM komik 
 WHERE judul_komik LIKE '%".$_GET["term"]."%' 
 ORDER BY judul_komik ASC
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $total_row = $statement->rowCount();

 $output = array();
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $temp_array = array();
   $temp_array['id'] = $row['komik_id'];
   $temp_array['value'] = $row['judul_komik'];
   $temp_array['label'] = '<img src="../assets/img/'.$row['cover'].'" width="70" />'.$row['judul_komik'].'<hr class="bg-gray-100 shadow border-0 dark:bg-gray-700">';
   $output[] = $temp_array;
  }
 }
 else
 {
  $output['value'] = '';
  $output['label'] = 'Tidak ada komik';
 }

 echo json_encode($output);
}

?>