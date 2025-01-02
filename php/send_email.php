<?php
// Inclure le fichier PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Charger Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['cf-name']);
    $email = htmlspecialchars($_POST['cf-email']);
    $message = htmlspecialchars($_POST['cf-message']);

    // Configuration de l'email
    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Utiliser le serveur SMTP de Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'aitelmahjoubsalaheddine@gmail.com'; // Remplacez par votre email
        $mail->Password = 'kqgpeasvagooehef'; // Remplacez par le mot de passe d'application généré

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinataire et expéditeur
        $mail->setFrom('votre-email@gmail.com', 'Nom de l\'expéditeur');
        $mail->addAddress($email, 'Nom du destinataire'); 

        // Contenu de l'email
        $mail->isHTML(false); // Texte brut (pas HTML)
        $mail->Subject = "Nouveau message de : " . $name;
        $mail->Body = "Nom : $name\nEmail : $email\n\nMessage :\n$message";

        // Envoi de l'email
        $mail->send();
        echo "<script>alert('Merci pour votre message !'); window.location.href='contact.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Désolé, il y a eu un problème avec l\'envoi de votre message.'); window.location.href='contact.html';</script>";
    }
}
?>
