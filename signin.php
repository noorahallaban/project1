<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>
<form method="post" >
<h1 class="sign">Sign Up</h1>
                <input type="text " placeholder="First Name" class="r2" name="uName"> <br>
                <input type="text " placeholder="Last Name"class="r2" name="lName"> <br>
                <input type="email " placeholder="Email" name=" email" class="r2" name="email"> <br>
                <input type="password"  placeholder="Password"class="r2" name="pass"> <br>
                <input type="text " placeholder="Age"class="r2" name="age"> <br>
                <input type="radio" name="radio" value="Male"><label>Male</label>
                <input type="radio" name="radio" value="Female"><label>Female</label> <br> <br>
    
                <input type="submit" value="Create Account" class="r3" name="go"> <br> <br>
                
              

    <?php
    $con =mysqli_connect("localhost" ,"root","","todoo");
   

    if (isset($_POST['go'])) {
        $name =$_POST['uName'];
        $lname =$_POST['lName'];
        $email =$_POST['email'];
        $pass =$_POST['pass'];
        $age =$_POST['age'];

         $qu = "INSERT INTO `sign`( `fname`, `lname`, `password`, `email`, `age`) VALUES('$name','$lname','$pass','$email','$age')";

         mysqli_query($con, $qu);
    }
    ?>
    </form>
   
   
</body>
</html>