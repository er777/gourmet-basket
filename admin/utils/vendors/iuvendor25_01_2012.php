<?php

error_reporting(E_ALL);

$v = array();
$msg = '';
/* get vendor data  */
$v = DB::get_single('users', 'user_id', $user_id);

//insert or update users
if (isset($_POST['user_id'])) {
    if (isset($_POST["products"])) 
        $_POST["mycategories"]  =  join(", ", $_POST["products"]);
    $v = DB::insert_update('users', 'user_id', $_POST);
    
    //tvar($vendor);
    /* products */
   /*if (isset($_POST["products"])) {
        for ($i = 0; $i < sizeof($_POST["products"]); $i++) {
            $insertpro =
                    "INSERT INTO products(user_id, category_id, checked) values ('" . $v['user_id'] . "', '" . $_POST['products'][$i] . "', 1)";
            //echo $insertpro;
            DB::execute($insertpro);
        }
    }*/

    /* profile */
    if (isset($_POST["product_line_info"])) {

        $insertprofile =
                "INSERT INTO profile(user_id, product_line_info) values ('" . $v['user_id'] . "', '" . $_POST['product_line_info'] . "')";
        //echo $insertprofile;
        DB::execute($insertprofile);
    }
    if ($_POST['user_id'] == 'new')
        $msg = '<h1 style="margin-top:30px">Thank you</h1>Your information has been entered into our database<br><br>';
    else
        $msg = '<br/><br/><b style="color:green; font-size: 15px;">Your information has been entered into our database</b>';
    $user_id = $v['user_id'];
}
?>
<form method="post" action="vendors.php?user_id=<?php echo $user_id; ?>" id="form_vendor">
    <input type="hidden" value="<?php echo $user_id; ?>" name="user_id" id="user_id"/> 
    <input type="hidden" value="vendor" name="level" id="level"/> 
    <div id="registerBlock">
        <table style="margin-left: 50px;float: left;">
            <tr>
                <td><img src="images/iutitles/<?php echo $user_id == 'new' ? 'add' : 'update'; ?>_vendor.jpg" /><br></td>
            </tr>    
        </table>
         <br />
         <br />

        <div style="width:650px;margin:auto;">
            <?php
            if ($msg) {
                echo $msg;
            }
            ?>
        </div>        
       <br />
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Vendor profile</a></li>
                <li><a href="#tabs-2">Images and logo</a></li>
                <li><a href="#tabs-3">More Business</a></li>
                <li><a href="#tabs-4">Description and shipping policy</a></li>
            </ul>
            
            <div id="tabs-1">
                <div id="leftRegister">
                    <table  width="400" align="right"class="input" style="color:#0c2c5a;">
                        <tr>
                            <th colspan="2">
                        <h2 style="text-align:center">
                            BUSINESS IDENTIFICATION</h2>
                        </th>
                        </tr>
                      
                         
                           <tr>
                             <td class="t-radios">
                          <input type="hidden" name="vendor_type" value="" />
                          <input type="radio" name="vendor_type" value="1"  />
                          <label for="RegisterVendorType1">Wholesale Vendor</label><br />
                          <input type="radio" name="vendor_type" id="RegisterVendorType2" value="2"  />
                          <label for="RegisterVendorType2">Artisanal Vendor</label> <br />
                         
                          	<?php 
							function Vendor_Type($vendorType) {
							
								return $v['vendor_type'] ;
								$vendorType = $v['vendor_type'] ;
							 
								if ($vendorType == 1) {
								$vendorTypeLabel= ('Wholesale');
							 
								if ($vendorType == 2);
								$vendorTypeLabel= ('Artisinal');
								
								} else {
								$vendorTypeLabel ="Please Select One";
								
								$vendorTypeLabel=Vendor_Type($vendorType);
						
							echo ($vendorTypeLabel);
						  		}
							}
						  
						  ?>                              
                      </td>
                           </tr>
                         </td>
                  <tr>
                        <tr>
                            <th width="140">Business Name</th>
                            <td width="210" align="left"><input type="text"  class="requiredInput" name="business_name" value="<?php echo $v['business_name'] ?>" size="30"/>
                                &nbsp;*</td>
                        </tr>
                        <!--<tr>
                          <th width="140">Shoppe Name</th>
                          <td width="210" align="left"><input type="text" class="requiredInput" name="shop_name" value="<?php echo $v['shop_name'] ?>" size="30"/>
                            &nbsp;*</td>
                        </tr>-->
                        <tr>
                            <th>Street Address</th>
                            <td align="left"><input type="text" class="requiredInput" name="street_address" value="<?php echo $v['street_address'] ?>" size="30"/>
                                &nbsp;*</td>
                        </tr>
                        <tr>
                            <th>Street Address 2</th>
                            <td align="left"><input type="text" name="street_address2" value="<?php echo $v['street_address2'] ?>" size="30"/>
                                </td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td align="left">
                                <select name="country_id" id="country_id" class="left" onchange="exeAjax('id='+this.value+'&action=11', 'zone_span', false)" style="width: 198px;">
                                    <option value="" id="co-country_id">Select</option>
                                    <?php echo DB::db_options("SELECT `country_id`, `name` FROM `countries` order by `country_id`", $v['country_id']) ?>
                                </select> 
                                &nbsp;*</td>
                        </tr>
                        <tr>
                            <th>State</th>                            
                            <td align="left">
                                <span id="zone_span" style="padding: 0px;">
                                    <select name="zone_id" id="zone_id" class="left" style="width: 198px;">
                                        <option value="" id="zo-country_id">Select</option>
                                        <?php echo DB::db_options("SELECT `zone_id`, `name` FROM `zone` where `country_id` = '" . $v['country_id'] . "' order by `zone_id`", $v['zone_id']) ?>
                                    </select> 
                                </span>
                                &nbsp;*</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td align="left"><input type="text" class="requiredInput" name="city" value="<?php echo $v['city'] ?>" size="30" />
                                &nbsp;*</td>
                        </tr>                        
                        <tr>
                            <th>ZIP</th>
                            <td align="left"><input type="text" class="requiredInput" name="zip" value="<?php echo $v['zip'] ?>"/>
                                &nbsp;*</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td align="left"><input type="text" class="requiredInput" name="phone" value="<?php echo $v['phone'] ?>"/>
                                &nbsp;*</td>
                        </tr>
                        <tr>
                            <th>Fax</th>
                            <td align="left"><input type="text" class="requiredInput" name="fax" value="<?php echo $v['fax'] ?>"/>
                                &nbsp;*</td>
                        </tr>
                        <tr>
                            <th>Website - http://</th>
                            <td align="left"><input type="text" class="requiredInput" name="website" value="<?php echo $v['website'] ?>"/>
                                &nbsp;*</td>
                        </tr>

                        <tr>
                            <th>Main Contact First Name)</th>
                            <td align="left"><input type="text" class="requiredInput" name="contact1_first_name" value="<?php echo $v['contact1_first_name'] ?>"/>
                                &nbsp;*</td>
                        </tr>
                        <tr>
                            <th>Main Contact Last Name</th>
                            <td align="left"><input type="text" class="requiredInput" name="contact1_last_name" value="<?php echo $v['contact1_last_name'] ?>"/>
                                &nbsp;*</td>
                        </tr>
                        <tr>
                            <th> Title</th>
                            <td align="left"><input type="text" class="requiredInput" name="contact1_title" value="<?php echo $v['contact1_title'] ?>"/>
                                &nbsp;*</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td align="left"><input type="text" class="requiredInput" name="contact1_phone" value="<?php echo $v['contact1_phone'] ?>"/>
                                &nbsp;*</td>
                        </tr>
                        <tr>
                            <th>eMail</th>
                            <td align="left"><input type="text" class="requiredInput" name="contact1_email" value="<?php echo $v['contact1_email'] ?>"/>
                                &nbsp;*</td>
                        </tr>
                        <tr>
                          <th>Contact 2 First Name</th>
                          <td align="left"><input type="text" name="contact2_first_name" value="<?php echo $v['contact2_first_name'] ?>"/>
                            &nbsp;*</td>
                        </tr>
                        <tr>
                          <th>Last Name</th>
                          <td align="left"><input type="text" name="contact2_last_name" value="<?php echo $v['contact2_last_name'] ?>"/>
                            &nbsp;*</td>
                        </tr>
                        <tr>
                          <th> Title</th>
                          <td align="left"><input type="text"  name="contact2_title" value="<?php echo $v['contact2_title'] ?>"/>
                            &nbsp;*</td>
                        </tr>
                        <tr>
                          <th>Phone</th>
                          <td align="left"><input type="text"  name="contact2_phone" value="<?php echo $v['contact2_phone'] ?>"/>
                            &nbsp;*</td>
                        </tr>
                        <tr>
                          <th>eMail</th>
                          <td align="left"><input type="text"  name="contact2_email" value="<?php echo $v['contact2_email'] ?>"/>
                            &nbsp;*</td>
                        </tr>
                        <tr>
                            <th width="140">User Name</th>
                            <td width="210" align="left"><input type="text" class="requiredInput" autocomplete="off" id="user_name" name="user_name" value="<?php echo $v['user_name'] ?>" />
                                &nbsp;*<div id="imgAPPROVAL"></div></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td align="left"><input type="password" id="password" name="password" value="<?php echo $v['password'] ?>"/>
                                &nbsp;*</td>
                        </tr>
                        <tr>
                            <th>Repeat Password</th>
                            <td align="left"><input type="password" id="password1" name="password1" value="<?php echo $v['password'] ?>"/>
                                &nbsp;*<br /><span class="er_pass"></span></td>
                        </tr> 
                        
                        
                        
                        
                        
                        
                        
 <tr>
                      <td>&nbsp;</td>
                      <td>
                          <div><strong>BUSINESS HISTORY</strong></div>
                      </td>
                  </tr>           
                  
                  <tr>
                      <td>&nbsp;</td>
                      <td>
                         <strong>Check your business type</strong>
                      </td>
                  </tr>           
                  
                  <tr>
                      <td valign="top">&nbsp; </td>
                      
                      <td class="t-radios">
                          <input type="hidden" name="business_ownership]" id="usersBusinessOwnership_" value="" />
                          <input type="radio" name="business_ownership]" id="UsersBusinessOwnershipIndividual" value="individual"  />
                          <label for="UsersBusinessOwnershipIndividual">Individual/Family Owned</label><br />
                          <input type="radio" name="business_ownership" id="UsersBusinessOwnershipFamily" value="family"  />
                          <label for="UsersBusinessOwnershipFamily">Small Corporation</label><br />
                          <input type="radio" name="business_ownership" id="UsersBusinessOwnershipCorporation" value="corporation"  />
                          <label for="UsersBusinessOwnershipCorporation">Large Corporation</label>  <br />
                          <input type="radio" name="business_ownership" id="UsersBusinessOwnershipCoop" value="coop"  />
                          <label for="UsersBusinessOwnershipCoop">Co-Op</label>                                                   
                      </td>
                  </tr>
                  
                  <tr>
                      <td>Years in food business</td>
                      <td align="left">
                          <input name="years_in_business" type="text" class="requiredInput"  value="<?php echo $v['years_in_business'] ?>"/>
