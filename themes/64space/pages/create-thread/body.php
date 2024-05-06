<body class="container">
  <h1>
    Create thread
  </h1>
  <p style="margin-bottom: 1em;">
    at 64space
  </p>

  <form action="/create-thread" method="post">
    <input name="thread_author"
    type="text"
    value="Anonymous"
    placeholder="Anonymous"
    required="">

    <textarea name="thread_text"
      style="margin-top: 1em"
      placeholder="Message"
      autocomplete="off"
      required=""></textarea>

    <button class="btn-blue" type="submit" style="margin-left: 1em; margin-top: 1em">Create thread</button>
  </form>
</body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $docRoot = $_SERVER['DOCUMENT_ROOT'];

  require_once("{$docRoot}/config.php");
  $konaConfig = new KonaConfig();

  require_once("{$docRoot}/kona/utils/sanitize.php");

  $activeTheme = $konaConfig->theme;

  require_once("./formatPostFile.php");

  $threadAuthor = sanitize($_POST['thread_author']);
  $threadText = sanitize($_POST['thread_text']);

  $threadName = substr($threadText, 0, 15);
  $threadName = str_replace(' ', '_', $threadName);

  $threadId = uniqid(time());

  $threadsFolder = "{$docRoot}/themes/{$activeTheme}/meta/threads";
  $threadFile = "{$threadsFolder}/{$threadName}-{$threadId}/post.html";
  $errorpagePath = "{$docRoot}/themes/{$activeTheme}/pages/errorpage/index.html";
  $postContent = formatPostFile($threadAuthor, $threadText, time());

  // creating thread folder
  mkdir("{$threadsFolder}/{$threadName}-{$threadId}/");

  // creating comments folder
  mkdir("{$threadsFolder}/{$threadName}-{$threadId}/comments/");

  // creating post file
  file_put_contents($threadFile, $postContent);

  // so, because header() doesn't work...

  // if user have JavaScript disabled
  echo("<a href='/thread?t={$threadName}-{$threadId}'>View the post</a>");
  echo("<script>location.href = '/thread?t={$threadName}-{$threadId}';</script>");
}
?>