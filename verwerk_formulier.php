<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = htmlspecialchars($_POST['naam']);
    $email = htmlspecialchars($_POST['email']);
    $onderwerp = htmlspecialchars($_POST['onderwerp']);
    $bericht = htmlspecialchars($_POST['bericht']);
    
    // Validatie
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Ongeldig e-mailadres.");
    }

    // E-mail instellingen
    $to = "jellesmidts@icloud.com";
    $subject = "Nieuw bericht van: $naam";
    $body = "Naam: $naam\nE-mail: $email\nOnderwerp: $onderwerp\n\nBericht:\n$bericht";
    $headers = "From: $email";

    // Stuur de e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Bedankt voor je bericht! We nemen snel contact met je op.";
    } else {
        echo "Er ging iets mis. Probeer het later opnieuw.";
    }
}
?>
