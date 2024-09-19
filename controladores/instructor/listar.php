<?php 
echo __DIR__;
require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Instructor.php");

$datebase = new Database();
$connection = $datebase->getConnection($datebase);
$aprendiz = new Aprendiz($connection);

$lista = $aprendiz->getAll();
?>

<Table border="1">
  <thead>
    <th>Id</th>
    <th>nombre</th>
    <th>apellidos</th>
    <th>Fecha nacimiento</th>
    <th>correo</th>
    <th>telefono</th>
    <th>dni</th>
    <th>cuenta</th>
    <th>promedio</th>
    <th>Acciones</th>
  </thead>
  <tbody>
    <?php
    for ($i=0; $i < count($lista); $i++) { 
      ?>
      <tr>
        <td><?php print_r($lista[$i]['id']); ?></td>
        <td><?php print_r($lista[$i]['firts_name']); ?></td>
        <td><?php print_r($lista[$i]['last_name']); ?></td>
        <td><?php print_r($lista[$i]['birthdate']); ?></td>
        <td><?php print_r($lista[$i]['email']); ?></td>
        <td><?php print_r($lista[$i]['phone']); ?></td>
        <td><?php print_r($lista[$i]['dni']); ?></td>
        <td><?php print_r($lista[$i]['salary']); ?></td>
        <td><?php print_r($lista[$i]['adress']); ?></td>
        <td>
          <div>
            <a href="editar.php?id=<?= $lista[$i]['id'] ?>">Editar</a>
            <form action="eliminar.php" method="post">
              <input type="hidden" name="id" value="<?= $lista[$i]['id'] ?>">
              <button type="submit">Eliminar</button>
            </form>
          </div>
        </td>
      </tr>
      <?php } ?>
  </tbody>
</Table>
