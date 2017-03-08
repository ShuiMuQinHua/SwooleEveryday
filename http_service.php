<?php 
$http = new swoole_http_server("192.168.17.128", 55154); 
  
$http->on('request', function ($request, $response) { 
    var_dump($request->get, $request->post); 
    $response->header("Content-Type", "text/html; charset=utf-8"); 
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>"); 
}); 
  
$http->start(); 



?>


