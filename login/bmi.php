<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI CALCULATOR</title>
    <link rel="stylesheet" href="bmi.css">
</head>
<body>
    <div class = "container">
        <div class = "main-wrapper">
          <div class = "bmi-heads">
            <div id = "bmi-usc-head" class = "bmi-head active-head">
              <h2>US Units</h2>
            </div>
            <div id = "bmi-si-head" class = "bmi-head">
              <h2>Metric Units</h2>
            </div>
          </div>
  
          <div class="bmi-contents">
            <!-- bmi us units -->
            <div class = "bmi-content" id = "bmi-usc">
              <form>
                <div class = "form-group">
                  <p>Age</p>
                  <input type = "text" class = "form-control" placeholder="18 - 120" id = "age1">
                </div>
  
                <div class = "form-group col-3">
                  <p>Gender</p>
                  <div>
                    <input type = "radio" name = "gender" id = "male" value = "male" checked>
                    <label for = "male">Male</label>
                  </div>
                  <div>
                    <input type="radio" name = "gender" id = "female" value = "female">
                    <label for = "female">Female</label>
                  </div>
                </div>
  
                <div class = "form-group col-3">
                  <p>Height</p>
                  <input type = "text" class = "form-control" id = "feet" placeholder="feet">
                  <input type = "text" class = "form-control" id = "inches" placeholder="inches">
                </div>
  
                <div class = "form-group">
                  <p>Weight</p>
                  <input type = "text" class = "form-control" id = "pounds" placeholder="pounds">
                </div>
              </form>
            </div>
  
            <!-- bmi metric units -->
            <div class = "bmi-content" id = "bmi-si">
              <form>
                <div class = "form-group">
                  <p>Age</p>
                  <input type = "text" class = "form-control" placeholder="2 - 120" id = "age2">
                </div>
  
                <div class = "form-group col-3">
                  <p>Gender</p>
                  <div>
                    <input type = "radio" name = "gender" id = "male" value = "male" checked>
                    <label for = "male">Male</label>
                  </div>
  
                  <div>
                    <input type = "radio" name = "gender" id = "female" value = "female">
                    <label for = "female">Female</label>
                  </div>
                </div>
  
                <div class = "form-group">
                  <p>Height</p>
                  <input type = "text" class = "form-control" id = "cm" placeholder="cm">
                </div>
  
                <div class = "form-group">
                  <p>Weight</p>
                  <input type = "text" class = "form-control" id = "kg" placeholder="kg">
                </div>
              </form>
            </div>
          </div>
  
          <div class = "btns">
            <button type = "button" id = "calc-btn" class = "btn">Calculate</button>
            <button type = "button" id = "clr-btn" class = "btn">Clear</button>
          </div>
  
          <div class = "output">
            <span class = "alert-error">Some input are invalid!</span>
            <div class = "bmi-output">
              <h3 id = "bmi-value"></h3>
              <p id = "bmi-category"></p>
              <p id = "bmi-gender"></p>
            </div>
          </div>
        </div>
      </div>
      
      
  
  
      <script src = "bmiscript.js"></script>
    
</body>
</html>