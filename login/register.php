<?php


if($_SERVER["REQUEST_METHOD"] == 'POST'){

    include_once ("config.php");


$username= $_POST["username"];
$email= $_POST["email"];
$password= $_POST["password_1"];
$confirm_password= $_POST["password_2"];
$gender=$_POST['gender'];
$age=$_POST['age'];
$weight=$_POST['weight'];
$height=$_POST['height'];
$dietary_restrictions=$_POST['dietary_restrictions'];
$lifestyle_diseases=$_POST['lifestyle_diseases'];
$number_of_meals=$_POST['number_of_meals'];


$username_duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

if(mysqli_num_rows($username_duplicate) > 0){
    echo '<script>alert("Username already taken")</script>';
}else{

    $email_duplicate = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    if(mysqli_num_rows($email_duplicate) > 0){
        echo '<script>alert("Email already taken")</script>';
    }else{
        if($password == $confirm_password){

            $hashed_password = md5($password);

            $sql_insert = "INSERT INTO user(`username`, `password`, `email`,`Gender`,`Age`,`Weight`,`Height`,`dietary_restrictions`,`lifestyle_diseases`,`number_of_meals`) VALUES ('$username','$hashed_password', '$email','$gender','$age','$weight','$height','$dietary_restrictions','$lifestyle_diseases','$number_of_meals')"; 
            mysqli_query($conn, $sql_insert);
            echo '<script>alert("Succeful registration")</script>"';
            header("Location: index.php");
           
        }else{
            echo '<script>alert("Passwords don\'t match")</script>"';
        }
    }
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="register.css">
    
</head>
<body>
    <div class="container" >
        <div class="header">
            <h2>Welcome Register Here</h2>
        </div>

        <form action="" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
            <br>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" required>
            </div>
            <br>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password_1" required>
            </div>
            <br>
            <div>
                <label for="password">Confirm Password</label>
                <input type="password" name="password_2" required>
            </div>
            <br>
            <div>
                <label for="gender">Gender</label>
                <select name="gender" id="" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="prefer not to say">Prefer not to say</option>
                </select>

            </div>
            <br>
            <div>
                <label for="age">Age</label>
                <input type="number"name="age" required>
            </div>
            <br>
            <div>
                <label for="weight">Weight</label>
                <input type="number" step="any" name="weight" placeholder="Weight in Kgs" required>
            </div>
            <br>
            <div>
                <label for="height">Height</label>
                <input type="number" step="any" name="height" placeholder="Height in meters" require>
            </div>
            <br>
            <div>
                <label for="number_of_meals">Number of meals a day</label>
                <select name="number_of_meals" id="" required>
                    <option value="">Select number of meals</option>
                    <option value="2">2:Breakfast,Dinner & 2 Snacks</option>
                    <option value="3">3:Breakfast,Lunch,Dinner</option>
                    <option value="4">4:Breakfast,Snack,Lunch & Dinner</option>
                    <option value="5">5:Breakfast,Lunch,Dinner & 2 Snacks</option>
                </select>
            </div>
            <br>
            <div>
                <label for="Dietary Restrictions">Dietary Restrictions</label>
                <select name="dietary_restrictions" id="" required>
                    <option value="">Select Dietary Restrictions</option>
                    <option value="No Dietary Restrictions">No Dietary Restrictions</option>
                    <option value="Vegan">Vegan</option>
                    <option value="Vegan">Vegeterian</option>
                </select>
            </div>
            <br>
            <div>
                <label for="lifestyle diseases">Lifestyle Diseases</label>
                <select name="lifestyle_diseases" id="">
                    <option value="">Select Lifestyle Diseases</option>
                    <option value="None of the above">None of the above</option>
                    <option value="diabetes">Diabetes</option>
                    <option value="cancer">Cancer</option>
                    <option value="high Blood Pressure">High Blood Pressure</option>
                    <option value="hypertitis">Hypertitis</option>
                </select>
            </div>
            <br>
          <button type="submit" namespace="reg_user">Submit</button>
          <p>Already a User? <a href="login.php"><b>Log in</b></a></p>
        </form>

    </div>
</body>
</html>