<p>Table of investors </p>
<table style="width:100%" class="searchable sortable">
  <tr>
    <th>User</th>
    <th>Stock</th> 
    <th>Holdings</th>
    <th>Market value</th>
  </tr>
<?php
  $sql = "SELECT portfolio, username FROM stocks WHERE stock =? ORDER BY portfolio DESC;";
  require "connhandler.php";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $stockid);
  if (empty($_GET)){
	  $stockid = "GME";
  }else{  $stockid = $_GET["stockid"];}
  #$stockid = "GME";
  $stmt->execute();
  $result = $stmt->get_result();
  $return_arr = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
	$username = $row["username"];
	$portfolio = $row["portfolio"];
	$url = "https://reddit.com/u/$username";
        print "<tr><td><a href=$url>$username</a></td><td>$stockid</td><td>$portfolio</td><td>🚀</td></tr>";
    }
}else {echo 0;}
$conn->close();
?>
</table>
