<?php
// function to getAge
function getAge($year, $month, $day)
{
    $date = "$year-$month-$day";
    if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
        $dob = new DateTime($date);
        $now = new DateTime();
        return $now->diff($dob)->y;
    }
    $difference = time() - strtotime($date);
    return floor($difference / 31556926);
}

// function to caculate difference in days
function dateDiffInDays($dateOfPerson1, $dateOfPerson2)
{
    // Calculating the difference in timestamps
    $diff = strtotime($dateOfPerson2) - strtotime($dateOfPerson1);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}

// showResult

function showResult($value, $from, $to, $decimal)
{
    if ($from == "rad" && $to == "deg") {
        return abs(round((57.2957795 * $value), $decimal));
    } else if ($from == "deg" && $to == "rad") {
        return abs(round(($value / 57.2957795), $decimal));
    }
    return "";
}