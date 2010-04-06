<?php

include("libs/Formatter.php");

class RegExpHandler
{
    
    private $regExp;
    private $text;
    
    private $rawOutput;
    private $pmMatches;
    private $pmaMatches;
    
    public function __construct($regExp, $text)
    {
        $this->regExp = $regExp;
        $this->text = $text;
    }
    
    public function process()
    {
        $exec = preg_match($this->regExp, $this->text, $this->pmMatches);
        $exec = preg_match_all($this->regExp, $this->text, $this->pmaMatches);
    }

    public function getPmMatches() {
        
        $result['expr'] = $this->pmMatches[0];
        $result['mtch'] = $this->pmMatches[1];
        
        return $result;
    }

    public function getPmaMatches() {
        $result['expr'] = Formatter::arrayToTree($this->pmaMatches[0]);
        $result['mtch'] = Formatter::arrayToTree($this->pmaMatches[1]);

        return $result;
    }
        
}

?>