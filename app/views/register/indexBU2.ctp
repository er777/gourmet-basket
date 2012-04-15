<?php echo $this->Form->create('Register', array('url' => '/register/register', 'id' => 'form_vendor')); ?>
<?php echo $this->Form->hidden('users.level', array('value' => 'vendor')); ?>

<div style="width:650px;margin:auto;margin-top:30px;background-color:#FFF;padding:15px">
        <h1>Vendor Registration Part I</h1>
        <p> This form will help to complete your registration as a Gourmet-Basket Vendor.</p>
        <p>In the fields that require more than just a few words, please indicate the <strong>exact wording</strong> you wish to appear as your publicly 		displayed Shoppe policy.</p>
</div>

<div id="leftRegister">

    <div class="business">
    
              <table width="400" align="right" class="input" style="color:#0c2c5a;">
                  <tr>
                      <td colspan="2" ><h2 style="text-align:center">BUSINESS IDENTIFICATION</h2></td>
                  </tr>
                  <tr>
                      <td width="140">Business Name</td>
                      <td width="210" align="left">
                          <?php echo $this->Form->text('users.business_name', array('label' => false, 'size' => '30')); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  <tr>
                      <td>Street Address</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.street_address', array('label' => false, 'size' => '30')); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  <tr>
                      <td>Street Address 2</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.street_address2', array('label' => false, 'size' => '30')); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  <tr>
                      <td>City</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.city', array('label' => false, 'size' => '30')); ?>
                          &nbsp;*
                      </td>
                  </tr>                        
          
                  <tr>
                      <td>State</td>
                      <td align="left">
                      <span style="padding: 0px;">   <!--id="zone_span"-->
                      <?php echo $this->Form->select('users.zone_id', $zones, NULL, array('style' => 'width:180px')); ?>
                      
                      </span>                
                      &nbsp;*
                      <h2 class="staterequired" style="display: none;">
                          Please select your state
                      </h2>
                      </td>
                  </tr>
                  
                  <tr>
                      <td>ZIP</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.zip', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  
                  <tr>
                      <td>Country</td>
                      <td align="left">
                      <?php echo $this->Form->select('users.country_id', $countries, 223, array('style' => 'width:180px', 'onchange' => "exeAjax('id='+this.value+'&action=12', 'zone_span', false)")); ?>
                      &nbsp;*
                      </td>
                  </tr>
          
                  <tr>
                      <td>Phone</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.phone', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  
                  <tr>
                      <td>Fax</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.fax', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  
                  <tr>
                      <td>Website - http://</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.website', array('label' => false)); ?>
                          &nbsp;*
                      </td>
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
                          <?php
                          $options = array(
                              'individual' => 'Individual/Family Owned',
                              'family' => 'Small Family Corporation',
                              'corporation' => 'Large Corporation'
                          );
                          $attributes = array('legend' => false);
                          echo $this->Form->radio('users.business_ownership', $options, $attributes);
                          ?>                                
                      </td>
                  </tr>
                  
                  <tr>
                      <td>Years in food business</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.years_in_business', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
          
                  <tr>
                      <td>
                      </td>      
                      <td>
                          <strong>Contact for Site</strong>
                      </td>                      
                  </tr>
                  
                  <tr>
                      <td>(First Name)</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.contact1_first_name', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  
                  <tr>
                      <td>(Last Name)</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.contact1_last_name', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  
                  <tr>
                      <td>Title</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.contact1_title', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  
                  <tr>
                      <td>Phone</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.contact1_phone', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  
                  <tr>
                      <td>eMail</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.contact1_email', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  
                  <tr>
                      <td>&nbsp;</td>
                      
                      <td>
                          <strong>Contact Personal (Contact 2)</strong>
                      </td>                        
                  </tr>
                  
                  <tr>
                      <td>First Name</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.contact2_first_name', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  
                  <tr>
                      <td>Last Name</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.contact2_last_name', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  
                  <tr>
                      <td> Title</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.contact2_title', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  
                  <tr>
                      <td>Phone</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.contact2_phone', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  
                  <tr>
                      <td>eMail</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.contact2_email', array('label' => false)); ?>
                          &nbsp;*
                      </td>
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
                          <?php echo $this->Form->text('users.ins_carrier', array('label' => false, 'size' => '30')); ?>
                          &nbsp;*
                      </td>
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
                          <?php echo $this->Form->text('users.ins_carrier_name', array('label' => false, 'size' => '30')); ?>
                          &nbsp;*
          
                      </td>
                  </tr>              
                  
            <tr>
                      <td>Phone</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.ins_carrier_phone', array('label' => false)); ?>
                          &nbsp;*
          
                      </td>
                  </tr>              
          
          <tr>
                      <td>Policy Number</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.ins_policy_num', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>        
          
          <tr>
                      <td>Expiration Date</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.ins_policy_exp', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>   
                        
          <tr>
                      <td>Coverage Amount</td>
                      <td align="left">
                          <?php echo $this->Form->text('users.ins_policy_coverage', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>   
                       
                  <tr>
                      <td>
                      </td>       
                      <td>
                      <div><strong>CREATE YOUR VENDOR ACCOUNT</strong></div>
                                          
                      </td>                     
                  </tr>
                  <tr>
                      <td width="140">Create a User Name</td>
                      <td width="210" align="left">
                          <?php echo $this->Form->text('users.user_name', array('label' => false, 'autocomplete' => 'off')); ?>
                          &nbsp;*
                          <div id="imgAPPROVAL"></div>
                      </td>
                  </tr>
                  <tr>
                      <td>Create a Password</td>
                      <td align="left">
                          <?php echo $this->Form->password('users.password', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  <tr>
                      <td>Repeat Password</td>
                      <td align="left">
                          <?php echo $this->Form->password('password1', array('label' => false)); ?>
                          &nbsp;*
                      </td>
                  </tr>
                  <tr>
                     
                      <td>
                      <h2 class="er_pass"></h2>
                      </td>       
                  </tr>                        
              </table>
            
        
    </div><!--business -->
    
    
    <div>
    
    <div class="clear"><br /></div>
    
    <table width="400" align="right" class="input" style="color:#0c2c5a;">
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
                <?php echo $this->Form->text('financial.order_email', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <td width="163">Bank Name</td>
            <td width="225" align="left">
                <?php echo $this->Form->text('financial.bank_name', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Bank Address</td>
            <td align="left">
                <?php echo $this->Form->text('financial.bank_address', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Bank Account Number</td>
            <td align="left">                            
                <?php echo $this->Form->text('financial.bank_account', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Bank Routing Number</td>
            <td align="left">                            
                <?php echo $this->Form->text('financial.bank_routing', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Bank Phone Number</td>
            <td align="left">                                                        
                <?php echo $this->Form->text('financial.bank_phone', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Bank Contact Person</td>
            <td align="left">
                <?php echo $this->Form->text('financial.bank_contact', array('label' => false)); ?>
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
                <?php echo $this->Form->text('users.payment_street_address', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
                <tr>
            <td>City</td>
            <td align="left">
                <?php echo $this->Form->text('users.payment_city', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>                        

        <tr>
            <td>State</td>
            <td align="left">
            <span style="padding: 0px;">
            <?php echo $this->Form->select('users.payment_zone_id', $zones, NULL, array('style' => 'width:180px')); ?>
            
            </span>                
            &nbsp;*
            <h2 class="staterequired" style="display: none;">
                Please select your state
            </h2>
            </td>
        </tr>
        <tr>
            <td>ZIP</td>
            <td align="left">
                <?php echo $this->Form->text('users.payment_zip', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
  
        
    </table>
    
    </div>
    
    <div style="clear:both"></div>
    
    <div id="tax-box">

  		<h2 style="text-align:center">TAX INFORMATION</h2><br />
           
          <div>Are there State or local sales or use taxes your must charge for shipping food? -->YES<?php echo $this->Form->checkbox('taxes.check', array('value' => 1, 'label' => false, 'hiddenField' => false)); ?></div>
              
      If taxes apply, indicate the rates for shipments:<br />
              
          <div class="tax-in">State sales tax:  In state</div>
          <div><?php echo $this->Form->text('taxes.state_sales_tax_in_state', array('label' => false)); ?>%</div>
          <div class="tax-out">Out of state</div>
          <div><?php echo $this->Form->text('taxes.state_sales_tax_out_state', array('label' => false)); ?>%</div><br />
       
         <div class="tax-in">Local sales tax:  In State </div>
         <div><?php echo $this->Form->text('taxes.local_sales_tax_in_state', array('label' => false)); ?>%</div>
         <div class="tax-out">Out of state </div>
         <div><?php echo $this->Form->text('taxes.local_sales_tax_out_state', array('label' => false)); ?>%</div><br />
       
         <div class="tax-in">State use tax:  In State </div>
         <div><?php echo $this->Form->text('taxes.state_use_tax_in_state', array('label' => false)); ?>%</div>
         <div class="tax-out">Out of state </div>
         <div><?php echo $this->Form->text('taxes.state_use_tax_out_state', array('label' => false)); ?>%</div><br />
        
         <div class="tax-in">Local use tax:  In State </div>
         <div><?php echo $this->Form->text('taxes.local_use_tax_in_state', array('label' => false)); ?>%</div>
         <div class="tax-out">Out of state</div>
         <div><?php echo $this->Form->text('taxes.local_use_tax_out_state', array('label' => false)); ?>%</div><br />

	</div> <!--tax-box-->
    
</div><!-- leftRegister -->



<div id="rightRegister">
	
    <div class="product-list">
  
        <table width="250" class="input">
            <tr>
                <td colspan="2" ><h2 style="text-align:center">PRODUCT INFORMATION</h2></td>
            </tr>
            
            <tr>
                <td width="348"><p>Indicate your principal products.</p></td>
            </tr>
            
            <?php
            asort($type_products);
            foreach ($type_products as $key => $products) {
            ?> 
                <tr>
                    <td>
                        <?php echo $this->Form->checkbox('products.' . $key, array('value' => $key, 'label' => false, 'hiddenField' => false)); ?>
                        <?php echo $products; ?>
                    </td>
                </tr>
            <?php
            }
            ?>
            
        </table>
    </div>
      <table width="400" align="left"class="input" style="color:#0c2c5a;">
          <tr>
              <td colspan="2" ><h2 style="text-align:center">SHIPPING INFORMATION</h2></td>
          </tr>
          <tr>
              <td colspan="2"> 
               <p><label>CHECK IF YOU CURRENTLY USE:</label></p>           
              </td>
              <td width="315">
                  <h2 class="showrequired" style="display: none;">
                  Please select one of these shipping services
                  </h2>
              </td>
          </tr>
          <tr>
              <td width="52">UPS</td>
              <td width="17" align="left">
                  <?php echo $this->Form->checkbox('shipping.gb_ups', array('value' => 1, 'class' => 'required', 'label' => false, 'hiddenField' => false)); ?>
                  &nbsp;*</td>
          </tr>
          <tr>
              <td>FEDEX</td>
              <td align="left">
                  <?php echo $this->Form->checkbox('shipping.gb_fedex', array('value' => 1, 'class' => 'required', 'label' => false, 'hiddenField' => false)); ?>
                  &nbsp;*</td>
          </tr>
          <tr>
              <td>USPS</td>
              <td align="left">
                  <?php echo $this->Form->checkbox('shipping.gb_usps', array('value' => 1, 'class' => 'required', 'label' => false, 'hiddenField' => false)); ?>
                  &nbsp;*</td>
          </tr>
          
           <tr>
           <td>&nbsp;</td>
           </tr>
           
           <tr>
           <td colspan="3"> 
               <p><label>CHECK IF YOU WOULD LIKE TO USE GOURMET-BASKET'S UPS OR FEDEX SHIPPING ACCOUNTS, WHICH DO NOT REQUIRE YOU TO OUTLAY FUNDS FOR SHIPPING:</label></p></td>
           </tr>
              
           <tr>
              <td>&nbsp;</td>
              <td align="left">
                  <?php echo $this->Form->checkbox('shipping.check_gb_shipping', array('value' => 1, 'class' => 'required', 'label' => false, 'hiddenField' => false)); ?>
                  &nbsp;</td>
                  <td>Gourmet- Basket Shipping</td>
          </tr>
          
  </table> 

<div class="clear"></div> 
       
    <div class="shipping-box"> 
    
        <div>Do you agree to the <a style="color:#C00;text-decoration:underline" href="">Standard Gourmet Basket Shipping Policy?</a> <strong>-->YES</strong><span>
        <?php echo $this->Form->checkbox('shipping.standard_policy_check', array('value' => 1, 'class' => 'required', 'label' => false, 'hiddenField' => false)); ?></span></div>
        
        <div>If not, please type your Shipping Policy exactly as you would like it displayed in your Shoppe.<br />
        <?php echo $this->Form->textarea('shipping.shipping_policy', array('label' => false)); ?></div>
        
        <div>Your products ship in how many days from purchase?<br />
        <?php echo $this->Form->text('shipping.ships_in', array('label' => false, 'size' => '30')); ?></div>
        
        <div>Do you ship perishable items?<strong>-->YES</strong><span>
       <?php echo $this->Form->checkbox('shipping.perishable_check', array('value' => 1, 'label' => false, 'hiddenField' => false)); ?></span></div>
        
        <div>What is your perishable items Shipping Policy?<br />
        <?php echo $this->Form->textarea('shipping.perishable_policy', array('label' => false)); ?></div>
        
        <div>If you have a discount Shipping Policy, please indicate:<br />
        <?php echo $this->Form->textarea('shipping.discount_shipping_policy', array('label' => false)); ?></div>
        
       
            

</div>





  
   <table width="393"> 
  <tr>
            <td width="55">
            </td>       
            <td width="319" colspan="4"><h2 style="text-align:center">
                <strong>CUSTOMER SERVICE</strong></h2>
            </td>                     
        </tr>
        <tr>
            <td>Contact</td>
            <td align="left" colspan="2">
                <?php echo $this->Form->text('users.cust_service_contact', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Phone</td>
            <td align="left">
                <?php echo $this->Form->text('users.cust_service_phone', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Ext</td>
            <td align="left">
                <?php echo $this->Form->text('users.cust_service_phone_ext', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td align="left">
                <?php echo $this->Form->text('users.cust_service_email', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
  
  
  
  
</table>
<br />

 <div align="left">Do you agree to the <a style="color:#C00;text-decoration:underline" href="">Standard Gourmet Basket Return Policy?</a> <strong>-->YES</strong><span>
        <?php echo $this->Form->checkbox('shipping.return_policy_check', array('value' => 1, 'class' => 'required', 'label' => false, 'hiddenField' => false)); ?></span></div><br />
 <div align="left">If not, please type your Return Policy exactly as you would like it displayed in your Shoppe.<br />
        <?php echo $this->Form->textarea('shipping.return_policy', array('label' => false)); ?></div>

</div>
    <div class="clear"></div> 

    <div class="promotion">
    
    	<h2 style="text-align:center">YOUR SHOP DESCRIPTION</h2>
      
        <div>
    	<label>Provide exact wording that will appear as your Shoppe Description</label>
		</div>
        
            <div><?php echo $this->Form->textarea('users.shop_description', array('label' => false)); ?> </div>
            
    
    	<h2 style="text-align:center">SUGGESTIONS FOR PROMOTING AND USING YOUR PRODUCTS </h2>
    		Provide exact wording that will appear on your Shoppe for the following:<br />
		<div>
        <label>A quote about your business and/or products that will enhance our introduction to your Shoppe.</label>
		</div>
            <div><?php echo $this->Form->textarea('users_promotion.quote', array('label' => false)); ?> </div>

        <div>
        <label>Describe the uniqueness and special qualities of your business and products. </label>
		</div>
            <div><?php echo $this->Form->textarea('users_promotion.qualities', array('label' => false)); ?> </div>
            
        <div>
        <label>Charitable, community, outreach or "give back" activities related to your products or business.</label>
		</div>
            <div><?php echo $this->Form->textarea('users_promotion.charitable', array('label' => false)); ?> </div>
            
        <div>
        <label>Awards, recognition, or references in publications about your company or products. </label>
		</div>
            <div><?php echo $this->Form->textarea('users_promotion.awards', array('label' => false)); ?> </div>
            
        <div>
        <label>Recipes, suggestions or tips for using, preparing, cooking or presenting your products.</label>
		</div>
            <div> <?php echo $this->Form->textarea('users_promotion.recipes', array('label' => false)); ?> </div>
        
  	</div>
    

<div class="clear"></div> 
    	
         
          
          <div class="reg-submit">
          <br />
          <br />
          <?php echo $this->Form->button('Submit', array('type'=>'button', 'onclick' => 'send_form()')); ?>  
          <div class="clear"></div> 
          <br />
          <br />
          </div>
</div>

<?php echo $this->Form->end(); ?>
<script type="text/javascript" language="javascript">
    $(function() {
                
        $(":text").focus(function(){
            if($(this).val()=="This is required")   
                $(this).css("background","white").val("")   
        });
        $(":text").blur(function(){
            if($(this).val()=="")
                $(this).css("background","red").val("This is required")   
        });
        $("#RegisterPassword1").keyup(function(){
        if($("#RegisterPassword1").val()==$("#usersPassword").val()){
                    $(".er_pass").text("")
                }else{
                    send = false;            
                    $(".er_pass").text("Passwords do not match")
                }
        });
        $(".required").click(function(){
            if($(".required").is(':checked')==false){
                $(".showrequired").show();
            }else{
                $(".showrequired").hide();
            }   
        })
        $("#usersZoneId").live('change',function(){
            if($("#usersZoneId option:selected").val()==""){
                $(".staterequired").show();  
            }else{
                $(".staterequired").hide();  
            }          
        });
        
        
        $("#usersUserName").keyup(function(){
            if( $(this).val().length > 5 && $(this).val() != 'this is required'){
                $.post( "/admin/ajax.php",{ action:1, q: $(this).val(), user_id: 'new' }  ,
                function( data ) {
                    if(data==1)
                        $( "#imgAPPROVAL" ).html('<h2> already exists</h2>')
                    if(data==0){
                        $( "#imgAPPROVAL" ).html('<div class="yes"> </div>')
                    }            
                });            
            }else{
                $( "#imgAPPROVAL" ).html('<h2> 5 characters over  </h2>')  
            }
        });   
    });

    function send_form(){
        var send = true
        $.each($(":text"), function() {
            if($(this).val()=="this is required" || $(this).val()==""){
                send = false;
                $(this).css("background","red").val("This is required");
            }
        });
        $.each($(":password"), function() {
            if($(this).val()=="")
                $(".er_pass").text("Passwords not match")
            else{
                if($("#RegisterPassword1").val()==$("#usersPassword").val()){
                    $(".er_pass").text("")
                }else{
                    send = false;            
                    $(".er_pass").text("Passwords not match")
                }
            }
        }); 
        if($("#usersZoneId option:selected").val()==""){
            send = false;
            $("#usersZoneId option:selected").text('this is required');
            $(".staterequired").show();            
        }
        
        if($(".required").is(':checked')==false){
            //alert("Please select one of these shipping services")
            send = false;            
            $(".showrequired").show();
            //return false 
        }
        
        if(send==false){
            alert("Fields with * are required")
            return false
        }
        
        if( $("#usersUserName").val().length > 5 && $("#usersUserName").val() != 'this is requered'){
            $.post( "/admin/ajax.php",{ action: 1, q: $("#usersUserName").val(), user_id: 'new' }  ,
            function( data ) {
                if(data==0){// exist
                    if(send){
                        $( "#form_vendor" ).submit();  
                    }                                   
                }
                if(data==1){// approved
                    $( "#imgAPPROVAL" ).html('<h2> already exists</h2>')
                    alert("UserName already exists / UserName at least 5 characters")
                }   
                if(data==2){// updated
                    if(send){
                        $( "#form_vendor" ).submit();  
                    }                
                }            
            });            
        }else{
            $( "#imgAPPROVAL" ).html('<h2 style="text-align:center"> 5 characters over  </h2>')  
        }
        
    }
    
    var xmlhttp;	
var resp;
function exeAjax($param, $t_resp,$append){
    xmlhttp = cXMLHttpRequest();
    var url = '/admin/ajax.php';
    var $fullurl = url + '?' + $param; 
    resp = document.getElementById($t_resp);
    xmlhttp.open("GET", $fullurl, true);
    xmlhttp.send(null);
    if($append)xmlhttp.onreadystatechange = append; 
    else xmlhttp.onreadystatechange = proev;    
}

function proev(){
    if(xmlhttp.readyState == 4)
    {   //// TEXT
        resp.innerHTML = xmlhttp.responseText;
       
    }  
    else 
    {
        resp.innerHTML = 'Changing ...';
    }

}
function append(){
    if(xmlhttp.readyState == 4)
    {   //// TEXT
        resp.innerHTML += xmlhttp.responseText;
       
    }  
    else 
    {
        //resp.innerHTML = 'Changing ...';
    }

}

function cXMLHttpRequest() {
    var xmlHttp=null;
    if (window.ActiveXObject) 
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    else 
    if (window.XMLHttpRequest) 
        xmlHttp = new XMLHttpRequest();
    return xmlHttp;
}

</script>




