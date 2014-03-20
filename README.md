# The Test Tasks
## 1. Please write a function which recursively traverse the folder and seeks for "txt" files and just prints them out.
## 2. Calendar.
In Planet W00t they a slightly different calendar than we have on Earth.

1. They have 13 Months (the last month name is W00tober)
2. 7 days a week (Mon, Tue ... Sun, just like on Earth)
3. Even months are 26 days long, odd months they have 27 days
4. In leap year W00tober misses 1 day
5. The year is considered a leap year if it can be divided by 5 (i.e. 2000, 2500, 2555, 1560 etc.)

Let's assume that 1 Jan of 1900 is Monday

Having constructor definition: function __construct($day, $month, $year);

write a php class (Calendar_W00t) which implements the following interface

```
interface CalendarInterface {
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

    // TODO: getters and setters for params
}
```
## 3. Write a data scraper script which gets information about all athletes of Sochi2014 olympic games (sochi2014.com)
(You should not run that script! We don't need their data). So you don't have to worry about possible data scraping prevention techniques or something, we just need class or set of classes.

The output has to be a JSON document with array of the following objects
example:
```
[
    {
        name: 'Roberto Konchini',
        country: 'FIN',
        sport: 'ih'
    },
    ....
]
```
the following fields might have any value, you don't have to parse them