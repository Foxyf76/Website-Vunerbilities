<!-- SOME OF THE CODE SHOWN BELOW IS TAKEN FROM https://www.w3schools.com/php/php_form_required.asp -->

<!DOCTYPE HTML>  
<html>
<head>
  <style>
  .error {color: #FF0000;}
</style>
</head>
<body>  

  <?php

  $f_nameErr = $s_nameErr = $website = $student_num ="";
  $f_name = $s_name = $websiteErr = $student_numERR = "";

  $valid_fName = True;
  $valid_sName = True;
  $valid_website = True;
  $valid_student = True;

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    if (empty($_POST["f_name"])) // #1 - empty()
    {
      $f_nameErr = "Name is required";
      $valid_fName = False;
    } 
    else 
    {
      $f_name = test_input($_POST["f_name"]);
      $valid_fName = True;
    }

    if (empty($_POST["s_name"])) 
    {
      $s_nameErr = "Second name is required";
      $valid_sName = False;
    } 
    else 
    {
      $s_name = test_input($_POST["s_name"]);
      $valid_sName = True;
    }

    if (empty($_POST["website"])) {
      $websiteErr = "URL is required";
      $valid_website = False;
    }

    else 
    {
      $website = test_input($_POST["website"]);
    // check if e-mail address is well-formed
      if (filter_var($website, FILTER_VALIDATE_URL) === false) { // #2 - filter_var()
        $websiteErr = "Invalid URL format"; 
        $valid_website = false;
      }
      else {
        $valid_website = True;
      }
    }

    if (empty($_POST["student_num"])) {
      $student_numERR = "Number is required";
      $valid_student = False;
    }
    else {
      $student_num = test_input($_POST["student_num"]);
      if (!preg_match("/^\d{8}$/",$student_num)) { // #3 - preg_match() (regular expression - 0-9 and 8 digits long)
        $student_numERR = "Number MUST be 8 digits"; 
       $valid_student = false;

      }
      else {
        $valid_student = True;
      }
    }
  }


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); // #4 - htmlspecialchars()
    return $data;
  }
  ?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    First Name: <input type="text" name="f_name">
    <span class="error">* <?php echo $f_nameErr;?></span>
    <br><br>

    Second Name: <input type="text" name="s_name">
    <span class="error">* <?php echo $s_nameErr;?></span>
    <br><br>

    Preferred Search Engine: <input type="text" name="website">
    <span class="error">* <?php echo $websiteErr;?></span>
    <br><br>

    Student Number: <input type="text" name="student_num">
    <span class="error">* <?php echo $student_numERR;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
  </form>

  <?php

  echo "<h2>Input Details:</h2>";
  if($valid_fName == True & $valid_sName ==True & $valid_website ==True & $valid_student==True) {

    echo  $f_name;
    echo "<br>";
    echo $s_name;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $student_num;

  }
  else {
    echo "Please fill in all fields.";
  }



  ?>


</body>
</html>