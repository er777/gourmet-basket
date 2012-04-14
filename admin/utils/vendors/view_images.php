<?php
session_start();
if(@$_SESSION["enter"] != "on"){
    header("location: index.php");
    exit();
}

include_once("_header.php");

$idproducts = $_GET["pid"];
$pn= $_GET ["pn"];
?>
<style type="text/css">
<!--
.Estilo1 {
    color: #003399;
    font-size: 10px;
}
    .Estilo2 {
    color: #999999;
    font-size: 20px;
}

-->
</style>
<div align="center">
<table border="0" cellpadding="0" cellspacing="0" style="width:600px; text-align:left">
    <form method="post" action="categories.php" name="frmCategories">
    <input type="hidden" value="row_none" id="prevrowid"> 
    <tr>
        <td><span class="Estilo2">  <?php echo $pn; ?></span><td></tr><tr>
        <td><img src="images/line.jpg" /><br></td>
    </tr>
    <tr>   
        <td>
        <br>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td></td>
                <td align="right">[&nbsp;<a style="display:none;" href="javascript:view('<?php echo $idproducts; ?>');" title="Gourmet Basket - Product Editor">Upload more images...</a>&nbsp;]</td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td>
                    <table style="width:800px;" border="0" cellpadding="2" cellspacing="2">
                        <tr style="font-size:8pt; background:lightblue; color:black;">
                            <th>Image</th>
                            <th>Prod. ID</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            
                        </tr>
                        <?php
                            DB::connect();
                            $qry = "SELECT p.id, p.filename, p.product_id, c.product_name, c.description FROM products_photos p
                                INNER JOIN products c ON p.product_id = c.product_id WHERE p.product_id = ". $idproducts ;
                                
                            DB::query($qry);
                            $b = 0;
                            while($row=DB::fetch_row()){
                                $bgcolor = "#E0E0E0";
                                $bgcolor_op = "#F0F0F0";
                                if(($b%2)==0) {
                                    $bgcolor = "#F0F0F0";
                                    $bgcolor_op = "#E0E0E0";
                                }
                                ?>
                                <tr style="cursor:pointer; font-size:8pt; color:black;" bgcolor="<?php echo $bgcolor; ?>"                        
                                id="row_<?php echo $row["id"]; ?>" 
                                onMouseover="switchClass('row_<?php echo $row["colorphotoid"]; ?>', '<?php echo $bgcolor_op; ?>');" 
                                onclick="Modalbox.show('utils/colorseditorproduct.php?cmd=edit&pids=<?=$row["product_id"];?>&cid=<?php echo $row["colorphotoid"]; ?>', {title: 'PicturesCreatedByU - Colors Editor', width:600, height: 450, aspnet: false}); return false; ">
        
                                    <td><?php
                                    if($row["filename"]!=""){
                                        echo "<img src='../tool/products/" . $row["filename"] . "' width=50 height=50 />";
                                    }
                                    else {
                                        echo "<img src='images/img_upload.jpg' width=50 height=50 />";
                                    }
                                    ?></td>
                                    <td><?php echo $row["id"]; ?></td>
                                    
                                    <td style="width:200px;"><?php echo $row["product_name"]; ?></td>
                                    <td style="width:200px;"><?php echo $row["description"]; ?></td>
                                   
      
                                    
                                </tr>
                                <?php
                                $b++;
                            }
                            DB::close();
                        ?>
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
    </form>
</table>
<?php
include_once("_footer.php");
?>
<script language="javascript">
<!--//

     function checkProductForm(){
        var oName = document.getElementById('product_name');
        var oDesc = document.getElementById('product_description');
        var oCat = document.getElementById('category_id');
        var oSub = document.getElementById('subcategory_id');
        var oPrice = document.getElementById('price');
        var strErr = '';
        if(oName.value =='') strErr += ' - Product Name\n';
        if(oDesc.value =='') strErr += ' - Description\n';
        if(oCat.value =='') strErr += ' - Category\n';
        if(oSub.value =='') strErr += ' - Subcategory\n';
        if(oPrice.value=='') strErr += ' - Price\n';
        if(strErr != ''){
            alert('Please correct the following:\n' + strErr);
            return false;
        }
        else
        {
            if(isNaN(document.getElementById("price").value)
            {
                 alert("The price must be a numeric value");
                 return false;
            }
             else
            return true;
        } 
            
       
            
     } 
     
       }  
     function selectDefault(cid, opt) {
         fillOptions(cid);
         var obj = document.getElementById("subcategory_id");
         for(i=0; i<obj.options.length; i++) {
             if(obj.options[i].value == opt) {
                 obj.options[i].selected = true;
                 break;
             }
         }
     }     
//-->
</script>
<script language="javascript">
    function view(pag){
            
            window.open('utils/upload_images.php?cmd=add&idproducts=' + pag ,'view','height=300,width=600,scrollbars=yes,resizable=yes');
            }

</script>
