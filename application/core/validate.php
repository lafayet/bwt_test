<?php

class Validate
{
	public static function isNameValid($name)
	{
		$len = strlen($name);
		if (($len >= 3) and ($len <= 20))
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
}