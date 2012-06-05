<?php
/**
 * @file
 * Show_single_recipe.php
 * 
 * This file is loaded by customers.php and is used to display the edit scaffold
 * to manage a single entry in the users table. This includes the possiblity
 * for multiple recipe' to be held by a single member.
 *
 * This file also handles $_POST data, updating the database when appropriate.
 *
 * Available values:
 * $_GET['id'] : [int] : unclean user_id to be shown. <-- Must sanatize.
 */

$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT); // Sanatize.

// Handle $_POST data. Sanatize, and update the database.
if(isset($_POST['user_id'])) {
    
    // SANATIZE values posted from the form (created below).
    $args = array(
        'user_id'   => FILTER_SANITIZE_NUMBER_INT,
        'recipe_type_array' => array(
                                 'filter' => FILTER_SANITIZE_STRING,
                                 'flags'  => FILTER_REQUIRE_ARRAY,
                                )
    );
    
    // Pull clean variables from the post array.
    $post = filter_input_array(INPUT_POST, $args);
    // extract sanatized ID
    $id = $post['user_id'];
    
    //remove all existing recipe' for this member.
    $sql = "DELETE FROM users_recipes WHERE user_id = '".$id."';";
    mysql_query($sql);
    
    // Insert new recipe'
    foreach ($post['recipe_type_array'] as $users_recipes){
      if($users_recipes['recipe_type'] !== "delete"){
        $sql = "
        INSERT INTO users_recipes (recipe_id, recipe_number, recipe_name, recipe_description, recipe_tags, recipe_ingredients, recipe_preparation, recipe_comment,recipe_photo_1, user_id)
        VALUES
        (
        '".$users_recipes['recipe_id']."',
        '".$users_recipes['recipe_number']."',
        '".$users_recipes['recipe_name']."',
        '".$users_recipes['recipe_description']."',
        '".$users_recipes['recipe_tags']."',
        '".$users_recipes['recipe_ingredients']."',
		'".$users_recipes['recipe_preparation']."',
        '".$users_recipes['recipe_comment']."',
        '".$users_recipes['recipe_photo_1']."',
        '".$post['user_id']."'
        );";
      mysql_query($sql);
      }
    }
    // Kill the ID from the clean post as we will be looping
    unset($post['user_id'], $post['recipe_type_array']);
    
    // Build UPDATE query keys and values.
    foreach ($post as $key=>$value){
        $what_to_update[] = $key."='".$value."'"; 
    }
    
    // Write query.
    $sql =  "UPDATE users_recipes
                SET ".join(", " ,$what_to_update)."
                WHERE user_id = '".$id."';";
                
    // Execute query.
    mysql_query($sql);
}
// END POST data handeling.

// SHOW the form containing a single recipe and all associated recipe items'.
$sql = "
    SELECT m.user_id,
       m.recipe_id,
       m.recipe_number,
       m.recipe_name, 
       m.recipe_description,
       m.recipe_tags,
       m.recipe_ingredients,
       m.recipe_preparation,
	   m.recipe_comment,
	   recipe_photo_1,
       FROM users AS m
       LEFT JOIN users_recipes AS ma
       ON m.user_id = ma.user_id 
    WHERE m.user_id =  '".$id."' ORDER BY ma.recipe_id;";
    
DB::query($sql);

