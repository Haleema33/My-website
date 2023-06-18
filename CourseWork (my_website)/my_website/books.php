<?php
// ----INCLUDE APIS------------------------------------
// Include our Website API
include ("api/api.inc.php");

// ----PAGE GENERATION LOGIC---------------------------
function createPage()
{
   
   $tcoaches   = jsonLoadAllCoaching();
   $tcoachhtml     = renderCoachingTable($tcoaches);
    
    
  $tcontent = <<<PAGE
  /* <div id= "wrapper">
	
	<!--we add our main code in here  -->
     <h2> hello this is book page.</h2>



 
   <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Coaching Staff</h3>
        </div>
        <div class="panel-body">
        {$tcoachhtml}
        </div>
    </div>
			

</div>  
PAGE;
    return $tcontent;
}

// ----BUSINESS LOGIC---------------------------------
$tpagecontent = createPage();

// ----BUILD OUR HTML PAGE----------------------------
// Create an instance of our Page class
$tindexpage = new MasterPage("Books Page");
$tindexpage->setDynamic2($tpagecontent);
$tindexpage->renderPage();

?>