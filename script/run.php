<?php

define("uname", $argv[1]);
define("upass", $argv[2]);
define("uid", $argv[3]);
define("delay", !isset($argv[4]) ? 120 : $argv[4]);

sleep(delay);

// Login Admin

$login = curl_init();
curl_setopt($login, CURLOPT_URL,"http://localhost/login");
curl_setopt($login, CURLOPT_POST, 1);
curl_setopt($login, CURLOPT_POSTFIELDS, "username=". uname . "&password=" . upass);
curl_setopt($login, CURLOPT_RETURNTRANSFER, true);
curl_setopt($login, CURLOPT_HEADERFUNCTION,
  function($curl, $header) use (&$headers)
  {
    $len = strlen($header);
    $header = explode(":", $header, 2);
    if(count($header) < 2)
      return $len;

    $headers[strtolower(trim($header[0]))][] = trim($header[1]);

    return $len;
  }
);
curl_exec($login);
curl_close($login);

$token = str_replace("; Path=/", "", $headers["set-cookie"][0]);

// Get Services

$services = curl_init();
curl_setopt($services, CURLOPT_URL,"http://localhost/settings/services");
curl_setopt($services, CURLOPT_RETURNTRANSFER, true);
curl_setopt($services, CURLOPT_HTTPHEADER, [
    "Accept: application/json, text/plain, */*",
    "Cookie: {$token}"
]);
$response = curl_exec($services);
curl_close($services);

// Parse Response

$ngrok = json_decode($response, TRUE)["ngrok_url"];

$connect = curl_init();
curl_setopt($connect, CURLOPT_URL,"https://adopanel.ml/connect");
curl_setopt($connect, CURLOPT_POST, 1);
curl_setopt($connect, CURLOPT_POSTFIELDS, "url={$ngrok}&unique=" . uid);
curl_setopt($connect, CURLOPT_RETURNTRANSFER, true);
curl_exec($connect);
curl_close($connect);

die("Remote URL uploaded!");