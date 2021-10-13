<?php
	function formataData($data){
        //quebra a variável $data em pedaços, em um array
        $parte = explode('-',$data);
        return $parte[2] . '/' . $parte[1] . '/' . $parte[0];
    }
?>