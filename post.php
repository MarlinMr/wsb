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
  $stmt->close();
  $conn->close();
  if ($row = $result->fetch_assoc()){
      foreach ($row as $r){
        $change = $r + $change;
        $sql = "UPDATE stocks SET portfolio =?, timestamp =? WHERE username =? AND stock =?";
        require "./include/connhandler.php";
        if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("iiss",  $change, $timestamp, $stockid, $username,);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        print "had $r now has $change";
        }else{exit();}
    } 
  }else {
    $sql = "INSERT INTO stocks (stock, username, portfolio, timestamp) VALUES (?, ?, ?, ?)";
    require "./include/connhandler.php";
    if($stmt = $conn->prepare($sql)){
    $stmt->bind_param("ssii", $stockid, $username, $change, $timestamp);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    }else{exit();}
    }
?>
