# linux 常用命令

## watch

不断（默认2s）执行命令，可以用作监听，如监听目录变化，监听服务状态


```shell
sudo watch service redis-server status
```

## git commit --amend

重写最近一次提交的commit message

## vim

```shell
#设置行号
:set number
```

## tar

-c压缩，-x解压，-z gzip，-v输出详情

### 压缩

`tar -czvf test.tar.gz test/*`

### 解压

`tar -xzvf test.tar.gz`