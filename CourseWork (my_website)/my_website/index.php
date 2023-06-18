<?php
// ----INCLUDE APIS------------------------------------
// Include our Website API
include ("api/api.inc.php");

// ----PAGE GENERATION LOGIC---------------------------
function createPage()
{
    $tgif = file_get_contents("data/static/index_GIF.part.html");
   
    
    $tcontent = <<<PAGE
    
              	<div>
               {$tgif}
				</div>

     <div id= "wrapper">
	
	<!--we add our main code in here  -->
   <div class="container">
        <h2>Write a new post</h2>
        <form method="POST">
            <div class="form-group">
                <label for="newPost">New post:</label>
                <input type="text" class="form-control" id="newPost" name="newPost" placeholder="Enter new post">
            </div>
            <button type="submit" class="btn btn-default">Post</button>
            
            
        </form>
    </div>


  
    
	
         
</div>
	

PAGE;
    return $tcontent;
}
    
// ----BUSINESS LOGIC---------------------------------
$tpagecontent = createPage();

// ----BUILD OUR HTML PAGE----------------------------
// Create an instance of our Page class
$tindexpage = new MasterPage("Home Page");
$tindexpage->setDynamic1($tpagecontent);

$tindexpage->renderPage();

?>
   
    