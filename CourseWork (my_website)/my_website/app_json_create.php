<?php 

function jsonCreateCoachesFormat($pfile)
{
    $tcoach = new BLLCoaching();
    $tcoach->id = 1;
    $tcoach->Bname = "";
    $tcoach->Aname = "";
    $tcoach->Summary = "";
    $tcoach->href = "";
    
    $tdata = json_encode($tcoach).PHP_EOL;
    file_put_contents($pfile,$tdata);
    return $tdata;
}





?>