<?php
$docRoot = $_SERVER['DOCUMENT_ROOT'];

require_once("{$docRoot}/kona/kona.php");
require_once("{$docRoot}/config.php");

$kona = new Kona();
$konaConfig = new KonaConfig();

echo $kona->setUTF8();
echo $kona->setViewport();
echo $kona->setTitle($konaConfig->seoName);
echo $kona->setDescription($konaConfig->seoDesc);
echo $kona->setIcon('favicon.png');

echo $kona->addCSS('base.css');
echo $kona->addCSS('threads.css');
echo $kona->addCSS('components/button.css');