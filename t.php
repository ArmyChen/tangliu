<?php  
echo "时间格式1：".date("Y-m-d H:i:s ")."<br>";// 2010-06-12 10:26:31   
echo "时间格式2：".date("y-M-D h:i:S ")."<br>";// 10-Jun-Sat 10:43:th   
echo "月份，英文全名：".date("F")."<br>";// June   
echo "月份，二位数字，补零：".date("m")."<br>";//  06  
echo "月份，二位数字，不补零：".date("n")."<br>";//  6  
echo "月份，三个英文：".date("M")."<br>";// Jun  
echo "星期几，英文全名：".date("l")."<br>";// Saturday  
echo "星期几，三个英文：".date("D")."<br>";// Sat  
echo "星期几，数字型：".date("w")."<br>";// 6  
?> 