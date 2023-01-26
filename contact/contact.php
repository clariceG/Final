<?php
 include("config.php");

 if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $sql_insert = "INSERT INTO contact(`username`, `email`,`message`)VALUES ('$username','$email','$message')"; 
    mysqli_query($conn, $sql_insert); 
    echo '<script>alert("Message Sent")</script>"';
 }

            

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" type="text/css" href="contact.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/Final/login/index.php">Home Page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/final/login/meal.php">Meal Plan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/final/login/about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/final/contact/contact.php">Contact</a>
      </li>
      <li class="nav-item">
      <button> <a href="/final/login/logout.php">Logout</a></button>
      </li>
    </ul>
  </div>
</nav>
<section class="contact" >
        <div class="content">
            <h2>Contact Us</h2>
            <p>Feel Free to contact us at anytime as we will get back to you as 
                soon as possible.
            </p>
        </div>
        <div class="container">
            <div class = "contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>4885 Nyayo Highrise, <br>Odinga Oginga Road, Nairobi <br>36690</p>
                    </div>
                </div>
            
       
                <div class="box">
                    <div class="icon"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>0200000001</p>
                    </div>
                </div>
            
       

                <div class="box">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>WeightControl@gmail.com</p>
                    </div>
                </div>
            </div>
       
        
        
                <div class="contactForm">
                    <form action="" method="POST" >
                        <h2>Send Message</h2>
                        <div class="inputBox">
                            <label for="username">Name:</label>
                            <input type="text" name="username" required="required">
                        </div>
                        <div class="inputBox">
                            <label for="email">Email:</label>
                            <input type="text" name="email" required="required">
                        </div>
                        <div class="inputBox">
                            <label for="message">Message</label>
                            <textarea required="required" name="message" placeholder="Type Your Message..."></textarea>
                            </div>

                            <button type="submit">Send</button>
                    </form>
                </div>
        </div>

    </section>
</body>
</html>