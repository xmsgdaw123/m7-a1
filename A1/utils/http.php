<?php

function sendHttpResponse(string $status, string $data = '') {
  $object = array('status' => $status, 'data' => $data);
  $encoded = json_encode($object);
  echo $encoded;
}