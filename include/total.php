<form action="index.php">
  <label for="stocks">Select stock:</label>
  <select name="stockid" id="stockid">
    <option value="GME">GME</option>
    <option value="PLTR">PLTR</option>
    <option value="BB">BB</option>
    <option value="TSLA">TSLA</option>
  </select>
  <input type="submit" value="Submit">
</form>
<?php
  $sql = "SELECT SUM(portfolio) AS total FROM stocks WHERE stock =?";
  require "connhandler.php";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $stockid);
  if (empty($_GET)){
	  $stockid = "GME";
  }else{  $stockid = $_GET["stockid"];}
  #$stockid = "GME";
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()){
    foreach ($row as $r){
      print "<div id='total'><h1>Total $stockid owned by WSB:<br> $r <h1></div>";
  }
  }
  $conn->close();
?>
