<?php

require_once("config.php");

// $sql = new sql();

// $usuarios = $sql->select("SELECT*FROM tb_usuarios");

// echo json_encode($usuarios);

$user = new Usuario();

$user->loadById(7);

echo $user;