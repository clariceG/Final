<?php
include('config.php');

// destroy session and logout
//put in every page
if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = "You must log in to view this page";
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Home Page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="meal.php">Meal Plan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/final/contact/contact.php">Contact</a>
      </li>
      <li class="nav-item">
      <button> <a href="logout.php">Logout</a></button>
      </li>
    </ul>
  </div>
</nav>
<h2>Welcome<strong>   <?php echo $_SESSION['username'];?></strong></h3>
    <div class="user_details">
        <?php
        $username=$_SESSION['username'];
        $query = "SELECT * FROM user WHERE username= '$username' ";
        $result= mysqli_query($conn, $query);
            if ($row = mysqli_fetch_array($result)){

              $Weight=$row['Weight'];
              $Height=$row['Height'];
              $Age=$row['Age'];
              $Gender = $row['Gender'];
              $BMI = ($Weight/($Height^2));
              $calorie_deficit=((10*$Weight)+(6.25*$Height)-(5*$Age)+5)*1.55;
              $calorie_deficit=((10*$Weight)+(6.25*$Height)-(5*$Age)-161)*1.55;
              if($Gender== 'male'){
                $calorie_deficit=((10*$Weight)+(6.25*$Height)-(5*$Age)+5)*1.55;
              }elseif($Gender=='Female'){
                $calorie_deficit=((10*$Weight)+(6.25*$Height)-(5*$Age)-161)*1.55;
              }
              
            }?> 
            <table class="table table-dark">
                <thead>
                <tr> 
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $row['email'] ?></td>
                    </tr>
                    <tr>
                    <td>Gender:</td>
                    <td><?php echo $row['Gender'] ?></td>
                    </tr>
                    <tr>
                        <td>Age:</td>
                        <td><?php echo $row['Age'] ?></td>
                    </tr>
                    <tr>
                        <td>Weight:</td>
                        <td><?php echo $row['Weight'] ?></td>
                    </tr>
                    <tr>
                        <td>Height:</td>
                        <td><?php echo $row['Height'] ?></td>
                    </tr>
                    <tr>
                        <td>Dietary Restrictions:</td>
                        <td><?php echo $row['dietary_restrictions'] ?></td>
                    </tr>
                    <tr>
                        <td>Lifestyle Diseases:</td>
                        <td><?php echo $row['lifestyle_diseases'] ?></td>
                    </tr>
                    <tr>
                        <td>Number of Meals in a day:</td>
                        <td><?php echo $row['number_of_meals']?></td>
                    </tr>
                    <tr>
                        <td>Calorie Deficit:</td>
                        <td><?php echo $calorie_deficit?></td>
                    </tr>
                    <tr>
                        <td>BMI:</td>
                        <td><?php echo  $BMI ?> kg/m<sup>2</sup> </td>  <br> </tr>
                        <?php 
                      if($BMI<16){ ?>  <tr> <td>Note:</td><td>
              <?php  echo "Severe Thinness.Ensure You Follow the Meal Plan Strictly." ?>;</td> </tr>
              <?php
              }elseif ($BMI>=16 && $BMI<=17){?> <tr><td>Note:</td><td>
                 <?php echo"Moderate Thinness.Ensure You Follow the Meal Plan Strictly.";?> </td> </tr>
                 <?php
              }elseif($BMI>=17&&$BMI<=18.5){?> <tr><td>Note:</td>
              <td> <?php echo"Mild Thinness.Ensure You Follow the Meal Plan Strictly."; ?> </td> </tr>
                <?php
              }elseif($BMI>=18.5&&$BMI<=25){ ?> <tr><td>Note:</td>
               <td> <?php echo"Normal.Ensure You Follow the Meal Plan Strictly and ."; ?> </td> </tr>
               <?php  }elseif($BMI>=25&&$BMI<=30){?> <tr><td>Note:</td>
                <td> <?php echo"Overweight.Ensure You Follow the Meal Plan Strictly and try to increase your physical activity.";?> </td> </tr>
                <?php }elseif($BMI>=30&&$BMI<=35){?>  <tr><td>Note:</td>
                    <td>  <?php echo"Obese Class I. Following the Meal Plan alone shall not work. Please try to increase your steps to 10,000 steps";?></td> </tr>
                    <?php   }elseif($BMI>=35&&$BMI<=40){?> <tr><td>Note:</td>
                <td><?php echo"Obese Class II. Following the Meal Plan alone shall not work. Please try to increase your steps to 15,000 steps"; ?></td> </tr>
                <?php }elseif($BMI>40){?> <tr><td>Note:</td>
            <td> <?php echo"Obese Class III. Following the Meal Plan alone shall not work. Please try to increase your steps to 20,000 steps"; ?></td> 
            </tr>
              <?php
                }
        ?>
                </tr>
                </tbody>
            </table>
    </div>
    <!-- <button><a href="logout.php">Log Out</a></button> -->
           
</body>
</html>