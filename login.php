<?php

$host="localhost";
$user="root";
$password="";
$db="user";

$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
  die("Connection Error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $username=$_POST["username"];
  $password=$_POST["password"];

  $sql="select * from login where username= '".$username."'AND password= '".$password."' ";
  $result=mysqli_query($data,$sql);
  $row=mysqli_fetch_array($result);

  if($row["usertype"]=="user")
  {
    header("location:index.html");
  }

  elseif($row["usertype"]=="admin")
  {
    echo "admin";
  }
  else
  {
      echo "username or password incorrect";
  }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <center>

      <h1>Login Form</h1>
      <br><br><br><br>
        <div style="background-color: grey; width: 500px;">
          <br><br>


        <form action="#" method="POST">

    <div>
        <label>username</label>
        <input type="text" name="username" required>
    </div>
    <br><br>

    <div>
        <label>password</label>
        <input type="text" name="password" required>
    </div>
    <br><br>

    <div>
        <input type="submit" value="Login">
    </div>


    </form>

    <br><br>

    </div>
</center>


</body>

</html>
