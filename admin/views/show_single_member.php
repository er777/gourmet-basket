<?php
/**
 * @file
 * Show_single_member.php
 * 
 * This file is loaded by customers.php and is used to display the edit scaffold
 * to manage a single entry in the members table. This includes the possiblity
 * for multiple address' to be held by a single member.
 *
 * This file also handles $_POST data, updating the database when appropriate.
 *
 * Available values:
 * $_GET['id'] : [int] : unclean member_id to be shown. <-- Must sanatize.
 */

$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT); // Sanatize.

// Handle $_POST data. Sanatize, and update the database.
if(isset($_POST['member_id'])) {
    
    // SANATIZE values posted from the form (created below).
    $args = array(
        'member_id'   => FILTER_SANITIZE_NUMBER_INT,
        'firstname'   => FILTER_SANITIZE_STRING,
        'lastname'   => FILTER_SANITIZE_STRING,
        'email'   => FILTER_SANITIZE_EMAIL,
        'phone'   => FILTER_SANITIZE_STRING,
        'address_array' => array(
                                 'filter' => FILTER_SANITIZE_STRING,
                                 'flags'  => FILTER_REQUIRE_ARRAY,
                                )
    );
    
    // Pull clean variables from the post array.
    $post = filter_input_array(INPUT_POST, $args);
    // extract sanatized ID
    $id = $post['member_id'];
    
    //remove all existing address' for this member.
    $sql = "DELETE FROM members_address WHERE member_id = '".$id."';";
    mysql_query($sql);
    
    // Insert new address'
    foreach ($post['address_array'] as $members_address){
      if($members_address['address_type'] !== "delete"){
        $sql = "
        INSERT INTO members_address (firstname, lastname, address, postcode, city, address_type, member_id)
        VALUES
        (
        '".$members_address['firstname']."',
        '".$members_address['lastname']."',
        '".$members_address['address']."',
        '".$members_address['postcode']."',
        '".$members_address['city']."',
        '".$members_address['address_type']."',
        '".$post['member_id']."'
        );";
      mysql_query($sql);
      }
    }
    // Kill the ID from the clean post as we will be looping
    unset($post['member_id'], $post['address_array']);
    
    // Build UPDATE query keys and values.
    foreach ($post as $key=>$value){
        $what_to_update[] = $key."='".$value."'"; 
    }
    
    // Write query.
    $sql =  "UPDATE members
                SET ".join(", " ,$what_to_update)."
                WHERE member_id = '".$id."';";
                
    // Execute query.
    mysql_query($sql);
}
// END POST data handeling.

// SHOW the form containing a single member and all associated address'.
$sql = "
    SELECT m.member_id,
       m.firstname,
       m.lastname,
       ma.firstname as recipient_firstname,
       ma.lastname as recipient_lastname,
       m.email, 
       m.password,
       m.username,
       m.phone,
       m.date_added,
       ma.address,
       ma.city,
       ma.postcode,
       ma.address_type
       FROM members AS m
       LEFT JOIN members_address AS ma
       ON m.member_id = ma.member_id 
    WHERE m.member_id =  '".$id."' ORDER BY ma.address_id;";
    
DB::query($sql);

