<?php
/** 生成指定个数，以及最小最大值随机数组(包括最大值)
 * @parem $min 随机数组最小值
 * @parem $max 随机数组最大值
 * @parem $num 随机数组个数,默认max-min
 * @parem $order 排序方式，false不排序，ture默认 由低到高-->asort()
 * */
function unique_rand($min,$max,$num=0,$order=false)
{
    // 转为 int 类型
    $min=gettype($min)=='int'?$min:intval($min);
    $max=gettype($max)=='int'?$max:intval($max);

    // 如果参数写反
    if($max<=$min)
    {
        $max=$max+$min;
        $min=$max-$min;
    }

    $num=gettype($num)=='int'?$num:intval($num);
    $max_num=$max-$min; // 最大数组个数
    if($num<1 || $num>$max_num)  //随机数组个数,默认max-min
    {
        $num=$max_num;
    }

    //生成随机数组
    $return = array();

    $i=0;
    while(count($return)<$num)
    {
        $i++;
        $rand_n=rand($min,$max);
        $return[$rand_n]=$i;
    }
    $return=array_flip($return);

    // 数组排序
    if(isset($order))
    {
        $order=strtolower($order);
        switch($order)
        {
            case 'asort':   //由低到高 ,键值关联的保持
            case 'arsort':  //由高到低 ,键值关联的保持
            case 'sort':    //由低到高
            case 'rsort':   //由高到低
                $order($return);
                break;
            default:
                sort($return); //由低到高
                break;
        }
    }
    return $return;
}
// 测试调用
$arr=unique_rand(1,1000,1000);
echo "</pre>";
var_dump($arr);