<?php

 //in every page
  include_once ("config.php");
  if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = "You must log in to view this page";
    header("location:login.php");
}
  
  $username=$_SESSION['username'];

  $vegetarian = "SELECT * FROM vegeterian ";
  $vegetariandata = mysqli_query($conn, $vegetarian);

  $vegan = "SELECT * FROM vegan";
  $vegandata = mysqli_query($conn, $vegan);

  
  $normal = "SELECT * FROM normal ";
  $normaldata = mysqli_query($conn, $normal);

  $user = "SELECT * FROM user WHERE username = '$username'";

  $userdata = mysqli_fetch_array(mysqli_query($conn, $user));


  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Plan</title>
    <link rel="stylesheet" href="/Final/Login/meal.css">
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
      <li class="nav-item" id="logout">
        <a class="nav-link" href="/final/contact/contact.php">Contact</a>
      </li>
      <!-- <li>
      <a href="https://www.niddk.nih.gov/health-information/weight-management/just-enough-food-portions">Learn More</a>
      </li>  -->
      <li class="nav-item">
      <button> <a href="logout.php">Logout</a></button>
      </li>
    </ul>
  </div>
</nav>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Day</th>
      <th scope="col">Break Fast</th>
      <th scope="col">Lunch</th>
      <th scope="col">Dinner</th>
      <th scope="col">Snack</th>
    </tr>
  </thead>
  <tbody>
   <?php

   if($userdata['dietary_restrictions'] == 'Vegan'){

    
    while($row = mysqli_fetch_assoc($vegandata)){
    ?>

    <tr>
      <th ><?php echo $row['day'] ?></th>
      <td><?php echo $row['breakfast'] ?></td>

      <?php
         if($userdata['number_of_meals'] == 2){

          ?>
          <td>No lunch</td>
          <td><?php echo $row['dinner'] ?></td>
          <td><?php echo $row['Snack'] ?></td>

          <?php

         }elseif($userdata['number_of_meals'] == 3){

          ?>
          
          <td><?php echo $row['lunch'] ?></td>
          <td><?php echo $row['dinner'] ?></td>
          <td>No snack</td>
        <?php
          
        }else{
          ?>
            <td><?php echo $row['lunch'] ?></td>
            <td><?php echo $row['dinner'] ?></td>
            <td><?php echo $row['Snack'] ?></td>
    <?php

        }


      ?>
      
    </tr>

    <?php
    }

   }elseif($userdata['dietary_restrictions'] == 'Vegeterian'){
    while($row = mysqli_fetch_assoc($vegetariandata)){
    ?>

<tr>
      <th ><?php echo $row['day'] ?></th>
      <td><?php echo $row['breakfast'] ?></td>
      <?php
          if($userdata['number_of_meals'] == 2){

          ?>
          <td>No lunch</td>
          <td><?php echo $row['dinner'] ?></td>
          <td><?php echo $row['Snack'] ?></td>

          <?php

          }elseif($userdata['number_of_meals'] == 3){
            ?>
          
          <td><?php echo $row['lunch'] ?></td>
          <td><?php echo $row['dinner'] ?></td>
          <td>No snack</td>
        <?php

          }else{
            ?>
              <td><?php echo $row['lunch'] ?></td>
              <td><?php echo $row['dinner'] ?></td>
              <td><?php echo $row['Snack'] ?></td>
      <?php

          }
      ?>

    </tr>

    <?php
    }

   }elseif($userdata['dietary_restrictions'] == 'Normal'){
     while($row = mysqli_fetch_assoc($normaldata)){
    ?>
       <tr>
       <th ><?php echo $row['day'] ?></th>
      <td><?php echo $row['breakfast'] ?></td>
      <?php
          if($userdata['number_of_meals'] == 2){

          ?>
          <td>No lunch</td>
          <td><?php echo $row['dinner'] ?></td>
          <td><?php echo $row['Snack'] ?></td>

          <?php

          }elseif($userdata['number_of_meals'] == 3){
            ?>
          
          <td><?php echo $row['lunch'] ?></td>
          <td><?php echo $row['dinner'] ?></td>
          <td>No snack</td>
        <?php

          }else{
            ?>
              <td><?php echo $row['lunch'] ?></td>
              <td><?php echo $row['dinner'] ?></td>
              <td><?php echo $row['Snack'] ?></td>
      <?php

          }
      ?>

    </tr>
    </tr>
    <?php
     }

   }

   ?>
  </tbody>
</table>
<p>To understand food portions click this link: <strong><a href="https://www.niddk.nih.gov/health-information/weight-management/just-enough-food-portions">Learn More</a></strong></p>

</body>
</html>