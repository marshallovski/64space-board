<?php
/*
 * Kona - a tiny web framework for PHP
*/

require("{$_SERVER['DOCUMENT_ROOT']}/config.php");
require("{$_SERVER['DOCUMENT_ROOT']}/kona/utils/logger.php");

class Kona {
  public function execute(string $head, string $body, string $htmlAttr = '') {
    echo "<!DOCTYPE html><html {$htmlAttr}>";

    echo "<head>";
    include_once($head);
    echo '</head>';

    include_once($body);
    echo '</html>';
  }

  public function load(string $filename, string $page, string $type = 'php') {
    $_k_conf = new KonaConfig();

    $filepath = "{$_SERVER['DOCUMENT_ROOT']}/themes/{$_k_conf->theme}/pages/{$page}/{$filename}.{$type}";

    if (is_file($filepath)) {
      return $filepath;
    } else return konaLogger("File {$filepath} is not found", 'Kona->load');
  }

  public function setUTF8() {
    return '<meta charset="utf-8">';
  }

  public function setViewport() {
    return '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
  }

  public function setTitle(string $title) {
    return "<title>{$title}</title>";
  }

  public function setDescription(string $desc) {
    return "<meta name='description' content='{$desc}'>";
  }

  public function setIcon(string $filename) {
    $_k_conf = new KonaConfig();
    $iconpath = "./themes/{$_k_conf->theme}/images";


    return "<link rel='favicon' href='{$iconpath}/{$filename}'>";
  }

  // adding static content
  public function addJS(string $filename, bool $async = false, bool $defer = false) {
    $_k_conf = new KonaConfig();
    $jspath = "./themes/{$_k_conf->theme}/js";


    return "<script async='{$async}' defer='{$defer}' src='{$jspath}/{$filename}'></script>";
  }

  public function addCSS(string $filename) {
    $_k_conf = new KonaConfig();
    $csspath = "./themes/{$_k_conf->theme}/css";

    return "<link rel='stylesheet' href='{$csspath}/{$filename}'>";
  }
}