<?php
namespace RET;

include("libs/RegExpHandler.php");
include("libs/Formatter.php");
include("libs/Validator.php");

/**
* Main Class, base for application functions.
*
* @package Core
* @author Rafael Dohms
*/
class Core
{
	/**
	 * Instantiates and adds onLoad events using jquery php wrapper
	 *
	 * @param jQuery $jQuery
	 */
	public static function loadJqueryInteractions($jQuery)
	{
		
		  $jQuery()->ready( function () use (&$jQuery) {

			$jQuery('#invokePHP')->live('click', function () use (&$jQuery) {

				try{
					$handler = new RegExpHandler( $jQuery('#rg')->val(), $jQuery('#tt')->val());
					$handler->process();

					// Handle preg_match results
					$pmr = $handler->getPmMatches();
					if ($pmr['count'] > 0){
						$jQuery('#p_match_dump')->html('<p class="rtype">Expression matches</p>');
						$jQuery('#p_match_dump')->append('<p class="rvalue">'.nl2br($pmr['expr']).'</p>');
						$jQuery('#p_match_dump')->append('<p class="rtype">Parenthesis matches</p>');
						$jQuery('#p_match_dump')->append('<p class="rvalue">'.nl2br($pmr['mtch']).'</p>');
			    	} else {
						$jQuery('#p_match_dump')->html('<p class="rvalue">No results</p>');
					}
					//Handle preg_match_all results
					$pmra = $handler->getPmaMatches();
					if ($pmra['count'] > 0) {
						$jQuery('#p_match_all_dump')->html('<p class="rtype">Expression matches</p>');
						$jQuery('#p_match_all_dump')->append('<p class="rvalue">'.nl2br($pmra['expr']).'</p>');
						$jQuery('#p_match_all_dump')->append('<p class="rtype">Parenthesis matches</p>');
						$jQuery('#p_match_all_dump')->append('<p class="rvalue">'.nl2br($pmra['mtch']).'</p>');
					} else {
						$jQuery('#p_match_all_dump')->html('<p class="rvalue">No results</p>');
					}
				} catch (\Exception $e) {
					//TODO Catch Warnings from PHP
					$jQuery('#invalidRegexp')->center();
					$jQuery('#invalidRegexp')->show();
				}
			} );

		  } );
		
	}
	
}

?>