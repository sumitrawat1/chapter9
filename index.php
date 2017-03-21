<?php
//set default values
$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';


//process
$action = filter_input(INPUT_POST, 'action');
function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
       

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (trim($aame=$_POST['name']) == '') {
                $error = true;
                echo "<div style=\"color:red;\">No name was entered.</div>\n";
        } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                }
                $fname = explode(" ", $name);
                $fname[0];
        }
        
        if (trim($email=$_POST['email']) == '') {
                $error = true;
                echo "<div style=\"color:red;\">No email was entered.</div>\n";
        } else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                }
        }
        
         if (trim($phone=$_POST['phone']) == '') {
                        $error = true;
                        echo "<div style=\"color:red;\">No phone number was entered.</div>\n";
                } else {
                        $email = test_input($_POST["email"]);
                     
                if(strlen($phone) == 10){
                        $part1 = substr($phone, 0, 3);
                        $part2 = substr($phone, 3, 3);
                        $part3 = substr($phone, 6);
                        $format_1 = $part1 . '-' . $part2 . '-' . $part3; 
                        $phone =$format_1;
        }
        else{
        $part1 = substr($phone, 0, 3);                 
        $part2 = substr($phone, 4, 8);
        $format_1 = $part1 . '-' . $part2; 
        $phone =$format_1;
        }
        }
        
       }
       
       $message = "Hello ". ucfirst($name). ",\n 
        Thank you for entering this data :\n 
        Name : ". ucfirst($name).
       "\n Email :" . $email .
       "\n Phone :" . $phone;
                      
        break;

        default:
                $message = "Enter some data and click on the Submit button.";

        break;
}
include 'string_tester.php';
?>