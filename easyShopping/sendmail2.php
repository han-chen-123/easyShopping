<?php
session_start();

$to = $_POST['email'];
$subject = 'Online Shopping Information';
$headers = "From: Online Shopping Grocery". "\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body>';
$message .= "<h3>Dear ".$_POST['firstName']." ".$_POST['lastName']." ,"."</h3>"."<br>";
$message .= "The Billing Address are:"."<br>";
$message .= "<table border=\"2\" width=\"90%\">";
$message .= "<tr><td>Address:</td>";
$message .= "<td>".$_POST['address']."</td></tr>";
$message .= "<tr><td>Suburb:</td>";
$message .= "<td>".$_POST['suburb']."</td></tr>";
$message .= "<tr><td>State:"."</td>";
$message .= "<td>".$_POST['state']."</td></tr>";
$message .= "<tr><td>Postcode:"."</td>";
$message .= "<td>".$_POST['postCode']."</td></tr>";
$message .= "<tr><td>Country:"."</td>";
$message .= "<td>".$_POST['country']."</td></tr>";
$message .= "<tr><td>Total Cost:"."</td>";
$message .= "<td>".$_SESSION['total']."</td></tr></table><br>";
$message .= "<h3>Thanks for the shopping! Have a nice day!</h3>";
$message .= '</body></html>';
if(mail($to, $subject, $message, $headers)) {
    echo "Congratulations! All Done !";
}