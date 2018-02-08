<?php
  // Just a test file to run from the command line to test functionality.
  include 'LinkCounter.php';

  $counter = new LinkCounter('www.w3schools.com/tags/tag_input.asp');
  echo "\nThe file to be counted is " . $counter->infile . "\n";
  $numLinks = $counter->countLinks();
  echo "\nTotal number of links in page is " . $numLinks . "\nEnd of Test";

?>
