<?php
?>

	<div id="leftRegister">
                <table  width="370" align="right"class="input" style="color:#0c2c5a;">
                    <tr>
                        <th colspan="2">
                    <h2 style="text-align:center">
                        BUSINESS IDENTIFICATION</h2>
                    </th>
                    </tr>
                  
                     
					<tr>
                         <td class="t-radios">
                      <input type="hidden" name="vendor_type" value="" />
                      <input type="radio" name="vendor_type" value="1" <?=$v["vendor_type"]==1?"checked":""?> />
                      <label for="RegisterVendorType1">Wholesale Vendor</label><br />
                      <input type="radio" name="vendor_type" id="RegisterVendorType2" value="2" <?=$v["vendor_type"]==2?"checked":""?> />
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

                    <tr>
                        <th width="140">Business Name</th>
                        <td width="210" align="left"><input type="text"  class="will-be-required" name="business_name" value="<?php echo $v['business_name'] ?>" size="30"/>
                            &nbsp;*</td>
                    </tr>
                    <tr>
                      <th width="140">Shoppe Name</th>
                      <td width="210" align="left"><input type="text" class="will-be-required" name="shop_name" value="<?php echo $v['shop_name'] ?>" size="30"/>
                        &nbsp;*</td>
                    </tr>
                    <tr>
                        <th>Street Address</th>
                        <td align="left"><input type="text" class="will-be-required" name="street_address" value="<?php echo $v['street_address'] ?>" size="30"/>
                            &nbsp;*</td>
                    </tr>
                    <tr>
                        <th>Suite</th>
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
                        <td align="left"><input type="text" class="will-be-required" name="city" value="<?php echo $v['city'] ?>" size="30" />
                            &nbsp;*</td>
                    </tr>                        
                    <tr>
                        <th>ZIP</th>
                        <td align="left"><input type="text" class="will-be-required" name="zip" value="<?php echo $v['zip'] ?>"/>
                            &nbsp;*</td>
                    </tr>
                    <tr>
                        <th>Business Phone</th>
                        <td align="left"><input type="text" class="will-be-required" name="phone" value="<?php echo $v['phone'] ?>"/>
                            &nbsp;*</td>
                    </tr>
                    <tr>
                        <th>Fax</th>
                        <td align="left"><input type="text" class="will-be-required" name="fax" value="<?php echo $v['fax'] ?>"/>
                            &nbsp;*</td>
                    </tr>
                    <tr>
                        <th>Website - http://</th>
                        <td align="left"><input type="text" class="will-be-required" name="website" value="<?php echo $v['website'] ?>"/>
                            &nbsp;*</td>
                    </tr>

                    <tr>
                        <th>Main Contact First Name)</th>
                        <td align="left"><input type="text" class="will-be-required" name="contact_first_name" value="<?php echo $v['contact_first_name'] ?>"/>
                            &nbsp;*</td>
                    </tr>
                    <tr>
                        <th>Main Contact Last Name</th>
                        <td align="left"><input type="text" class="will-be-required" name="contact_last_name" value="<?php echo $v['contact_last_name'] ?>"/>
                            &nbsp;*</td>
                    </tr>
                    <tr>
                        <th> Title</th>
                        <td align="left"><input type="text" class="will-be-required" name="contact_title" value="<?php echo $v['contact_title'] ?>"/>
                            &nbsp;*</td>
                    </tr>
                    <tr>
                        <th>Contact Phone</th>
                        <td align="left"><input type="text" class="will-be-required" name="contact_phone" value="<?php echo $v['contact_phone'] ?>"/>
                            &nbsp;*</td>
                    </tr>
                    <tr>
                        <th>eMail</th>
                        <td align="left"><input type="text" class="will-be-required" name="contact_email" value="<?php echo $v['contact_email'] ?>"/>
                            &nbsp;*</td>
                    </tr>
                    <tr>
                      <th>Contact 2 First Name</th>
                      <td align="left"><input type="text" name="contact_alt_first_name" value="<?php echo $v['contact_alt_first_name'] ?>"/>
                        &nbsp;*</td>
                    </tr>
                    <tr>
                      <th>Last Name</th>
                      <td align="left"><input type="text" name="contact_alt_last_name" value="<?php echo $v['contact_alt_last_name'] ?>"/>
                        &nbsp;*</td>
                    </tr>
                    <tr>
                      <th> Title</th>
                      <td align="left"><input type="text"  name="contact_alt_title" value="<?php echo $v['contact_alt_title'] ?>"/>
                        &nbsp;*</td>
                    </tr>
                    <tr>
                      <th>Phone</th>
                      <td align="left"><input type="text"  name="contact_alt_phone" value="<?php echo $v['contact_alt_phone'] ?>"/>
                        &nbsp;*</td>
                    </tr>
                    <tr>
                      <th>eMail</th>
                      <td align="left"><input type="text"  name="contact_alt_email" value="<?php echo $v['contact_alt_email'] ?>"/>
                        &nbsp;*</td>
                    </tr>
                    <tr>
                        <th width="140">User Name</th>
                        <td width="210" align="left"><input type="text" class="will-be-required" autocomplete="off" id="user_name" name="user_name" value="<?php echo $v['user_name'] ?>" />
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
                      <input type="hidden" name="business_ownership" id="usersBusinessOwnership_" value="" />
                      <input type="radio" name="business_ownership" id="UsersBusinessOwnershipIndividual" value="individual" <?=$v["business_ownership"]=="individual"?"checked":""?> />
                      <label for="UsersBusinessOwnershipIndividual">Individual/Family Owned</label><br />
                      <input type="radio" name="business_ownership" id="UsersBusinessOwnershipFamily" value="family" <?=$v["business_ownership"]=="family"?"checked":""?> />
                      <label for="UsersBusinessOwnershipFamily">Small Corporation</label><br />
                      <input type="radio" name="business_ownership" id="UsersBusinessOwnershipCorporation" value="corporation" <?=$v["business_ownership"]=="corporation"?"checked":""?> />
                      <label for="UsersBusinessOwnershipCorporation">Large Corporation</label>  <br />
                      <input type="radio" name="business_ownership" id="UsersBusinessOwnershipCoop" value="coop" <?=$v["business_ownership"]=="coop"?"checked":""?> />
                      <label for="UsersBusinessOwnershipCoop">Co-Op</label>                                                   
                  </td>
              </tr>
              
              <tr>
                  <td>Years in food business</td>
                  <td align="left">
                      <input name="years_in_business" type="text" class="will-be-required"  value="<?php echo $v['years_in_business'] ?>"/>
