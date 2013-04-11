
<?
function reg_check(){

	
	$hibak = array();
	if(strlen('$_POST[reg_surname]') < 3)
	{
		$hibak['reg_surname'] = 'A családnév legalább 4 betűs legyen, kitöltése pedig kötelező';
	} 
	else if (!ereg('^[a-zA-ZáéíóöüóűÁÉÍÓÖÜŐŰ]', '$_POST[reg_surname]')) 
		{
			$hibak['reg_surname'] = 'A családnévben csak a magyar ábécé kis - és nagybetűi engedélyezettek';
		} 

	if(strlen($adatok['reg_first_name']) < 3)
	{
		$hibak['reg_first_name'] = 'A keresztnév legalább 4 betűs legyen, kitöltése pedig kötelező';
	}
	else if (!ereg('^[a-zA-ZáéíóöüóűÁÉÍÓÖÜŐŰ]', $adatok['registration_first_name' ]))
		{
			$hibak['reg_first_name'] = 'A keresztnévben csak a magyar ábécé kis - és nagybetűi engedélyezettek';
		}
		
	if ($adatok['email'] == (!eregi('^[_\.0-9a-z-]+@([0-9az][0-9a-z-]+\.)+[a-z]{2,6}$',$adatok['email']))) 
		{
			$hibak['email'] = 'Hibás e-mail cím';
		}

		
	if (strlen($adatok['your_password']) < 4)
		{
			$hibak['your_password'] = 'A jelszonak legalabb 5 karakterbol kell allnia, es kitoltese kotelezo';
		}
		
	if (strlen($adatok['your_password2']) < 4)
		{
			$hibak['your_password2'] = 'A jelszonak legalabb 5 karakterbol kell allnia, es kitoltese kotelezo';
		}
		
	if(strlen($adatok['city']) < 3)
	{
		$hibak['city'] = 'A telepules neve legalább 4 betűs legyen, kitöltése pedig kötelező';
	}
	else if (!ereg('^[a-zA-ZáéíóöüóűÁÉÍÓÖÜŐŰ]', $adatok['registration_city' ]))
		{
			$hibak['city'] = 'A város nevében csak a magyar ábécé kis - és nagybetűi engedélyezettek';
		}

		
	if (!ereg('^[0-9]', $adatok['tel_nr' ]))
		{
			$hibak['tel_nr'] = 'Hibas telefonszam!';
		}

		
	if ($hibak)
		return $hibak;
	else
		return true;
}

?>