<?php
// Incluimos los archivos necesarios
echo __DIR__;
require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Aprendiz.php");

// Verificamos si los campos están presentes y no vacíos
$nombre = isset($_POST['nombre']) && $_POST['nombre'] !== "" ? $_POST['nombre'] : false;
$apellido = isset($_POST['apellido']) && $_POST['apellido'] !== "" ? $_POST['apellido'] : false;
$correo = isset($_POST['correo']) && $_POST['correo'] !== "" ? $_POST['correo'] : false;
$telefono = isset($_POST['telefono']) && $_POST['telefono'] !== "" ? $_POST['telefono'] : false;
$documento = isset($_POST['documento']) && $_POST['documento'] !== "" ? $_POST['documento'] : false;

// Verificamos que todos los campos requeridos estén presentes
if ($nombre && $apellido && $correo && $telefono && $documento) {

    // Obtenemos la conexión a la base de datos
    $database = new Database();
    $connection = $database->getConnection($database);

    // Creamos una nueva instancia de Aprendiz
    $aprendiz = new Aprendiz($connection);

    // Asignamos los valores a través de los setters
    $aprendiz->setNombre($nombre);
    $aprendiz->setApellido($apellido);
    $aprendiz->setCorreo($correo);
    $aprendiz->setTelefono($telefono);
    $aprendiz->setDocumento($documento);
    
    // Asignamos valores opcionales solo si están presentes
    if (isset($_POST['direccion'])) {
        $aprendiz->setDireccion($_POST['direccion']);
    }
    
    if (isset($_POST["edad"])) {
        $aprendiz->setEdad($_POST["edad"]);
    }

    // Recopilamos los datos para pasarlos al método store
    $data = [
        'nombre' => $aprendiz->getNombre(),
        'apellido' => $aprendiz->getApellido(),
        'correo' => $aprendiz->getCorreo(),
        'telefono' => $aprendiz->getTelefono(),
        'documento' => $aprendiz->getDocumento(),
        'direccion' => $aprendiz->getDireccion(),
        'edad' => $aprendiz->getEdad()
    ];

    // Guardamos los datos usando el método store y verificamos el resultado
    $valor = $aprendiz->store($data);

    // Si el valor es correcto, redirigimos a listar.php
    if ($valor != null) {
        return header('Location: listar.php');
    } else {
        echo "Error al guardar los datos";
    }

} else {
    var_dump("Error al cargar los datos. Todos los campos requeridos deben ser completados.");
}
