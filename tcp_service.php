<?php
$serv = new swoole_server("192.168.17.128", 55152);
$serv->on('connect', 'onConnect');
$serv->on('receive', 'onReceive');
$serv->on('close', 'onClose');

function onConnect($serv, $fd){
	echo "Client:Connect.\n";
}

function onReceive($serv, $fd, $from_id, $data){
	echo $data."\n";
    $serv->send($fd, 'Swoole: '.$data);
}

function onClose($serv, $fd){
	echo "Client: Close.\n";
}

$serv->start();
?>