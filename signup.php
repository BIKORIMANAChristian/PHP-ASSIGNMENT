<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP FORM</title>
    <style>
        fieldset{
            width: 35%;
            margin:0 auto;
            border-radius: 20px;
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
            background:black;
            color:white;
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
            color:blue;
            margin:5px;
            padding:5px;
            font-size:20px;
        }
    </style>
</head>
<body>
    <fieldset>
        <legend align="center">SIGNUP FORM</legend>
      <form action=""method="POST">

      <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name='username' required></td>
        </tr>
          <tr>
            <td>Password</td>
            <td><input type="text" name='pword1' required></td>
        </tr>
       
        <tr>
            <td>Re-enter password</td>
            <td><input type="password" name='pword2'></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><input type="radio" name='gender' value='male'>male</td>
            <td><input type="radio" name='gender' value='female'>female</td>
        </tr>
        <tr>
            <td colspan='2'><input type="submit" name='button' class='button'></td>
        </tr>
      </table>
    </fieldset>

      <?php 
include "connection.php";
if(isset($_POST['button'])){
    $username=$_POST['username'];
    $password1=$_POST['pword1'];
    $password2=$_POST['pword2'];
    $gender=$_POST['gender'];

    if($password1 != $password2){
        die("Unmatched password !!");
    }


    $query =" INSERT  INTO users (user_id,username,password,gender) VALUES ('','$username','$password','$gender')";
    $result = mysqli_query($conn,$query);
    if($result == true){
        header("location:login.php");

    }else{
        echo "Insertion Failed";
}
}


  ?>
</body>
</html>