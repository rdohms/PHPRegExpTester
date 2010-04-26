<?php
namespace RET;


class Validator
{

	public static function validateRegExp($regexp)
	{
		
		$res = preg_match("/^\/.*\/[imsxeADSUXJu]*$/", $regexp, $matches);
		
		if ($res < 1 || $res == false) {
			return "/".$regexp."/";
		}
		
		return $regexp;
	}

}