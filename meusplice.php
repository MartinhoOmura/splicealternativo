<html>
<head>
	<title></title>
	<meta charset="utf-8" >
</head>
<body>
<?php

	$array = array("vermelho", "verde", "azul", "amarelo");
	echo "Original:";
	var_dump($array);
	echo "<br>";

	echo "Retorna Array com a quantidade passada a partir do inicio";
	var_dump(meuSplice($array, 2));
	echo "<br>";

	echo "Retorna Array com a quantidade passada a partir do inicio e apartir do fim";
	var_dump(meuSplice($array, 1, -1));
	echo "<br>";

	echo "Retorna Array com a quantidade passada a partir do inicio mais o item adicionado";
	var_dump(meuSplice($array, 2, count($array), "laranja"));
	echo "<br>";

	echo "Retorna Array com  a mescla dos 2 arrays e tirando uma quantidade de itens passados por parametro";
	var_dump(meuSplice($array, -2, 1, array("preto", "marrom")));
	echo "<br>";

	echo "Retorna Array com a string inserida na posição escolhida";
	var_dump(meuSplice($array, 3, 0, "roxo"));
	echo "<br>";


	function meuSplice($array, $ini=0, $fim=0, $add=null){
		$array2[]="";
		if($ini>0 && $fim==0 && $add==null){
			for ($i=0; $i<$ini; $i++) { 
				$array2[$i] = $array[$i];
			}
		}
		if($ini>0 && $fim<=0 && $add==null){
			for ($i=0; $i<$ini; $i++) { 
				$array2[$i] = $array[$i];
			}
			for ($i=posicaoDoNegativa($array, $fim); $i<count($array); $i++) { 
				$array2[] = $array[$i];
			}
		}
		if($ini>0 && $fim==count($array) && $add!=(is_array($add))){
			for ($i=0; $i<$ini; $i++) { 
				$array2[$i] = $array[$i];
			}
			$array2[] = $add;
		}
		if($ini<0 && $fim>0 && is_array($add)){
			$array2 = [];
			$tamanho = (count($array) + count($add)) - ($fim + 1); 
			for ($i=0; $i<$tamanho; $i++) { 
				$array2[] = $array[$i];
				if( $i == (posicaoDoNegativa($array, $ini) -1)){
					for ($j=0; $j<=$fim; $j++) { 
						$array2[] = $add[$j];
					}
					$i+=$fim;
				}
			}
		}
		if($ini>0 && $fim==0 && $add!=(is_array($add))){
			$array2 = [];
			for ($i=0; $i<count($array); $i++) { 
				if( $i == $ini){
					$array2[] = $add;
				}
				$array2[] = $array[$i];
			}
		}
		return $array2;
	}

	function posicaoDoNegativa($array, $posi){
		$posi = $posi * -1;
		return count($array) - $posi; 	
	} 



?>
</body>
</html>