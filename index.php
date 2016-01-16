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

if (!isset($_GET['board'])) {
    echo 'No board given';
} else {
    if (winner2('x', $squares)) echo 'You win.';
    else if (winner2('o', $squares)) echo 'I win.';
    else echo 'No winner yet.';
}
function winner2($token, $position)
{
    $result = false;
    for ($row = 0; $row < 3; $row++) {
        if ($position[3 * $row] == $token &&
            $position[3 * $row + 1] == $token &&
            $position[3 * $row + 2] == $token
        )
            $result = true;
    }
    for ($col = 0; $col < 3; $col++) {
        if ($position[$col] == $token &&
            $position[$col + 3] == $token &&
            $position[$col + 6] == $token
        )
            $result = true;
    }
    if ($position[0] == $token &&
        $position[4] == $token &&
        $position[8] == $token
    ) {
        $result = true;
    }
    if ($position[2] == $token &&
        $position[4] == $token &&
        $position[6] == $token
    ) {
        $result = true;
    }
    return $result;
}


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


