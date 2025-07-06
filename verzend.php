<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naar = "info@indexnest.nl";

    // Haal gebruikersgegevens op en filter
    $reply = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $onderwerp = htmlspecialchars($_POST["onderwerp"] ?? "");
    $vraag = htmlspecialchars($_POST["vraag"] ?? "");

    // Valideer e-mailadres
    if (!filter_var($reply, FILTER_VALIDATE_EMAIL)) {
        die("Ongeldig e-mailadres.");
    }

    // Bescherm tegen header injectie
    if (preg_match("/[\r\n]/", $reply) || preg_match("/[\r\n]/", $onderwerp)) {
        die("Header injectie gedetecteerd.");
    }

    echo "Formulier ontvangen van: $reply";

    // Opbouw bericht
    $bericht = "Bericht ontvangen van: $reply\n\nOnderwerp: $onderwerp\n\nVraag:\n$vraag";

    // Belangrijke aanpassing:
    $headers  = "From: info@indexnest.nl\r\n";
    $headers .= "Reply-To: $reply\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8";

    // Verstuur mail
    mail($naar, $onderwerp, $bericht, $headers);

    header("Location: index.html");
exit();

}
?>