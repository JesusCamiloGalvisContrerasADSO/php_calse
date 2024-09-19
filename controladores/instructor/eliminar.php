<?php

require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Instructor.php");

$datebase = new Database();
$connection = $datebase->getConnection($datebase);
$aprendiz = new Aprendiz($connection);

$id = $_REQUEST['id'];

$aprendiz->delete($id);

header('Location: '. "listar.php");