&nbsp;*</td>
              </tr>
       <tr>
                  <td>&nbsp;</td>
                  
                  
              
              
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
                      <input name="ins_carrier" type="text" size="30" class="will-be-required" id="usersInsCarrier" value="<?php echo $v['ins_carrier'] ?>"/>
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
                      <input name="ins_carrier_name" type="text" size="30" class="will-be-required" id="usersInsCarrierName" value="<?php echo $v['ins_carrier_name'] ?>"/>                          &nbsp;*
      
                  </td>
              </tr>              
              
        <tr>
                  <td>Phone</td>
                  <td align="left">
                      <input name="ins_carrier_phone" type="text" class="will-be-required" id="usersInsCarrierPhone" value="<?php echo $v['ins_carrier_phone'] ?>"/>                          &nbsp;*
      
                  </td>
              </tr>              
      
      <tr>
                  <td>Policy Number</td>
                  <td align="left">
                      <input name="ins_policy_num" type="text" class="will-be-required" id="usersInsPolicyNum" value="<?php echo $v['ins_policy_num'] ?>"/>
&nbsp;*</td>
              </tr>        
      
      <tr>
                  <td>Expiration Date</td>
                  <td align="left">
                      <input name="ins_policy_exp" type="text" class="will-be-required" id="usersInsPolicyExp" value="<?php echo $v['ins_policy_exp'] ?>"/>
&nbsp;*</td>
              </tr>   
                    
      <tr>
                  <td>Coverage Amount</td>
                  <td align="left">
                      <input name="ins_policy_coverage" type="text" class="will-be-required" id="usersInsPolicyCoverage" value="<?php echo $v['ins_policy_coverage'] ?>"/>
&nbsp;*</td>
              </tr>   
                </table>
                <br/>
            </div>
            <!-- leftRegister -->
            <div id="rightRegister">
                <table class="input">
                    <th colspan="2" ><h2 style="text-align:center">PRODUCT INFORMATION</h2>
                    </th>
                    <tr>
                        <td ><p>Principal products on your site.</p></td>
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
                    
                    
                     <tr>
                  <td valign="top">&nbsp; </td>
                  
                  <td class="t-radios">
                      <input type="hidden" name="product_attribute" id="usersProductAttribute" value="" />
                      <input type="radio" name="product_attribute" id="UsersProductAttributeAll" value="all" <?=$v["product_attribute"]=="all"?"checked":""?> />
                      <label for="UsersProductAttributeSome">Some</label><br />
                      <input type="radio" name="product_attribute" id="UsersProductAttributeSome" value="some" <?=$v["product_attribute"]=="some"?"checked":""?> />
                      <label for="UsersProductAttributeAll">None</label><br />
                      <input type="radio" name="product_attribute" id="UsersProductAttributeNone" value="none" <?=$v["product_attribute"]=="none"?"checked":""?> />
                                                                      
                  </td>
              </tr>
                    
                    
                    
                    
                </table>
            
            
</div>