<?php

// echo "hello world";



$name="arun";

echo $name;



$string1="<p>this my sentence";
$string2="heloo </p>";
echo $string1." ".$string2;

$variablename="name";
        echo $$variablename;


$array1=array("imithi","bharath","sanjay","selva");
// echo    $array;

print_r($array1);

echo "<br><br><br><br>";

// if statement

$user="arun";
if($user == "arun"){

    echo "hello boy!";

} else{

  echo  "i dont know";
}
echo "<br><br><br><br>";

//  .............using age...............

$age=16;
if( $age >=18  &&    $user=="arun"){
    echo "you may proceed";
}
else{
    echo "rejected";
}

echo "<br><br><br><br>";
// ..............for loop.;..............

for($i=0;$i<=10;$i++){
    echo $i."<br>";
}
echo "<br><br><br><br>";
// .............even numbers............

for($i=2;$i<=30;$i =$i + 2){
    echo $i."<br>";
}

echo "<br><br><br><br>";
// foreach

$it=array("arun","imithi","pop","thu");
foreach($it as $value){
    echo $value."<br>";
}
echo "<br><br><br><br>";
// while loop

$i=0;
while($i<10){
    echo $i."<br>";
$i++;
}



?>
echo "<br><br><br><br>";
<?php
// get method
// to get the value from site using get method

// print_r($_GET["name"]);

// echo $_GET["name"];
?>
<!-- <p>What is your name:</p>

<form>
<input type="text" name="name">
<input type="submit" value="Go">
</form> -->

echo "<br><br><br>";
<!-- using form prime number -->

<?php

if($_GET){
    $i=2;
$isprime=true;
    while($i <$_GET["number"]){
        if($_GET["number"] % $i ==  0){
            $isprime=false;
        }
       $i++;
    }

}
if($isprime)
{
    echo"<p>".$i."is a prime number </p>"; 
}else{
    echo"<p>".$i."is a not a prime  </p>";
}

?>

<p>Enter the whole number:</p>

<form>
<input type="text" name="number">
<input type="submit" value="Go">
</form>


<!-- post method -->
echo "<br><br><br>";
<?php
 print_r ($_POST);


?>
<p>Enter the random number:</p>

<form method="post">
<input type="text" name="number">
<input type="submit" value="Go">
</form>


echo "<br><br><br>";




<?php
    if($_POST)
    $fam=array("arun","bharath","imthi","sanjay");
    $isknow=false;
   foreach($fam as $value){
    if($value == $_POST["number"]){
   $isknow=true;
    }
  }
   if($isknow){
    echo "hi there"." ".$_POST["number"];
 }else{
    echo "i don't know you";
}

?>
<p>What is your name:</p>

<form method="post">
<input type="text" name="number">
<input type="submit" value="Submit">
</form>


<!-- email sender -->

<?php

$emailto="xxx@mail.com"; 
$subject="It will be work";
$body="I will be wrost";
$headers="yyy@mail.com";
if(mail($emailto,$subject,$body,$headers)){
    echo "The mail send successfully";
}
else{
    echo "The could not be send";
}


?>