&nbsp;*</td>
                  </tr>
           <tr>
                      <td>&nbsp;</td>
                      
                      <td>
                          <strong>Financial Contact</strong>
                      </td>                        
                  </tr>
                  
                  
                  <tr>
                      <td>First Name</td>
                      <td align="left">
                          <input name="contact1_first_name" type="text" class="requiredInput" value="<?php echo $v['contact1_first_name'] ?>"/>
&nbsp;*</td>
                  </tr>
                  
                  <tr>
                      <td>Last Name</td>
                      <td align="left">
                          <input name="contact1_last_name" type="text" class="requiredInput"  value="<?php echo $v['contact1_last_name'] ?>"/>
&nbsp;*</td>
                  </tr>
                  
                  <tr>
                      <td>Title</td>
                      <td align="left">
                          <input name="contact1_title" type="text" class="requiredInput" value="<?php echo $v['contact1_title'] ?>"/>
&nbsp;*</td>
                  </tr>
                  
                  <tr>
                      <td>Phone</td>
                      <td align="left">
                          <input name="contact1_phone" type="text" class="requiredInput"  value="<?php echo $v['contact1_phone'] ?>"/>
&nbsp;*</td>
                  </tr>
                  
                  <tr>
                      <td>eMail</td>
                      <td align="left">
                          <input name="contact1_email" type="text" class="requiredInput"  value="<?php echo $v['contact1_email'] ?>"/>
