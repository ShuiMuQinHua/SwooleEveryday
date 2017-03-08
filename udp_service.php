
<?php 
/*
 *  UDP服务器与TCP服务器不同，UDP没有连接的概念。客户端无需连接，可以直接发送数据包
 */

//创建Server对象，监听 192.168.17.128:55153端口，类型为SWOOLE_SOCK_UDP 
$serv = new swoole_server("192.168.17.128", 55153, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);  
  
//监听数据发送事件 
$serv->on('Packet', function ($serv, $fd, $data, $clientInfo) { 
    $serv->send($fd, "Server: ".$data); 
    var_dump($clientInfo); 
}); 
  
//启动服务器 
$serv->start();

?>
