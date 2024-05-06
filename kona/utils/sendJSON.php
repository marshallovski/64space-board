<?php
function sendJSON(array $content) {
  header('Content-Type: application/json');
  echo json_encode($content);
}