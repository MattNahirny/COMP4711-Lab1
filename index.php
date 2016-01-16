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

if (!isset($_GET['board'])) {

    echo 'No board given';
} else {
    $game = new Game($position);
    if ($game->winner2('x')) echo 'You win.';
    else if ($game->winner2('o')) echo 'I win.';
    else echo 'No winner yet.';
}


class Game
{
    var $position;

    function __construct($squares)
    {
        $this->position = str_split($squares);

    }

    function winner2($token)
    {
        $result = false;
        for ($row = 0; $row < 3; $row++) {
            if ($this->position[3 * $row] == $token &&
                $this->position[3 * $row + 1] == $token &&
                $this->position[3 * $row + 2] == $token
            )
                $result = true;
        }
        for ($col = 0; $col < 3; $col++) {
            if ($this->position[$col] == $token &&
                $this->position[$col + 3] == $token &&
                $this->position[$col + 6] == $token
            )
                $result = true;
        }
        if ($this->position[0] == $token &&
            $this->position[4] == $token &&
            $this->position[8] == $token
        ) {
            $result = true;
        }
        if ($this->position[2] == $token &&
            $this->position[4] == $token &&
            $this->position[6] == $token
        ) {
            $result = true;
        }
        return $result;
    }
}
