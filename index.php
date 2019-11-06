<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
include 'db_connnection.php';
$conn = OpenCon();

$transactions = 0;
$names = [];
$ngos = [];
$amount = [];
if(isset($_POST["details"])){
    //make list of transactions
    $sql = mysqli_query($conn, "select * from transaction");
    while($row = mysqli_fetch_assoc($sql)){
        $transactions = $transactions + 1;
        array_push($names,$row["name"]);
        array_push($ngos,$row["ngo"]);
        array_push($amount,$row["amount"]);
    }
}

?>
<form action="insert.php" method="post">
<label> Name of Donor</label>
<input type="text" name="name"><br><br>
<label> Name of NGO</label>
<input type="text" name="ngo"><br><br>
<label> Amount</label>
<input type="text" name="amount"><br><br>
<label> Credit card detail</label>
<input type="text" name="card"><br><br>
<input type="submit">
</form>
<br>

<form action="index.php" method="post">
<input type="submit" value="Details" name="details">
</form>

<?php 
if($transactions>0){
    ?>
    <table>
    <tr><th>Name Of Donor</th><th>Name of NGO</th><th>Amount Donated</th></tr>
    <?php 
    for($i=0;$i<$transactions;$i++){
        echo "<tr>";
        echo "<td>".$names[$i]."</td>";
        echo "<td>".$ngos[$i]."</td>";
        echo "<td>".$amount[$i]."</td>";
    }
    ?>
    </table>
    <?php
}
?>
</body>
</html>
