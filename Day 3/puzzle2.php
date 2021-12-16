<?php
$binaryArray = file('puzzle3_input.txt', FILE_IGNORE_NEW_LINES);
$binaryArray = explodeArray( $binaryArray );
//array( [ [0], [1], [1] ], [ [1], [0], [1] ] )
$firstColumn = countColumn( 0 , $binaryArray );
$ogr = find_OGR($binaryArray);
$co2 = find_co2sr($binaryArray);
//print_r ($ogr);
//print_r ($co2);

$ogr = implode ( "" , $ogr[0]);
$co2 = implode( "", $co2[0]);

$ogr = bindec( $ogr );
$co2 = bindec ( $co2);
//echo( $gamma . " " . $epsilon );
echo ($ogr * $co2);



function find_OGR ( $array ) {

    for( $i = 0; $i < 12; $i++) {
        $columnTotal = countColumn( $i , $array );
    
        $numZeros = $columnTotal[0];
        $numOnes = $columnTotal[1];
        $arrayZeros = $columnTotal[2];
        $arrayOnes = $columnTotal[3];

    
        //print_r( $arrayZeros ); 
        //echo "<br><br><br><br>";
    
        if ( $numZeros > $numOnes ) {
            $array = $arrayZeros;
        } else if ( $numOnes > $numZeros) {
             $array = $arrayOnes;
        } else {
            $array = $arrayOnes;
        }

        if ( count( $array ) == 1) {
            return( $array );
        }
    }
}

function find_co2sr ( $array ) {

    for( $i = 0; $i < 12; $i++) {
        $columnTotal = countColumn( $i , $array );
    
        $numZeros = $columnTotal[0];
        $numOnes = $columnTotal[1];
        $arrayZeros = $columnTotal[2];
        $arrayOnes = $columnTotal[3];

    
        //print_r( $arrayZeros ); 
        //echo "<br><br><br><br>";
    
        if ( $numZeros > $numOnes ) {
            $array = $arrayOnes;
        } else if ( $numOnes > $numZeros) {
             $array = $arrayZeros;
        } else {
            $array = $arrayZeros;
        }

        if ( count( $array ) == 1) {
            return( $array );
        }
    }
}




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
    $returnZeros = [];
    $returnOnes = [];
    foreach ( $arrayOfArrays as $key => $array ) {
        $number = intval( $array[$i] );
        if ( $number == 0 ) {
            $zeroCounter++;
            array_push( $returnZeros, $array );
        } elseif ( $number == 1) {
            $oneCounter++;
            array_push ($returnOnes, $array );
        }
    }
    return array ( $zeroCounter, $oneCounter, $returnZeros, $returnOnes ); 
}

