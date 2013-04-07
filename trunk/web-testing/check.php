
<?
function reg_check($adatok){
	$hibak = array();
	if(strlen($adatok['registration_surname']) < 3)
	{
		$hibak['registration_surname'] = 'A családnév legalább 4 betűs legyen, kitöltése pedig kötelező';
	} 
	else if (!ereg('^[a-zA-ZáéíóöüóűÁÉÍÓÖÜŐŰ]', $adatok['registration_surname' ])) 
		{
			$hibak['registration_surname'] = 'A családnévben csak a magyar ábécé kis - és nagybetűi engedélyezettek';
		} 
		else 
		{
			//mehet az adatbazisba
		}

	if(strlen($adatok['registration_first_name']) < 3)
	{
		$hibak['registration_first_name'] = 'A keresztnév legalább 4 betűs legyen, kitöltése pedig kötelező';
	}
	else if (!ereg('^[a-zA-ZáéíóöüóűÁÉÍÓÖÜŐŰ]', $adatok['registration_first_name' ]))
		{
			$hibak['registration_first_name'] = 'A keresztnévben csak a magyar ábécé kis - és nagybetűi engedélyezettek';
		}
		else
		{
			//mehet az adatbazisba
		}
		
	if ($adatok['email'] == (!eregi('^[_\.0-9a-z-]+@([0-9az][0-9a-z-]+\.)+[a-z]{2,6}$',$adatok['email']))) 
		{
			$hibak['email'] = 'Hibás e-mail cím';
		}
		else
		{
			//mehet az adatbazisba
		}
		
	if (strlen($adatok['your_password']) < 4)
		{
			$hibak['your_password'] = 'A jelszonak legalabb 5 karakterbol kell allnia, es kitoltese kotelezo';
		}
		else
		{
			//mehet az adatbazisba
		}
		
	if (strlen($adatok['your_password2']) < 4)
		{
			$hibak['your_password2'] = 'A jelszonak legalabb 5 karakterbol kell allnia, es kitoltese kotelezo';
		}
		else
		{
			//mehet az adatbazisba
		}
		
	if(strlen($adatok['registration_city']) < 3)
	{
		$hibak['registration_city'] = 'A telepules neve legalább 4 betűs legyen, kitöltése pedig kötelező';
	}
	else if (!ereg('^[a-zA-ZáéíóöüóűÁÉÍÓÖÜŐŰ]', $adatok['registration_city' ]))
		{
			$hibak['registration_city'] = 'A város nevében csak a magyar ábécé kis - és nagybetűi engedélyezettek';
		}
		else
		{
			//mehet az adatbazisba
		}
	if (!ereg('^[0-9]', $adatok['tel_nr' ]))
		{
			$hibak['tel_nr'] = 'Hibas telefonszam!';
		}
		else
		{
			//mehet az adatbazisba
		}
		
	if ($hibak)
		return $hibak;
	else
		return true;
	}
?>