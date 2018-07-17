# CabalPHP

CabalPHP 是一个基于Swoole的**轻量、高效、全异步**开源框架。

[中文文档](http://www.cabalphp.com/) 
[English Document](http://www.cabalphp.lc/#/en/) 

## 亮点

* 全异步单机超高性能，轻松分布式部署
* 支持HTTP、TCP、websocket等多种协议
* **完善数据库引擎，简单高效**（其他swoole框架几乎没有哦）
* 易于学习，开发效率高，简单高效的数据库引擎
* **自动生成API接口文档**
* 使用IDE（Sublime Text/VSCode/PhpStorm等）有完整的代码提示


## 适用场景

* 微服务架构的RPC服务开发
* 前后分离的应用（RESTful）API接口开发
* 即时通讯服务端开发
* 传统的Web网站，服务端渲染SEO友好

## 性能及压力测试

作者已经在生产环境使用，腾讯云两台4H8G（CabalPHP+Redis两个服务）支持日活跃3000W+PV的统计业务，依靠Task进程异步将统计数据写入腾讯云MySQL。

**框架并发场景已经得到验证，复杂业务场景尚未验证。**

环境： 

* 腾讯云 容器服务
* 镜像: 基于 php:7.1-alpine 的swoole镜像
* 1cores
* 256MiB - 512MiB
* php 7.1.12

```
    # ab -c 2000 -n 10000 http://172.16.1.79:9501/
    This is ApacheBench, Version 2.3 <$Revision: 1430300 $>
    Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
    Licensed to The Apache Software Foundation, http://www.apache.org/

    Benchmarking 172.16.1.79 (be patient)
    Completed 1000 requests
    Completed 2000 requests
    Completed 3000 requests
    Completed 4000 requests
    Completed 5000 requests
    Completed 6000 requests
    Completed 7000 requests
    Completed 8000 requests
    Completed 9000 requests
    Completed 10000 requests
    Finished 10000 requests


    Server Software:        swoole-http-server
    Server Hostname:        172.16.1.79
    Server Port:            9501

    Document Path:          /
    Document Length:        284 bytes

    Concurrency Level:      2000
    Time taken for tests:   1.658 seconds
    Complete requests:      10000
    Failed requests:        3
    (Connect: 0, Receive: 0, Length: 3, Exceptions: 0)
    Write errors:           0
    Total transferred:      4330003 bytes
    HTML transferred:       2840003 bytes
    Requests per second:    6031.43 [#/sec] (mean)
    Time per request:       331.596 [ms] (mean)
    Time per request:       0.166 [ms] (mean, across all concurrent requests)
    Transfer rate:          2550.40 [Kbytes/sec] received

    Connection Times (ms)
                min  mean[+/-sd] median   max
    Connect:        0   37 154.4      2    1005
    Processing:    27  252  68.8    260     547
    Waiting:        0  250  69.2    259     546
    Total:         79  289 165.9    267    1369

    Percentage of the requests served within a certain time (ms)
    50%    267
    66%    284
    75%    303
    80%    314
    90%    347
    95%    365
    98%   1252
    99%   1279
    100%   1369 (longest request)
```

## 示例

* [DEMO](http://demo.cabalphp.com/)
* [DEMO-Chat](http://119.28.136.181:9501/chat) 

## 捐助

先捐助些优秀的代码吧!