<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN FORM</title>
    <style>
        fieldset{
            width: 30%;
            border-radius: 20px;
            margin:0 auto;
            padding:10px;

        }

        .button{
            background:blue;
            color:white;
            padding:5px;
            margin:0 auto;
            width: 50%;
            border-radius: 5px;
            display:block;
            border:none;

        }

        table{
            height:200px;
            width: 400px;
            margin-left:5rem;
        }

        .button:hover{
            background:red;
            color:black;
            transition:0.5s;
            padding:5px;
            cursor:pointer;
            transform:scale(1.2);
        }

        input{
            border:none;
            border-bottom:1px solid green;
            margin:5px;
            outline:none;
        }
        legend{
            color:black;
            margin:5px;
            padding:5px;
            font-size:20px;
        }
        .box{
            text-align: center;
        }
    </style>
</head>
<body>
    <fieldset>
        <legend align="center">LOGIN FORM</legend>
      <form action=""method="POST">
    <table>
        <tr>
            <td>USER NAME</td>
            <td><input type="text" name='username' required></td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td><input type="password" name='pword' required></td>
        </tr>
        <tr>
            <td class='box'><input type="checkbox" name='remember' value='1'>Remember me</td>
        </tr>
        <tr>
            
             <td colspan="2"><input type="submit" name="button" class='button' value="LOGIN"></td>
        </tr>
 <tr>
    <td colspan='2'>Don't have an account ? 
       <a href="signup.php">Create account</a>
    </td>
 </tr>
    </table>
    </fieldset>

    <?php
include "connection.php";
if(isset($_POST['button'])){
    session_start();
 $username = $_POST['username'];
 $password = $_POST['pword'];

 $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($result);

 if(isset($_POST['remember'])){
        setcookie("Remember_me",$username,time() + (86400 * 30), "/","",true,true);
    }
 if($row){ 
    $_SESSION['username'] = $row['username'];
      echo "<script>
            alert('Login Successfully !!');
            window.location.href = 'dashboard.php';
          </script>";
    
 }else {
    echo"Not found !!";
 }

}
if(!isset($_SESSION['username']) && isset($_COOKIE['remember_me'])) {
    $token = $_COOKIE['remember_me'];
    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        echo "<script>window.location.href='select.php';</script>";
    } else {
        setcookie("remember_me", "", time() - 3600, "/", "", true, true);

}

}
?>

</body>
</html>