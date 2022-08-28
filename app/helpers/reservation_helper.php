<?php
function calculateReservationTime($d, $t, $p, $c)
{
    $day = "";
    $purpose = ""; //
    $meal = ""; //B L D
    $date = "";
    $dateType = ""; //weekend or weekday
    $duration = "";
    $time = "";

    $date = strtotime($d);
    $day = date('D', $date);
    $dateType = getDateType($day);
    // echo $dateType;

    $time = date("H:i", strtotime($t));
    $meal = getMealType($time);
    // echo $meal;
    // echo $time;
    $purpose = $p;
    $covers = (int)$c;
    if (
        ($purpose == "family" && $dateType == "Weekend" && $meal == "B") ||
        ($purpose == "family" && $dateType == "Weekday" && $meal == "B") ||
        ($purpose == "business" && $dateType == "Weekend" && $meal == "B") ||
        ($purpose == "business" && $dateType == "Weekday" && $meal == "B") ||
        ($purpose == "business" && $dateType == "Weekday" && $meal == "L") ||
        ($purpose == "other" && $dateType == "Weekday" && $meal == "B") ||
        ($purpose == "other" && $dateType == "Weekday" && $meal == "L")
    ) {
        $duration = 20 * $covers;
        echo $duration;
    } elseif (
        ($purpose == "other" && $dateType == "Weekend" && $meal == "B") ||
        ($purpose == "other" && $dateType == "Weekend" && $meal == "L")
    ) {
        $duration = 25 * $covers;
        echo $duration;
    } elseif (
        ($purpose == "family" && $dateType == "Weekday" && $meal == "L") ||
        ($purpose == "family" && $dateType == "Weekday" && $meal == "D") ||
        ($purpose == "business" && $dateType == "Weekend" && $meal == "L") ||
        ($purpose == "business" && $dateType == "Weekend" && $meal == "D") ||
        ($purpose == "business" && $dateType == "Weekday" && $meal == "D") ||
        ($purpose == "other" && $dateType == "Weekday" && $meal == "D")
    ) {
        $duration = 30 * $covers;
        echo $duration;
    } elseif (
        ($purpose == "other" && $dateType == "Weekday" && $meal == "D")
    ) {
        $duration = 35 * $covers;
        echo $duration;
    } elseif (
        ($purpose == "family" && $dateType == "Weekend" && $meal == "L") ||
        ($purpose == "family" && $dateType == "Weekend" && $meal == "D")
    ) {
        $duration = 40 * $covers;
        echo $duration;
    }

    if ($duration > 180) {
        $duration = 180;
    }
    $d = '+' . $duration . ' minutes';
    $time = strtotime($time);
    $toTime = date("H:i", strtotime($d, $time));

    return $toTime;
}


function getDateType($day)
{
    switch ($day) {
        case "Mon":
        case "Tue":
        case "Wed":
        case "Thu":
        case "Fri":
            return "Weekday";
        case "Sat":
        case "Sun":
            return "Weekend";
    }
}

function getMealType($time)
{
    if ($time >= date("H:i", strtotime("07:00")) && $time < date("H:i", strtotime("11:00"))) {
        echo "B";
        return "B";
    }

    if ($time >= date("H:i", strtotime("11:00")) && $time < date("H:i", strtotime("17:00"))) {
        return "L";
    }

    if ($time >= date("H:i", strtotime("17:00")) && $time < date("H:i", strtotime("22:00"))) {
        return "D";
    }
}
