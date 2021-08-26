<?php
function replaceAllToEmpty($arr = []){
    if (is_array($arr)){
        foreach ($arr as $key => $a){
            if ($a === "all") {
                $arr[$key] = "";
            }
        }
    }else{
        if ($arr === "all") {
            $arr = "";
        }
    }
    return $arr;
}