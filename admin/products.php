<?php
$page = "products";
include_once("_header.php");
$userid = (isset($_GET['id'])?$_GET['id']:"");
$prod_name = ((isset($_GET['prod_name']))?$_GET['prod_name']:"");
                
?>
<input type="hidden" value="row_none" id="prevrowid"/> 
<table border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
        
        <tr>
            <td><img src="images/titles/<?php echo ($_SESSION["l_level"] == 'admin' ? "title_vendors.jpg" : "title_my_products.jpg"); ?>" /><br></td>
        </tr>
        <tr>   
            <td>
<?php 
if($_SESSION['l_level']=='admin' && $userid==""){
include 'utils/products/shops.php';    
}else{
include 'utils/products/listproducts.php';    
}
?>        
            </td>
        </tr>
</table>

<?php
include_once("_footer.php");
?>
<script type="text/javascript">
function checkProductForm(){
        var user = document.getElementById('user_id');
        var name = document.getElementById('product_name');
        var item = document.getElementById('item'); 
        var description = document.getElementById('description'); 
        var selling_price = document.getElementById('selling_price');
        var price = document.getElementById('price');
        var stock = document.getElementById('stock');
        var category_id = document.getElementById('category_id');
        var subcategory_id = document.getElementById('subcategory_id');
        var weight = document.getElementById('weight');
        //var size = document.getElementById('size');
        
        var strErr = '';
        if(user.value =='Select') strErr += ' - Vendor\n';
        if(name.value =='') strErr += ' - Product Name\n';
        if(item.value =='') strErr += ' - Item\n';
        if(description.value =='') strErr += ' - Description\n';
        if(selling_price.value =='') strErr += ' - Selling price\n';
        if(price.value =='') strErr += ' - Price\n';
        if(stock.value =='') strErr += ' - Stock\n';
        if(category_id.value =='') strErr += ' - ID Category\n';
        if(subcategory_id.value =='') strErr += ' - ID Subcategory\n';
        if(weight.value =='') strErr += ' - Weight\n';
        //if(size.value =='') strErr += ' - Size';
				jQuery('[name^="modifier_"]:visible').each(function(){
					$this = jQuery(this);
					if($this.val() == ''){
						strErr += ' - Modifier has empty field\n';
						$this.focus();
					}
				});
				
        if(strErr != ''){
            alert('Please correct the following:\n' + strErr);
            return false;
        }else{
                jQuery('.single_modifier.template').remove(); // remove the hidden template from the dom before sugmitting the form
            return true;
			 	}
     } 
</script>
