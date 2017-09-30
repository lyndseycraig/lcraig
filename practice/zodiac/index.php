<?php
 function yearList($startYear,$endYear){
     $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
     $yearSum=0;
            echo '<ul>';
            for ($i=$startYear; $i<$endYear; $i+=4){
                echo '<li>Year ' . $i;
                if($i==1776){
                    echo "<span> USA INDEPENDENCE</span>";
                }
                
                else if($i%100==0){
                    echo "<span> Happy New Century</span>";
                }
                
                
                
                /*for{
                    echo '<img src='$zodiac[x];
                }*/
                
                echo '</li>';
                $yearSum+=$i;
            }
            echo '</ul>';
            return $yearSum;
        }
        //echo '<h1>Year Sum: '. $yearSum . '</h1>';
       

        
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            span{
                font-weight:bold;
            }
        </style>
        
    </head>
    <body>
        <h1>Chinese Zodiac List</h1>
        <?php
       
        
        $sum=yearList(1900,2000);
        ?>
        <h2>Year Sum: <?=$sum?></h2>
    </body>
</html>