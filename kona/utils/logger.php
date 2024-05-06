<?php
function konaLogger($content, $invoker = 'unknown') {
  echo "<p style='font-family: sans-serif;'>[{$invoker}]: {$content}</p>";
}