// Restructure the query result as an array containing structured (loopable address')
while($row = DB::fetch_assoc()) {
  $member['firstname'] = $row['firstname'];
  $member['lastname'] = $row['lastname'];
  $member['username'] = $row['username'];
  $member['date_added'] = $row['date_added'];
  $member['password'] = $row['password'];
  $member['phone'] = $row['phone'];
  $member['member_id'] = $row['member_id'];
  $member['email'] = $row['email'];
  // There may be multiple address'.
  $member['addr'][] = array(
                            "address" =>  $row['address'],
                            "city" => $row['city'],
                            "postcode" => $row['postcode'],
                            "firstname" => $row['recipient_firstname'],
                            "lastname" => $row['recipient_lastname'],
                            "address_type" => $row['address_type']
                            );
}// End controller portion.
?>
<script type="text/javascript">
jQuery(function($){
  
var count =   $('.address_template').size() + 1;
    $('#add_new_address').click(function(e){
      e.preventDefault;
      var address_tempalte = '<h4>Address '+count+' (new)</h4>'+
                              '<table class="address_template">'+
                              '<tr><td>Address Type:</td>'+
                                '<td>'+
                                  '<select name="address_array['+count+'][address_type]">'+
                                  '<option value="xx">Select One</option>'+
                                  '<option value="billing">Billing</option>'+
                                  '<option value="shipping">Shipping</option>'+
                                  '<option value="other">Other</option>'+
                                  '<option value="delete">Delete This Address</option>'+
                                  '</select>'+
                                '</td>'+
                              '</tr>'+
                              '<tr><td>Recipient First Name:</td><td><input type="text" name="address_array['+count+'][firstname]" value=""/> </td></tr>'+
                              '<tr><td>Recipient Last Name:</td><td><input type="text" name="address_array['+count+'][lastname]" value=""/> </td></tr>'+
                              '<tr><td>Address:</td><td><input type="text" name="address_array['+count+'][address]" value=""/> </td></tr>'+
                              '<tr><td>City:</td><td><input type="text" name="address_array['+count+'][city]" value=""/></td></tr>'+
                              '<tr><td>Postal Code:</td><td><input type="text" name="address_array['+count+'][postcode]" value=""/></td></tr>'+
                            '</table>';
    $('.address_template').last().after(address_tempalte);
    return false;
  });
});
</script>
<!-- Begin View -->
<h2>Edit Customer Information</h2>
<h3><?php echo $row["username"];?> </h3>
<p>You are now editing this customers information. All changes made
here are FINAL and not recoverable without database restoration.</p>
<form action="/admin/customers.php?id=<?php echo $member["member_id"]; ?>" method="post" name="customer_edit_form" id="customer_edit_form">
<table>
  <tr><td>Member ID:</td><td><?php echo $member["member_id"]; ?></td></tr>
  <tr><td>Username:</td><td><?php echo $member["username"]; ?></td></tr>
  <tr><td>Date Added:</td><td><?php echo $member["date_added"]; ?></td></tr>    
  <tr><td>First Name:</td><td><input type="text" name="firstname" value="<?php echo $member['firstname'];?>"/></td></tr>
  <tr><td>Last Name:</td><td><input type="text" name="lastname" value="<?php echo $member['lastname'];?>"/></td></tr>
  <tr><td class="password_field">Change Password:</td><td><input type="text" name="password" value="<?php echo $member["password"]; ?>"/></td></tr>
  <tr><td>Phone:</td><td><input type="text" name="phone" value="<?php echo $member["phone"]; ?>"/></td></tr>
  <tr><td>Email:</td><td><input type="text" name="email" value="<?php echo $member["email"]; ?>"/></td></tr>
</table>
<h3>List of Address' on-file for <?php echo $member["username"]; ?>:</h3>
<p><a href="#" id="add_new_address">Add New Address</a></p>
<?php $i=1;foreach ($member['addr'] as $address_array):?>
<h4>Address <?php echo $i;?></h4>
<table class="address_template">
  <tr><td>Address Type:</td>
    <td>
      <select name="address_array[<?php echo $i;?>][address_type]">
      <option value="xx">Select One</option>
      <option value="billing" <?php echo ($address_array["address_type"]=="billing" ? 'selected' : ''); ?>>Billing</option>
      <option value="shipping" <?php echo ($address_array["address_type"]=="shipping" ? 'selected' : ''); ?>>Shipping</option>
      <option value="other" <?php echo ($address_array["address_type"]=="other" ? 'selected' : ''); ?>>Other</option>
      <option value="delete">Delete This Address</option>
      </select>
    </td>
  </tr>
  <tr><td>Recipient First Name:</td><td><input type="text" name="address_array[<?php echo $i;?>][firstname]" value="<?php echo (isset($address_array["firstname"]) ? $address_array["firstname"] : ''); ?>"/> </td></tr>
  <tr><td>Recipient Last Name:</td><td><input type="text" name="address_array[<?php echo $i;?>][lastname]" value="<?php echo (isset($address_array["lastname"]) ? $address_array["lastname"] : ''); ?>"/> </td></tr>
  <tr><td>Address:</td><td><input type="text" name="address_array[<?php echo $i;?>][address]" value="<?php echo (isset($address_array["address"]) ? $address_array["address"] : ''); ?>"/> </td></tr>
  <tr><td>City:</td><td><input type="text" name="address_array[<?php echo $i;?>][city]" value="<?php echo (isset($address_array["city"]) ? $address_array["city"] : ''); ?>"/></td></tr>
  <tr><td>Postal Code:</td><td><input type="text" name="address_array[<?php echo $i;?>][postcode]" value="<?php echo (isset($address_array["postcode"]) ? $address_array["postcode"] : ''); ?>"/></td></tr>
</table>
<?php $i++; endforeach;?>
<table>
  <tr><td colspan="2"><input type="submit" value="Update Member" name="submit"/></td></tr>
</table>
<input type="hidden" name="member_id" value="<?php echo $member["member_id"]; ?>"/>
</form>
