<?php
include "connection.php";

$id = $_GET['id'];
$sql = mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`= '$id'");
$row=mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>UPDATE FORM</h3>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
        <label>Firstname</label><br>
        <input type="text" name="a" value="<?php echo $row['username'] ?>"><br><br>


        <label>Password</label><br>
        <input type="text" name="b" value="<?php echo $row['password'] ?>"><br><br>

        <label>Gender</label><br>
        <input type="text" name="c" value="<?php echo $row['gender'] ?>"><br><br>

        <input type="submit" name='button' value="UPDATE">
    </form>
</body>
</html>

<?php
include "connection.php";
if(isset($_POST['button'])){
$a= $_POST['a'];
$b= $_POST['b'];
$c= $_POST['c'];

$update = "UPDATE users SET `username`='$a', `password`='$b', gender='$c' WHERE `users`.`user_id`=$id";

if($conn->query($update) === TRUE){
    echo "Update is successfull !!";
}else{
    echo"Error in updation" . $conn->error;
}
$conn->close();
header("location:select.php");
}
?>


