<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Formatter
 *
 * @author rdohms
 */
class Formatter {

    public static function arrayToTree($array)
    {
        $tree = "";
        
        foreach($array as $key => $item) {
            if (is_array($item)) {
                $item = Formatter::arrayToTree($item);
            }

            $tree .= "[".$key."] ".$item . PHP_EOL;

        }

        return $tree;
    }

}
?>
