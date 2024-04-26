<?php
if ($_FILES["juego"]["error"] == UPLOAD_ERR_OK) {
    $upload_dir = "uploads/";
    $temp_name = $_FILES["juego"]["tmp_name"];
    $file_name = uniqid("game_", true) . ".zip";
    move_uploaded_file($temp_name, $upload_dir . $file_name);

    // Aumentar el tiempo de expiración a 3 meses (90 días)
    $expiration_time = time() + 90 * 24 * 60 * 60; // 3 meses
    $link = "https://tusitio.com/uploads/$file_name?expires=$expiration_time";

    echo "¡El juego se ha subido correctamente! Aquí está tu enlace temporal válido por 3 meses:<br>";
    echo "<a href=\"$link\">Descargar Juego</a>";
} else {
    echo "Error al subir el archivo.";
}
?>
