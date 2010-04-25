<?php
namespace RET;

/**
 * Formats the output of regular expression runs
 *
 * @package Core
 * @author Rafael Dohms
 */
class Formatter {

	/**
	 * Convert and array to a string representation in tree format
	 *
	 * @param string $array 
	 * @return string
	 */
    public static function arrayToTree($array)
    {
        $tree = "";
        
        foreach($array as $key => $item) {
            if (is_array($item)) {
                $item = Formatter::arrayToTree($item);
            }

            $tree .= "[".$key."] ". self::sanitize($item) . PHP_EOL;

        }

        return $tree;
    }

	public static function sanitize($string)
	{
		return htmlentities($string);
	}

}
?>
