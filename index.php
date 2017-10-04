<?php
$date = date('Y-m-d', time());
$tar  = "2017/05/24";
$year = array(
    "2012",
    "396",
    "300",
    "2000",
    "1100",
    "1089"
);

$obj = new main($date, $tar, $year);


$obj->replaceString();
$obj->compareString();
$obj->searchString();
$obj->countWords();
$obj->returnLength();
$obj->returnAscii();
$obj->returnLastChars();
$obj->printArray();
$obj->checkLeapYear();
class main
{
    
    public function __construct($date, $tar, $year)
    {
        $this->date = $date;
        $this->tar  = $tar;
        $this->year = $year;
        echo "<h1>Week 4 Assignment</h1>";
        echo "<h2> Input</h2>";
        echo "The value of \$date: " . $this->date . "<br>";
        echo "The value of \$tar: " . $this->tar . "<br>";
        echo "The value of \$year: ";
        print_r($this->year);
        echo "<hr>";
        echo "<h2> Results</h2>";
    }
    
    public function replaceString()
    {
        $this->date = str_replace("-", "/", $this->date);
        echo " 1. The value of \$date after replacing '-' with '/' : $this->date <br/>";
    }
    
    public function compareString()
    {   echo "2. Comparing \$date with \$tar returned the value: ";
        if (strcmp($this->date, $this->tar) > 0) {
            echo "The Future <br/>";
        } elseif (strcmp($this->date, $this->tar) < 0) {
            echo "The Past <br/>";
        } elseif (strcmp($this->date, $this->tar) == 0) {
            echo "Oops!<br/>";
        }
        
    }
    
    public function searchString()
    {
        $val = (str_word_count($this->date, 2, "/"));
        echo "3. Special character / is present at positions: ";
        $counter = 0;

            foreach ($val as $position => $value) {
            echo $position+1;
            if($counter<(count($val)-1)){
                echo ',';
                $counter++;
            }

        }
        echo "</br>";
        if (count($val) > 1) {
            echo "&nbsp;&nbsp;&nbsp;&nbsp;More than one '/' position found. Delimited value of date is : " . (str_replace("/", " ", $this->date)) . "</br>";
        }
    }
    
    public function countWords()
    {
        $str      = "The value of \$tar: " . $this->tar;
        $numWords = str_word_count($str);
        echo "4. Number of words in the string (\"$str\") is : $numWords<br/>";
    }
    
    public function returnLength()
    {
        $strLength = strlen($this->date);
        echo "5. Length of \$date string is : $strLength<br/>";
    }
    
    public function returnAscii()
    {
        $text      = "Welcome to IS601";
        $firstChar = substr($text, 0, 1);
        $valAscii  = ord($firstChar);
        echo "6. ASCII value of first character ($firstChar) of the string ($text) : $valAscii<br/>";
    }
    
    public function returnLastChars()
    {
        echo "7. Last two characters in \$date :" . (substr($this->date, (strlen($this->date) - 2))) . "</br>";
    }
    
    public function printArray()
    {
        $array = explode("/", $this->date);
        echo "8. \$date in array format is :";
        print_r($array);
        echo '</br>';
        echo "&nbsp;&nbsp;&nbsp;&nbsp;Formatted date with spaces : " . (implode(" ", $array)) . "</br>";
        
    }
    
    public function checkLeapyear()
    {
        $resultArray = array();
        foreach ($this->year as $yr) {
            
            switch ($yr % 4) {
                case 0: {
                    if ($yr % 100 == 0 && $yr % 400 != 0) {
                        $resultArray[$yr] = "false";
                    }
                    
                    else {
                        $resultArray[$yr] = "true";
                    }
                }
                    break;
                    $resultArray[$yr] = "false";
            }
        }
        echo "9. The result after checking leap year using <b>foreach</b> statement is :".(implode(" ", $resultArray)) . "</br>";
        
        $leapArray = array();
        for ($i = 0; $i < count($this->year); $i++) {
            
            switch ($this->year[$i] % 4) {
                case 0: {
                    if ($this->year[$i] % 100 == 0 && $this->year[$i] % 400 != 0) {
                        $leapArray[$i] = "false";
                    }
                    
                    else {
                        $leapArray[$i] = "true";
                    }
                    
                }
                    break;
                    $leapArray[$i] = "false";
            }
            
        }
        echo "10. The result after checking leap year using <b>for</b> statement is :".(implode(" ", $leapArray))."</br>";
        
    }
    
    
    public function __destruct()
    {
        echo "<hr><b>***********FINISH**********<b>";
    }
    
}



?>