// Restructure the query result as an array containing structured (loopable recipe')
while($row = DB::fetch_assoc()) {
  $member['recipe_id'] = $row['recipe_id'];
  $member['recipe_number'] = $row['recipe_number'];
  $member['recipe_name'] = $row['recipe_name'];
  $member['recipe_description'] = $row['recipe_description'];
  $member['recipe_tags'] = $row['recipe_tags'];
  $member['recipe_ingredients'] = $row['recipe_ingredients'];
  $member['recipe_preparation'] = $row['recipe_preparation'];
  $member['recipe_comment'] = $row['recipe_comment'];  
  $member['recipe_photo_1'] = $row['recipe_photo_1'];  
  $member['user_id'] = $row['user_id'];
  $member['email'] = $row['email'];
  // There may be multiple recipe'.
  $member['addr'][$row['recipe_id']] = array(
                            "recipe" =>  $row['recipe'],
                            "city" => $row['city'],
                            "postcode" => $row['postcode'],
                            "firstname" => $row['recipient_firstname'],
                            "lastname" => $row['recipient_lastname'],
                            "recipe_type" => $row['recipe_type']
                            );
}// End controller portion.
?>
<script type="text/javascript">
jQuery(function($){
    $('#add_new_recipe').click(function(e){
      e.preventDefault;
      var $templates = $('.recipe_template')
          , $last = $templates.last()
          , $template = $last.clone()
          , count =   ($templates.size() +1);
      $template.find('.count').html(count);
      // kill all values for new recipe, and replace all numbers with new count.
      var new_template = $template.html().replace(/recipe_type_array\[\d]/g, "recipe_type_array["+count+"]").replace(/value=".*?"/g,'value=""'); 
      $('<table class="recipe_template">' + new_template + '</table>').appendTo('#recipe_section');
    return false;
  });
    
    function printMessage(classname, message){
      return '<div class="' + classname + '">' + message + '</div>';
    }
    function validate(focus) {
      focus = typeof focus !== 'undefined' ? focus : true;
      
      var return_me = true
      ,   $allEmptyInputs = $('.notempty')
      ,   $allSelectBoxes = $('.notfirst');
      $allSelectBoxes.each(function(i, obj){
                            $this = $(obj);
                            if($this.val() !== 'xx'){
                              $this
                                .off('change',validate)
                                .removeClass('revalidate');
                              $allSelectBoxes = $allSelectBoxes.not($this);
                            }else{
                              $this
                                .on('change',function(){validate(false);})
                                .addClass('revalidate');
                              return_me = false;
                            }
                          });
      $allEmptyInputs.each(function(i, obj){
                            $this = $(obj);
                            if($this.val() !== ''){
                              $this
                                .off('change',validate)
                                .removeClass('revalidate');
                              $allEmptyInputs = $allEmptyInputs.not($this);
                            }else{
                              $this
                                .on('change',function(){validate(false);})
                                .addClass('revalidate');
                              return_me = false;
                            }
                          });
      
      console.log($allSelectBoxes.size());
      if(focus) {
        $('.revalidate').first().focus();
      }
      return return_me;
    }
    //form validation:
    $('#customer_edit_form').bind('submit', validate);
});
</script>
<!-- Begin View -->
<h2>Edit Customer Information</h2>
<h3><?php echo $row["username"];?> </h3>
<p>You are now editing this customers information. All changes made
here are FINAL and not recoverable without database restoration.</p>
<form action="/admin/customers.php?id=<?php echo $member["user_id"]; ?>" method="post" name="customer_edit_form" id="customer_edit_form">
<table>
  <tr><td>Member ID:</td><td><?php echo $member["user_id"]; ?></td></tr>
  <tr><td>Username:</td><td><?php echo $member["username"]; ?></td></tr>
  <tr><td>Date Added:</td><td><?php echo $member["date_added"]; ?></td></tr>    
  <tr><td>First Name:</td><td><input type="text" name="firstname" class="notempty" value="<?php echo $member['firstname'];?>"/></td></tr>
  <tr><td>Last Name:</td><td><input type="text" name="lastname" class="notempty" value="<?php echo $member['lastname'];?>"/></td></tr>
  <tr><td class="password_field">Change Password:</td><td><input type="text" class="notempty" name="password" value="<?php echo $member["password"]; ?>"/></td></tr>
  <tr><td>Phone:</td><td><input type="text" name="phone" class="notempty" value="<?php echo $member["phone"]; ?>"/></td></tr>
  <tr><td>Email:</td><td><input type="text" name="email" class="notempty email" value="<?php echo $member["email"]; ?>"/></td></tr>
</table>
<h3>List of recipe' on-file for <?php echo $member["username"]; ?>:</h3>
<p><a href="#" id="add_new_recipe">Add New recipe</a></p>
<div id="recipe_section">
<?php $i=1;foreach ($member['addr'] as $recipe_type_array):?>
<table class="recipe_template">
<tr>
  <td colspan="2">
    <h4>recipe <span class="count"><?php echo $i;?></span></h4>
  </td>
</tr>
  <tr><td>recipe Type:</td>
    <td>
      <select name="recipe_type_array[<?php echo $i;?>][recipe_type]" class="notfirst">
      <option value="xx">Select One</option>
      <option value="billing" <?php echo ($recipe_type_array["recipe_type"]=="billing" ? 'selected' : ''); ?>>Billing</option>
      <option value="shipping" <?php echo ($recipe_type_array["recipe_type"]=="shipping" ? 'selected' : ''); ?>>Shipping</option>
      <option value="other" <?php echo ($recipe_type_array["recipe_type"]=="other" ? 'selected' : ''); ?>>Other</option>
      <option value="delete">Delete This recipe</option>
      </select>
    </td>
  </tr>
  <tr><td>Recipient First Name:</td><td><input type="text" name="recipe_type_array[<?php echo $i; ?>][firstname]" value="<?php echo (isset($recipe_type_array["firstname"]) ? $recipe_type_array["firstname"] : ''); ?>" class="notempty"/> </td></tr>
  <tr><td>Recipient Last Name:</td><td><input type="text" name="recipe_type_array[<?php echo $i; ?>][lastname]" value="<?php echo (isset($recipe_type_array["lastname"]) ? $recipe_type_array["lastname"] : ''); ?>" class="notempty"/> </td></tr>
  <tr><td>recipe:</td><td><input type="text" name="recipe_type_array[<?php echo $i; ?>][recipe]" value="<?php echo (isset($recipe_type_array["recipe"]) ? $recipe_type_array["recipe"] : ''); ?>" class="notempty"/> </td></tr>
  <tr><td>City:</td><td><input type="text" name="recipe_type_array[<?php echo $i;?>][city]" value="<?php echo (isset($recipe_type_array["city"]) ? $recipe_type_array["city"] : ''); ?>" class="notempty"/></td></tr>
  <tr><td>Postal Code:</td><td><input type="text" name="recipe_type_array[<?php echo $i;?>][postcode]" value="<?php echo (isset($recipe_type_array["postcode"]) ? $recipe_type_array["postcode"] : ''); ?>" class="notempty"/></td></tr>
</table>
<?php $i++; endforeach;?>
</div>
<table style="width:100%;">
  <tr><td colspan="2"><input type="submit" value="Update Member" name="submit"/></td></tr>
</table>
<input type="hidden" name="user_id" value="<?php echo $member["user_id"]; ?>"/>
</form>
