<?php
function formatPostFile(string $author, string $text, int $timestamp) {
  $time = date('d.m.Y', $timestamp);

  return "<div class='threads_thread threads_reply'><p class='thread_author'>{$author}<span class='thread_time'>{$time}</span></p><p class='thread_text'>{$text}</p></div>";
}