&nbsp;*</td>
                  </tr>
                  
                  <tr>
                      <td>&nbsp;</td>
                      
                      <td>
                          <strong>Customer Service Contact</strong>
                      </td>                        
                  </tr>
                  
                  <tr>
                      <td>First Name</td>
                      <td align="left">
                          <input name="contact2_first_name" type="text"  value="<?php echo $v['contact2_first_name'] ?>"/>
&nbsp;*</td>
                  </tr>
                  
                  <tr>
                      <td>Last Name</td>
                      <td align="left">
                          <input name="contact2_last_name" type="text"  value="<?php echo $v['contact2_last_name'] ?>"/>
&nbsp;*</td>
                  </tr>
                  
                  <tr>
                      <td> Title</td>
                      <td align="left">
                          <input name="contact2_title" type="text"  value="<?php echo $v['contact2_title'] ?>"/>
&nbsp;*</td>
                  </tr>
                  
                  <tr>
                      <td>Phone</td>
                      <td align="left">
                          <input name="contact2_phone" type="text"  value="<?php echo $v['contact2_phone'] ?>"/>
&nbsp;*</td>
                  </tr>
                  
                  <tr>
                      <td>eMail</td>
                      <td align="left">
                          <input name="contact2_email" type="text"  value="<?php echo $v['contact2_email'] ?>"/>
