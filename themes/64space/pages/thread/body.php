<?php
$docRoot = $_SERVER['DOCUMENT_ROOT'];
$threadName = $_GET['t'] ?? '';
?>

<a href="/" class="allthreads_button">to all threads</a>

<div class="container">
  <form action="/post-comment" method="post" nofollow="true">
    <label for="postform_author">
      Name
    </label>

    <input name="postform_author"
    type="text"
    value="Anonymous"
    placeholder="Anonymous"
    style="margin-bottom: 1em"
    required="">

    <input
    type="hidden"
    name="postform_id"
    value="<?= $threadName ?>"
    required="">

    <label for="postform_text">Message</label>
    <textarea name="postform_text"
      class="postform_text"
      autocomplete="off"
      placeholder="Write some text..."
      required=""></textarea>

    <button type="submit" class="btn-blue postform_submitbtn btn-big">Post</button>
  </form>
</div>

<?php
require_once("{$docRoot}/config.php");
$konaConfig = new KonaConfig();

$activeTheme = $konaConfig->theme;

$thread = "{$docRoot}/themes/{$activeTheme}/meta/threads/{$threadName}/post.html";
$comments = "{$docRoot}/themes/{$activeTheme}/meta/threads/{$threadName}/comments";
$errorpagePath = "{$docRoot}/themes/{$activeTheme}/pages/errorpage/index.html";

if (isset($threadName) && !empty($threadName)) {
  if (is_file($thread)) {
    include($thread);

    $threadComments = scandir($comments, SCANDIR_SORT_NONE);
    foreach ($threadComments as $comment) {
      if (str_ends_with($comment, $konaConfig->postExt))
        include("{$comments}/{$comment}");
    }
  } else include($errorpagePath);
} else include($errorpagePath);
?>

<a href="/" class="allthreads_button">to all threads</a>