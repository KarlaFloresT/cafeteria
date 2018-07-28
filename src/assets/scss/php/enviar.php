<?php

function is_ajax(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLhttRequest';
}

if(is_ajax()) {
    $nombre = $_POST['nobre'];
    $email = $_POST['email'];
    $personas = $_POST['numero'];
    $hora = $_POST['hora'];
    $fecha = $_POST['fecha'];

    $header = 'De: '.$email. "\r\n";
    $header .= "X-Mailer:PHP/" . phpversion() . "\r\n";
    $header .= "Mime-Version: 1.0  \r\n";
    $header .= "Content-Type: text/html";

    $body = 'Nombre: ' . $nombre . "\r\n";
    $body .= 'Email: ' . $email . "\r\n";
    $body .= 'Para: ' . $personas ."\r\n";
    $body .= 'Día: ' . $fecha ."\r\n";
    $body .= 'Hora: ' . $hora ."\r\n";
    $body .= "Esta reservación fue hecha en el sitio web." 

    $para = 'ftoxqui28@gmail.com';
    $asunto = "Nueva reservación";

    mail($para, $asunto, $body, $header);

    echo json_encode(array(
        'mensaje' =>'Recervación Confirmada'.
        'nombre' => $nombre;
    )):

}
else {
    die("NO");
}

?>