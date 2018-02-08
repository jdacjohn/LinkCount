<!DOCTYPE html>
<html lang="en">
<head>
<title>Web Page Link Counter</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php
  $webAddr = '';
  if (isset($_GET['webAddr']))  {
    $webAddr = $_GET['webAddr'];
  }
  $numLinks = '';
  if (isset($_GET['numLinks'])) {
    $numLinks = $_GET['numLinks'];
  }
?>
</head>
<body id="page1">
<h2>Web Page Link Counter</h2>
<p>This simple link counter will take a web address and report the number of links contained in that page.
  <em>The total number of links includes those links contained in the HEAD section of the document.</em></p>
<div>
  <form method="POST" name="addressform" action="CountLinks.php">
    <p><label for="webAddr"><strong>Enter Web Address:</strong></label><br />
    <input type="text" id="webAddr" name="webAddr" value="<?php echo $webAddr ?>" size="40" autofocus /></p>
    <p><label for="numLinks"><strong>Number of Links:</strong></label><br />
    <input type="text" id="numLinks" name="numLinks" value="<?php echo $numLinks ?>" size="5" readonly /><br /></p>
    <input type="submit" value="submit" />
  </form>
</div>

</body>
</html>
