<?php
?>

<h2 style="text-align:center">SHIPPING INFORMATION</h2>
<div style="width:400px">
  <div>
    CHECK THE SHIPPERS YOU CURRENTLY USE:
		<div style="width:100px">
			

            <table width="100" align="left"class="input" style="color:#0c2c5a;">
              <tr>
                <td><h2 class="showrequired" style="display: none;"> Please select one of these shipping services </h2></td>
              </tr>
              <tr>
                <td width="52">UPS</td>
                <td width="17" align="left"><input type="checkbox" name="data[shipping][gb_ups]" value="1" class="required" id="shippingGbUps" <?=$s["gb_ups"]?"checked":""?> /></td>
              </tr>
              <tr>
                <td>FEDEX</td>
                <td align="left"><input type="checkbox" name="data[shipping][gb_fedex]" value="1" class="required" id="shippingGbFedex" <?=$s["gb_fedex"]?"checked":""?> /></td>
              </tr>
              <tr>
                <td>USPS</td>
                <td align="left"><input type="checkbox" name="data[shipping][gb_usps]" value="1" class="required" id="shippingGbUsps" <?=$s["gb_usps"]?"checked":""?> /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
    	</div>
  </div>
  
</div>

 <div class="clear"></div>
 
<div style="width:400px">
  <p class="left" style="text-align:left; text-align:justify;">CHECK IF YOU WOULD LIKE TO SHIP USING GOURMET BASKET'S UPS OR FEDEX ACCOUNTS, <strong>WHICH DO NOT REQUIRE YOU TO OUTLAY FUNDS FOR SHIPPING:</strong></p>
  <div class="left">
    <input type="checkbox" name="data[shipping][check_gb_shipping]" value="1" class="required" id="shippingCheckGbShipping" <?=$s["check_gb_shipping"]?"checked":""?> />
    ( YES ) </div>
  <div class="clear"></div>
</div>
<div class="clear"></div>
<h2 style="text-align:center"> Gourmet - Basket Shipping</h2>
<div class="shipping-box">
  <div> </span></div>
  <div>Please enter your <strong>Shipping Policy</strong> as you would like it displayed in your Shoppe.<br />
    <br />
    
    <textarea name="data[shipping][shipping_policy]" id="shippingShippingPolicy" cols="60" rows="5"><?=$s["shipping_policy"]?>
</textarea>
  </div>
  
  <script type="text/javascript">
                                    //<![CDATA[
                    
                                    CKEDITOR.replace( 'shippingShippingPolicy' );
                    
                                    //]]>
             </script>
  
  
  
  
  
  Please read Gourmet Basket's<a style="color:#C00;text-decoration:underline" href="/pages/faq"> Shipping Policy </a> <!--<input type="checkbox" name="data[shipping][standard_policy_check]" value="1" class="required" id="shippingStandardPolicyCheck" <//?=$s["standard_policy_check"]?"checked":""?> />
              --> 
  
  <br />
  <br />
  <div>Your products ship in how many days from purchase?<br />
    <input name="data[shipping][ships_in]" type="text" size="5" class="" id="shippingShipsIn" value="<?=$s["ships_in"]?>" />
  </div>
  <br />
  <div>Do you ship perishable items?--><strong>YES</strong><span>
    <input type="checkbox" name="data[shipping][perishable_check]" value="1" id="shippingPerishableCheck" <?=$s["perishable_check"]?"checked":""?> />
    </span></div>
  <div>Please enter your <strong>Perishable Items Shipping Policy</strong> as you would like it displayed in your Shoppe. <br />
    <br />
    <textarea name="data[shipping][perishable_policy]" id="shippingPerishablePolicy" cols="60" rows="5"><?=$s["perishable_policy"]?>
</textarea>
  </div>
  <br />
  <div>Do you offer any special arrangements for shipping? --><strong>YES</strong><span>
    <input type="checkbox" name="data[shipping][standard_policy_check]" value="1" class="required" id="shippingStandardPolicyCheck"<?=$s["standard_policy_check"]?"checked":""?>/>
    </span></div>
  <div>If yes, will you offer this arrangement to Gourmet Basket customers? --><strong>YES</strong><span>
    <input type="checkbox" name="data[shipping][standard_policy_check]" value="1" class="required" id="shippingStandardPolicyCheck"<?=$s["standard_policy_check"]?"checked":""?>/>
    </span></div>
  <div>Please enter your <strong>Special Shipping Arrangements</strong> as you would like them displayed in your shoppe.<br />
    <br />
    <textarea name="data[shipping][discount_shipping_policy]" id="shippingDiscountShippingPolicy" cols="60" rows="5"><?=$s["discount_shipping_policy"]?>
</textarea>
  </div>
</div>
<!--table class="input">
                    <tr>
                        <td valign="top">
                            <b>Shop description:</b>
                        </td>                   
                    </tr> 
                    <tr>
                        <td valign="top">
                            <textarea cols="80" rows="10" name="shop_description" id="shop_description"><?php //echo $v['shop_description']; ?></textarea>
                        </td>                 
                    </tr> 
                    <tr>
                        <td valign="top">
                            <b>Shipping policy:</b> 
                        </td>                   
                    </tr> 
                    <tr>
                        <th valign="top">
                            <textarea cols="80" rows="10" name="shipping_policy" id="shipping_policy"><?php //echo $v['shipping_policy']; ?></textarea>
                            <script type="text/javascript">
                                //<![CDATA[
                
                                // This call can be placed at any point after the
                                // <textarea>, or inside a <head><script> in a
                                // window.onload event handler.
                
                                // Replace the <textarea id="editor"> with an CKEditor
                                // instance, using default configurations.
                                //CKEDITOR.replace( 'shop_description' );
                                //CKEDITOR.replace( 'shipping_policy' );
                
                                //]]>
                            </script>

                        </th>                 
                    </tr> 
                </table-->