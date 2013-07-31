<?php
include_once("model/db.php");
include_once("model/user_obj.php");

$sql = "SELECT post_id, title FROM post";
$result = $db->fetch($sql);
$post = array();
while ($row = mysqli_fetch_array($result)) {
  $id = $row['post_id'];
  $content = array("title" => $row['title']);
  $post[$id] = $content;
}
?>
<div id="flang">
  <ul>
    <li><a href="index.php?page=admin&flang=posts">Posts</a></li>
<?php if ($user->get_user_rol() == "admin") { ?>
    <li><a href="index.php?page=admin&flang=tags">Tags</a></li>
    <li><a href="index.php?page=admin&flang=users">Users</a></li>
    <li><a href="index.php?page=admin&flang=roles">Roles</a></li>
<?php } ?>
  </ul>
</div>
<?php
if (isset($_GET['flang'])) {
  switch ($_GET['flang']) {
    case "posts":
      include_once("admin_post.php");
      break;
    case "tags":
      include_once("admin_tag.php");
      break;
    case "users":
      include_once("admin_user.php");
      break;
    case "roles":
      include_once("admin_rol.php");
      break;
    default:
      include_once("admin_post.php");
  }
}
else {
  include_once("admin_post.php");
}
?>