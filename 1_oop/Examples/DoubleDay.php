<?php

require __DIR__ . '/Day.php';

interface IDay {

    /**
     * @param int $hour
     */
    public function setHour($hour);

    /**
     * @return int
     */
    public function getHour();
}

class DoubleDay implements IDay {

    /**
     * @var Day
     */
    private $dayOne, $dayTwo;

    public function __construct(Day $dayOne, Day $dayTwo) {
        $this->dayOne = $dayOne;
        $this->dayTwo = $dayTwo;
    }

    /**
     * @param int $hour
     */
    public function setHour($hour) {
        $hour %= 48;
        $this->dayOne->setHour(floor($hour/2));
        $this->dayTwo->setHour(ceil($hour/2));
    }

    /**
     * @return int
     */
    public function getHour() {
        return $this->dayOne->getHour() + $this->dayTwo->getHour();
    }
}

//$doubleDay = new DoubleDay(new Day(), new Day());
//$doubleDay->setHour(52);
//var_dump($doubleDay);