&nbsp;*</td>
                  </tr>
                  
                  
                  
          <tr>
                      <td>
                      </td>       
                      <td>
                      <div><strong>PRODUCT LIABILITY INSURANCE</strong></div>
                                          
                      </td>                     
                  </tr>        
                  
          <tr>
                      <td>Carrier Name</td>
                      <td align="left">
                          <input name="ins_carrier" type="text" size="30" class="requiredInput" id="usersInsCarrier" value="<?php echo $v['ins_carrier'] ?>"/>
&nbsp;*</td>
                  </tr>        
                  
          <tr>
                      <td>&nbsp;</td>
                      <td align="left">
                          Carrier Contact
                      </td>
                  </tr>        
            
            <tr>
                      <td>Name</td>
                      <td align="left">
                          <input name="ins_carrier_name" type="text" size="30" class="requiredInput" id="usersInsCarrierName" value="<?php echo $v['ins_carrier_name'] ?>"/>                          &nbsp;*
          
                      </td>
                  </tr>              
                  
            <tr>
                      <td>Phone</td>
                      <td align="left">
                          <input name="ins_carrier_phone" type="text" class="requiredInput" id="usersInsCarrierPhone" value="<?php echo $v['ins_carrier_phone'] ?>"/>                          &nbsp;*
          
                      </td>
                  </tr>              
          
          <tr>
                      <td>Policy Number</td>
                      <td align="left">
                          <input name="ins_policy_num" type="text" class="requiredInput" id="usersInsPolicyNum" value="<?php echo $v['ins_policy_num'] ?>"/>
