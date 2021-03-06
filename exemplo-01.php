<?php 

/*
* Seção 9, Aula 46 -> Herança
 */

class Documento{
	private $numero;

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($n){
		$this->numero = $n;
	}

	public function __destruct(){
		echo "<br/>"."Objeto destruido!"."<br/>";
	}

}


class CPF extends Documento{
	//Incio: Validar CPF
	public function validar():bool
	{
		$cpf = $this->getNumero();

		if(empty($cpf)){
	        return false;
	    }

	    $cpf = preg_match('/[0-9]/', $cpf)?$cpf:0;

	    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	    if (strlen($cpf) != 11) 
	    {
		    echo "Tamanho de ";
		    return false;

	    } else if ($cpf == '00000000000' ||
	        $cpf == '11111111111' ||
	        $cpf == '22222222222' ||
	        $cpf == '33333333333' ||
	        $cpf == '44444444444' ||
	        $cpf == '55555555555' ||
	        $cpf == '66666666666' ||
	        $cpf == '77777777777' ||
	        $cpf == '88888888888' ||
	        $cpf == '99999999999')
	    {
	        return false;

	     } else
	     {
	        for ($t = 9; $t < 11; $t++)
	        {
	            for ($d = 0, $c = 0; $c < $t; $c++)
	            {
	                $d += $cpf{$c} * (($t + 1) - $c);
	            }

	            $d = ((10 * $d) % 11) % 10;

	            if ($cpf{$c} != $d)
	            {
	                return false;
	            }
	        }
	        return true;
	    }
	}
	//Termino: Validar CPF
}

/*
* Feito um require_once e o bloco abaixo está sendo executado no exempl-02.php
 */

// $doc = new CPF();
// echo $doc->setNumero("98765432198"); // Entra (pega) Dados (Imput)
// echo $doc->getNumero();              // Sai Dados (OutPut)
// echo "<br/>";

// if ($doc->validar()) {
// 	echo "CPF Válido";
// } else {
// 	echo "CPF Inválido";
// }

 ?>