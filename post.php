<?php
  $sql = "SELECT portfolio FROM stocks WHERE stock =? AND username =?";
  require "./include/connhandler.php";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $stockid, $username);
  $stockid = $_GET["stock"];
  $username = $_GET["username"];
  $change = $_GET["change"];
  $date = new DateTime();
  $timestamp = $date->getTimestamp();
  $stmt->execute();
  $result = $stmt->get_result();
  $conn->close();
  if ($row = $result->fetch_assoc()){
      foreach ($row as $r){
        $r = $r + $change;
        print "$r";
    } 
  }else {
    $sql = "INSERT INTO (stock, username, portfolio, timestamp) VALUES (?, ?, ?, ?)";
    require "./include/connhandler.php";
    if ($conn->prepare($sql)){
      $stmt = $conn->prepare($sql)
      print "ny entry";
      $stmt->bind_param("ssii", $stockid, $username, $change, $timestamp);
      $stmt->execute();
      $conn->close();
    }else{
      exit();
    }
    }
?>
