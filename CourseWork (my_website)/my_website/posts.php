<?php

include ("api/api.inc.php");

$postsFile = 'posts.json';
//Function to save posts to JSON file
function savePosts($posts) {
    global $postsFile;
    $postsData = json_encode($posts);
    file_put_contents($postsFile, $postsData);
}
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPost = $_POST['newPost'];
    
    // Load existing posts
    $posts = loadPosts();
    
    // Create a new post object
    $post = [
        'id' => uniqid(),
        'text' => $newPost,
        'timestamp' => time()
    ];
    
    // Add the new post to the posts array
    $posts['posts'][] = $post;
    
    // Save the updated posts
    savePosts($posts);
}

// Function to load posts from JSON file
function loadPosts() {
    global $postsFile;
    $postsData = file_get_contents($postsFile);
    return json_decode($postsData, true);
}



// Function to display latest posts
function displayLatestPosts() {
    // Load existing posts
    $posts = loadPosts();
    
    // Check if there are any posts
    if (!empty($posts['posts'])) {
        echo '<div class="container">';
        echo '<h2>Latest Posts</h2>';
        foreach ($posts['posts'] as $post) {
            echo '<div class="panel panel-default">';
            echo '<div class="panel-body">';
            echo $post['text'];
            echo '</div>';
            echo '<div class="panel-footer">';
            echo date('Y-m-d H:i:s', $post['timestamp']);
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<div class="container">';
        echo '<h2>Latest Posts</h2>';
        echo 'No posts found.';
        echo '</div>';
    }
}


// ----PAGE GENERATION LOGIC---------------------------
function createPage()
{
   
    $tcontent = <<<PAGE
    <div class="container">
        <h2>Write the new post</h2>
        <form method="POST">
            <div class="form-group">
                <label for="newPost">New post:</label>
                <input type="text" class="form-control" id="newPost" name="newPost" placeholder="Enter a post">
            </div>
            <button type="submit" class="btn btn-default">Post</button>    
        </form>
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
$tindexpage->setDynamic2(displayLatestPosts());
$tindexpage->renderPage();




   
  ?>
    

    
</body>
</html>
