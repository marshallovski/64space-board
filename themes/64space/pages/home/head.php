<?php
require_once('./kona/kona.php');
require_once('./config.php');

$kona = new Kona();
$konaConfig = new KonaConfig();

echo $kona->setUTF8();
echo $kona->setViewport();
echo $kona->setTitle($konaConfig->seoName);
echo $kona->setDescription($konaConfig->seoDesc);
echo $kona->setIcon('favicon.png');

echo $kona->addCSS('base.css');
echo $kona->addCSS('home.css');

// components
echo $kona->addCSS('components/button.css');