&nbsp;*</td>
                  </tr>        
          
          <tr>
                      <td>Expiration Date</td>
                      <td align="left">
                          <input name="ins_policy_exp" type="text" class="requiredInput" id="usersInsPolicyExp" value="<?php echo $v['ins_policy_exp'] ?>"/>
&nbsp;*</td>
                  </tr>   
                        
          <tr>
                      <td>Coverage Amount</td>
                      <td align="left">
                          <input name="ins_policy_coverage" type="text" class="requiredInput" id="usersInsPolicyCoverage" value="<?php echo $v['ins_policy_coverage'] ?>"/>
&nbsp;*</td>
                  </tr>   
                       
                  <tr>
                      <td>
                      </td>                         
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                                                           
                    </table>
                    <br/>
                </div>
                <!-- leftRegister -->
                <div id="rightRegister">
                    <table class="input">
                        <th colspan="2" ><h2 style="text-align:center">PRODUCT INFORMATION</h2>
                        </th>
                        <tr>
                            <td ><p>Indicate your principal products.</p></td>
                        </tr>
                        <?php
                        $sql = "SELECT * from categories";
                        $myprod = array();
                        if ($user_id != "new") {
                            $myprod = explode(",", $v['mycategories']);
                        }

                        DB::query($sql);
                        while ($row = DB::fetch_assoc()) {
                            ?>
                            <tr>
                                <td><label>
                                        <input <?php echo in_array($row['category_id'], $myprod) ? "checked" : ""; ?> type="checkbox" name="products[]" value="<?php echo $row['category_id']; ?>" id="products[]" />
                                        <?php echo $row['category_name']; ?>
                                    </label>
                                </td>
                            </tr>
                        <? } ?>
                    </table>
                </div>
            </div><!-- end tabs-1 -->
            
            
            <div id="tabs-2">
                <table class="input left">
                    <tr>
                        <td>
                            <img src="<?php echo ($v['logo'] != "")?"/img/logos/".$v['logo']:"images/logo.png";?>" width="206" height="63" alt="logo shop" class="imgshop" name="imglogo" id="imglogo" />
                        </td> 
                        <th valign="top" style="text-align: left;">
                            <label>206 x 63</label><br />
                            <input type="hidden" value="<?php echo $v['logo']; ?>" name="logo" id="logo" />
                            <input type="file" name="filelogo" id="filelogo" />                            
                        </th>                                           
                    </tr> 
                    <tr>
                        <td>
                            <img src="<?php echo ($v['logo'] != "")?"/img/logos/".$v['logo']:"images/logo.png";?>?>" alt="image 1 shop" class="imgshop" name="imgimage1" id="imgimage1" />
                        </td>  
                        <th valign="top" style="text-align: left;">
                            <label>220 x 155</label><br />
                            <input type="hidden" value="<?php echo $v['image1']; ?>" name="image1" id="image1" />
                            <input type="file" name="fileimage1" id="fileimage1" />
                        </th>                                          
                    </tr> 
                    <tr>
                        <td>
                            <img src="<?php echo ($v['logo'] != "")?"/img/logos/".$v['logo']:"images/logo.png";?>" alt="image 2 shop" class="imgshop" name="imgimage2" id="imgimage2" />
                        </td>  
                        <th valign="top" style="text-align: left;">
                            <label>220 x 155</label><br />
                            <input type="hidden" value="<?php echo $v['image2']; ?>" name="image2" id="image2" />
                            <input type="file" name="filelogo2" id="fileimage2" />
                        </th>                  
                    </tr> 
                </table>
                <!--<div>
               VENDOR STORY<?php //echo $v['shop_description'] ?>
                </div>-->
                
            </div>
 
 
 
 <div id="tabs-3">
                <table class="input left">
                   
                   
                   
                   <tr>
            <td colspan="2"><h2 style="text-align:center">FINANCIAL INFORMATION</h2></td>
        </tr>
        <tr><td></td>
        </tr>
        <tr>
            <td><strong>Please provide the following:</strong></td>
        </tr>
        <tr>
            <td width="163">Email for Orders</td>
            <td width="225" align="left">
                <input name="data[financial][order_email]" type="text" size="30" class="requiredInput" value="<?php echo $v['order_email'] ?>"/>
 &nbsp;*
            </td>
        </tr>
        <tr>
            <td width="163">Bank Name</td>
            <td width="225" align="left">
                <input name="bank_name" type="text" size="30" class="requiredInput"  value="<?php echo $v['bank_name'] ?>"/>
 &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Bank Address</td>
            <td align="left">
                <input name="bank_address" type="text" size="30" class="requiredInput"  value="<?php echo $v['bank_address'] ?>"/>
 &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Bank Account Number</td>
            <td align="left">                            
                <input name="bank_account" type="text" size="30" class="requiredInput"  value="<?php echo $v['bank_account'] ?>"/>
 &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Bank Routing Number</td>
            <td align="left">                            
                <input name="bank_routing" type="text" size="30" class="requiredInput"  value="<?php echo $v['bank_routing'] ?>"/>
 &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Bank Phone Number</td>
            <td align="left">                                                        
                <input name="bank_phone" type="text" class="requiredInput"  value="<?php echo $v['bank_phone'] ?>"/>
 &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Bank Contact Person</td>
            <td align="left">
                <input name="bank_contact" type="text" class="requiredInput"  value="<?php echo $v['bank_contact'] ?>"/>
 &nbsp;*
            </td>
        </tr>
        <tr>
         <td></td>
            <td colspan="2" align="left">
                <div style="text-align:left;margin-bottom:10px;font-weight:bold">Please indicate the address to which payments should be sent if different from business address above</div>
            </td>                            
        </tr>
        
      <tr>
            <td>Address</td>
            <td align="left">
                <input name="data[users][payment_street_address" type="text" size="30" class="requiredInput" id="usersPaymentStreetAddress" value="<?php echo $v['ins_policy_exp'] ?>"/>
 &nbsp;*
            </td>
        </tr>
                <tr>
            <td>City</td>
            <td align="left">
                <input name="data[users][payment_city" type="text" size="30" class="requiredInput" id="usersPaymentCity" value="<?php echo $v['ins_policy_exp'] ?>"/>
 &nbsp;*
            </td>
        </tr>  
                   
                   
                   
                </table>
               
                
            </div>
 
 
 
 
            
            
            <div id="tabs-4">
                <table class="input">
                    <tr>
                        <td valign="top">
                            <b>Shop description:</b>
                        </td>                   
                    </tr> 
                    <tr>
                        <td valign="top">
                            <textarea cols="80" rows="10" name="shop_description" id="shop_description"><?php echo $v['shop_description']; ?></textarea>
                        </td>                 
                    </tr> 
                    <tr>
                        <td valign="top">
                            <b>Shipping policy:</b> 
                        </td>                   
                    </tr> 
                    <tr>
                        <th valign="top">
                            <textarea cols="80" rows="10" name="shipping_policy" id="shipping_policy"><?php echo $v['shipping_policy']; ?></textarea>
                            <script type="text/javascript">
                                //<![CDATA[
                
                                // This call can be placed at any point after the
                                // <textarea>, or inside a <head><script> in a
                                // window.onload event handler.
                
                                // Replace the <textarea id="editor"> with an CKEditor
                                // instance, using default configurations.
                                CKEDITOR.replace( 'shop_description' );
                                //CKEDITOR.replace( 'shipping_policy' );
                
                                //]]>
                            </script>

                        </th>                 
                    </tr> 
                </table>

            </div>
                        
        </div>
        
        
        <div class="clear"></div>
        
        
        <?php
        if ($user_id != "new") {
            ?>
            <img id="sendinfo" onclick="send_form()" src="images/btn_update.jpg" border="0" />
            &nbsp;
            <a href="vendors.php?cmd=delete&uid=<?php echo $user_id; ?>"><img src="images/btn_delete.jpg" border="0"/></a>
            <?php
        } else {
            ?> 
            <img id="sendinfo" onclick="send_form()" src="images/btn_add.jpg" border="0" />
        <?php }    ?>   
    </div>
