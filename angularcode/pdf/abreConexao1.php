<?php

$conexao = mysql_connect("localhost", "root", "");
if(!$conexao) die ("Falha ao conectar ao banco");

//Resolvendo problemas de caracteres
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conexao);

$bd = mysql_select_db("asteriskcdrdb");

