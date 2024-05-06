<?php
$docRoot = $_SERVER['DOCUMENT_ROOT'];

require("{$docRoot}/kona/kona.php");

$kona = new Kona();

$head = $kona->load('head', 'thread');
$body = $kona->load('body', 'thread');

$kona->execute(
  $head,
  $body
);