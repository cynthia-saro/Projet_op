<?php
	function getEnglishDate($date){
		$membres = explode('/', $date);
		$date = $membres[2].'-'.$membres[1].'-'.$membres[0];
		return $date;
	}

	//Retourne par exemple : '01/06/2018'
    function getFrenchDate($date){
	    //2018-04-06 09:48:06
        $date= explode(' ',$date);
		$membres = explode('-', $date[0]);
		$date = $membres[2].'/'.$membres[1].'/'.$membres[0];
		return $date;
	}
