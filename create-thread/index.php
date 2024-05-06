<?php
$docRoot = $_SERVER['DOCUMENT_ROOT'];

require("{$docRoot}/kona/kona.php");

$kona = new Kona();

$head = $kona->load('head', 'create-thread');
$body = $kona->load('body', 'create-thread');

$kona->execute(
  $head,
  $body
);