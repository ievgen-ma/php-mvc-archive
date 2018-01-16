<?php
function className2fileName( $className ) {
    $fromSimple = array(
            '_A', '_B', '_C', '_D', '_E', '_F', '_G', '_H', '_I', '_J', '_K', '_L', '_M',
            '_N', '_O', '_P', '_Q', '_R', '_S', '_T', '_U', '_V', '_W', '_X', '_Y', '_Z' ) ;
    $fromCompound = array(
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '1', '2', '3', '4', '5', '6', '7', '8', '9', '0' ) ;
    $toSimple = array(
            DS . 'a', DS . 'b', DS . 'c', DS . 'd', DS . 'e', DS . 'f', DS . 'g', DS . 'h', DS . 'i', DS . 'j', DS . 'k', DS . 'l', DS . 'm',
            DS . 'n', DS . 'o', DS . 'p', DS . 'q', DS . 'r', DS . 's', DS . 't', DS . 'u', DS . 'v', DS . 'w', DS . 'x', DS . 'y', DS . 'z' ) ;
    $toCompound = array(
            '_a', '_b', '_c', '_d', '_e', '_f', '_g', '_h', '_i', '_j', '_k', '_l', '_m',
            '_n', '_o', '_p', '_q', '_r', '_s', '_t', '_u', '_v', '_w', '_x', '_y', '_z',
            '_1', '_2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_0' ) ;
    $from = array_merge( $fromSimple, $fromCompound ) ;
    $to = array_merge( $toSimple, $toCompound ) ;
    $fileName = ltrim( str_replace( $from, $to, $className ), '_' ) ;		
    return $fileName ;
}