# swoole



## swoole与fpm的爱恨情仇:cupid:

+   swoole = nginx + fpm

> nginx监听服务端口，fpm的master进程管理worker进程，worker进程处理php请求
> 
> swoole的master进程监听服务端口，master进程里的Reactor线程处理连接（如拆包组包等），Manager进程管理worker进程，worker进程处理php请求



+   常驻内存

> 随着框架的发展框架的体系越来越多，框架启动需要加载很多东西，包括php本身运行需要编译成opcode，非常影响性能。而swoole可以让php常驻内存。大大提升了php和其框架的性能。



+   延展了php的应用场景

> swoole是网络框架，除了http，还支持tcp，websocket等网络协议。



+   异步非阻塞
		
> pm启动时创建一个master进程和n个worker进程。如果请求过多，fpm会创建更多的worker进程。处理完请求再销毁。频繁大量的创建销毁进程非常耗cpu性能。
> 
> 而swoole的worker进程是异步非阻塞的。少量进程就可以处理大量请求。大大提升性能。
> 
> swoole还支持协程。



# swoole进程模型

![swoole进程模型](swoole进程模型.png)

