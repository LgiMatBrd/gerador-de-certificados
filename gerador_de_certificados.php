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
	$jpg_image = imagecreatefromjpeg($_GET["base"]);
} else {
	$jpg_image = imagecreatefromjpeg('./bases/certificado_base.jpg');
}

// DEFINE AS FONTES ULTILIZADAS
$fonte_nome = './fonts/GreatVibes-Regular.ttf';
$fonte_padrao = './fonts/Lato-Regular.ttf';

// DEFINE O HEADER
header("Content-type: image/jpeg");

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
imagettftext($jpg_image, 35, 0, 200, 275, $cor, $fonte_nome, $nome_aluno);
imagettftext($jpg_image, 15, 0, 180, 315, $cor, $fonte_padrao, $declaracao_part_1);
imagettftext($jpg_image, 15, 0, 180, 333, $cor, $fonte_padrao, $declaracao_part_2);
imagettftext($jpg_image, 10, 0, 485, 410, $cor, $fonte_padrao, $local_e_data);
imagettftext($jpg_image, 8, 0, 140, 480, $cor, $fonte_padrao, '_____________________________');
imagettftext($jpg_image, 8, 0, 140, 500, $cor, $fonte_padrao, $assinatura_1_nome);
imagettftext($jpg_image, 8, 0, 140, 515, $cor, $fonte_padrao, $assinatura_1_funcao);
imagettftext($jpg_image, 8, 0, 595, 480, $cor, $fonte_padrao, '_____________________________');
imagettftext($jpg_image, 8, 0, 595, 500, $cor, $fonte_padrao, $assinatura_2_nome);
imagettftext($jpg_image, 8, 0, 595, 515, $cor, $fonte_padrao, $assinatura_2_funcao);

// HEADER PARA FORÇAR O DOWNLAOD DA IMAGEM
$nome_curso = strtolower ($nome_aluno_limpo);
$nome_curso = str_replace (' ','_',$nome_curso);
$nome_curso = str_replace ('.','',$nome_curso);
$nome_curso = $nome_curso.'.jpeg';
header('Content-Disposition: attachment; filename="'.$nome_curso.'"');
header("Content-Type: application/force-download");

// GERA A IMAGEM PARA DOWNLOAD
imagejpeg($jpg_image);

// LIMPA A MEMÓRIA
imagedestroy($jpg_image);
?> 
