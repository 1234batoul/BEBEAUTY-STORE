<?php
session_start();

if(!isset($_SESSION['id'])){
echo "You must login first";
exit();
}

$message = "";

$conn = new mysqli("localhost","root","","Base_Client");

if($conn->connect_error){
die("Connection failed");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

$id_client = $_SESSION['id'];

$vendeur = $_POST['vendeur'];
$prix = $_POST['prix'];
$ref = $_POST['ref'];
$color = $_POST['color'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO Commande_produit 
(Id_client,Vendeur_prod,Prix_prod,Ref_prod,Colr_prod,Qant_prod)
VALUES
('$id_client','$vendeur','$prix','$ref','$color','$quantity')";

if($conn->query($sql) === TRUE){
$message = "Order saved successfully ✅";
}else{
$message = "Error ❌";
}
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Order</title>
</head>

<body>

<h3><?php echo $message; ?></h3>

<form method="POST">

<input type="hidden" name="vendeur" >
<input type="hidden" name="prix" >
<input type="hidden" name="ref" >

<select name="color">
<option>Gold</option>
<option>Silver</option>
<option>Black</option>
</select>

<select name="quantity">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>

<button type="submit">Order</button>

</form>

</body>
</html>