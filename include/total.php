<?php
  $sql = "SELECT SUM(portfolio) AS total FROM stocks WHERE stock =?";
  require "connhandler.php";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $stockid);
  #$stockid = $_GET["stock"];
  $stockid = 'GME';
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){
    foreach ($row as $r){
      print "$stockid : $r ";
  }
  }
  $conn->close();
?>
