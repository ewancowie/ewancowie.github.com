<?php 
$to = "evelinaorama@gmail.com" ; 
$from = $_REQUEST['Email'] ; 
$name = $_REQUEST['Name'] ; 
$headers = "From: $name <$from>"; 
$subject = "Web Contact Data";

$fields = array(); 
$fields{"Name"} = "Name";
$fields{"Email"} = "Email";
$fields{"Message"} = "Message";

$body = "We have received the following information:\n\n"; foreach($fields as $a => $b){ $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); } 

$headers2 = "From: Ewan Cowie <evelinaorama@gmail.com>"; 
$subject2 = "Thank you for contacting us"; 
$autoreply = "Thank you for contacting us.";

$spam = $_REQUEST['spam'] ;
$correct = "4";

if ($spam > $correct) {print "The result you entered for 2+2 is too high, please go back and try again.";}
else {
if($spam < $correct) {print "The result you entered for 2+2 is too low, please go back and try again";}
else {
if($from == '') {print "You have not entered an email, please go back and try again";} 
else { 
if($name == '') {print "You have not entered a name, please go back and try again";}
else { 
$send = mail($to, $subject, $body, $headers); 
$send2 = mail($from, $subject2, $autoreply, $headers2); 
if($send) 
{print "Thank you for contacting us."; } 
else 
{print "We encountered an error sending your mail, please notify webmaster@yourdomain.com"; } 
}
}
}
}
?>