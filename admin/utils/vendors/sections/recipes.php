<?php

$one = 1;
$two = 2;
$three = 3;
$four = 4;
$five = 5;

?>

  <h2 style="text-align:center">RECIPES</h2>
       
      
  <!-- Nested Tabs! -->
  <ul>
    <li><a href="#nested-1"><span>One</span></a></li>
    <li><a href="#nested-2"><span>Two</span></a></li>
    <li><a href="#nested-3"><span>Three</span></a></li>
    <li><a href="#nested-4"><span>Four</span></a></li>
    <li><a href="#nested-5"><span>Five</span></a></li>
  </ul>
  
      <div id="nested-1">
			<?php require_once('recipes/recipe_1.php'); ?>
      </div>
      
      <div id="nested-2">
			<?php //require_once('recipes/recipe_2.php'); ?>
      </div>
      
      <div id="nested-3">
			<?php //require_once('recipes/recipe_3.php'); ?>
      </div>
      
      <div id="nested-4">
			<?php //require_once('recipes/recipe_4.php'); ?>
      </div>
      
      <div id="nested-5">
			<?php //require_once('recipes/recipe_5.php'); ?>
      </div>
      
    <!-- End Nested Tabs -->
    
        <script type="text/javascript">
                                    //<![CDATA[
                    
                                    // This call can be placed at any point after the
                                    // <textarea>, or inside a <head><script> in a
                                    // window.onload event handler.
                    
                                    // Replace the <textarea id="editor"> with an CKEditor
                                    // instance, using default configurations.
                                   
                                    //CKEDITOR.replace( 'usersRecipe_name' );
                    
                                    //]]>
             </script>