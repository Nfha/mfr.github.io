<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $subject = $_POST["subject"];
    $email = $_POST["email"];
    $body = $_POST["body"];

    $additionalFields = "";

    switch ($subject) {
        case "Developer":
            $additionalFields .= "Scripting Language: " . $_POST["dev-scriptsprache"] . "\n";
            $additionalFields .= "Language for Work: " . $_POST["dev-vorstellung"] . "\n";
            $additionalFields .= "Years of Development: " . $_POST["dev-since"] . "\n";
            $additionalFields .= "Networks Visited: " . $_POST["dev-network"] . "\n";
            $additionalFields .= "Online Time: " . $_POST["dev-time"] . "\n";
            break;

        case "Supporter":
            $additionalFields .= "Tasks of Support: " . $_POST["sup-aufgabe"] . "\n";
            $additionalFields .= "Support Start/End: " . $_POST["sup-start"] . "\n";
            $additionalFields .= "Definition of Support: " . $_POST["sup-begriff"] . "\n";
            $additionalFields .= "Time for Support Activities: " . $_POST["sup-time"] . "\n";
            $additionalFields .= "Special Rights: " . $_POST["sup-right"] . "\n";
            $additionalFields .= "Support Online Times: " . $_POST["sup-online"] . "\n";
            break;

        case "Concept":
            $additionalFields .= "Tools for Concepts: " . $_POST["kon-tools"] . "\n";
            $additionalFields .= "Definition of Finished Concept: " . $_POST["kon-fertig"] . "\n";
            $additionalFields .= "Criteria for Concepts: " . $_POST["kon-worauf"] . "\n";
            $additionalFields .= "Time Limit for Concepts: " . $_POST["kon-limit"] . "\n";
            $additionalFields .= "Attitude to Teamwork: " . $_POST["kon-setting"] . "\n";
            $additionalFields .= "Concept Online Times: " . $_POST["kon-online"] . "\n";
            break;

        case "others":
            $additionalFields .= "Rank Description: " . $_POST["son-beschreibung"] . "\n";
            $additionalFields .= "Role of the Rank: " . $_POST["son-aufgaben"] . "\n";
            $additionalFields .= "Previous Experience: " . $_POST["son-erfahrung"] . "\n";
            $additionalFields .= "Time for Activities: " . $_POST["son-time"] . "\n";
            $additionalFields .= "Attitude to Teamwork: " . $_POST["son-setting"] . "\n";
            $additionalFields .= "Other Online Times: " . $_POST["son-online"] . "\n";
            break;
    }

    $message = "Nickname & Discordname: $username\n";
    $message .= "Rank: $subject\n";
    $message .= "E-Mail-Adress: $email\n";
    $message .= "Informations: $body\n\n";
    $message .= $additionalFields;

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain;charset=utf-8\r\n";

    $to = "nfhadoo8@gmail.com"; // Replace with the actual recipient email address

    $subject = "New Application: $username";

    if (mail($to, $subject, $message, $headers)) {
        header("Location: success.php");
        exit();
    } else {
        echo "Error sending email.";
    }
}

?>
