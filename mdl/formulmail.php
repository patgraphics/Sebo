<?php
require '../src/Exception.php';
require '../src/SMTP.php';
require '../src/PHPMailer.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true); //je crée un objet $mail de ma classe PHPMailer

try{

    $mail->isSMTP();                              // Set mailer to use SMTP
    $mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                       // Enable SMTP authentication
    $mail->Username = 'pwaksmann@gmail.com';      // SMTP username
    $mail->Password = 'Ap3.19-20';                // SMTP password
    $mail->SMTPSecure = 'tls';               // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                            // TCP port to connect to

    $mail->setFrom('ne_pas_repondre@sebo.com', 'Sebo_Media_Provider');
    $mail->addAddress($_POST["txt_mail"], $_POST["txt_nom"]);     // Add a recipient
    $mail->isHTML(true);
    $mail->Subject = 'votre envoi a bien été pris en compte';
    $mail->Body    = '<html>
<head>
	<style>
		.ab {
			font-size:12pt;
			font-family:Helvetica;
			margin: 200px;
		}
		.b {
			font-size:8pt;
		}
	</style>
</head>
<body>

	<table style="width:50%;margin:auto" border="1" align="center" cellpadding="50">
	<tr>
		<td>

	<pre>
		<p class="ab">
		<?php echo "affichage de vos informations : ";?>
		</p>
		<br>
		<p> <font size="2" >
			<?php echo "Votre nom : ";?></font>
			<font size="3" >	 
			<?php print $_POST["txt_nom"];?></font>
		</p>
		<br>
		<p> <font size="2" >
			<?php echo "Vos commentaires : ";?></font>
			<font size="3" >	 
			<?php print $_POST["txt_com"];?></font>
		</p>

	</pre>

		</td>
	</tr>
</table>

</body>
</html>	';
    $mail->send();
    echo 'Message envoyé';
    
 } catch (Exception $e) {
    echo 'Message planté. Erreur: ', $mail->ErrorInfo;
}
   
?>