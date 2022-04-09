<?php
function dd($data, $die = false)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    if($die){
        die;
    }
}