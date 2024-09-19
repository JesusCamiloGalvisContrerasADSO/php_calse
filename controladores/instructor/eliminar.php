<?php

require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Instructor.php");

$datebase = new Database();
$connection = $datebase->getConnection($datebase);
$instructor = new Instructor($connection);

$id = $_REQUEST['id'];

$instructor->delete($id);

header('Location: '. "listar.php");