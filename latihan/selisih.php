<?php

function selisih($x, $y){
    if($x >= $y){
        return $x - $y;
    } else {
        return $y - $x;
    }

}

echo selisih(27,9);
?>