<?php 
require_once("fn_pl.inc.php");
require_once("oo_pl.inc.php");
require_once("oo_bll.inc.php");


function jsonOne($pfile,$pid)
{
    $tsplfile = new SplFileObject($pfile);
    $tsplfile->seek($pid-1);
    $tdata = json_decode($tsplfile->current());
    return $tdata;
}

function jsonAll($pfile)
{
    $tentries = file($pfile);
    $tarray = [];
    foreach($tentries as $tentry)
    {
        $tarray[] = json_decode($tentry);
    }
    return $tarray;
}
function jsonNextID($pfile)
{
    $tsplfile = new SplFileObject($pfile);
    $tsplfile->seek(PHP_INT_MAX);
    return $tsplfile->key() + 1;
}

//---------ID GENERATION FUNCTIONS-------------------------------------------------------

function jsonNextPlayerID()
{
    return jsonNextID("data/json/players.json");}


function jsonLoadOneCoaching($pid) : BLLCoaching
{
    $tcoach = new BLLCoaching();
    $tcoach->fromArray(jsonOne("data/json/Books.json",$pid));
    return $tcoach;
}

function jsonLoadAllCoaching() : array
{
    $tarray = jsonAll("data/json/Books.json");
    return array_map(function($a){ $tc = new BLLCoaching(); $tc->fromArray($a); return $tc; },$tarray);
}

function appFormMethodIsPost()
{
    return strtolower($_SERVER['REQUEST_METHOD']) == 'post';
}

/////////////////////////////////
// Function to get the Form
// Action to Self-Submit.
/////////////////////////////////
function appFormActionSelf()
{
    return htmlspecialchars($_SERVER['PHP_SELF']);
}

/////////////////////////////////
// Function to get the Form
// Method.
/////////////////////////////////
function appFormMethod($pmethoddefault = true)
{
    return $pmethoddefault ? "POST" : "GET";
}






?>