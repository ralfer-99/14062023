<!DOCTYPE html>
<html lang="en">
<head>
    <title>Membership form</title>
    <style type="text/css">
        .error {background:red;color:white;padding:0.2em;}
    </style>
</head>
<body>
    <?php
        if(isset($_POST["submitButton"])){
            processForm();
        }else{
            displayForm(array());
        }

        function processForm(){
            $requiredFields=array("firstname","lastname","gender","password");
            $missingFields=array();
            foreach ($requiredFields as $requiredField) {
                if(!isset($_POST[$requiredField])or!$_POST[$requiredField]){
                    $missingFields[]=$requiredField;
                }
            }
            if($missingFields){
                displayForm($missingFields);
            }else{
                displayThanks();
            }
        }
        function validateField($fieldname,$missingFields){
            if(in_array($fieldname,$missingFields)){
                echo "class='error'";
            }
        }

        function setValue($fieldname){
            if (isset($_POST[$fieldname])){
                echo $_POST[$fieldname];
            }
        }
        function setChecked($fieldname,$fieldvalue){
            if(isset($_POST[$fieldname]) and $fieldvalue ==$_POST[$fieldname]){
                echo "checked='checked'";
            }
        }
        function setSelected($fieldname,$fieldvalue){
            if(isset($_POST[$fieldname]) and ( $fieldvalue ==$_POST[$fieldname])){
                echo "checked='checked'";
            }
        }


    ?>
    <?php
        function displayForm($missingFields){
    ?>
    <h1>Membership Form</h1>\
    
    <?php if ($missingFields){?>
        <p class="error">There were some problems with the form you submitted. Please comple thye fields highlighted below and click Send Details to resend the form</p>
    <?php } else {?>
        <p>To register, please fill in your details below and click Send datails. Fields marked with an (*) asterist</p>
    <?php } ?>
    <form method="post" action="registration.php">
        <Label for="firstname" <?php validateField("firstname",$missingFields) ?>>First Name * :</label>
        <input type="text" name="firstname" value="<?php setValue("firstname") ?>"><br><br>
        <Label for="lastname" <?php validateField("lastname",$missingFields) ?>>Last Name * :</label>
        <input type="text" name="lastname" value="<?php setValue("lastname") ?>"><br><br>
        <label for="gender" <?php validateField("gender",$missingFields) ?>>Gender :</label>
        <input type="radio" id="male" name="gender" value="Male" <?php setChecked("gender","Male")?>>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" <?php setChecked("gender","Female")?>>
        <label for="female">Female</label><br><br>
        
        Which course qre you following at UoJ?
        <select name="course">
        <option value="Biological Science" <?php setSelected("course","Biological Science") ?>>Biological Science</option>
        <option value="Physical Science" <?php setSelected("course","Physical Science") ?>>Physical Science</option>
        <option value="Computer Science" <?php setSelected("course","Computer Science") ?>>Computer Science</option>
        </select><br><br>

        Select course unit:<br>
        <input type="checkbox"  name="unit[]" value="CSC123">
        <label for="CSC123"> CSC123</label><br>
        <input type="checkbox"  name="unit[]" value="CSC234">
        <label for="CSC234"> CSC234</label><br>
        <input type="checkbox"  name="unit[]" value="CSC456">
        <label for="CSC456"> CSC456</label><br><br>

        <label for="password"<?php if($missingFields) echo 'class="error"'?>>Password :</label>
        <input type="password" name="password"><br><br>

       

        <button type="submit" name="submitButton">submit</button>
        <button type="reset">reset</button>
    </form>
    <?php } 
        function displayThanks(){
    ?>
    <h1>Thank you</h1>
    <p>Thank you,your application has been received</p>
    <?php } ?>
    
</body>
</html>