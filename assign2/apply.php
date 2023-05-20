<!DOCTYPE HTML>
<HTML lang="en">

<?php
$title="Job Application Form";
include 'header.inc';
?> 

<body>

<?php 
include 'menu.inc';
?> 

   <form method="post" action="https://mercury.swin.edu.au/cos10026/s104356422/assign2/processEOI.php" novalidate = "novalidate">
        <fieldset>
                <legend>Job Application Form</legend>
               <!-- blank field error -->
               <p id=fill-error>

               <?php 
                $fullURL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if (strpos($fullURL, "apply=empty")==  true){
                    echo "&#42;Please fill in all fields";
                }
                ?>
                </p>


                <label for="refnum">Job Reference Number</label><br>
                <?php 
                    if (isset($_GET['refnum'])){
                        $refnum = $_GET['refnum'];
                        // text field will be cleared if data entered was invalid//
                        if (strpos($fullURL, "refnum=error")==  true){
                            echo'<input type="text" name="refnum" id="refnum" required="required" minlength="5" maxlength="5"<br>';
                            echo "<span class='error'>&#42;Reference number must be 5 alphanumeric characters long</span>";
                        } 
                        // text field holds data if it was valid // 
                        else{
                            echo'<input type="text" name="refnum" id="refnum" required="required" minlength="5" maxlength="5" value="'.$refnum.'"><br>';
                        }
                    }
                    else{
                        echo'<input type="text" name="refnum" id="refnum" required="required" minlength="5" maxlength="5"<br>';
                    }
                ?> 
                
                
               <br><label for="title">Title</label><br>
                <select name="title" id="title">
                    <option value="Mr">Mr</option>
                    <option value="Miss">Miss</option>
                    <option value="Ms">Ms</option>
                    <option value="Mrs">Mrs</option>
                </select>
                <br><br>

                <ul id="name">
                    <li>
                        <label for="fname">First Name</label><br>
                        <?php 
                            if (isset($_GET['fname'])){
                                $fname = $_GET['fname'];
                                echo'<input type="text" name="fname" id="fname" required="required" maxlength="20" pattern="[A-Za-z]{1,20}" value="'.$fname.'">';
                              
                            }
                            else{
                                echo'<input type="text" name="fname" id="fname" required="required" maxlength="20" pattern="[A-Za-z]{1,20}">';
                            }
                        ?>    
                    </li>

                    <li>
                        <label for="lname">Last Name</label><br>
                        <?php 
                            if (isset($_GET['lname'])){
                                $lname = $_GET['lname'];
                                echo'<input type="text" name="lname" id="lname" required="required" maxlength="20" pattern="[A-Za-z]{1,20}" value="'.$lname.'">';
                            }
                            
                            else{
                                echo'<input type="text" name="lname" id="lname" required="required" maxlength="20" pattern="[A-Za-z]{1,20}">';
                            }

                            if (strpos($fullURL, "name=error")==  true){
                                echo "<span class='error'>&#42;First and last name must be max 20 characters long</span>";
                            }
                        ?>   
                    </li>
                </ul>

                <label for="birthdate">Date of Birth</label><br>
                <?php 
                    //birthdate error//
                    if (strpos($fullURL, "birth=error")==  true){
                        echo'<input type="date" id="birthdate" name="birthdate" required="required">';
                        echo "<span class='error'>&#42;Applicants must be between 15 and 80 years old</span>";
                    }
                    else{
                        echo'<input type="date" id="birthdate" name="birthdate" required="required">';
                    }
                ?>  

                <br>
                
                <label>Gender:</label><br>
                <input type="radio" id="male" name="gender" checked="checked" value="male">
                <label for="male" class="gendertext" >Male</label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="female" class="gendertext">Female</label>
                <input type="radio" name="gender" id="other" value="other" >
                <label for="other" class="gendertext">Other</label><br>

            <!--address section -->

                <label for="street">Street</label><br>
                <?php 
                    if (isset($_GET['street'])){
                        $street = $_GET['street'];
                        //street error//
                        if (strpos($fullURL, "street=error")==  true){
                            echo'<input type="text" id="street" name="street" required="required" maxlength="40">';
                            echo "<span class='error'>&#42;Street address must be max 40 characters long</span>";
                        }
                        else{
                            echo'<input type="text" id="street" name="street" required="required" maxlength="40" value="'.$street.'">';
                        }
                    }
                    else{
                        echo'<input type="text" id="street" name="street" required="required" maxlength="40">';
                    }
                ?>
                <br>

                <label for="suburb">Suburb</label><br> 
                <?php 
                    if (isset($_GET['suburb'])){
                        $suburb = $_GET['suburb'];
                         //suburb error//
                        if (strpos($fullURL, "suburb=error")==  true){
                            echo "<span class='error'>&#42;Suburb must be max 40 characters long</span>";
                        }
                        else{
                            echo'<input type="text" id="suburb" name="suburb" required="required" maxlength="40" value="'.$suburb.'">';
                        }
                    }
                    else{
                        echo'<input type="text" id="suburb" name="suburb" required="required" maxlength="40">';
                    }
                ?>
                <br>
        
                <label for="state">State</label><br>
                <select name="state" id="state">
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="QLD">QLD</option>
                    <option value="NT">NT</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="ACT">ACT</option>
                </select>
                <br>
                <br>

                <label for="postcode">Postcode</label><br>
                <?php 
                    if (isset($_GET['postcode'])){
                        $postcode = $_GET['postcode'];
                        //postcode error//
                        if (strpos($fullURL, "postcode=error")==  true){
                            echo'<input type="text" id="postcode" name="postcode" required="required"  pattern="[0-9]{4}">';
                            echo "<span class='error'>&#42;Please enter a valid postcode</span>";
                        }
                        //postcode doesn't match state error//
                        elseif (strpos($fullURL, "postcode=match")==  true){
                            echo'<input type="text" id="postcode" name="postcode" required="required"  pattern="[0-9]{4}">';
                            echo "<span class='error'>&#42;Postcode and state do not match</span>";
                        }
                        else{
                            echo'<input type="text" id="postcode" name="postcode" required="required"  pattern="[0-9]{4}" value="'.$postcode.'">';
                        }
                    }
                    else{
                        echo'<input type="text" id="postcode" name="postcode" required="required"  pattern="[0-9]{4}">';
                    }
                ?>
                <br>

                <label for="email">Email Address</label><br>
                <?php 
                    if (isset($_GET['email'])){
                        $email = $_GET['email'];
                        //email error//
                        if (strpos($fullURL, "email=error")==  true){
                            echo' <input type="email" id="email" name="email" required="required">';
                            echo "<span class='error'>&#42;Please enter a valid email address</span>";
                        }
                        else{
                            echo' <input type="email" id="email" name="email" required="required" value="'.$email.'">';
                        }
                    }
                    else{
                        echo' <input type="email" id="email" name="email" required="required">';
                    }
                    
                ?>
                <br>

                <label>Contact Number</label><br>
                <?php 
                    if (isset($_GET['number'])){
                        $number = $_GET['number'];
                        //number error//
                        if (strpos($fullURL, "number=error")==  true){
                            echo'<input type="tel" id="number" name="number" minlength="8" maxlength="12" required="required">';
                            echo "<span class='error'>&#42;Contact number must be between 8 to 12 digits long</span>";
                        }
                        else{
                            echo'   <input type="tel" id="number" name="number" minlength="8" maxlength="12" required="required" value="'.$number.'">';
                        }
                    }
                    else{
                        echo'<input type="tel" id="number" name="number" minlength="8" maxlength="12" required="required">';
                    }
                ?>
                <br>

                <label>Select the skill(s) that you possess for this position:</label><br>
                <ul id="checklist">

                    <li>
                        <input type="checkbox" name="skill[]" value="A degree in Computer Science or equivalent" checked required="required" id="skill1">
                        <label for="skill1">A degree in Computer Science or equivalent</label><br>

                    </li>
                    <li>
                        <input type="checkbox" name="skill[]" value="A strong understanding of web markup languages (HTML5/CSS3)" id="skill2">
                        <label for="skill2" >A strong understanding of web markup languages (HTML5/CSS3)</label>
                    </li>
                    <li>
                        <input type="checkbox" name="skill[]" value="Experience with Vue and React frameworks" id="skill3">
                        <label for="skill3">Experience with Vue and React frameworks</label><br>
                    </li>

                    <li>
                        <input type="checkbox" name="skill[]" value="Familiarity with cross-browser testing" id="skill4">
                        <label for="skill4">Familiarity with cross-browser testing</label><br>
                    </li>

                    <li>
                        <input type="checkbox" name="skill[]" value="Experience with company network management" id="skill5">
                        <label for="skill5">Experience with company network management</label><br>
                    </li>

                    <li>
                        <input type="checkbox" name="skill[]" value="Familiarity with cloud computing architecture" id="skill6">
                        <label for="skill6">Familiarity with cloud computing architecture</label><br>
                    </li>
                    <li>
                        <input type="checkbox" name="skill[]" value="Proficient network and debugging skills" id="skill7">
                        <label for="skill7">Proficient network and debugging skills</label><br>
                    </li>
                    <li>
                        <input type="checkbox" name="other_skills" value="Other skills" id="other_skills">
                        <label for="other_skills" >Other skills: </label><br>
                    </li>
                </ul>
                <textarea name="other_skills_text"></textarea>
        </fieldset>

    
    <input type= "submit" value="APPLY" id="submit">
        
    </form>

<?php
include 'footer.inc';
?>

</body>
</html>