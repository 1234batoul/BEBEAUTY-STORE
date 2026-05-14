<?php
session_start();

if(!isset($_SESSION['id'])){
echo "Please login first";
exit();
}

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$conn = new mysqli("localhost","root","","Base_Client");

if($conn->connect_error){
die("Connection failed");
}

$id_client = $_SESSION['id'];

$vendeur = $_POST['vendeur'];
$prix = $_POST['prix'];
$ref = $_POST['ref'];

$color = $_POST['color'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO Commande_produit
(Id_client, Vendeur_prod, Prix_prod, Ref_prod, Colr_prod, Qant_prod)
VALUES
('$id_client','$vendeur','$prix','$ref','$color','$quantity')";

if($conn->query($sql) === TRUE){
$message = "Order successful ✅";
}else{
$message = "Error ❌";
}

$conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css ins.css">
<title>Product</title>

<style>
img{
width:200px;
transition:0.3s;
cursor:pointer;
}

img:hover{
transform:scale(1.2);
filter:brightness(0.8);
}

.message{
color:green;
font-weight:bold;
}
</style>
</head>

<body>

<p class="message"><?php echo $message; ?></p>

<form method="POST">

<!-- hidden inputs -->
<input type="hidden" name="vendeur" value="Bbeauty">
<input type="hidden" name="prix" value="1700">
<input type="hidden" name="ref" value="000012">

<table width="50%">

<tr>
<td rowspan="7">
<img src="https://i.pinimg.com/474x/65/1b/d0/651bd0230dc16798f3768a39abdba5a1.jpg">
</td>

<td>vendeur:</td>
<td>Bbeauty</td>
</tr>

<tr>
<td>prix:</td>
<td>1700 DA</td>
</tr>

<tr>
<td>ref:</td>
<td>000012</td>
</tr>

<tr>
<td>color:</td>
<td>
<select name="color">
<option value="black">Black</option>
<option value="white">White</option>
<option value="pink">Pink</option>
</select>
</td>
</tr>

<tr>
<td>quantity:</td>
<td>
<select name="quantity">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
</td>
</tr>

<tr>
<td></td>
<td>
<button type="submit">Order</button>
</td>
</tr>

</table>

</form>

</body>
</html>