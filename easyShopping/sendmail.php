<?php
session_start();

require_once "Smtp.class.php";

$smtpserver = "smtp.163.com";
$smtpserverport =25;
$smtpusermail = "onlineshop123@163.com";
$smtpemailto = $_POST['email'];
$smtpuser = "onlineshop123@163.com";
$smtppass = "DCNBYZFHNLQBQNUI";
$mailtitle = "Online Shopping Information";
$mailcontent =
    "<h3>Dear ".$_POST['firstName']." ".$_POST['lastName']." ,"."</h3>"."<br>".
    "The Billing Address are:"."<br>".
    "<table border=\"2\" width=\'200px'\>".
    "<tr>".
    "<td>Address:"."</td>".
    "<td>".$_POST['address']."</td>".
    "</tr>".
    "<tr>".
    "<td>Suburb:"."</td>".
    "<td>".$_POST['suburb']."</td>".
    "</tr>".
    "<tr>".
    "<td>State:"."</td>".
    "<td>".$_POST['state']."</td>".
    "</tr>".
    "<tr>".
    "<td>Postcode:"."</td>".
    "<td>".$_POST['postCode']."</td>".
    "</tr>".
    "<tr>".
    "<td>Country:"."</td>".
    "<td>".$_POST['country']."</td>".
    "</tr>".
    "<tr>".
    "<td>Total Cost:"."</td>".
    "<td>".$_SESSION['total']."</td>".
    "</tr>".
    "</table>"."<br>"."Thanks for the shopping! Have a nice day!";
$mailtype = "HTML";

$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
$smtp->debug = false;
$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

echo "<div style='width:300px; margin:36px auto;'>";
if($state==""){
    echo "Please check the Email Address";
    exit();
}
echo "Congratulations! All Done !";
echo "</div>";

?>