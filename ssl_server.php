<?php
$serv = new swoole_server("0.0.0.0", 443, SWOOLE_PROCESS, SWOOLE_SOCK_TCP | SWOOLE_SSL); 
    $key_dir = dirname(dirname(__DIR__)).'/tests/ssl'; 
      
     // SWOOLE_SOCK_TCP表示此端口不加密 
    //  SWOOLE_SOCK_TCP | SWOOLE_SSL 表示此端口启用加密 
      
    $serv->addlistener('0.0.0.0', 80, SWOOLE_SOCK_TCP); 
      
    $serv->set(array( 
        'worker_num' => 4, 
        'ssl_cert_file' => $key_dir.'/ssl.crt', 
        'ssl_key_file' => $key_dir.'/ssl.key', 
    )); 
    
?>