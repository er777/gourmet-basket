<?php 
include_once '../../_init.php';
?>
<form action="home_editor.php" method="post" enctype="multipart/form-data" name="formitemblock" id="formitemblock">
<table style="margin-right: 33px;width: 440px;" cellpadding="0" cellspacing="0">
    <tr style="background-color: silver;height: 30px;">
        <th width="25">id</th>
        <th width="80">image</th>
        <th width="80">title</th>
        <th width="40">Show Front</th>
        <th width="40">Options</th>
    </tr>
    <?php 
        DB::connect();
        $query_slide = "SELECT * FROM feature_blocks";
        DB::query($query_slide);
        while($row = DB::fetch_row())
        {
            if($row['feature_show']==1)
            {
                $check = 'checked';
            }
            else
            {
                $check = '';
            }
            echo "<tr ><td align='center' style='cursor:pointer;border-right: solid 1px silver;border-left: solid 1px silver;border-bottom: solid 1px silver;'><a onclick='loadblock(".$row['id'].")'>".$row['id']."</a></td>
                      <td align='center' style='border-right: solid 1px silver;border-bottom: solid 1px silver;'><img src='../app/webroot/img/featured/".$row['feature_block_pic']."' width='100'></td>
                      <td style='border-right: solid 1px silver;border-bottom: solid 1px silver;'>".$row['feature_block_title']."</td>
                      <td align='center' style='border-right: solid 1px silver;border-bottom: solid 1px silver;'><input type='checkbox' id='chkblock".$row['id']."' name='checkboxblock' ".$check."  onclick='comprovar(this, ".$row['id'].")'/></td>
                      <td align='center' style='border-right: solid 1px silver;border-bottom: solid 1px silver;'><a href='javascript:void()' onclick='opciondelete2(".$row['id'].")'>Delete</a></td></tr>";  
        }

        DB::close();
    ?>
</table>
</form>