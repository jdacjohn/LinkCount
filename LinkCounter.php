<?php
declare(strict_types=1);

/**
* LinkCounter is a class used to determine the number of links in a web page.
*
* LinkCounter opens a page, reads its contents and counts the number of links by
* exploding the content on the opening <a tags.  This class is used by creating an instance
* of the class using a web address as the single argument to the _construct() method, and then
* invoking the countLinks() public method.
*
* @package    LinkCount
* @author     John Arnold <john@jdacsolutions.com>
* @copyright  Copyright (c) 2018 John Arnold (https://jdacsolutions.com)
* @version    $1.0$
* @link       https://github.com/jdacjohn/LinkCount
* @since      File available since Release 1.0
* @access     public
* @property   infile - contains the value sent to the constructor to instantiate the class.
*
* @example  $myCounter = new LinkCounter('http://my.domain.com/path');
* @example  &links = $myCounter->countLinks();
*/
class LinkCounter {

  public $infile = '';
  private $base = '';
  private $host = '';
  private $path = '';

  /**
  * Returns an instance of LinkCounter
  * @param  string $pageToCheck The web address of the page to count the number of links in.
  * @return LinkCounter
  * @access public
  */
  public function __construct(string $pageToCheck) {
    $this->infile = $pageToCheck;
    $this->setBase();
  }

  /**
  * Return the number of links contained in the web page indicated by the object's $infile
  * value
  * @return int
  * @access public
  */
  public function countLinks() : int {
    // Return a count of all links in the LinkCounter's $inFile

    $lines = explode('<a',file_get_contents($this->base . $this->host . $this->path));
    $linkCount = 0;
    // Disregard the first array element in $lines.  This is everything in the file before
    // the first link.
    for ($i = 1; $i < count($lines); $i++) {
      $linkSeg = $lines[$i];
      $theLink = explode('</a>',$linkSeg)[0];
      //echo "\nLink Count = " . $linkCount . "\n";
      //echo '<a>' . $theLink . '</a>';
      $linkCount++;
    }
    return $linkCount;
  }

  private function countExternalLinks(array $fileLines) : int {
    /**
    * Return a count of all external links in $inFile
    *
    * @param array $fileLines  An array containing the exploded lines of $infile
    * @return int
    * @access private
    * @// TODO: Implement this function
    */
  }

  private function countInternalLinks(array $fileLines) : int {
    /**
    * Return a count of all external links in $inFile
    *
    * @param array $fileLines  An array containing the exploded lines of $infile
    * @return int
    * @access private
    * @// TODO: Implement this function
    */
    return 0;
  }

  /**
  * Take the file/path name that was used to instantiate the object and parse the
  * base URL.  This will ultimately be used to determine whether a link in $infile is an internal or an
  * external link.
  * @return   void
  * @access   private
  */
    private function setBase() : void {
      $getPath = parse_url($this->infile);
      $numParts = count($getPath);
      switch ($numParts) {
        case 1: {
          // User entered a simple web address without a scheme or path
          echo "getPath size is 1.  User entered " . $this->infile . "\n";
          $this->base = 'http://';
          $this->host = $getPath['path'];
          break;
        }
        case 2: {
          echo "getPath size is 2.  User entered " . $this->infile . "\n";
          break;
        }
        case 3: {
          echo "getPath size is 3.  user entered " . $this->infile . "\n";
          $this->base = $getPath['scheme'] . '://';
          $this->host = $getPath['host'];
          $this->path = $getPath['path'];
        }
      }
      /* debugging
      var_dump($getPath);
      echo "this->base =" . $this->base . "\n";
      echo "this->host =" . $this->host . "\n";
      echo "this->path =" . $this->path . "\n";
      */
  }

}
?>
