<?php if(!isset($_SERVER['HTTPS'])) {header("https://marlinmr.se/MarlinMr/wsb/index.php"); exit;} ?>
<head>
  <?php require "./head.html"; ?>
</head>
<div class="parent">

<header class="blue section" contenteditable>
  <?php require "./include/total.php"; ?>
</header>
<main class="coral section" contenteditable>
  <?php require "./include/table.php"; ?>
</main>
<footer class="purple section" contenteditable>
  <?php require "./include/footer.php"; ?>
</footer>
</div>
