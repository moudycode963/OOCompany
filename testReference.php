<?php

$zahlenfolge = [1,4,2,5];


function tuwas($arr)
{
    $arr[2] = 17;
}

tuwas($zahlenfolge);

print_r($zahlenfolge);