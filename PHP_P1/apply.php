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

   <form method="post" action="http://mercury.swin.edu.au/it000000/formtest.php" novalidate = "novalidate">
        <fieldset>
                <legend>Job Application Form</legend>
                <label for="refnum">Job Reference Number</label><br>
                <input type="text" name="refnum" id="refnum" required="required" minlength="5" maxlength="5" ><br>
        
                <label for="title">Title</label><br>
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
                        <input type="text" name="fname" id="fname" required="required" maxlength="20" pattern="[A-Za-z]{1,20}">
                    </li>

                    <li>
                        <label for="lname">Last Name</label><br>
                        <input type="text" name="lname" id="lname" required="required" maxlength="20" pattern="[A-Za-z]{1,20}">
                    </li>
                </ul>

        
                <label for="birthdate">Date of Birth</label><br>
                <input type="date" id="birthdate" name="birthdate" required="required"><br>
                
                <label>Gender:</label><br>
                <input type="radio" id="male" name="gender" checked="checked" value="male">
                <label for="male" class="gendertext" >Male</label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="female" class="gendertext">Female</label>
                <input type="radio" name="gender" id="other" value="other" >
                <label for="other" class="gendertext">Other</label><br>

            <!--address section -->

                <label for="street">Street</label><br>
                <input type="text" id="street" name="street" required="required" maxlength="40"><br>
                <label for="suburb">Suburb</label><br>
                <input type="text" id="suburb" name="suburb" required="required" maxlength="40"><br>
        
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
                <input type="text" id="postcode" name="postcode" required="required"  pattern="[0-9]{4}"><br>

                <label for="email">Email Address</label><br>
                <input type="email" id="email" name="email" required="required"><br>

                <label>Contact Number</label><br>
                <input type="tel" id="number" name="number" minlength="8" maxlength="12" required="required">
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
                        <input type="checkbox" name="skill[]" value="Other skills" id="other_skills">
                        <label for="other_skills" >Other skills: </label><br>
                    </li>
                </ul>
                <textarea name="other_skills"></textarea>
        </fieldset>

    
    <input type= "submit" value="APPLY" id="submit">
        
        

    </form>

<?php
include 'footer.inc';
?>

</body>
</html>
