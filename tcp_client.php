<?php
//同步tcp客户端
//这个客户端是同步阻塞的，connect/send/recv 会等待IO完成后再返回。
//同步阻塞操作并不消耗CPU资源，IO操作未完成当前进程会自动转入sleep模式，
//当IO完成后操作系统会唤醒当前进程，继续向下执行代码
$client = new swoole_client(SWOOLE_SOCK_TCP);
if (!$client->connect('192.168.17.128', 55152, -1))
{
    exit("connect failed. Error: {$client->errCode}\n");
}
$client->send("hello world\n");
echo $client->recv();
$client->close();
?>
