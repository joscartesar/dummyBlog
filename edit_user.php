<?php
include_once("model/user_obj.php");

$user_edit = new User;
$user_edit->set_id($_POST['user_id']);
$user_edit->set_username($_POST['username']);
$user_edit->_save($_POST['password']);

header('Location: http://localhost/dummy/index.php?page=admin&flang=users');
?>
