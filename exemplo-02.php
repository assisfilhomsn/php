<?php

require_once("exemplo-01.php");

$doc = new CPF();
echo $doc->setNumero("98765432198"); // Entra (pega) Dados (Imput)
echo "<br/>";
echo $doc->getNumero();              // Sai Dados (OutPut)
echo "<br/>";

if ($doc->validar()) {
	echo "CPF Válido";
} else {
	echo "CPF Inválido";
}


 ?>