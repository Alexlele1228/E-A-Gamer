<?php
// Array with names
$a[] = "Moba";
$a[] = "Dota2";
$a[] = "SMITE";
$a[] = "FPS";
$a[] = "Action";
$a[] = "Casual";
$a[] = "Fall out 4";
$a[] = "2K21";


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>