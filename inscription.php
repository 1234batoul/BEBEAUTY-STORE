<?php

$message = "";

$conn = new mysqli("localhost", "root", "", "Base_Client");

if ($conn->connect_error) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $No_Clt = $_POST['name'];
    $Pno_Clt = $_POST['last_name'];
    $Age_Clt = $_POST['age'];
    $Wi_Clt = $_POST['wilaya'];
    $Tel_Clt = $_POST['phone'];
    $Mail_Clt = $_POST['email'];
    $Adr_Clt = $_POST['address'];
    $Mot_Clt = $_POST['password'];
    $Sexe_Clt = $_POST['sex'];

    $sql = "INSERT INTO Client 
    (No_Clt, Pno_Clt, Age_Clt, Wi_Clt, Tel_Clt, Mail_Clt, Adr_Clt, Mot_Clt, Sexe_Clt)
    VALUES 
    ('$No_Clt','$Pno_Clt','$Age_Clt','$Wi_Clt','$Tel_Clt','$Mail_Clt','$Adr_Clt','$Mot_Clt','$Sexe_Clt')";

    if ($conn->query($sql) === TRUE) {
        $message = "Registration successful ✅";
    } else {
        $message = "Error ❌";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Inscription</title>
<link rel="stylesheet" href="css ins.css">
</head>

<body>

<div class="form-container">

<form id="signupForm" method="POST">

<table align="center">

<tr>
<td colspan="2" style="text-align:center; font-weight:bold; color:green;">
<?php echo $message; ?>
</td>
</tr>

<tr>
<td>Name</td>
<td><input type="text" name="name"></td>
</tr>

<tr>
<td>Last name</td>
<td><input type="text" name="last_name"></td>
</tr>

<tr>
<td>Age</td>
<td><input type="number" name="age"></td>
</tr>

<tr>
<td>Wilaya</td>
<td>
<select name="wilaya">
<option value="Setif">Setif</option>
<option value="Alger">Alger</option>
<option value="Oran">Oran</option>
<option value="Constantine">Constantine</option>
</select>
</td>
</tr>

<tr>
<td>Phone</td>
<td><input type="text" name="phone"></td>
</tr>

<tr>
<td>Email</td>
<td><input type="email" name="email"></td>
</tr>

<tr>
<td>Address</td>
<td><input type="text" name="address"></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" name="password"></td>
</tr>

<tr>
<td>Sex</td>
<td>
<input type="radio" name="sex" value="woman"> Woman
<input type="radio" name="sex" value="man"> Man
</td>
</tr>

<tr>
<td></td>
<td><button type="submit">Send</button></td>
</tr>

</table>

</form>

</div>

</body>
</html>