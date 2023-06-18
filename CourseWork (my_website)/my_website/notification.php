<?php
// ----INCLUDE APIS------------------------------------
// Include our Website API
include ("api/api.inc.php");

// ----PAGE GENERATION LOGIC---------------------------
function createPage()
{
    
   
    
    $tcontent = <<<PAGE
           <div id= "wrapper">
	
	<!--we add our main code in here  -->
     <h2> hello this is notification page.</h2>

 <


</div>
PAGE;
    return $tcontent;
}

// ----BUSINESS LOGIC---------------------------------
$tpagecontent = createPage();


// ----BUILD OUR HTML PAGE----------------------------
// Create an instance of our Page class
$tindexpage = new MasterPage("Notification Page");
$tindexpage->setDynamic1($tpagecontent);
$tindexpage->renderPage();

?>