<?php

?>
<style>
.container { display: table;
}

.row {
display: table-row;
}

.cell {
display: table-cell; 
width: 150px;
font-size:87%; 


padding: 0;
}

.cell.one {
	text-align: right;
	padding-right:5px;
	vertical-align:middle;	
}

.cell.two {
	text-align: left;	
}

.tiny-cell {
display: table-cell; 
text-align: left;	
width: 30px;
padding: 0;
}

span.radio {
	
	padding-left:15px;
	padding-right:15px;
	
}

span.radio-label {
	
	text-align:left
	
}

</style>


<div id="leftRegister">
	

	<div style="text-align:left"><h2>VENDOR PROFILE</h2></div>
  

    <div class="row">
        <div class="cell one">
        
        <input type="hidden" name="vendor_type" value="" />
                          <input type="radio" name="vendor_type" value="1" <?=$v["vendor_type"]==1?"checked":""?> />
                          <label for="RegisterVendorType1">Wholesale Vendor</label>
        </div>
        <div class="cell two">                
                          <input type="radio" name="vendor_type" id="RegisterVendorType2" value="2" <?=$v["vendor_type"]==2?"checked":""?> />
                          <label for="RegisterVendorType2">Artisanal Vendor</label>
        </div>
    </div>
    
    <div class="row">
         <div class="cell one">               
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
        </div>
        
        
    </div> 
           
    <div class="row">
        <div class="cell one">Business Name</div>
        
        <div class="cell two">
    <input type="text"  class="will-be-required" name="business_name" value="<?php echo $v['business_name'] ?>" size="30"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Shoppe Name</div>
        
        <div class="cell two">
    <input type="text" class="will-be-required" name="shop_name" value="<?php echo $v['shop_name'] ?>" size="30"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Street Address</div>
        
        <div class="cell two">
    <input type="text" class="will-be-required" name="street_address" value="<?php echo $v['street_address'] ?>" size="30"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Suite</div>
        
        <div class="cell two">
    <input type="text" name="street_address2" value="<?php echo $v['street_address2'] ?>" size="30"/>
        </div>  
    </div>
    
    
  <!--  <div class="row">
        <div class="cell one">Country</div>
        
        <div class="cell two">
            <select name="country_id" id="country_id" class="left" onchange="exeAjax('id='+this.value+'&action=11', 'zone_span', false)" style="width: 198px;">
            <option value="" id="co-country_id">Select</option><?php //echo DB::db_options("SELECT `country_id`, `name` FROM `countries` order by `country_id`", $v['country_id']) ?>
            </select> 
        </div>  
    </div>-->
    
    
    
   <!-- <div class="row">
        <div class="cell one">State</div>
        
        <div class="cell two">
            <span id="zone_span" style="padding: 0px;">
            <select name="zone_id" id="zone_id" class="left" style="width: 198px;">
            <option value="" id="zo-country_id">Select</option><?php //echo DB::db_options("SELECT `zone_id`, `name` FROM `zone` where `country_id` = '" . $v['country_id'] . "' order by `zone_id`", $v['zone_id']) ?>
            </select> 
            </span>
        </div>  
    </div>-->
    
    
    <div class="row">
        <div class="cell one">City</div>
        
        <div class="cell two">
            <input type="text" class="will-be-required" name="city" value="<?php echo $v['city'] ?>" size="30" />
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">ZIP</div>
        
        <div class="cell two">
            <input type="text" class="will-be-required" name="zip" value="<?php echo $v['zip'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Business Phone</div>
        
        <div class="cell two">
            <input type="text" class="will-be-required" name="phone" value="<?php echo $v['phone'] ?>"/>
        </div>  
    </div>
    
    <div class="row">
        <div class="cell one">Fax</div>
        
        <div class="cell two">
            <input type="text" class="will-be-required" name="fax" value="<?php echo $v['fax'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
    
    
        <div class="cell one">Website - http://</div>
        
        <div class="cell two">
            <input type="text" class="will-be-required" name="website" value="<?php echo $v['website'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Main Contact First Name</div>
        
        <div class="cell two">
            <input type="text" class="will-be-required" name="contact_first_name" value="<?php echo $v['contact_first_name'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Main Contact Last Name</div>
        
        <div class="cell two">
            <input type="text" class="will-be-required" name="contact_last_name" value="<?php echo $v['contact_last_name'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Title</div>
        
        <div class="cell two">
            <input type="text" class="will-be-required" name="contact_title" value="<?php echo $v['contact_title'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Contact Phone</div>
        
        <div class="cell two">
            <input type="text" class="will-be-required" name="contact_phone" value="<?php echo $v['contact_phone'] ?>"/>
        </div>  
    </div>
    
    <div class="row">
        <div class="cell one">eMail</div>
        
        <div class="cell two">
            <input type="text" class="will-be-required" name="contact_email" value="<?php echo $v['contact_email'] ?>"/>
        </div>  
    </div>
    
    <div class="row">
        <div class="cell one">Contact 2 First Name</div>
        
        <div class="cell two">
            <input type="text" name="contact_alt_first_name" value="<?php echo $v['contact_alt_first_name'] ?>"/>
        </div>  
    </div>
    
    <div class="row">
        <div class="cell one">Last Name</div>
        
        <div class="cell two">
            <input type="text" name="contact_alt_last_name" value="<?php echo $v['contact_alt_last_name'] ?>"/>
        </div>  
    </div>
    
    <div class="row">
        <div class="cell one">Title</div>
        
        <div class="cell two">
            <input type="text"  name="contact_alt_title" value="<?php echo $v['contact_alt_title'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Phone</div>
        
        <div class="cell two">
            <input type="text"  name="contact_alt_phone" value="<?php echo $v['contact_alt_phone'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">eMail</div>
        
        <div class="cell two">
            <input type="text"  name="contact_alt_email" value="<?php echo $v['contact_alt_email'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">User Name</div>
        
        <div class="cell two">
            <input type="text" class="will-be-required" autocomplete="off" id="user_name" name="user_name" value="<?php echo $v['user_name'] ?>" />
        </div>  
    </div>
    
    
    
    <div class="row">
        <div class="cell one">Password</div>
        
        <div class="cell two">
            <input type="password" id="password" name="password" value="<?php echo $v['password'] ?>"/>
        </div>  
    </div>
    
    
    
    <div class="row">
        <div class="cell one">Repeat Password</div>
        
        <div class="cell two">
            <input type="password" id="password1" name="password1" value="<?php echo $v['password'] ?>"/>
        </div>  
    </div>
    
    
 
    
    <div class="row">
        <div class="cell one"></div>
        <div class="cell two"><br /><strong>BUSINESS HISTORY</strong></div>
    </div>
    
    <div class="row">
        <div class="cell one"></div>
        <div class="cell two">Check your business type</div>
    </div>
    
    <div class="row">
            <input type="hidden" name="business_ownership" id="usersBusinessOwnership_" value="" />
        <div class="cell one">
            <input type="radio" name="business_ownership" id="UsersBusinessOwnershipIndividual" value="individual" <?=$v["business_ownership"]=="individual"?"checked":""?> />
        </div>
        <div class="cell two">Individually Owned</div>
    </div>
    
    
    <div class="row">
        <div class="cell one">
            
            <input type="radio" name="business_ownership" id="UsersBusinessOwnershipFamily" value="individual" <?=$v["business_ownership"]=="family"?"checked":""?> />
        </div>
        <div class="cell two">Family Owned</div>
    </div>
                        
    <div class="row">
        <div class="cell one">
            
            <input type="radio" name="business_ownership" id="UsersBusinessOwnershipSmallCorp" value="individual" <?=$v["business_ownership"]=="small corporation"?"checked":""?> />
        </div>
        <div class="cell two">Small Corporation</div>
    </div>
    
    
    <div class="row">
        <div class="cell one">
            <input type="radio" name="business_ownership" id="UsersBusinessOwnershipLargeCorp" value="individual" <?=$v["business_ownership"]=="large corporation"?"checked":""?> />
        </div>
        <div class="cell two">Large Corporation</div>
    </div>
    
    
    <div class="row">
        <div class="cell one">
            <input type="radio" name="business_ownership" id="UsersBusinessOwnershipCoop" value="individual" <?=$v["business_ownership"]=="large corporation"?"checked":""?> />
        </div>
        <div class="cell two">Coop</div>
    </div>
    
    
    <div class="row">
        <div class="cell one">Years in food business</div>
        
        <div class="cell two">
            <input name="years_in_business" type="text" class="will-be-required"  size="4" value="<?php echo $v['years_in_business'] ?>"/>
        </div>  
    </div>
    


    <div class="row">
        <div class="cell one"></div>
        <div class="cell two"><br /><strong>PRODUCT LIABILITY INSURANCE</strong></div>
    </div>
    
    
    <div class="row">
        <div class="cell one">Carrier Name</div>
        
        <div class="cell two">
            <input name="ins_carrier" type="text" size="30" class="will-be-required" id="usersInsCarrier" value="<?php echo $v['ins_carrier'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Carrier Contact</div>
        
        <div class="cell two">
            <input name="ins_carrier_name" type="text" size="30" class="will-be-required" id="usersInsCarrierName" value="<?php echo $v['ins_carrier_name'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Phone</div>
        
        <div class="cell two">
            <input name="ins_carrier_phone" type="text" class="will-be-required" id="usersInsCarrierPhone" value="<?php echo $v['ins_carrier_phone'] ?>"/>      
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Policy Number</div>
        
        <div class="cell two">
            <input name="ins_policy_num" type="text" class="will-be-required" id="usersInsPolicyNum" value="<?php echo $v['ins_policy_num'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Expiration Date</div>
        
        <div class="cell two">
             <input name="ins_policy_exp" type="text" class="will-be-required" id="usersInsPolicyExp" value="<?php echo $v['ins_policy_exp'] ?>"/>
        </div>  
    </div>
    
    
    <div class="row">
        <div class="cell one">Coverage Amount</div>
        
        <div class="cell two">
           <input name="ins_policy_coverage" type="text" class="will-be-required" id="usersInsPolicyCoverage" value="<?php echo $v['ins_policy_coverage'] ?>"/>
        </div>  
    </div>    
    




