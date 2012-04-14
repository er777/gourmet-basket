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
<table border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
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
                <td align="right">[&nbsp;<a href="" onclick="Modalbox.show('utils/useraddalbum.php?pid=<?php echo $idproducts; ?>', {title: 'Gourmet Basket - User Access', width:280, height: 120, aspnet: false}); return false; ">Add User</a>&nbsp;]</td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td>
                    <table style="width:800px;" border="0" cellpadding="2" cellspacing="2">
                        <tr style="font-size:8pt; background:lightblue; color:black;">
                            <th>#</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Last name</th>
                    
                            
                        </tr>
                        <?php
                            DB::connect();
                            $qry = "SELECT * FROM access_album a 
                            INNER JOIN users b ON b.user_id  = a.user_id
                            WHERE product_id = '".$idproducts."'" ;
                                
                            DB::query($qry);
                            $b = 0;
                            $i = 1;
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
                                onclick="Modalbox.show('utils/colorseditorproduct.php?cmd=edit&pids=<?=$row["product_id"];?>&cid=<?php echo $row["colorphotoid"]; ?>', {title: 'Gourmet Basket - Colors Editor', width:600, height: 450, aspnet: false}); return false; ">

                                    <td style="width:200px;"><?=$i; ?></td>
                                    <td style="width:200px;"><?=$row["user_id"]; ?></td>
                                    <td style="width:200px;"><?=$row["firstname"]; ?></td>
                                    <td style="width:200px;"><?=$row["lastname"]; ?></td>
                                </tr>
                                <?php
                                $b++;
                                $i++;
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
