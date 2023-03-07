<?php
echo("Hatim Mullajiwala-19410");
echo("<br>1");
$flag=0;
for($i=2;$i<=100;$i++)
{
    for($j=2;$j<=$i-1;$j++){
        if($i!=$j){
            if($i%$j==0){
               $flag=1; 
               break;
            }
        $flag=0;
        }
    }
    if($flag==0){
        echo "<br>".$i;
    }
}

?>