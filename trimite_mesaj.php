<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Curățăm datele
    $nume    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $telefon = htmlspecialchars($_POST['telefon']);
    $subiect = htmlspecialchars($_POST['subiect']);
    $mesaj   = htmlspecialchars($_POST['mesaj']);

    // Emailul unde vrei să primești mesajele
    $to = "metlaserpro@gmail.com";

    // Subiect și corp email
    $subject = "Formular contact CNC $subiect";
    $body = "Ai primit un mesaj de pe site.\n\n"
          . "Nume: $nume\n"
          . "Email: $email\n"
          . "Telefon: $telefon\n"
          . "Subiect: $subiect\n"
          . "Mesaj:\n$mesaj";

    // Header pentru a putea răspunde direct
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Trimite emailul
        if (mail($to, $subject, $body, $headers)) {
        echo json_encode([
            "success" => true,
            "message" => "Mesajul a fost trimis cu succes. Echipa CNC MetLaser Pro vă va răspunde în cel mai scurt timp posibil."
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Eroare la trimiterea mesajului. Încercați din nou."
        ]);
    }
}
?>