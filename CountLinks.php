<?php
  include 'LinkCounter.php';
  $numLinks = 0;
  $uri = "";

   // Get the URI submitted by the form.
    if (isset($_POST['webAddr'])) {
    $uri = htmlspecialchars($_POST['webAddr']);
    $counter = new LinkCounter($uri);
  }
  if ($uri != '') {
    $numLinks = $counter->countLinks();
    header('location: index.php?webAddr=' . $uri . '&numLinks=' . $numLinks);
  }

?>
