<?php
  include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>
<?php
$conn->close();
?>