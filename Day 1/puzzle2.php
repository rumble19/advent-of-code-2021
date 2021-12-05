<?php

$depths = file('puzzle1_input.txt');
$count = count( $depths );
$sumArray = [];

foreach ($depths as $index => $depth) {

    if ( !isset($depths[($index+2)] ) ) {
        break;
    }

    $next = $depths[($index+1)];
    $nextNext = $depths[($index+2)];

    //echo ($index . " (" . $depth . ", " . $next . ", " . $nextNext . ")" . "<br>");

    $sum = $depth + $next + $nextNext;

    array_push($sumArray, $sum);
}

echo ( addArray($sumArray) );

function addArray( $array ) {
    $output = 0;
    $prev = null;

    foreach ( $array as $value ) {
        if ( $prev === null ) {
            //first depth, ignore
        } elseif ( $value > $prev) {
            $output++;
        }
        $prev = $value;
    }
    return $output;
}