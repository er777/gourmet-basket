<?php echo $this->Form->create('Register', array('url' => '/register/register', 'id' => 'form_vendor')); ?>
<?php echo $this->Form->hidden('users.level', array('value' => 'vendor')); ?>
<div id="leftRegister">
    <table width="400" align="right" class="input" style="color:#0c2c5a;">
        <tr>
            <th colspan="2" ><h2 style="text-align:center">BUSINESS IDENTIFICATION</h2>
        </th>
        </tr>
        <tr>
            <th width="140">Business Name</th>
            <td width="210" align="left">
                <?php echo $this->Form->text('users.business_name', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Street Address</th>
            <td align="left">
                <?php echo $this->Form->text('users.street_address', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Street Address 2</th>
            <td align="left">
                <?php echo $this->Form->text('users.street_address2', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Country</th>
            <td align="left">
            <?php echo $this->Form->select('users.country_id', $countries, 223, array('style' => 'width:180px', 'onchange' => "exeAjax('id='+this.value+'&action=12', 'zone_span', false)")); ?>
            &nbsp;*
            </td>
        </tr>
        <tr>
            <th>State</th>
            <td align="left">
            <span style="padding: 0px;" id="zone_span">
            <?php echo $this->Form->select('users.zone_id', $zones, NULL, array('style' => 'width:180px')); ?>
            
            </span>                
            &nbsp;*
            <h2 class="staterequired" style="display: none;">
                Please select your state
            </h2>
            </td>
        </tr>
        <tr>
            <th>City</th>
            <td align="left">
                <?php echo $this->Form->text('users.city', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>                        
        <tr>
            <th>ZIP</th>
            <td align="left">
                <?php echo $this->Form->text('users.zip', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Phone</th>
            <td align="left">
                <?php echo $this->Form->text('users.phone', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Fax</th>
            <td align="left">
                <?php echo $this->Form->text('users.fax', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Website - http://</th>
            <td align="left">
                <?php echo $this->Form->text('users.website', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>        
        <tr>
            <th>Proof of insurance (POI)</th>
            <td align="left">
                <?php echo $this->Form->text('users.proof_insurance', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;
                 
            </td>
            <td>
                <span style="color:#8b181b;"><strong>BUSINESS HISTORY</strong></span>
            </td>
        </tr>           
        
        <tr>
            <td>&nbsp;
                 
            </td>
            <td>
                <b>Check your business type</b>
            </td>
        </tr>           
        
        <tr>
            <th valign="top">&nbsp; </th>
            
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
            <th>Years in food business</th>
            <td align="left">
                <?php echo $this->Form->text('users.years_in_business', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>

        <tr>
            <th>
            </th>      
            <td>
                <b>Contact for Site</b>
            </td>                      
        </tr>
        <tr>
            <th>(First Name)</th>
            <td align="left">
                <?php echo $this->Form->text('users.contact1_first_name', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>(Last Name)</th>
            <td align="left">
                <?php echo $this->Form->text('users.contact1_last_name', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Title</th>
            <td align="left">
                <?php echo $this->Form->text('users.contact1_title', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Phone</th>
            <td align="left">
                <?php echo $this->Form->text('users.contact1_phone', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>eMail</th>
            <td align="left">
                <?php echo $this->Form->text('users.contact1_email', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>
            </th>    
            <td>
                <b>Contact Personal (Contact 2)</b>
            </td>                        
        </tr>
        <tr>
            <th>First Name</th>
            <td align="left">
                <?php echo $this->Form->text('users.contact2_first_name', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td align="left">
                <?php echo $this->Form->text('users.contact2_last_name', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th> Title</th>
            <td align="left">
                <?php echo $this->Form->text('users.contact2_title', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Phone</th>
            <td align="left">
                <?php echo $this->Form->text('users.contact2_phone', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>eMail</th>
            <td align="left">
                <?php echo $this->Form->text('users.contact2_email', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>
            </th>       
            <td>
                <b>Customer Service </b>
            </td>                     
        </tr>
        <tr>
            <th>Contact</th>
            <td align="left">
                <?php echo $this->Form->text('users.cust_service_contact', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Phone</th>
            <td align="left">
                <?php echo $this->Form->text('users.cust_service_phone', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Ext</th>
            <td align="left">
                <?php echo $this->Form->text('users.cust_service_phone_ext', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td align="left">
                <?php echo $this->Form->text('users.cust_service_email', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        
        
<tr>
            <th>
            </th>       
            <td>
            <span style="color:#8b181b;"><strong>PRODUCT LIABILITY INSURANCE</strong></span>
                                
            </td>                     
        </tr>        
        
<tr>
            <th>Carrier Name</th>
            <td align="left">
                <?php echo $this->Form->text('users.ins_carrier', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>        
        
<tr>
            <th>&nbsp;</th>
            <td align="left">
                Carrier Contact
            </td>
        </tr>        
  
  <tr>
            <th>Name</th>
            <td align="left">
                <?php echo $this->Form->text('users.ins_carrier_name', array('label' => false)); ?>
                &nbsp;*

            </td>
        </tr>              
        
  <tr>
            <th>Phone</th>
            <td align="left">
                <?php echo $this->Form->text('users.ins_carrier_phone', array('label' => false)); ?>
                &nbsp;*

            </td>
        </tr>              

<tr>
            <th>Policy Number</th>
            <td align="left">
                <?php echo $this->Form->text('users.ins_policy_num', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>        

<tr>
            <th>Expiration Date</th>
            <td align="left">
                <?php echo $this->Form->text('users.ins_policy_exp', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>   
              
<tr>
            <th>Coverage Amount</th>
            <td align="left">
                <?php echo $this->Form->text('users.ins_policy_coverage', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>   
             
        <tr>
            <th>
            </th>       
            <td>
            <span style="color:#8b181b;"><strong>CREATE YOUR VENDOR ACCOUNT</strong></span>
                                
            </td>                     
        </tr>
        <tr>
            <th width="140">Create a User Name</th>
            <td width="210" align="left">
                <?php echo $this->Form->text('users.user_name', array('label' => false, 'autocomplete' => 'off')); ?>
                &nbsp;*
                <div id="imgAPPROVAL"></div>
            </td>
        </tr>
        <tr>
            <th>Create a Password</th>
            <td align="left">
                <?php echo $this->Form->password('users.password', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Repeat Password</th>
            <td align="left">
                <?php echo $this->Form->password('password1', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>            
            </th>     
            <td>
            <h2 class="er_pass"></h2>
            </td>       
        </tr>                        
    </table>
    <div class="clear"><br /></div>
    <table width="400" align="right" class="input" style="color:#0c2c5a;">
        <tr>
            <th colspan="2">
        <h2 style="text-align:center">FINANCIAL INFORMATION</h2>
        </th>
        <tr>
            <th></th>
            <td><b>Please provide the following:</b></td>
        </tr>
        <tr>
            <th width="163">Order Email</th>
            <td width="225" align="left">
                <?php echo $this->Form->text('financial.order_email', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th width="163">Bank Name</th>
            <td width="225" align="left">
                <?php echo $this->Form->text('financial.bank_name', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Bank Address</th>
            <td align="left">
                <?php echo $this->Form->text('financial.bank_address', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Bank Account Number</th>
            <td align="left">                            
                <?php echo $this->Form->text('financial.bank_account', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Bank Routing Number</th>
            <td align="left">                            
                <?php echo $this->Form->text('financial.bank_routing', array('label' => false, 'size' => '30')); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Bank Phone Number</th>
            <td align="left">                                                        
                <?php echo $this->Form->text('financial.bank_phone', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Bank Contact Person</th>
            <td align="left">
                <?php echo $this->Form->text('financial.bank_contact', array('label' => false)); ?>
                &nbsp;*
            </td>
        </tr>
        <tr>
            <th colspan="2">
                <b>Please indicate the address to which payments should be sent if different from business address above</b>
            </th>                            
        </tr>
    </table>
</div><!-- leftRegister -->

<div id="rightRegister">
    <table width="356" class="input">

        <th colspan="2" ><h2 style="text-align:center">PRODUCT INFORMATION</h2>
        </th>
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

    <table width="400" align="left"class="input" style="color:#0c2c5a;">
        <tr>
            <th colspan="2" ><h2 style="text-align:center">SHIPPING INFORMATION</h2>
        </th>
        </tr>
        <tr>
            <th>            
            </th>
            <td>
                <p><label>CHECK IF YOU USE:</label></p>
                
                <h2 class="showrequired" style="display: none;">
                Please select one of these shipping services
                </h2>
            </td>
        </tr>
        <tr>
            <th width="142">UPS</th>
            <td width="246" align="left">
                <?php echo $this->Form->checkbox('shipping.gb_ups', array('value' => 1, 'class' => 'required', 'label' => false, 'hiddenField' => false)); ?>
                &nbsp;*</td>
        </tr>
        <tr>
            <th>FEDEX</th>
            <td align="left">
                <?php echo $this->Form->checkbox('shipping.gb_fedex', array('value' => 1, 'class' => 'required', 'label' => false, 'hiddenField' => false)); ?>
                &nbsp;*</td>
        </tr>
        <tr>
            <th>USPS</th>
            <td align="left">
                <?php echo $this->Form->checkbox('shipping.gb_usps', array('value' => 1, 'class' => 'required', 'label' => false, 'hiddenField' => false)); ?>
                &nbsp;*</td>
        </tr>
        
</table>        
        
        <div>
            Do you agree to the <a style="color:#C00;text-decoration:underline" href="">Standard Gourmet Basket Shipping Policy?</a>
        </div>
		<div>
                <?php echo $this->Form->checkbox('shipping.standard_policy_check', array('value' => 1, 'class' => 'required', 'label' => false, 'hiddenField' => false)); ?>
		</div>
        
        <div>If not, what is your Shipping Policy?</div>
        <div><?php echo $this->Form->textarea('shipping.shipping_policy', array('label' => false)); ?></div>
        
         <div>Your products ship in how many days from purchase?</div>
         <div><?php echo $this->Form->text('shipping.ships_in', array('label' => false)); ?></div>
       
         <div>Do you ship perishable items?</th>
         div><?php echo $this->Form->checkbox('shipping.perishable_check', array('value' => 1, 'label' => false, 'hiddenField' => false)); ?>
         </div>
       
         <div>What is your perishable items Shipping Policy?</div>
            <div><?php echo $this->Form->textarea('shipping.perishable_policy', array('label' => false)); ?></div>
       
            <div>If you have a discount Shipping Policy, please indicate:</div>
            <div><?php echo $this->Form->textarea('shipping.discount_shipping_policy', array('label' => false)); ?></div>
            
            <div>What is your Return Policy?</th>
            <div><?php echo $this->Form->textarea('shipping.return_policy', array('label' => false)); ?></div>
            
          <div>What is the rate your state or local tax jurisdiction charges ( sales or use taxes? )</div>
          
 
    <div class="clear"></div> 
    <br />
    <br />
    <?php echo $this->Form->button('Submit', array('type'=>'button', 'onclick' => 'send_form()')); ?>  
    <div class="clear"></div> 
    <br />
    <br />
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




