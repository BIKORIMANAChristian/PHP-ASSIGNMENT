<?php
include "connection.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        fieldset{
            color: white;
            background-color: grey;
        }

        a:hover{
            color: green;

        }

         footer{
            background-color:black;
            color: white;
            padding:5px;
            margin:0 auto;
            height:15%;
            border-radius: 5px;
            display:block;
            border:none;
            margin-top: 12.5%;
            text-align: center;
        
        }
        
        table{
            overflow: hidden;
            width: 100%;
            border-collapse: collapse;
            border: none;
        }
        th{
            background: skyblue;
            text-align: left;
            padding: 14px;
        }
        .topbar{
            padding: 18px 25px;
            align-items: center;
            margin-left: 90%;
        }
        .topbar a{
            text-decoration: none;
            color: black;
            
        }
        .topbar a:hover{
            color: red;
        }
    
    </style>
</head>
<body>
    <fieldset>
       <h1>WELCOME TO OUR SITE</h1>
       <div class="topbar">
        <a href="logout.php">LOGOUT</a>
       </div>
    
        
    </fieldset>
    <table>
        <tr>
            <td><h4>🏠DASHBOARD</h4></td>
            
        </tr>
    
    </table>
    <table class="part2">
       
     <table border='1' cellspacing='0' cellpadding='8'>
    <tr>
        <th>User_id</th>
        <th>Username</th>
        <th>Password</th>
        <th>Gender</th>
        <th>Action</th>
    </tr>
    <?php
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
    
    if($result->num_rows > 0){
        while($row = $result-> fetch_assoc()){
            $id=$row['user_id'];
            echo "<tr>";
            echo "<td>".$row['user_id']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['password']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td colspan='2'>
                <a href='delete.php? id=$id'><button>delete</button></a> |
                <a href='update.php? id=$id'><button>update</button></a>
            </td>";
            echo"</tr>";
        } 
    }else{
            echo "No record found !!";
        }
    ?>
    </table>
    </table>
        
   <footer><h2>&copy copy right reserved</h2></footer>

   
        
</body>
</html>