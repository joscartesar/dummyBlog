<?php
include_once("utils.php");
include_once("model/db.php");

$url = sanitize_url($_GET['q']);
$sql = "SELECT file FROM alias ";
$sql.= "WHERE url='". $url. "'";
if ($row = $db->fetch_row($sql)) {
  include_once("controller/". $row['file']. ".php");
}
else {
  include_once("controller/list.php");
}

?>
