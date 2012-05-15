<?php
$page = "customers"; // who the heck can't spell customers? -DS
include_once("_header.php");
/**
 *  @file
 *  This page is used as a controller to pull various views of member data.
 *  
 */           
?>
<style type="text/css">
    #customer_edit_form div {
        border: 1px solid red;
        padding: 4px;
        margin: 2px;
    }
    #customer_edit_form div input{
        margin: 0;
        padding: 5px;  
    }
    .address_template{
        border: 1px solid #CCC;
        padding: 5px;
        margin: 5px;
        float: left;
    }
    .address_template td{
        text-align: right;
    }
    .address_template h4{
        text-align: left;
        font: 18px/22px arial;
        margin: 0 0 10px 0;
        padding: 0;
        border-bottom:1px solid #666;
    }
</style>
<div align="center">
<table class="overrow" border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
    <tr>
        <td>
         <img src="images/titles/title_costumers.jpg" /><br>
        </td>
    </tr>
    <tr>   
        <td>
        <br/>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td>List of Customers:</td>  
                 <td align="right" width="250">
                 <a href="iuvendor.php" style="text-decoration:none;color:Gray;" title="Gourmet Basket - Vendors Editor">
                 <img src="images/add.png" width="16"/> Add Customers</a></td>              
            </tr>
        </table>
        <?php 
        if(!isset($_GET['id'])){
            require_once('views/show_all_members.php');
        }else{
            require_once('views/show_single_member.php');
        }
        ?>
        </td>
    </tr>
</table>
</div>
<?php
include_once("_footer.php");
?>
