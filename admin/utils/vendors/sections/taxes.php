<?php
?>

<div style="width:300px;margin:auto"> Is Food Tax Applicable?
<br />
   <div style="text-align:left"><input name="data[taxes][check]" type="radio" id="taxesCheck" value="1" <?=$t["check"]?"checked":""?> />(NO)
      
   </div>
   
  
   
   <div style="text-align:left"><input name="data[taxes][check]" type="radio" id="taxesCheck" value="0" <?=$t["check"]?"checked":""?> />(YES)
      
      If taxes do apply </div>
</div>
indicate the rates for shipments: <br />
<br />
<br />
<div class="tax-in">State sales tax:  In state</div>
<div>
   <input name="data[taxes][state_sales_tax_in_state]" type="text" class="" id="taxesStateSalesTaxInState" value="<?=$t["state_sales_tax_in_state"]?>" />
   %</div>
<div class="tax-out">Out of state</div>
<div>
   <input name="data[taxes][state_sales_tax_out_state]" type="text" class="" id="taxesStateSalesTaxOutState" value="<?=$t["state_sales_tax_out_state"]?>" />
   %</div>
<br />
<div class="tax-in">Local sales tax:  In State </div>
<div>
   <input name="data[taxes][local_sales_tax_in_state]" type="text" class="" id="taxesLocalSalesTaxInState" value="<?=$t["local_sales_tax_in_state"]?>" />
   %</div>
<div class="tax-out">Out of state </div>
<div>
   <input name="data[taxes][local_sales_tax_out_state]" type="text" class="" id="taxesLocalSalesTaxOutState" value="<?=$t["local_sales_tax_out_state"]?>" />
   %</div>
<br />
<div class="tax-in">State use tax:  In State </div>
<div>
   <input name="data[taxes][state_use_tax_in_state]" type="text" class="" id="taxesStateUseTaxInState" value="<?=$t["state_use_tax_in_state"]?>" />
   %</div>
<div class="tax-out">Out of state </div>
<div>
   <input name="data[taxes][state_use_tax_out_state]" type="text" class="" id="taxesStateUseTaxOutState" value="<?=$t["state_use_tax_out_state"]?>" />
   %</div>
<br />
<div class="tax-in">Local use tax:  In State </div>
<div>
   <input name="data[taxes][local_use_tax_in_state]" type="text" class="" id="taxesLocalUseTaxInState" value="<?=$t["local_use_tax_in_state"]?>" />
   %</div>
<div class="tax-out">Out of state</div>
<div>
   <input name="data[taxes][local_use_tax_out_state]" type="text" class="" id="taxesLocalUseTaxOutState" value="<?=$t["local_use_tax_out_state"]?>" />
   %</div>
<br />
