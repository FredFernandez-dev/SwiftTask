<?php

function IntToRoman($number): string
{
    if(is_int($number)==true && $number<=100000) {
        $numerals = array("_C" => 100000, "_X_C" => 90000, "_L" => 50000, "_X_L" => 40000, "_X" => 10000, "_I_X" => 9000, "_V" => 5000, "_I_V" => 4000,
            "M" => 1000, "CM" => 900, "D" => 500, "CD" => 400, "C" => 100, "XC" => 90, "L" => 50, "XL" => 40, "X" => 10, "IX" => 9, "V" => 5, "IV" => 4, "I" => 1);
        $result = "";
        foreach ($numerals as $key => $value) {
            $result .= str_repeat($key, $number / $value);
            $number %= $value;
        }
        return $result;
    }else {
        return "ERROR, introduced value is not an Integer or is not within the 0-100000 range";
    }
}

function RomanToInt(String $roman)
{
    $roman = str_replace(" ", "", strtoupper($roman));
    $numerals = array( "_C"=>100000, "_X_C"=>90000, "_L"=>50000, "_X_L"=>40000, "_X"=>10000, "_I_X"=>9000, "_V"=>5000, "_I_V"=>4000,
        "M"=>1000, "CM"=>900, "D"=>500, "CD"=>400, "C"=>100, "XC"=>90, "L"=>50, "XL"=>40, "X"=>10, "IX"=>9, "V"=>5, "IV"=>4, "I"=>1 );
    $result = 0;
    foreach ($numerals as $key=>$value) {
        while (strpos($roman, $key) === 0) {
            $result += $value;
            $roman = substr($roman, strlen($key));
        }
    }
    if($result > 100000){
        return "ERROR, the Roman numeral introduced exceeds the 0-100000 range";
    }else if($result == 0){
        return "ERROR, introduced string is not a valid Roman numeral";
    }else{
        return $result;
    }

}

//Small block of examples
echo IntToRoman(100001)."\n";
echo IntToRoman(12.5)."\n";
echo IntToRoman(22)."\n";
echo IntToRoman(3499)."\n";
echo IntToRoman(23400)."\n";
echo IntToRoman("35")."\n";

echo RomanToInt("XVI")."\n";
echo RomanToInt("_XXLII")."\n";
echo RomanToInt(12)."\n";
echo RomanToInt("_CL")."\n";
echo RomanToInt("LIII")."\n";
echo RomanToInt("MCMLXXXII")."\n";