</form>

<link media="all" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" rel="stylesheet">
<link media="all" type="text/css" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://jquery-ui.googlecode.com/svn/tags/latest/external/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/i18n/jquery-ui-i18n.min.js"></script>
<!-- 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
-->
<script type="text/javascript" src="js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript" language="javascript">
    $(function() {
        $( "#tabs" ).tabs();
        
        $('#filelogo').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Select logo',
            'auto'      : true,
            'folder'    : '../app/webroot/img/logos',
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#logo').val(response);
                $('#imglogo').attr('src','/img/logos/'+response);
            }
        });
        $('#fileimage1').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Select image 1',
            'auto'      : true,
            'folder'    : '../app/webroot/img/logos',
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image1').val(response);
                $('#imgimage1').attr('src','/img/logos/'+response);
            }
        });
        $('#fileimage2').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Select image 2',
            'auto'      : true,
            'folder'    : '../app/webroot/img/logos',
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image2').val(response);
                $('#imgimage2').attr('src','/img/logos/'+response);
            }
        });
         
        $(".requiredInput").focus(function(){
            if($(this).val()=="this is required")
                $(this).css("background","white").val("")   
        });
        $(".requiredInput").blur(function(){
            if($(this).val()=="")
                $(this).css("background","red").val("this is required")   
        });
        $(":password").focus(function(){
            if($(this).val()=="this is required")
                $(this).css("background","#FFFFCE").val("")   
        });    
        $(":password").blur(function(){
            if($(this).val()=="")
                $(this).css("background","red")
        });
        $("#user_name").keyup(function(){
            if( $(this).val().length > 5 ){
                $.post( "ajax.php",{ action:1, q: $(this).val(), user_id: '<?php echo $user_id ?>' }  ,
                function( data ) {
                    if(data==1)
                        $( "#imgAPPROVAL" ).html('<div class="no"> already exists</div>')
                    if(data==0){
                        $( "#imgAPPROVAL" ).html('<div class="yes"> </div>')
                    }            
                });            
            }else{
                $( "#imgAPPROVAL" ).html('<div class="nop"> 5 characters over  </div>')  
            }
        });   
    });

    function send_form(){
        var send = true
        $.each($(".requiredInput"), function() {
            if($(this).val()=="this is required" || $(this).val()==""){
                send = false;
                $(this).css("background","red").val("this is required");
            }
        });
        $.each($(":password"), function() {
            if($(this).val()=="")
                $(this).css("background","red")
            else{
                if($("#password1").val()==$("#password").val()){
                    $(".er_pass").text("")
                }else{
                    send = false;            
                    $(".er_pass").text("Passwords not match")
                }
            }
        }); 
        if($("#country_id option:selected").val()==""){
            send = false;
            $("#country_id option:selected").text('this is required')
            $("#country_id").css("background","red")
        }
        if($("#zone_id option:selected").val()==""){
            send = false;
            $("#zone_id option:selected").text('this is required')
            $("#zone_id").css("background","red")
        }
        if(send==false)
            alert("Fields with * are required")
            
        if( $("#user_name").val().length > 5 ){
            $.post( "ajax.php",{ action: 1, q: $("#user_name").val(), user_id: '<?php echo $user_id ?>' }  ,
            function( data ) {
                if(data==1)
                    $( "#imgAPPROVAL" ).html('<div class="no"> already exists</div>')
                if(data==0){
                    $( "#imgAPPROVAL" ).html('<div class="yes"> </div>')
                    if(send){
                        $( "#form_vendor" ).submit();  
                    }
                                   
                }
                if(data==2){
                    if(send){
                        $( "#form_vendor" ).submit();  
                    }                
                }            
            });            
        }else{
            $( "#imgAPPROVAL" ).html('<div class="nop"> please use at least 5 characters  </div>')  
        }
    }

</script>
