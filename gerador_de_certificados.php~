<?php
/*************************************************/
/*
/* GERADOR DE CERTIFICADOS MORIÁH CURSOS
/*
/* Autor: Luigi Matheus Afornalli Breda
/* Data: 23/09/2015
/* Versão: 1.0.0
/*
/*************************************************/

// DEFINE A BASE DO CERTIFICADO
if (isset($_GET["base"])) {
	$jpg_image = imagecreatefrompng($_GET["base"]);
} else {
	$jpg_image = imagecreatefrompng('./bases/base-campo-magro.png');
}

// DEFINE AS FONTES ULTILIZADAS
$fonte_nome = './fonts/GreatVibes-Regular.ttf';
$fonte_padrao = './fonts/Lato-Regular.ttf';

// DEFINE O HEADER
header("Content-type: image/png");

// DEFINE AS VARIAVEIS DO LOOP
$nome_aluno = $_GET["nome"];
$nome_aluno_limpo = $_GET["nome_aluno_limpo"];

// DEFINE AS VARIAVEIS FIXAS 
$nome_curso = $_GET["nome_curso"];
$carga_horaria = $_GET["carga_horaria"];
$assinatura_1_nome = $_GET["nome_assinatura_1"];
$assinatura_1_funcao = $_GET["cargo_assinatura_1"];
$assinatura_2_nome =  $_GET["nome_assinatura_2"];
$assinatura_2_funcao = $_GET["cargo_assinatura_2"];
$local_e_data = $_GET["local_e_data"];

$declaracao_part_1 = "Certificamos que o(a) ".$nome_aluno_limpo." concluiu o ";
$declaracao_part_2 = "curso de ".$nome_curso." com a carga horária de ".$carga_horaria." horas.";

// DEFINE A COR DAS LETRAS
$cor = imagecolorallocate($jpg_image, 51, 51, 102);

// ESCREVE OS DADOS NO CERTIFICADO
imagettftext($jpg_image, 130, 0, 700, 1030, $cor, $fonte_nome, $nome_aluno);
imagettftext($jpg_image, 45, 0, 800, 1200, $cor, $fonte_padrao, $declaracao_part_1);
imagettftext($jpg_image, 45, 0, 800, 1270, $cor, $fonte_padrao, $declaracao_part_2);
imagettftext($jpg_image, 35, 0, 2000, 1400, $cor, $fonte_padrao, $local_e_data);
imagettftext($jpg_image, 35, 0, 500, 1810, $cor, $fonte_padrao, '_____________________________');
imagettftext($jpg_image, 35, 0, 500, 1880, $cor, $fonte_padrao, $assinatura_1_nome);
imagettftext($jpg_image, 35, 0, 500, 1930, $cor, $fonte_padrao, $assinatura_1_funcao);
imagettftext($jpg_image, 35, 0, 1900, 1810, $cor, $fonte_padrao, '_____________________________');
imagettftext($jpg_image, 35, 0, 1900, 1880, $cor, $fonte_padrao, $assinatura_2_nome);
imagettftext($jpg_image, 35, 0, 1900, 1930, $cor, $fonte_padrao, $assinatura_2_funcao);

// HEADER PARA FORÇAR O DOWNLAOD DA IMAGEM
$nome_aluno_limpo = strtolower ($nome_aluno_limpo);
$nome_aluno_limpo = str_replace (' ','_',$nome_aluno_limpo);
$nome_aluno_limpo = str_replace ('.','',$nome_aluno_limpo);

$nome_curso = strtolower ($nome_curso);
$nome_curso = str_replace (' ','_',$nome_curso);
$nome_curso = str_replace ('.','',$nome_curso);

$nome_curso = $nome_curso.'-'.$nome_aluno_limpo.'.png';

header('Content-Disposition: attachment; filename="'.$nome_curso.'"');
header("Content-Type: application/force-download");


// GERA A IMAGEM PARA DOWNLOAD
imagepng($jpg_image);

// LIMPA A MEMÓRIA
imagedestroy($jpg_image);
?> 
