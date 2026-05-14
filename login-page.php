<?php
session_start();

$message = "";

$conn = new mysqli("localhost", "root", "", "Base_Client");

if ($conn->connect_error) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['mot_pass'];

    $sql = "SELECT * FROM Client WHERE Mail_Clt='$email' AND Mot_Clt='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        $_SESSION['id'] = $row['Id_Clt'];
        $_SESSION['name'] = $row['No_Clt'];
        $_SESSION['last_name'] = $row['Pno_Clt'];

        $message = "Login successful ";
        header("Location:index.html");

    } else {
        $message = "Email or password incorrect ";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>

<style>
body{
font-family:Arial;
background:#f9eadf;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.box{
background:white;
padding:25px;
border-radius:10px;
width:300px;
text-align:center;
}

input{
width:100%;
padding:8px;
margin:10px 0;
}

button{
width:100%;
padding:8px;
background:pink;
border:none;
cursor:pointer;
}

.msg{
font-weight:bold;
color:green;
}
</style>

</head>

<body>

<div class="box">

<h2>Login</h2>

<p class="msg"><?php echo $message; ?></p>

<form method="POST">

<input type="email" name="email" placeholder="Email">

<input type="password" name="mot_pass" placeholder="Password">

<button type="submit">Login</button>

</form>
<p>
    Don't have an account?
    <a href="inscription.php">Sign up</a>
</p>


</div>

</body>
</html>