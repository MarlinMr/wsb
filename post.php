<?php
  $sql = "SELECT portfolio FROM stocks WHERE stock =? AND username =?";
  require "connhandler.php";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $stockid, $username);
  #$stockid = $_GET["stock"];
  $stockid = "GME";
  $username = "TEST";
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){
    foreach ($row as $r){
      print "$r";
  }
  }
  $conn->close();
?>
