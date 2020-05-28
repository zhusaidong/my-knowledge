# 基于比较的排序算法

## BUB - 冒泡排序

    元素挨个一一对比，每一轮把最大的放最后，直到只剩下1个数。
    
    做
      交换旗帜变量 = 假 （False）
      从 i = 1 到 最后一个没有排序过元素的指数
        如果 左边元素 > 右边元素
          交换（左边元素，右边元素）
          交换旗帜变量 = 真（True）
    while 交换旗帜变量

## SEL - 选择排序

    重复（元素个数-1）次
      把第一个没有排序过的元素设置为最小值
      遍历每个没有排序过的元素
        如果元素 < 现在的最小值
          将此元素设置成为新的最小值
      将最小值和第一个没有排序过的位置交换

## INS - 插入排序

    将第一个元素标记为已排序
    遍历每个没有排序过的元素
      “提取” 元素 X
      i = 最后排序过元素的指数 到 0 的遍历
        如果现在排序过的元素 > 提取的元素
          将排序过的元素向右移一格
        否则：插入提取的元素

## MER - 归并排序 (递归实现)

    将每个元素拆分成大小为1的部分
    recursively merge adjacent partitions
      i = 左侧开始项指数 到 右侧最后项指数 的遍历（两端包括）
        如果左侧首值 <= 右侧首值
          拷贝左侧首项的值
        否则： 拷贝右侧部分首值
    将元素拷贝进原来的数组中

## QUI - 快速排序 (递归实现)

    每个（未排序）的部分
    将第一个元素设为轴心点
      存储指数 = 轴心点指数 +1
      从 i=轴心点指数 +1 到 最右指数 的遍历
        如果 元素[i] < 元素[轴心点]
          交换(i, 存储指数); 存储指数++
      交换(轴心点, 存储指数 - 1)

## R-Q - 随机快速排序 (递归实现)

    每一轮，随机选取轴心点，和第一个元素交换
    下面的操作就和快排方法一致了

# 不基于比较的排序算法

## COU - 计数排序

    创建关键值（计数）数组
    遍历数列中的每个元素
    相应的计数器增加1
    每轮计数，都从最小的值开始
    当计数为非零数时循环
    重新将元素存储于列表
    将计数减1

## RAD - 基数排序

    创建10个桶（队列）分别给每个数位（0到9）
    遍历每个数位
    遍历数列中的每个元素
    将元素移至相应的桶中
    在每个桶中，从最小的数位开始
    当桶不是空的
    将元素恢复至数列中