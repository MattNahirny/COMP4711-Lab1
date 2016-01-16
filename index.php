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
 * if ($hoursworked >40) {
 * $total = $hoursworked * $rate * 1.5;
 * } else {
 * $total = $hoursworked * $rate;
 * }
 * echo ($total >0) ? 'You owe me '.$total : "You're welcome";
 */

$position = $_GET['board'];

if (!isset($_GET['board'])) {

    echo 'No board given';
} else {
    $game = new Game($position);
    $game->take_move();
    $game->display();

    if ($game->winner2('x')) echo 'I win.';
    else if ($game->winner2('o')) echo 'You win.';
    else echo 'No winner yet.';
}


class Game
{
    var $position;

    function __construct($squares)
    {
        $this->position = str_split($squares);

    }
    function take_move() {
        for ($i = 0; $i < 9; $i++) {
            if ($this->position[$i] == "-") {
                $this->position[$i] = "x";
                break;
            }
        }
    }

    function display()
    {
        echo '<table cols="3" style="font-size:large; font-weight:bold">';
        echo '<tr>';
        for ($pos = 0; $pos < 9; $pos++) {
            echo $this->show_cell($pos);
            if ($pos % 3 == 2) echo '</tr><tr>';
        }
        echo '</tr>';
        echo '</table>';
    }

    function show_cell($which)
    {
        $token = $this->position[$which];
        // deal with the easy case
        if ($token <> '-') return '<td>' . $token . '</td>';

        $this->newposition = $this->position;

        $this->newposition[$which] = 'o';

        $move = implode($this->newposition);
        $link = '/COMP4711-Lab1/?board=' . $move;
        return '<td><a href="' . $link . '">-</a></td>';
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
