<body class="container">
  <h1>64space</h1>
  <p>
    a space imageboard
  </p>

  <a href="/create-thread">
    <button class="create_btn">
      Create thread
    </button>
  </a>
  <?php
  $docRoot = $_SERVER['DOCUMENT_ROOT'];

  require_once("{$docRoot}/config.php");

  $konaConfig = new KonaConfig();
  $threads = scandir("{$docRoot}/themes/{$konaConfig->theme}/meta/threads/",SCANDIR_SORT_DESCENDING);

  if (count($threads) > 0) {
    foreach ($threads as $thread) {
      // replacing underscores with spaces
      $threadName = str_replace('_', ' ', $thread);

      // removing "-`code`.html"
      $threadName = explode('-', $threadName)[0];

      // removing ".html"
      $internalThreadName = str_replace('.html', '', $thread);

      echo "
      <div class='thread'>
      <p>{$threadName}</p>
      <a href='/thread?t={$internalThreadName}'>
      <button class='btn-blue thread_viewbtn'>view</button>
      </a>
      </div>";
    }
  } else include('zeroThreads.html');
  ?>

</body>