<?php

function getWorkingDays($startDate, $endDate, $holidays) {
    $workingDays = 0;

    // Convert dates to Unix timestamp
    $startTimestamp = strtotime($startDate);
    $endTimestamp = strtotime($endDate);

    // Loop through each day in the range
    for ($timestamp = $startTimestamp; $timestamp <= $endTimestamp; $timestamp = strtotime('+1 day', $timestamp)) {
        $currentDate = date('Y-m-d', $timestamp);
        $dayOfWeek = date('N', $timestamp);

        // Check if it's a working day (Monday to Thursday) and not a holiday
        if ($dayOfWeek >= 1 && $dayOfWeek <= 4 && !in_array($currentDate, $holidays)) {
            $workingDays++;
        }
    }

    return $workingDays;
}

// Input dates and holidays
$date1 = '01-04-2024';
$date2 = '30-04-2024';
$holidays = [
    '2024-04-05', // Example of government holiday
    // Add more government holidays if needed
];

// Calculate working days
$workingDays = getWorkingDays($date1, $date2, $holidays);

// Output the result
echo "Total $workingDays working days in this period.";
