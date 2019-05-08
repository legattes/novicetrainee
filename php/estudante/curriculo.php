<?php
require_once "../../php/dao/Estudante.php";
require_once "../../php/Session.php";

Session::handle();
$id = $_GET['id'] ?? Session::get('model')->estudante_id;

require_once "../../php/Curriculo.php";
$curriculo = new Curriculo();
$curriculo->generate($id);

?>

