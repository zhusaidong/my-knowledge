# to be an architecture

## 源码分析

### mysql

#### ☆事务
    4个特征
        原子性
        一致性
        隔离性
        持久性

#### ☆索引
    B+树
    联合索引有效性
    explain解析

#### 隔离级别

### redis

#### 数据类型
    String
    Hash
    List
    Set
    zSet

#### 缓存穿透，雪崩

### java

#### 基础问题（模棱两可，面试答不上来）

#### arraylist

#### hashmap

### spring boot

#### ☆Spring IOC容器中bean的依赖注入（三级缓存）

## 分布式架构

#### 事务同步TCC

## 微服务架构

### rpc

spring cloud，spring cloud alibaba，Dubbo的区别

### 服务发现和注册

#### 宕机问题
    服务消费者本地有缓存，可以与服务提供者直连

## 多线程并发编程

### AQS

### nio

### ☆锁

#### 乐观，悲观

#### 无锁cas

#### 偏向锁

#### 轻量锁

#### 重量锁synchronized

### ☆哲学家就餐解法
    1. 奇数先拿左边，偶数先拿右边。
    2. 同时拿。
    3. 最后一个先拿左边，其他先拿右边。

## JVM

### ☆内存模型

### 各类GC的原理

## 其它

### 消息队列

### 设计模式

### 存储
