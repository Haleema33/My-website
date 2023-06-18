<?php

class BLLCoaching
{
    //-------CLASS FIELDS------------------
    public $id = null;
    public $Bname;
    public $Aname;
    public $Summary;
    public $href;
    
    public function fromArray(stdClass $passoc)
    {
        foreach($passoc as $tkey => $tvalue)
        {
            $this->{$tkey} = $tvalue;
        }
    }
    
  
    
}












?>