</div><!-- end left register -->


<!-- RIGHT -->

<div id="rightRegister">


	<h2>PRODUCT INFORMATION</h2>

	<p>Principal products in your shoppe</p>

<?php
	  $sql = "SELECT * from categories ORDER BY category_name";
	  $myprod = array();
	  if ($user_id != "new") {
		  $myprod = explode(",", $v['mycategories']);
	  }

	  DB::query($sql);
	  while ($row = DB::fetch_assoc()) {
?>


	<div style="text-align:left;font-size:11px">
    <input <?php echo in_array($row['category_id'], $myprod) ? "checked" : ""; ?> type="checkbox" name="products[]" value="<?php echo $row['category_id']; ?>" id="products[]" />
    <?php echo $row['category_name']; ?>
  
    </div>
  <? } ?>

<div class="clear"></div>
<!--<h3>PRODUCT ATTRIBUTES</h3>-->

<!--<div style="text-align:left;">
    <span class="radio-label">None</span>
    <span class="radio-label">Some</span>
    <span class="radio-label">&nbsp;&nbsp;All</span>
</div>
-->

<?php

	  function Attribute_Type($attributeType) {
	  
		  return $a['attribute_type'] ;
		  $attributeType = $a['attribute_type'] ;
	   
		  if ($attribute_type == 1) {
		  $attributeTypeLabel= ('None');
	   
		  if ($vendorType == 2);
		  $attributeTypeLabel= ('Some');
		  
		   if ($vendorType == 3);
		  $attributeTypeLabel= ('All');
		  
		  } else {
		  $attributeTypeLabel ="Please Select One";
		  
		  $attributeTypeLabel=Attribute_Type($attributeType);
  
	  //echo ($attributeTypeLabel);
		  }
	  }
	



	$i=1;

	  $sql2 = "SELECT * from product_attributes";
	  $myprodattributes = array();
	  
	  //DB::query($sql2);
	  //while ($row = DB::fetch_assoc()) {
?>



	
<!--<div style="text-align:left;">
  	<span class="radio"><input type="radio" name="attribute<?php //echo ($i); ?>" value="radio" <?//=$a["vendor_product_attributes"]==1?"checked":""?>id="none<?php //echo ($i); ?> "> </span>
   	<span class="radio"><input type="radio" name="attribute<?php //echo ($i); ?>" value="radio" <?//=$a["vendor_product_attributes"]==2?"checked":""?>id="some<?php echo ($i); ?> "> </span>
   	<span class="radio"><input type="radio" name="attribute<?php //echo ($i); ?>" value="radio" <?//=$a["vendor_product_attributes"]==3?"checked":""?>id="all<?php// echo ($i); ?> "> </span>
    <?php //echo $row['attribute'];
	
	//$i++;
	?>  
</div>
-->
<? //}

?>







</div><!-- end right register -->



