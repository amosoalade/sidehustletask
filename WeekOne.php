<?php
$myarray = array();
$sum = 0;


//range function that takes two arguments, start and end, 
//and returns an array containing all the numbers from start up to (and including) end

function getRange($start, $end)
{
    $outputarray = array();

    for($i=$start; $i<=$end; ++$i)
    {
        $outputarray[]=$i;
    }
    return $outputarray;
}

//Sum function that takes an array of numbers and returns the sum of these numbers
function getRangeSummation($receivedarray)
{
    $summation = 0;

    $len = count($receivedarray);

    for($j=0; $j<= $len-1; ++$j)
    {
        $summation+=$receivedarray[$j];
    }

    return $summation;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form action="" method="POST">
  Start Figure: <br>
  <input type="text" name="start" placeholder="Enter the start figure">
  <br>End Figure:<br> 
  <input type="text" name="end" placeholder="Enter the end figure">
  <input type="Submit" name="cal" value="Generate">
  </form>  

  <?php
 
 if(isset($_POST['cal']))
 {
     $first = $_POST['start'];
     $last = $_POST['end'];
 
     $myarray = getRange($first, $last);          //Calling Range function
 
     $sum = getRangeSummation($myarray);         //Calling Sum function

     //Print out result
   
     echo "<h3>The numbers between ".$first." and ".$last." are:</h3>";
 
     print_r($myarray);

     echo "<h3>OR</h3>";

     $n = $first;

    while($n <= $last)
    {
        echo $n.", ";
        ++$n;
    }
     
     echo "<h3>The sum is:".$sum."</h3>";
 }
  ?>
</body>
</html>