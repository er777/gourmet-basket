<?php
$page = "administrator_section";
include_once("_header.php");

?>
<div align="center"><br />
<?php 

if ($_SESSION['l_level'] != 'admin'){ ?>
<table border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
    <tr>
        <td>
        Welcome to the Gourmet Basket Administration Center<br /><br />
        
        Follow this sequence to learn about Gourmet Basket and to enroll as a Vendor.<br /><br />
        
       <div class="bullet-box"> 
			<div style="float:left">1) Click on : </div>
            	<div class="vendor-bullets"><a href="vendor-package/WelcomeVendor.pdf">Vendor Welcome Letter</a> for an overview of Gourmet Basket.
                </div>
       </div>
         
         <div class="clear"></div>  
         
        <div class="bullet-box"> 
			<div style="float:left">2) Click on : </div>
            	<div class="vendor-bullets"><a href="vendor-package/VendorRegistrationInstructions.pdf">Vendor Registration Instructions</a> to guide you in completing your Vendor Registration.
            	</div>
        </div>
        <div class="clear"></div> 
        
        <div class="bullet-box"> 
			<div style="float:left">3) Click on :</div>
            	<div class="vendor-bullets"><a href="http://test.gourmet-basket.com/admin/vendors.php">Vendor Registration</a> to enroll become a Gourmet Basket Vendor.
            	</div>
        </div>
         <div class="clear"></div> 
                      
        <div class="bullet-box">   
			<div style="float:left">4) Click on :</div>
            	 <div class="vendor-bullets"><a href="http://welcome.gourmet-basket.com/">Home Page</a> to view the developing Home Page of the site. Once there click "Vendor" on the Menu bar to see a sample of a Vendor Shoppe and click on any product to see a sample of a product page.
            	</div>
       	</div>
        <div class="clear"></div>  
          
              
		<div class="bullet-box">   
			<div style="float:left">5) Click on :</div>
            	<div class="vendor-bullets" style="margin-bottom:10px"><a href="vendor-package/LegalWholesaleVendor.pdf">Vendor Participation Agreement</a>&nbsp;to view and print out the legal contract between Gourmet Basket and its Vendors for your files.
            	</div>
        </div>
           
		<div style="width:350px;margin-left:74px;margin-bottom:20px">Mail back only the signature page of the signed agreement to:<br />
            Gourmet Basket<br />
          	4066 West 7th St.<br />
          	Los Angeles, CA  90005
        </div>
        </td>
    </tr>
    
        <tr>   
        <td>
        </td>
    </tr>
    <tr>
        <th>
        When your Shoppe is active you can use the following links to control information about your Shoppe in the Gourmet Basket database: <br>
        <br>
        <ul>
        	<li>View / Edit /<a href="vendors.php" style="text-decoration:underline;color:gray;font-weight:bold;">Registration/Administration Database</a> </li>  
            <li>View / Edit / Delete <a href="products.php" style="text-decoration:underline;color:gray;font-weigth:bold;">Products</a> </li>  
            <li>Change status of <a href="orders_vendor.php" style="text-decoration:underline;color:gray;font-weigth:bold;">Orders</a></li>
        </ul>   
        </th>
    </tr>
</table>


<?php
}else{ ?>
<table border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
    <tr>
        <td>
        <img src="images/titles/title_administrator_section.jpg" /><br>
        </td>
    </tr>
    <tr>   
        <td>
        </td>
    </tr>
    <tr>
        <td>
        This section allows you to contrdiv the records in the database: <br>
        <br>
        <ul>
            <li><a href="administrators.php" style="text-decoration:underline;cdivor:gray;font-weigth:bdivd;">Manage administrators</a> of this section</li>
            <li>View / Edit / Delete <a href="vendors.php" style="text-decoration:underline;cdivor:gray;font-weigth:bdivd;">Users</a> </li>  
            <li>Add / Edit / Delete <a href="categories.php" style="text-decoration:underline;cdivor:gray;font-weigth:bdivd;">Categories</a></li>
        </ul>   
        </td>
    </tr>
</table>
<?php  } ?>


</div>
<?php
include_once("_footer.php");
?>
