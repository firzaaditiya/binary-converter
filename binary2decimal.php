<?php

const BINARY_FORMAT = 2;
const FIRST_INDEX = 0;
const ZERO = 0;
const ONE = 1;

function binary2decimal(string $binaryString) : int
{
    $tempBinary = $binaryString;

    // delete char 0b
    if ((bool)preg_match_all("/0b/i", $binaryString)) {
        $tempBinary = preg_replace("/0b/i", "", $tempBinary);
    }

    // validation binary string
    for ($i = FIRST_INDEX; $i < strlen($tempBinary); $i++) {
        if ($tempBinary[$i] != ZERO && $tempBinary[$i] != ONE) {
            throw new Exception(message: "Error with input string. Check to ensure that the input contains valid binary number.");
        }
    }

    $decimal = null;
    $length = strlen($tempBinary);
    for ($i = FIRST_INDEX; $i < strlen($tempBinary); $i++) {
        $decimal += $tempBinary[$i] * (BINARY_FORMAT ** --$length);
    }

    return $decimal;
}

// Example implementations
try {
    echo binary2decimal(binaryString: "0b0101110111") . PHP_EOL;
    echo binary2decimal(binaryString: "0101110111") . PHP_EOL;
} catch(Exception $exception) {
    echo "Error : " . $exception->getMessage() . PHP_EOL;
}