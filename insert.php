<?php 


include 'db_connnection.php';
$conn = OpenCon();

$name = $_POST["name"];
$ngo= $_POST["ngo"];
$amount = $_POST["amount"];
$card = $_POST["card"];
$sql = mysqli_query($conn,"insert into transaction(name,ngo,amount,card_details) values('".$name."' , '".$ngo."','".$amount."','" . $card ."')");
if($sql){
    header("Location:index.php");
}else{
    echo " Not able to insert ";
}
?>