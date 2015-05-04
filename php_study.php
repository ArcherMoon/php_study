#! /usr/local/bin/php
<?php

//1.	json encode decode
$arr = array();
$arr[0] = 0;
$arr[2] = 2;
$arr[4] = 4;
$arr[5] = 5;
print_r($arr);

$v = json_encode($arr);
echo $v."\n";

$v = json_decode($v, true);
print_r($v);

//2.	字符串字符统计
$str = "我";
echo strlen($str)."\n";	//字符串字节数
echo mb_strlen($str, 'UTF-8')."\n";	//字符串字符数（utf-8下，一个中文字符3个字节）
//output: 3	1

//3.	字符串截取字符（非字节）
$str = "hello，早上好";
echo mb_strlen($str, 'UTF-8')."\n";
echo mb_substr($str, 6, null, 'UTF-8')."\n";

/*
 * 4.	单引号'' 和双引号""
 * 单引号不对内容解释，不能输出变量和转义字符（\'和\\除外），速度快
 * 双引号对内容解释，速度慢
 */
$num = 3;
$str = 'I\'will buy $num apples for "you"\n';	//I'will buy $num apples for "you"\n
echo $str;
echo "\n";
$str = "I\'will buy $num apples for \"you\"\n";	//I\'will buy 3 apples for "you"
echo $str;

/*
 * 5.	时间	http://www.w3schools.com/php/php_date.asp	
 * http://php.net/manual/en/datetime.formats.relative.php
 * http://php.net/manual/en/function.date.php
 * date 时间戳转人类可读，strtotime 人类可读转时间戳
 */
$now = 1421424000;	//1421424000	2015-01-17	周六
$d = strtotime("tomorrow");	//都是00:00
echo date("Y-m-d h:i:sa", $d)."\n";	//第二个参数可选，默认当前时间(h 12小时制，H 24小时制)
echo date("Y-m-d h:i:sa")."\n";

$d = strtotime("tomorrow", $now);	//第二个参数可选，默认当前时间
echo date("Y-m-d h:i:sa", $d)."\n";	//2015-01-18

//若今天是周六，则上面的是今天，下面的是一周后的周六，除此以外都相同
$d = strtotime("Saturday");
echo date("Y-m-d h:i:sa", $d)."\n";
$d = strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d)."\n";

$d = strtotime("Saturday + 1 days");	//星期日
echo date("Y-m-d h:i:sa", $d)."\n";

$d = strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d)."\n";

//0 (for Sunday) through 6 (for Saturday)
$d = date("l", $now);	//转为星期几，文字，"Saturday"
echo $d."\n";
$d = date("l");
echo $d."\n";
$d = date("w", $now);	//转为星期几，数字，"1 2 3 4 5 6 0"
echo $d."\n";
$d = date("w");
echo $d."\n";

//ISO Week(ISO-8601), 1 (for Monday) through 7 (for Sunday)
$d = date("N", $now);	//转为星期几，数字，"1 2 3 4 5 6 7"
echo $d."\n";
date("o");	//年份
date("W");	//ISO-8601 week number of year, weeks starting on Monday , 年份的第几周，每周从周一开始
echo strtotime(date('o-\\WW'));	//每周开始时间，（星期一00：00） '\' 为了避免与php已定义的冲突

/*
 * 6.	数值指针移动，返回值
 */
$people = array("Peter" =>21, "Joe"=>43, "Glenn"=>64);
echo current($people)."\n";	//返回数组指针当前指向元素的值	21
echo next($people)."\n";	//数组指针移到下一个元素，返回值	43
echo prev($people)."\n";	//数组指针移到前一个元素，返回值	21
echo key($people)."\n";	//返回数组指针当前指向元素的键名	Peter

/*
 * 7.	数值 array 操作
 */
$arr = array();
$arr[2] = 9;
$arr[1] = 4;
$arr[5] = 1;
$ret = array_keys($arr);	//返回数组所有的键 （2 1 5）
print_r($ret);
$ret = array_values($arr);	//返回数组所有的值	（9 4 1）
print_r($ret);
$arr = implode(',', $arr);	//将数组元素拼接成字符串	（9, 4, 1）
echo $arr."\n";

$ret = $arr;
sort($ret); 	//数组元素按值从低到高排序
print_r($ret);

$ret = $arr;
rsort($ret); 	//数组元素按值从高到低排序
print_r($ret);

$ret = $arr;
asort($ret); 	//数组元素按值从低到高排序并保持索引关系（键名->值）
print_r($ret);

$ret = $arr;
arsort($ret); 	//数组元素按值从高到低排序并保持索引关系（键名->值）
print_r($ret);

$ret = $arr;
ksort($ret); 	//数组元素按键名从低到高排序
print_r($ret);

$ret = $arr;
krsort($ret);	//数组元素按键名从高到低排序
print_r($ret);