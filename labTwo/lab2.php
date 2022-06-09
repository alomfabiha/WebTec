<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr  = $bloodErr=$degreeErr=$bdayErr= "";
$name = $email = $gender = $blood=$degree=$bday="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }
  
   if (empty($_POST["bday"])) {
    $bdayErr = "Birth date is required";
  } else {
    $gender = $_POST["bday"];
  }
  
  
  if (empty($_POST["blood"])) {
    $bloodErr = "blood group is required";
  } else {
    $blood = $_POST["blood"];
 
   
    }
  }
  
  


?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
   Birthdate:
   <input type="date" name="bday" <?php if (isset($bday) && $bday=="bday") echo "checked";?> value="bday"
 
  <span class="error">* <?php echo $genderErr;?></span>
 

  
    <br><br>
  Degree:
  <input type="checkbox" name="degree" <?php if (isset($degreeErr) && $degree=="SSC") echo "checked";?> value="SSC">SSC
    <span class="error">* <?php echo $genderErr;?></span>
  <input type="checkbox" name="degree" <?php if (isset($degreeErr) && $degree=="HSC") echo "checked";?> value="HSC">HSC
    <span class="error">* <?php echo $genderErr;?></span>
   <input type="checkbox" name="degree" <?php if (isset($degreeErr) && $degree=="BSc") echo "checked";?> value="BSc">BSc
     <input type="checkbox" name="degree" <?php if (isset($degreeErr) && $degree=="MSc") echo "checked";?> value="MSc">MSc

  <br><br>
  
  
  
  Blood group:
   <?php
                $selected = "blood";
                $options = array('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-');
                echo "<select>";
                foreach($options as $option){
                    if($selected == $option) {
                        echo "<option selected='selected' value='$option'>$option</option>";
                    }
                    else {
                        echo "<option value='$option'>$option</option>";
                    }
                }
                echo "</select>";
            ?>
  <span class="error">* <?php echo $bloodErr;?></span>
    <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;

echo "<br>";
echo $blood;

?>

</body>
</html>