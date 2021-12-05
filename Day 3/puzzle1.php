<?php
$binaryArray = file('puzzle3_input.txt', FILE_IGNORE_NEW_LINES);
$binaryArray = explodeArray( $binaryArray );
$firstColumn = countColumn( 0 , $binaryArray );

$epsilon = [];
$gamma = [];

for( $i = 0; $i < 12; $i++) {
    $columnTotal = countColumn( $i , $binaryArray );
    $numZeros = $columnTotal[0];
    $numOnes = $columnTotal[1];

    if ( $numZeros > $numOnes ) {
        array_push($gamma, 0);
        array_push($epsilon, 1);
    } else if ( $numOnes > $numZeros) {
        array_push($gamma, 1);
        array_push($epsilon, 0);
    } else {
        echo "uhoh";
    }
}

//print_r( $gamma ); 
//print_r( $epsilon );

$gamma = implode ( "" , $gamma);
$epsilon = implode( "", $epsilon);

$gamma = bindec( $gamma );
$epsilon = bindec ( $epsilon);
//echo( $gamma . " " . $epsilon );
echo ($gamma * $epsilon);


function explodeArray( $array ) {
    $outputArray = [];
    foreach ( $array as $key => $binaryNumber ) {
        $output = str_split ( $binaryNumber );
        //print_r ( $output ); 
        array_push ( $outputArray, $output);
    }
    return $outputArray;
}

function countColumn( $i , $arrayOfArrays ) {
    $zeroCounter = 0;
    $oneCounter = 0;
    foreach ( $arrayOfArrays as $key => $array ) {
        $number = intval( $array[$i] );
        if ( $number == 0 ) {
            $zeroCounter++;
        } elseif ( $number == 1) {
            $oneCounter++;
        }
    }
    return array ( $zeroCounter, $oneCounter ); 
}

