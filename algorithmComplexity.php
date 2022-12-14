php算法基础----时间复杂度和空间复杂度
算法复杂度分为时间复杂度和空间复杂度。

其作用：
时间复杂度是指执行算法所需要的计算工作量；
而空间复杂度是指执行这个算法所需要的内存空间。
（算法的复杂性体现在运行该算法时的计算机所需资源的多少上，计算机资源最重要的是时间和空间（即寄存器）资源，因此复杂度分为时间和空间复杂度）。

简单来说，时间复杂度指的是语句执行次数，空间复杂度指的是算法所占的存储空间

时间复杂度
计算时间复杂度的方法：

用常数1代替运行时间中的所有加法常数
修改后的运行次数函数中，只保留最高阶项
去除最高阶项的系数
按数量级递增排列，常见的时间复杂度有：
常数阶O(1),对数阶O(log2n),线性阶O(n),
线性对数阶O(nlog2n),平方阶O(n^2)，立方阶O(n^3),…，
k次方阶O(n^k),指数阶O(2^n)。
随着问题规模n的不断增大，上述时间复杂度不断增大，算法的执行效率越低。

举个栗子:

sum = n*(n+1)/2;        //时间复杂度O(1)


for(int i = 0; i < n; i++){
printf("%d ",i);
}
//时间复杂度O(n)


for(int i = 0; i < n; i++){
for(int j = 0; j < n; j++){
printf("%d ",i);
}
}
//时间复杂度O(n^2)


for(int i = 0; i < n; i++){
for(int j = i; j < n; j++){
printf("%d ",i);
}
}
//运行次数为(1+n)*n/2
//时间复杂度O(n^2)
int i = 0, n = 100;
while(i < n){
i = i * 2;
}
//设执行次数为x. 2^x = n 即x = log2n
//时间复杂度O(log2n)
最坏时间复杂度和平均时间复杂度
　最坏情况下的时间复杂度称最坏时间复杂度。一般不特别说明，讨论的时间复杂度均是最坏情况下的时间复杂度。
　这样做的原因是：最坏情况下的时间复杂度是算法在任何输入实例上运行时间的上界，这就保证了算法的运行时间不会比任何更长。
　平均时间复杂度是指所有可能的输入实例均以等概率出现的情况下，算法的期望运行时间。设每种情况的出现的概率为pi,平均时间复杂度则为sum(pi*f(n))
　

常用排序算法的时间复杂度

最差时间分析  平均时间复杂度 稳定度     空间复杂度
冒泡排序    O(n2)   O(n2)       稳定        O(1)
快速排序    O(n2)   O(n*log2n)  不稳定  O(log2n)~O(n)
选择排序    O(n2)   O(n2)       稳定      O(1)
二叉树排序  O(n2) O(n*log2n)    不稳定     O(n)
插入排序    O(n2)   O(n2)       稳定      O(1)
堆排序 O(n*log2n) O(n*log2n)   不稳定     O(1)
希尔排序    O        O          不稳定     O(1)
空间复杂度
空间复杂度(Space Complexity)是对一个算法在运行过程中临时占用存储空间大小的量度，记做S(n)=O(f(n))。

对于一个算法来说，空间复杂度和时间复杂度往往是相互影响的。当追求一个较好的时间复杂度时，可能会使空间复杂度的性能变差，即可能导致占用较多的存储空间；反之，当追求一个较好的空间复杂度时，可能会使时间复杂度的性能变差，即可能导致占用较长的运行时间。

有时我们可以用空间来换取时间以达到目的。