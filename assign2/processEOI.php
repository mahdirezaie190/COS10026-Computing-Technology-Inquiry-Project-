<?php
    function sanitise_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;
    }
    require_once("settings.php");
    $conn = @mysqli_connect($host,$user,$pwd,$sql_db);
    if (!$conn){
         //if connection is unsuccessful
         echo"Database connection failure</p>";
    }
    else{
//assign values from html form to php variables 
        $getvalues = True;
        //ref num
        if (isset($_POST["refnum"])){
            $refnum = sanitise_data($_POST["refnum"]);
        }
        else{
            
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }

        //title
        if (isset($_POST["title"])){
            $title = sanitise_data($_POST["title"]);
        }
        else{
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }

        //first name
        if (isset($_POST["fname"])){
            $fname = sanitise_data($_POST["fname"]);
        }
        else{
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }

        //last name 
        if (isset($_POST["lname"])){
            $lname = sanitise_data($_POST["lname"]);
        }
        else{
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }


        //birthdate
        if (isset($_POST["birthdate"])){
            $birthdate = sanitise_data($_POST["birthdate"]);
            
        }
        else{
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }

        //gender
        if (isset($_POST["gender"])){
            $gender = sanitise_data($_POST["gender"]);
        }
        else{
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }

        //street
        if (isset($_POST["street"])){
            $street = sanitise_data($_POST["street"]);
        }
        else{
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }

        //suburb
        if (isset($_POST["suburb"])){
            $suburb = sanitise_data($_POST["suburb"]);
        }
        else{
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }

        //state
        if (isset($_POST["state"])){
            $state = sanitise_data($_POST["state"]);
        }
        else{
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }

        //postcode
        if (isset($_POST["postcode"])){
            $postcode = sanitise_data($_POST["postcode"]);
        }
        else{
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }


        //email
        if (isset($_POST["email"])){
            $email = sanitise_data($_POST["email"]);
        }
        else{
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }


        //number
        if (isset($_POST["number"])){
            $number = $_POST["number"];
            //strips all spaces in phone number
            $number = sanitise_data(str_replace(' ','',$number));
        }
        else{
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }


        //skills
        if (isset($_POST["skill"])){
            $skills = $_POST["skill"];
            $skill_str ='';
            foreach($skills as $skill){
                $skill = sanitise_data($skill);
                $skill_str.= "$skill.\n";
            }
        }
        else{
            echo"Error: Enter data in the <a href=\"apply.php\">form</a></p>";
            $getvalues = False;
        }
       
        //other skills
        $other_skills = $_POST["other_skills"];
        if (!isset($_POST["other_skills"])){
            $other_skills_text = null;
        }
        else{
            $other_skills_text = sanitise_data($_POST["other_skills_text"]);
        }


        //will only start validation when all data has been fetched 
        if ($getvalues){
            $url = "Location: ../assign2/apply.php?";
            $flag = True;
            //validate text field inputs
            //error msg when fields are blank
            if (empty($refnum) || empty($fname) || empty($lname) || empty($birthdate) || empty($gender) || empty($street) || empty($suburb) ||empty($postcode) ||empty($email) ||empty($number)){
                $url.= 'apply=empty';
                header($url);
                $flag = false;
            }

            //validation for reference number
            if (!ctype_alnum($refnum) || strlen($refnum)!==5) {
                $url.="&refnum=error";
                $flag = false;
            }
            else{
                $url.="&refnum=$refnum";
            }
            
            //validation for first and last name
            if (!ctype_alpha($fname) || strlen($fname) > 20 || !ctype_alpha($lname)|| strlen($fname) > 20){
                $url.= '&name=error';
                $flag = false;
            }
            else{
                $url.= "&fname=$fname&lname=$lname";
            }

            //validation for date of birth
            //get year from birthdate variable
            $year="";
            for ($i=0;$i<4;$i++){
                $year.= $birthdate[$i];
            }
            if (intval($year)<1943 || intval($year)>2008 ){
                $url.='&birth=error';
                $flag = false;
            }
            else{
                $url.="&birthdate=$birthdate";
            }
            

            //validation for street
            if (strlen($street) > 40){
                $url.='&street=error';
                $flag = false;
            } 
            else{
                $url.="&street=$street";
            }

            //validation for suburb
            if (strlen($suburb) > 40){
                $url.='&suburb=error';
                $flag = false;
            } 
            else{
                $url.="&suburb=$suburb";
            }


            //validation for postcode
            if (!ctype_digit($postcode) || strlen($postcode)!=4){
                $url.='&postcode=error';
                $flag = false;
            } 
            else{
                if ($state == 'NT'){
                    //NT postcode range: 0800-0909
                    if (intval($postcode)< 0800 || intval($postcode)> 0909){
                        $url.='&postcode=match';
                        $flag = false;
                    }
                    else{
                        $url.="&postcode=$postcode";
                    }
                }
        
                elseif ($state == 'NSW'){
                    //NSW postcode range: 1001-2899
                    if (intval($postcode)< 1001 || intval($postcode)> 2899){
                        $url.='&postcode=match';
                        $flag = false;
                    }
                    else{
                        $url.="&postcode=$postcode";
                    }
                }

                elseif ($state == 'ACT'){
                    //ACT postcode ranges: 2600-2620, 2900-2914
                    if ((intval($postcode) < 2600) || (intval($postcode)>2620 && (intval($postcode) < 2900) || intval($postcode)>2914)){
                        $url.='&postcode=match';
                        $flag = false;
                    }
                    else{
                        $url.="&postcode=$postcode";
                    }
                }

                elseif ($state == 'VIC'){
                    //VIC postcode range: 3000-3996 
                    if (intval($postcode)< 3000 || intval($postcode)> 3996){
                        $url.='&postcode=match';
                        $flag = false;
                    }
                    else{
                        $url.="&postcode=$postcode";
                    }
                }

                elseif ($state == 'QLD'){
                    //QLD postcode range: 4000-4895 
                    if (intval($postcode)< 4000 || intval($postcode)> 4895){
                        $url.='&postcode=match';
                        $flag = false;
                    }
                    else{
                        $url.="&postcode=$postcode";
                    }
                }
                
                elseif ($state == 'WA'){
                    //WA postcode range: 6000-6997
                    if (intval($postcode)< 6000 || intval($postcode)> 6997){
                        $url.='&postcode=match';
                        $flag = false;
                    }
                    else{
                        $url.="&postcode=$postcode";
                    }
                }
                elseif ($state == 'SA'){
                    //SA postcode range: 5000-5960
                    if (intval($postcode)< 5000 || intval($postcode)> 5960){
                        $url.='&postcode=match';
                        $flag = false;
                    }
                    else{
                        $url.="&postcode=$postcode";
                    }
                }
                elseif ($state == 'TAS'){
                    //TA postcode range: 7000-7923
                    if (intval($postcode)< 7000 || intval($postcode)> 7923){
                        $url.='&postcode=match';
                        $flag = false;
                    }
                    else{
                        $url.="&postcode=$postcode";
                    }
                }
            }
            

            //validation for email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $url.='&email=error';
                $flag = false;
            }
            else{
                $url.="&email=$email";
            }

            //validation for phone number
            if (!ctype_digit($number) || strlen($number)<8 || strlen($number)>20) {
                $url.='&number=error';
                $flag = false;
            }
            else{
                $url.="&number=$number";
            }

            if (!$flag){
                header($url);
                exit();
            }
        


                //create table 
                $sql_table = "EOI";

                // SQL query to insert data into the database
                $query = "INSERT INTO $sql_table (jobRefNumber,firstName, lastName, streetAddress, suburb, state, postcode, email, phoneNumber,skills,otherSkills) VALUES ('$refnum','$fname', '$lname', '$street', '$suburb', '$state', '$postcode' ,'$email', '$number','$skill_str','$other_skills_text')";

                //execute the query and store result into the result pointer
                $result = mysqli_query($conn,$query);

                //checks if query is successfuly executed
                if (!$result){
                    echo"<p class=\"wrong\">Something is wrong with ", $query, "</p>";
                }
                else{
                    echo"<p class=\"ok\">Successfully added new record to EOI table.</p>";
                }

                //close database connection
                mysqli_close($conn);
            

        } //bracket for if all values are fetched
    } //bracket for if connection is successful
?>
