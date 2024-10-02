<?php  

echo __DIR__;
require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Aprendiz.php");

// Validar y asignar valores utilizando getters y setters
$nombre = isset($_POST['firts_name']) ? ($_POST['firts_name'] != "" ? $_POST['firts_name'] : false) : false;
$apellido = isset($_POST['last_name']) ? ($_POST['last_name'] != "" ? $_POST['last_name'] : false) : false;
$email = isset($_POST['email']) ? ($_POST['email'] != "" ? $_POST['email'] : false) : false;
$telefono = isset($_POST['phone']) ? ($_POST['phone'] != "" ? $_POST['phone'] : false) : false;
$dni = isset($_POST['dni']) ? ($_POST['dni'] != "" ? $_POST['dni'] : false) : false;
$cuenta = isset($_POST['cuenta']) ? ($_POST['cuenta'] != "" ? $_POST['cuenta'] : false) : false;
$promedio = isset($_POST['promedio']) ? ($_POST['promedio'] != "" ? $_POST['promedio'] : false) : false;

if ($nombre && $apellido && $email && $telefono && $dni && $user_accounts && $average) {
    $database = new Database();
    $connection = $database->getConnection($database);
    $aprendiz = new Aprendiz($connection);

    // Crear un nuevo objeto Aprendiz
    $aprendiz->setId($_POST["id_person"]);
    $aprendiz->setNombre($nombre);
    $aprendiz->setApellido($apellido);
    $aprendiz->setFechaNacimiento($_POST["birthdate"]); // Asegúrate de que el método setFechaNacimiento exista
    $aprendiz->setCorreo($email);
    $aprendiz->setTelefono($telefono);
    $aprendiz->setDocumento($dni);
    $animales->setCuenta($cuenta);
    $animales->setPromedio($promedio);

    // Realizar la actualización
    $valor = $aprendiz->update($aprendiz->getId(), [
        'firts_name'  => $aprendiz->getNombre(),
        'last_name'   => $aprendiz->getApellido(),
        'birthdate'   => $aprendiz->getFechaNacimiento(), // Asegúrate de que haya un getter
        'email'       => $aprendiz->getCorreo(),
        'phone'       => $aprendiz->getTelefono(),
        'dni'         => $aprendiz->getDocumento(),
        'cuenta'   => $animales->getCuenta(),
        'promedio' => $animales->getPromedio(),
    ]);

    if ($valor != null) {
        return header('Location: '. "listar.php");
    }

} else {
    var_dump("error al cargar los datos");
}
?>
