<html>
    <head>
        <title>Multi-Step Form</title>
    </head>
    <body>
        <?php
        if(isset($_POST["step"])){
            //echo "step".$_POST["step"];
            if($_POST["step"]==1){
                processStep1();
            }else if($_POST["step"]==2){
                processStep2();
            }
        }else{
            displayStep1();
        }

        function processStep1(){
            displayStep2();
        }
        function processStep2(){
            if(isset($_POST["submitButton"]) and $_POST["submitButton"] == "< Back"){
                displayStep1();
            }else{
                displayThanks();
            }
        }
        function setValue($fieldName){
            if(isset($_POST[$fieldName])){
                echo $_POST[$fieldName];
            }
        }
        function displayStep1(){
        ?>
            <h1>Member Signup: Step 1</h1>
            <form action="Multi-Step Form.php" method="post">
            <div style="width: 30em;">
                <input type="hidden" name="step" value="1">
                <input type="hidden" name="lastName" value="<?php setValue("lastName") ?>">   
                <label for="firstName">First Name: </label>
                <input type="text" name="firstName" value="<?php setValue("firstName") ?>">
                <br><br>
                Which course qre you following at UoJ?
        <select name="course">
        <option value="Biological Science" <?php setSelected("course","Biological Science") ?>>Biological Science</option>
        <option value="Physical Science" <?php setSelected("course","Physical Science") ?>>Physical Science</option>
        <option value="Computer Science" <?php setSelected("course","Computer Science") ?>>Computer Science</option>
        </select><br><br>
            <div style="clear: both;">
                <input type="submit" name="submitButton" value="Next &gt;">
            </div>
            </div>
            </form>
        <?php
        }
        function displayStep2(){
        ?>
            <h1>Member Signup: Step 2</h1>
            <form action="Multi-Step Form.php" method="post">
            <div style="width: 30em;">
                <input type="hidden" name="step" value="2">
                <input type="hidden" name="firstName" value="<?php setValue("firstName") ?>">   
                <label for="lastName">Last Name: </label>
                <input type="text" name="lastName" value="<?php setValue("lastName") ?>">
                <br><br>
            <div style="clear: both;">
                <input type="submit" name="submitButton" value="Next &gt;">
                <input type="submit" name="submitButton" value="&lt; Back">
            </div>
            </div>
            </form>


        <?php
        }
        function displayThanks(){
        ?>
            <h1>Thank You</h1>
            First Name: <?php echo $_POST["firstName"]; ?> <br><br>
            Last Name: <?php echo $_POST["lastName"]; ?> <br><br>

            <p>Thank you, your Full Name has been received.</p>
        <?php
        }
        ?>
    </body>
</html>