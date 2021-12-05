<?php

$depths = file('puzzle1_input.txt');
$prevDepth = null;
$output = 0;

foreach ( $depths as $depth ) {
    if ( $prevDepth === null ) {
        //first depth, ignore
        $prevDepth = $depth;
    } elseif ( $depth > $prevDepth ) {
        //depth increased, add 1
        $output++;
        $prevDepth = $depth;
    } else {
        $prevDepth = $depth;
    }
}

echo($output);

