<?php
  $sql = "SELECT portfolio FROM stocks WHERE stock =? AND username =?";
  require "./include/connhandler.php";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $stockid, $username);
  #$stockid = $_GET["stock"];
  $stockid = "PLTR";
  $username = "TEST";
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){
    if ($result->num_rows > 0) {
    foreach ($row as $r){
      print "$r";
  }}
  }
  $conn->close();
?>
