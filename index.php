<?php if(!isset($_SERVER['HTTPS'])) {header("https://marlinmr.se/MarlinMr/wsb/index.php"); exit;} ?>
<head>
  <?php require "./head.html"; ?>
</head>
<div class="parent">

<header class="total" >
  <?php require "./include/total.php"; ?>
</header>
<main class="table" >
  <?php require "./include/table.php"; ?>
</main>
<footer class="footer" >
  <?php require "./include/footer.php"; ?>
</footer>
</div>
