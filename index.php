<?php
require('./kona/kona.php');

$kona = new Kona();

$head = $kona->load('head', 'home');
$body = $kona->load('body', 'home');

$kona->execute(
  $head,
  $body
);