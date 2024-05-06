<?php
$docRoot = $_SERVER['DOCUMENT_ROOT'];
require("{$docRoot}/kona/utils/sendJSON.php");
require("{$docRoot}/kona/utils/sanitize.php");
require_once("./formatPostFile.php");

require_once("{$docRoot}/config.php");

$konaConfig = new KonaConfig();
$activeTheme = $konaConfig->theme;

$postAuthor = sanitize($_POST['postform_author']);
$postText = sanitize($_POST['postform_text']);
$postId = $_POST['postform_id'];
$postUniqId = uniqid(md5(time()));

$thread = "{$docRoot}/themes/{$activeTheme}/meta/threads/{$postId}";

if (isset($postAuthor) && !empty($postAuthor)) {
  if (isset($postText) && !empty($postText)) {
    if (isset($postId) && !empty($postId)) {
      if (is_file("{$thread}/post.html")) {
        file_put_contents("{$thread}/comments/{$postUniqId}.html", formatPostFile($postAuthor, $postText, time()));
        header("Location: /thread?t={$postId}&post-success=true&lifesucks");
      } else sendJSON(["ok" => false, "message" => "thread {$postId} is not found"]);
    } else sendJSON(["ok" => false, "message" => "`postform_id` is empty"]);
  } else sendJSON(["ok" => false, "message" => "`postform_text` is empty"]);
} else sendJSON(["ok" => false, "message" => "`postform_author` is empty"]);