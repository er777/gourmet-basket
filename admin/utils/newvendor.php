<?php
session_start();
if (@$_SESSION["enter"] != "on") {
    header("location: index.php");
    exit();
}

include_once("../_header.php");
?>

<form method="post" action="">
    <div id="registerBlock">
        <div style="width:650px;margin:auto;">
            <h1>Join the Gourmet-Basket Community of Vendors</h1>
            <p> Welcome to the Gourmet-Basket Community of Vendors.  We love to meet new and creative food producers, vendors and distributors seeking help to promote and market their unique products.</p>
            <p>Please provide the information below. One of our staff will contact you shortly to answer any questions and help complete the steps necessary to set up your Gourmet-Basket Online Shoppe.</p>
        </div>
        <div id="leftRegister">
            <table width="400" align="right"class="input" style="color:#0c2c5a;">
                <tr>
                    <th colspan="2" ><h2 style="text-align:center">BUSINESS IDENTIFICATION</h2>
                </th>
                </tr>
                <tr>
                    <th width="140">Business Name</th>
                    <td width="210" align="left"><input type="text" name="business_name" value="<?php echo $html_business_name ?>" size="30"/>
                        &nbsp;*</td>
                </tr>
                <!--<tr>
                  <th width="140">Shoppe Name</th>
                  <td width="210" align="left"><input type="text" name="shop_name" value="<?php echo $html_shop_name ?>" size="30"/>
                    &nbsp;*</td>
                </tr>-->
                <tr>
                    <th>Street Address</th>
                    <td align="left"><input type="text" name="street_address" value="<?php echo $html_street_address ?>" size="30"/>
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th>Street Address 2</th>
                    <td align="left"><input type="text" name="street_address2" value="<?php echo $html_street_address2 ?>" size="30"/>
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td align="left"><input type="text" name="city" value="<?php echo $html_city ?>" size="30" />
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th>State</th>
                    <td align="left"><input type="text" name="state" value="<?php echo $html_state ?>"/>
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th>ZIP</th>
                    <td align="left"><input type="text" name="zip" value="<?php echo $html_zip ?>"/>
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td align="left"><input type="text" name="phone" value="<?php echo $html_phone ?>"/>
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th>Fax</th>
                    <td align="left"><input type="text" name="fax" value="<?php echo $html_fax ?>"/>
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th>Website - http://</th>
                    <td align="left"><input type="text" name="website" value="<?php echo $html_website ?>"/>
                        &nbsp;*</td>
                </tr>

                <tr>
                    <th>Contact for Site (First Name)</th>
                    <td align="left"><input type="text" name="contact1_first_name" value="<?php echo $html_contact1_first_name ?>"/>
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th>Contact for Site (Last Name)</th>
                    <td align="left"><input type="text" name="contact1_last_name" value="<?php echo $html_contact1_last_name ?>"/>
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th> Title</th>
                    <td align="left"><input type="text" name="contact1_title" value="<?php echo $html_contact1_title ?>"/>
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td align="left"><input type="text" name="contact1_phone" value="<?php echo $html_contact1_phone ?>"/>
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th>eMail</th>
                    <td align="left"><input type="text" name="contact1_email" value="<?php echo $html_contact1_email ?>"/>
                        &nbsp;*</td>
                </tr>
                <!--<tr>
                  <th>Contact 2 First Name</th>
                  <td align="left"><input type="text" name="contact2_first_name" value="<?php echo $html_contact2_first_name ?>"/>
                    &nbsp;*</td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td align="left"><input type="text" name="contact2_last_name" value="<?php echo $html_contact2_last_name ?>"/>
                    &nbsp;*</td>
                </tr>
                <tr>
                  <th> Title</th>
                  <td align="left"><input type="text" name="contact2_title" value="<?php echo $html_contact2_title ?>"/>
                    &nbsp;*</td>
                </tr>
                <tr>
                  <th>Phone</th>
                  <td align="left"><input type="text" name="contact2_phone" value="<?php echo $html_contact2_phone ?>"/>
                    &nbsp;*</td>
                </tr>
                <tr>
                  <th>eMail</th>
                  <td align="left"><input type="text" name="contact2_email" value="<?php echo $html_contact2_email ?>"/>
                    &nbsp;*</td>
                </tr>-->
                <tr>
                    <th width="140">Create a User Name</th>
                    <td width="210" align="left"><input type="text" name="user_name" value="<?php echo $html_user_name ?>" />
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th>Create a Password</th>
                    <td align="left"><input type="password" name="password" value=""/>
                        &nbsp;*</td>
                </tr>
                <tr>
                    <th>Repeat Password</th>
                    <td align="left"><input type="password" name="password1" value=""/>
                        &nbsp;*</td>
                </tr>
            </table>
        </div>
        <!-- leftRegister -->

        <div id="rightRegister">
            <table width="356" class="input">

                <th colspan="2" ><h2 style="text-align:center">PRODUCT INFORMATION</h2>
                </th>
                <tr>
                    <td width="348"><p>Indicate your principal products.</p></td>
                </tr>
                <?php
                $sql = "SELECT * from categories";
                $result = mysql_query($sql, $db);
                while ($row = mysql_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><label>
                                <input type="checkbox" name="products[]" value="<?php echo $row['category_id']; ?>" id="products[]" />
                                <?php echo $row['category_name']; ?></label></td>
                    </tr>
                    <?
                }
                ?>
                <tr>
                    <td></td>
                </tr>
               <!-- <tr>
                  <td><p> Please indicate what you would like customers to know about the uniqueness of your products and your passion for them: </p></td>
                </tr>
                <tr>
                  <td><textarea name="product_line_info" cols="48" rows="8"></textarea></td>
                </tr>
                <tr>-->
                <td><input type="submit" name="Submit" value="Submit" /></td>
                </tr>
            </table>
        </div>
    </div>
</form>
<?php
include_once("../_footer.php");
?>