<?php
namespace RET;

include("libs/RegExpHandler.php");
include("libs/Formatter.php");

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

				$handler = new RegExpHandler( $jQuery('#rg')->val(), $jQuery('#tt')->val());
				$handler->process();

				// Handle preg_match results
				$pmr = $handler->getPmMatches();
				$jQuery('#p_match_dump')->html('<p class="rtype">Expression matches</p>');
				$jQuery('#p_match_dump')->append('<p class="rvalue">'.nl2br($pmr['expr']).'</p>');
				$jQuery('#p_match_dump')->append('<p class="rtype">Parenthesis matches</p>');
				$jQuery('#p_match_dump')->append('<p class="rvalue">'.nl2br($pmr['mtch']).'</p>');
				
				//Handle preg_match_all results
				$pmra = $handler->getPmaMatches();
				$jQuery('#p_match_all_dump')->html('<p class="rtype">Expression matches</p>');
				$jQuery('#p_match_all_dump')->append('<p class="rvalue">'.nl2br($pmra['expr']).'</p>');
				$jQuery('#p_match_all_dump')->append('<p class="rtype">Parenthesis matches</p>');
				$jQuery('#p_match_all_dump')->append('<p class="rvalue">'.nl2br($pmra['mtch']).'</p>');

			} );

		  } );
		
	}
	
}

?>