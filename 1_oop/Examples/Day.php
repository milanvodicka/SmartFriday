<?php

function set52Hours(Day $day) {
    $day->setHour(52);
    var_dump($day);
}

function assertHour(Day $day) {
    if ($day->getHour() > 23) {
        throw new Exception('Whaaat?');
    }
}

class Day {

    private $hour = 0;

    public function __construct() {
    }

    /**
     * @return int
     */
    public function getHour() {
        return $this->hour;
    }

    /**
     * @param int $hour
     * @throws Exception
     */
    public function setHour($hour) {
        if ($hour < 0) { // precondition
            throw new Exception('Illegal hour!');
        }

        $hour %= 24;

        if ($hour < 0 || $hour > 23) { // postcondition
            throw new Exception('Illegal hour!');
        }
        $this->hour = $hour;
    }

    public function __destruct() {
        if (!is_int($this->hour)) { // invariant
            throw new Exception('Illegal hour!');
        }
    }
}

//set52Hours(new Day());

function set72minutes(PreciseDay $day) {
    $day->setMinute(72);
    var_dump($day);
}

class PreciseDay extends Day {

    private $minute;

    /**
     * @return mixed
     */
    public function getMinute() {
        return $this->minute;
    }

    /**
     * @param mixed $minute
     * @throws Exception
     */
    public function setMinute($minute) {
        if ($minute < 0) { // precondition
            throw new Exception('Illegal minute!');
        }

        $this->setHour($this->getHour() + floor($minute / 60)); // get fancy :)
        $minute %= 60;

        if ($minute < 0 || $minute > 59) { // postcondition
            throw new Exception('Illegal minute!');
        }
        $this->minute = $minute;
    }
}

//$day = new PreciseDay();
//set52Hours($day); // mozem pouzit funkciu stavanu na Day
//set72minutes($day);


// TODO: implementovat triedu, ktora moze obsahovat 48 hodin; DoubleDay