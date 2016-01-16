<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2016-01-15
 * Time: 2:56 PM
 */

/**
 * $name = 'Jim';
 * $what = 'geek';
 * $level = 10;
 * echo 'Hi, my name is '.$name,'. and I am a level '.$level.'
 * '.$what;
 *
 * echo '<br/>';
 *
 * $hoursworked = $_GET['hours'];;
 * $rate = 12;
 *
 *
 * if ($hoursworked > 40) {
 * $total = $hoursworked * $rate * 1.5;
 * } else {
 * $total = $hoursworked * $rate;
 * }
 * echo ($total > 0) ? 'You owe me '.$total : "You're welcome";
 */

$position = $_GET['board'];
$squares = str_split($position);

if (winner('x',$squares)) echo 'You win.';
else if (winner('o',$squares)) echo 'I win.';
else echo 'No winner yet.';




function winner($token, $position)
{
    $won = false;
    if (($position[0] == $token) &&
        ($position[1] == $token) &&
        ($position[2] == $token)
    ) {
        $won = true;
    } else if (($position[3] == $token) &&
        ($position[4] == $token) &&
        ($position[5] == $token)
    ) {
        $won = true;
    } else if (($position[6] == $token) &&
        ($position[7] == $token) &&
        ($position[8] == $token)
    ) {
        $won = true;
    } else if (($position[0] == $token) &&
        ($position[3] == $token) &&
        ($position[6] == $token)
    ) {
        $won = true;
    } else if (($position[1] == $token) &&
        ($position[4] == $token) &&
        ($position[7] == $token)
    ) {
        $won = true;
    } else if (($position[2] == $token) &&
        ($position[5] == $token) &&
        ($position[8] == $token)
    ) {
        $won = true;
    } else if (($position[0] == $token) &&
        ($position[4] == $token) &&
        ($position[8] == $token)
    ) {
        $won = true;
    } else if (($position[2] == $token) &&
        ($position[4] == $token) &&
        ($position[6] == $token)
    ) {
        $won = true;
    }
    return $won;
}


