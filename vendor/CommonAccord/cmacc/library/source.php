<body style="margin:20;padding:0">
<?php
/*require('./vendor/autoload.php'); */
ini_set("allow_url_include", true);
include("header.php");

?>


<?php

//This displays the path, current file name, and provides the edit and show options //

echo "<a href=index.php?action=list&file=><img src='" . ASSETS_PATH . "/arrowup.png' height=25></a><a href=$_SERVER[PHP_SELF]?action=list&file=$rootdir[dirname]/>$rootdir[dirname]</a>/<b>$filenameX</b><br></h4>";

echo " &emsp;  &emsp;  &emsp; ";

echo "<a href=index.php?action=edit&file=" .$dir.">Edit</a> &emsp; ";

echo "<a href=index.php?action=openedit&file=" .$dir.">$Complete_Fields_Message</a> &emsp; ";

echo "<b><a href=index.php?action=doc&file=" .$dir.">$Doc_Message
</a></b> &emsp; ";

echo "<a href=index.php?action=print&file=" .$dir.">$Print_Message</a> &emsp; ";

echo "<a href=" . URLFORDOCSINREPO . $dir.">Github</a> &emsp;";

echo "<a href=" . URLFORREPO . "search?utf8=✓&q=" . URLFORREPO . "/search?utf8=✓&q=" .$dir. ">Used By</a>";

echo "<br><br>";


?>


<div class="container">

<?php
  echo "
<div id='tabs'><ul><li>
<a href='#tab-source'>Source</a></li>
</ul><div id='tab-render'>" ;
?>
</div>




<div id="tab-source">

<!--table formatting for the document -->
<table class="TFtable";>
<?php 
foreach($contents as $n) {
        list($k, $v) = array_pad( explode ("=", $n, 2), 2, null);

        if(preg_match('/\[\?(.+?)\]/', $v, $matches)) {
                $v = "<a href=$matches[1]>$v</a>";
        }

        else if(preg_match('/\[(.+?)\]/', $v, $matches)) {
                $v = "<a href=$_SERVER[PHP_SELF]?action=source&file=$matches[1]>$v</a>";
        }

        echo "<tr>";
        if(isset($k)) { echo "<th height='10' style='text-align:right'>$k</th><td width='20'></td><td>$v</td>"; }
        else { echo "$k"; }
        echo "</tr>";
}

?>
</table>

</div>


</div>




</div></div>

</div>
