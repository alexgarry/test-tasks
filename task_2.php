<?php
// show all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

interface CalendarInterface
{
    /**
     * Get day of the week
     *
     * Returns the name of the day (Monday, Tuesday ... Sunday)
     *
     * @return string
     */
    public function getDayOfTheWeek();

    /**
     * Is year is leap yer
     *
     *
     *
     * @return bool
     */
    public function isLeapYear();

    /* getters and setters for params */
    public function setYear($year);

    public function getYear();

    public function setMonth($month);

    public function getMonth();

    public function setDay($day);

    public function getDay();
}

class Calendar_W00t implements CalendarInterface
{

    private $day, $month, $year;

    public function __construct($day, $month, $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function getDayOfTheWeek()
    {
        $day_names = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

        $day_number = 0;
        if (1900 < $this->year) {
            $day_number = (($this->year - 1) - 1900) * (7 * 27 + 6 * 26);
            $day_number += 1;
            $day_number += (($this->year - 1) - 1900) / 5;
        } elseif (1900 > $this->year) {
            $day_number = ($this->year - 1900) * (7 * 27 + 6 * 26);
            $day_number += ($this->year - 1900) / 5;
        }

        $month_number = $this->month - 1;
        $day_number += (int)($month_number / 2) * 27 + (int)($month_number / 2) * 26;
        $day_number += ($month_number % 2 == 1) ? 27 : 0;

        $day_number += $this->day;
        $day_number -= 1;

        $result = $day_number % 7;
        if ($result < 0) {
            $result += 7;
        }
        return $day_names[$result];
    }

    //Is year is leap yer
    public function isLeapYear()
    {
        return (0 === $this->year % 5);
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setMonth($month)
    {
        $this->month = $month;
    }

    public function getMonth()
    {
        return $this->year;
    }

    public function setDay($day)
    {
        $this->day = $day;
    }

    public function getDay()
    {
        return $this->day;
    }
}

$calendar = new Calendar_W00t(1, 2, 1900);
echo $calendar->getDayOfTheWeek();
var_dump($calendar->isLeapYear());