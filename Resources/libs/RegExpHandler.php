<?php
namespace RET;

/**
 * Regular Expression Processor, handles execution and results of regular expression runs
 *
 * @package Core
 * @author Rafael Dohms
 */
class RegExpHandler
{
    /**
     * @var string
     */
    private $regExp;

	/**
	 * @var string
	 */
    private $text;
    
	/**
	 * @var array
	 */
    private $pmMatches;

	/**
	 * @var array
	 */
    private $pmaMatches;
    
	/**
	 * Constructor
	 *
	 * @param string $regExp 
	 * @param string $text 
	 */
    public function __construct($regExp, $text)
    {
        $this->regExp = $regExp;
        $this->text = $text;
    }
    
	/**
	 * Executes regular expression
	 *
	 * @return void
	 */
    public function process()
    {
        $exec = preg_match($this->regExp, $this->text, $this->pmMatches);
        $exec = preg_match_all($this->regExp, $this->text, $this->pmaMatches);
    }

	/**
	 * Parses result of preg_match
	 *
	 * @return array
	 */
    public function getPmMatches() {
        
        $result['expr'] = Formatter::sanitize($this->pmMatches[0]);
        $result['mtch'] = Formatter::sanitize($this->pmMatches[1]);
        
        return $result;
    }

	/**
	 * Parses result of preg_match_all
	 *
	 * @return array
	 */
    public function getPmaMatches() {
        $result['expr'] = Formatter::arrayToTree($this->pmaMatches[0]);
        $result['mtch'] = Formatter::arrayToTree($this->pmaMatches[1]);

        return $result;
    }
        
}

?>