<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2016-01-15
 * Time: 2:56 PM
 */
$name = 'Jim';
$what = 'geek';
$level = 10;
echo 'Hi, my name is '.$name,'. and I am a level '.$level.' 
'.$what;

echo '<br/>';

$hoursworked = 10;
$rate = 12;


if ($hoursworked > 40) {
       $total = $hoursworked * $rate * 1.5;
} else {
       $total = $hoursworked * $rate;
}
echo ($total > 0) ? 'You owe me '.$total : "You're welcome";