<?php 
include_once '../../_init.php';
?>
<form action="home_editor.php" name="form3" method="POST">
<input type="hidden" value="updtshow_slide" name="type"/>
<table style="width: 446px;" cellpadding="0" cellspacing="0">
    <tr style="background-color: silver;height: 30px;">
        <th width="25">id</th>
        <th width="80">image</th>
        <th width="80">title</th>
        <th width="40">Show Front</th>
        <th width="40">Options</th>
    </tr>
    <?php 
        DB::connect();
        $query_slide = "SELECT * FROM feature_slides ORDER BY id ASC";
        DB::query($query_slide);
        while($row = DB::fetch_row())
        {
            if($row['show_front'] == 1)
            {
                $check1 = "checked";
            }
            else
            {
                $check1 = "";
            }
            
            echo "<input type='hidden' value='".$row['id']."' name='id_slide_updt'/>
                    <tr ><td align='center' style='cursor:pointer;border-right: solid 1px silver;border-left: solid 1px silver;border-bottom: solid 1px silver;'><a onclick='load(".$row['id'].")'>".$row['id']."</a></td>
                      <td align='center' style='border-right: solid 1px silver;border-bottom: solid 1px silver;'><img src='../app/webroot/img/featured/".$row['feature_slide_pic']."' width='100'></td>
                      <td style='border-right: solid 1px silver;border-bottom: solid 1px silver;'>".$row['feature_slide_title']."</td>
                      <td align='center' style='border-right: solid 1px silver;border-bottom: solid 1px silver;'><input type='checkbox' id='checkbox".$row['id']."' name='checkbox".$row['id']."' ".$check1."  onclick='conprovar2(this, ".$row['id'].")'/></td>
                      <td align='center' style='border-right: solid 1px silver;border-bottom: solid 1px silver;'><a href='javascript:void()' onclick='opciondelete(".$row['id'].")'>Delete</a></td></tr>";
        }
        DB::close();
    ?>
</table>
</form>