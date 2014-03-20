<?php
// show all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// remove limits
set_time_limit(0);
ini_set('memory_limit', -1);

// function to request a page
function call_curl($id = 1)
{
    $ch = curl_init('http://www.sochi2014.com/en/ajax/athlete/show-more-search?page=' . $id);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Requested-With: XMLHttpRequest'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    return curl_exec($ch);
}

// page id
$id = 1;
// array of all athletes
$athletes = [];

while (true) {
    $result = call_curl($id);
    $result = json_decode($result);

    // create DOM from string
    $dom = new DOMDocument();
    $dom->loadHTML($result->html);

    $page = $dom->getElementsByTagName('li');
    foreach ($page as $athlete) {
        $name = '';
        $sport = '';
        $country = '';

        $spans = $athlete->getElementsByTagName('span');
        // find attrs for the current athlete
        foreach ($spans as $span) {
            $class = $span->getAttribute('class');

            if ($class == 'name') {
                $name = $span->nodeValue;
            } elseif (strpos($class, 'sport') !== false) {
                $sport = trim(str_replace('sport small color', '', $class));
            } elseif (strpos($class, 'country') !== false) {
                $country = $span->nodeValue;
            }
        }

        // push new athlete
        $athletes[] = [
            'name' => $name,
            'sport' => $sport,
            'country' => $country,
        ];
    }

    // check if there is other pages
    if ($result->hasMore) {
        $id++;
    } else {
        break;
    }
}

echo json_encode($athletes);