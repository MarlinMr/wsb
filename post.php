<?php
  $sql = "SELECT portfolio FROM stocks WHERE stock =? AND username =?";
  require "./include/connhandler.php";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $stockid, $username);
  $stockid = $_GET["stock"];
  $username = $_GET["username"];
  $change = $_GET["change"];
  $stmt->execute();
  $result = $stmt->get_result();
  if ($row = $result->fetch_assoc()){
      foreach ($row as $r){
        $r = $r + $change;
        print "$r";
      
    } 
  }else {
        print "no such entry";
    }
  $conn->close();
?>
