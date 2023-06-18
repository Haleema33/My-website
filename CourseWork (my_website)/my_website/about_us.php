<?php
// ----INCLUDE APIS------------------------------------
// Include our Website API
include ("api/api.inc.php");

// ----PAGE GENERATION LOGIC---------------------------
function createPage()
{
    //Page-Specific Static Content
    $taboutus = file_get_contents("data/static/index_about_us.part.html");
    
    $tcontent = <<<PAGE

 
           <div id="main">
			<main>
			<article id="a1">
				
				<div>
               {$taboutus}
				</div>
                        <a class="btn btn-info" href="profile.php">Find out More</a>
			</article>
            </main>
            </div>
 
 
            

PAGE;
    return $tcontent;
}

// ----BUSINESS LOGIC---------------------------------
$tpagecontent = createPage();

// ----BUILD OUR HTML PAGE----------------------------
// Create an instance of our Page class
$tindexpage = new MasterPage("About_us Page");
$tindexpage->setDynamic1($tpagecontent);
$tindexpage->renderPage();

?>