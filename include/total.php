<?php
SELECT "SUM(portfolio) AS total FROM stocks WHERE stock =?";
require "connhandler.php";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $stockid);
$imgid = $_GET["stock"];
$stmt->execute();
$result = $stmt->get_result();
$result = $stmt->get_result();
while ($row = $result->fetch_array(MYSQLI_NUM)){
  foreach ($row as $r){
    print "$r ";
  }
}
$conn->close();
?>
