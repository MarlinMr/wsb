<p>PLACEHOLDER</p>
<p>Comming: Table of investors </p>
<table style="width:100%">
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
  #$stockid = $_GET["stock"];
  $stockid = "GME";
  $stmt->execute();
  $result = $stmt->get_result();
  $return_arr = array();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    foreach ($row as $r){
        print "$r";
        print "<tr><td>$r["username"]</td><td>$stockid</td><td>$r["portfolio"]</td><td>🚀</td></tr>";
    }
}else {echo 0;}
$conn->close();
?>
</table>
