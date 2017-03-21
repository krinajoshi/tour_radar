<?php 
echo "You have entered following 2 strings:";
echo "<br>";
echo "String1: ";
echo $string1=$_POST['string1'];
echo "<br>";
echo "String2: ";
echo $string2=$_POST['string2'];
echo "<br>";
echo "<br>";
$output=is_anagram($string1,$string2);
if($output=="")
{
	echo "<font color='red'><b>OUTPUT = FALSE";
	echo "<br>";
	echo "Both Strings Are Not Anagram for Each Other</b></font>";
}
else 
{
	echo "<font color='green'><b>OUTPUT = TRUE";
	echo "<br>";
	echo "Both Strings Are Anagram For Each Other</b></font>";
}	
function is_anagram($string1,$string2)
{
   $status = false;
   $string1=strtolower($string1);
   $string2=strtolower($string2);
   $string1 = str_split($string1);
   $string2 = str_split($string2);
   sort($string1);
   sort($string2);
   if($string1 === $string2){
   $status = true;
   } 
  
  return $status;
}
?>
<html>
<body>
<br>
<button onclick="goBack()">Try Again</button>

<script>
function goBack() {
    window.history.back();
}
</script>

</body>
</html>
