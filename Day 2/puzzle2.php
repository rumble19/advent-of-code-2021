<?php
$instructions = file('puzzle2_input.txt');
$cleanedInstructions = fileToStingIntArray( $instructions );
echo xAndY( $cleanedInstructions );
//var_dump( $cleanedInstructions );



function fileToStingIntArray( $file ) {
    $output=[];

    foreach ($file as $instruction) {
        $tmp = explode( " ", $instruction);
        $tmp[1] = intval($tmp[1]); 
        array_push( $output, $tmp );
    }

    return $output;
}

function xAndY( $instructions ) {
    $X = 0;
    $Y = 0;
    $aim = 0;
    

    foreach ( $instructions as $instruction) {
        if ( $instruction[0]  == 'forward' ) {
            $X = $X + $instruction[1];
            $Y = $Y + ( $instruction[1] * $aim);
        } elseif ( $instruction[0] == 'down') {
            $aim = $aim + $instruction[1];
        } elseif ( $instruction[0] == 'up') {
            $aim = $aim - $instruction[1];
        }
    }

    return $X * $Y;
}