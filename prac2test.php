<?php
echo("Hatim Mullajiwala-19410");
$a=array(12,13,14);
$b=array(12,10,14);
function my_func($n1,$n2){
if($n1==$n2){
    return $n1;
}
}
// $s=0;
// $len=count($a);
// A:if($s<$len){
//     if($a[$s]==$b[$s]){
//         echo ("<br>".$a[$s]." is commomn in both arrays");
//     }
//     $s++;
//     goto A;
// }

$k=array_map("my_func",$a,$b);
for($i=0;$i<count($k);$i++){
echo "<br>".$k[$i];
}

?>