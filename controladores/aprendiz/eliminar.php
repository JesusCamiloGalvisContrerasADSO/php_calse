<?php

require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Aprendiz.php");

$database = new Database();
$connection = $database->getConnection($database);

// Creamos una instancia de Aprendiz
$aprendiz = new Aprendiz($connection);

// Obtenemos el ID a eliminar desde la petición
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

// Verificamos si el ID es válido antes de proceder a eliminar
if ($id) {
    // Usamos el setter para establecer el ID
    $aprendiz->setId($id);
    
    // Llamamos al método delete del modelo Aprendiz
    $aprendiz->delete($aprendiz->getId()); // Asumimos que delete acepta el ID como argumento
    
    // Redirigimos a la página de listado
    header('Location: listar.php');
} else {
    // Si no hay un ID válido, mostramos un error
    echo "ID inválido para eliminar.";
}
?>
