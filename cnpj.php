<form>
	Digite um CNPJ:
	<input type="text" name="cnpj">
	<input type="submit" value="Ok">
</form>


<?php

$cnpj = $_GET["cnpj"]; // Pegando Valor digitado

/*
if ($cnpj == ''){
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cnpj.php'>";
}
*/

//Inicio: Destruindo um objeto da memória, caso exista.
unset($json_str);
unset($jsonObj);
unset($atividadePrincipal);
unset($atividadeSecundaria);
unset($qsa);
//Término: Destruindo um objeto da memória, caso exista.

//Incio: Intanciando e acessando URL e populando os Arrays
$json_str            = file_get_contents("https://www.receitaws.com.br/v1/cnpj/$cnpj");
$jsonObj             = json_decode($json_str);
$atividadePrincipal  = $jsonObj->atividade_principal;
$atividadeSecundaria = $jsonObj->atividades_secundarias;
$qsa                 = $jsonObj->qsa;
//Término: Intanciando e acessando URL e populando os Arrays

//Inicio: Mostrando na tela o resultado do arquivo JSON
echo "nome          : "."<b> $jsonObj->nome     </b>"."<br/>";
echo "CNPJ:         : "."<b> $jsonObj->cnpj     </b>"."<br/>";
echo "fantasia      : "."<b> $jsonObj->fantasia </b>"."<br/>";

echo "<br/>"."=====[Atividade Principal]================="."<br/>";
foreach ($atividadePrincipal as $princial) {
	echo "Atividade Principal : "."<b>$princial->text</b>"."<br/>";
	echo "CNAE..................... : "."<b>$princial->code</b>"."<br/>";

}

echo "<br/>"."=====[Atividades Secundárias]================="."<br/>";
foreach ($atividadeSecundaria as $secundaria) {
	echo "Atividade Secundária : "."<b>$secundaria->text</b>"."<br/>";
	echo "CNAE..................... : "."<b>$secundaria->code</b>"."<br/>";
}

echo "<br/>"."=====[Sócios]================="."<br/>";
foreach ($qsa as $socio) {
	echo "Sócio : "."<b>$socio->qual</b>"."<br/>";
	echo "Nome..................... : "."<b>$socio->nome</b>"."<br/>";
}

echo "<br/>"."=====[Outras Informações]================="."<br/>";
echo "Data Situação        : "."<b> $jsonObj->data_situacao      </b>"."<br/>";
echo "cep                  : "."<b> $jsonObj->cep                </b>"."<br/>";
echo "logradouro           : "."<b> $jsonObj->logradouro         </b>"."<br/>";
echo "numero               : "."<b> $jsonObj->numero             </b>"."<br/>";
echo "complemento   	   : "."<b> $jsonObj->complemento        </b>"."<br/>";
echo "municipio            : "."<b> $jsonObj->municipio          </b>"."<br/>";
echo "bairro               : "."<b> $jsonObj->bairro             </b>"."<br/>";
echo "uf                   : "."<b> $jsonObj->uf                 </b>"."<br/>";
echo "telefone             : "."<b> $jsonObj->telefone           </b>"."<br/>";
echo "email                : "."<b> $jsonObj->email              </b>"."<br/>";
echo "situacao             : "."<b> $jsonObj->situacao           </b>"."<br/>";
echo "abertura             : "."<b> $jsonObj->abertura           </b>"."<br/>";
echo "natureza_juridica    : "."<b> $jsonObj->natureza_juridica  </b>"."<br/>";
echo "ultima_atualizacao   : "."<b> $jsonObj->ultima_atualizacao </b>"."<br/>";
echo "status               : "."<b> $jsonObj->status             </b>"."<br/>";
echo "tipo                 : "."<b> $jsonObj->tipo               </b>"."<br/>";
//Término: Mostrando na tela o resultado do arquivo JSON

 ?>