                <div id="clickhere">                                  
                    <a href="product.php"><div id="click"></div></a>
                </div> 
                <form action="confirm.php" id="confirmFrm" method="post">
                    <div class="clean"></div>
                    <div id="inner">
                        <div class="inner-top"></div>
                        <div class="inner-middle">
                            <?php if (!empty($mess)) { ?>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        elementClick = $('#showErrors');
                                        destination = $(elementClick).offset().top;
                                        $("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, 800 );
                                    });
                                </script>
                                <div class='error' id='showErrors'>
                                    <?= $error ?>
                                </div>	
                            <?php } ?>
                            <h1>Credit Card Details</h1>
                            <table>
                                <tr>
                                    <td width="400px" valign="top" id="custom">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td valign="bottom"><h2 style="padding-left:0px">Customer Information </h2></td>
                                            </tr>
                                        </table>
                                        <br /><br /><br />
                                        <?php if ($log) { ?>
                                            <input type="hidden" value="yes" name="log" />
                                        <?php } ?>
                                        <!--Side Left-->
                                        <table width="550px;font-size: 12px;margin-left: 100px" >
                                            <tr <?php echo ($txtFirstName == true) ? "class='error'" : ""; ?>>
                                                <td width="160px">First Name:</td>
                                                <td><input type="text" class="custForm" name="txtFirstName" id="txtFirstName" value="<?php
                                        if (isset($_REQUEST['txtFirstName'])) {
                                            echo $_REQUEST['txtFirstName'];
                                        } else {
                                            echo (isset($users->firstName)) ? $users->firstName : "";
                                        }
                                        ?>"   /></td>
                                            </tr>
                                            <tr <?php echo ($txtLastName == true) ? "class='error'" : ""; ?>>
                                                <td>Last Name:</td>
                                                <td><input type="text" class="custForm" name="txtLastName" id="txtLastName" value="<?php
                                        if (isset($_REQUEST['txtLastName'])) {
                                            echo $_REQUEST['txtLastName'];
                                        } else {
                                            echo (isset($users->lastName)) ? $users->lastName : "";
                                        }
                                        ?>" /></td>
                                            </tr>
                                            
                                            <tr <?php echo ($txtEmail == true) ? "class='error'" : ""; ?>>
                                                <td>Email:</td>
                                                <td><input type="text" class="custForm" name="txtEmail" id="txtLastName" value="<?php
                                        if (isset($_REQUEST['txtEmail'])) {
                                            echo $_REQUEST['txtEmail'];
                                        } else {
                                            echo (isset($users->Email)) ? $users->Email : "";
                                        }
                                        ?>" /></td>
                                            </tr>
                                            <tr <?php echo ($txtAddress == true) ? "class='error'" : ""; ?>>
                                                <td valign="top">Address:</td>
                                                <td><input type="text" class="custForm" name="txtAddress" id="txtAddress" value="<?php
                                                    if (isset($_REQUEST['txtAddress'])) {
                                                        echo $_REQUEST['txtAddress'];
                                                    } else {
                                                        echo (isset($users->street1)) ? $users->street1 : "";
                                                    }
                                        ?>" /></td>
                                        </tr>
                                            <tr <?php echo ($txtAddressSecond == true) ? "class='error'" : ""; ?>>
                                                <td valign="top">Address Second:</td>
                                                <td><input type="text" class="custForm" name="txtAddressSecond" id="txtAddressSecond" value="<?php
                                                           if (isset($_REQUEST['txtAddressSecond'])) {
                                                               echo $_REQUEST['txtAddressSecond'];
                                                           } else {
                                                               echo (isset($users->street2)) ? $users->street2 : "";
                                                           }
                                        ?>" />
                                                </td>
                                            </tr>
                                            <tr <?php echo ($txtCity == true) ? "class='error'" : ""; ?>>
                                                <td>City:</td>
                                                <td><input type="text" class="custForm" name="txtCity" id="txtCity" value="<?
                                                    if (isset($_REQUEST['txtCity'])) {
                                                        echo $_REQUEST['txtCity'];
                                                    } else {
                                                        echo (isset($users->city)) ? $users->city : "";
                                                    }
                                        ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Country:</td>
                                                <td><input type="hidden"  name="txtCountry" id="txtCountry" value="<?php echo (isset($_REQUEST['txtCountry'])) ? $_REQUEST['txtCountry'] : "United States"; ?>" />
                                                    <select class="select" name="txtCountrys" id="txtCountrys" disabled="disabled">
                                                        <option value="Canada">Canada</option>
                                                        <option value="United States" selected="selected">United States</option>
                                                    </select>
                                                </td>
                                            </tr>                                            
                                            <tr <?php echo ($txtState == true) ? "class='error'" : ""; ?>>
                                                <td>State / Province:</td>
                                                <td>
                                                    <select class="select" name="txtState" id="txtState" onchange="selectCountry(this.value)">
                                                    <?php $state = getState('223'); ?>
                                                    <?php for ($i = 0; $i < count($state); $i++) { ?>
                                                    <option value="<?php echo $state[$i]['id']; ?>" <?php echo ($state[$i]['id'] == 8) ? "selected='selected'" : ""; ?>><?php echo $state[$i]['name'] ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr <?php echo ($zipcode == true) ? "class='error'" : ""; ?>>
                                                <td>Zip / Postal Code:</td>
                                                <td><input type="text" class="custForm"  name="txtZip" id="txtZip" value="<?
                                                    if (isset($_REQUEST['txtZip'])) {
                                                        echo $_REQUEST['txtZip'];
                                                    } else {
                                                        echo (isset($users->postalCode)) ? $users->postalCode : "";
                                                    }
                                                    ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h1>Credit Card Details</h1>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="100px">Card Type:</td>
                                                <td>
                                                    <select name="cc_type" class="select">
                                                        <?php foreach ($cards as $card) { ?>
                                                            <option value="<?php echo $card['value']; ?>" ><?php echo $card['text']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr <?php echo ($cc_number == true) ? "class='error'" : ""; ?>>
                                                <td width="100px">Card Number:</td>
                                                <td><input type="text" class="custForm" name="cc_number" value="<?php echo isset($_REQUEST['cc_number']) ? $_REQUEST['cc_number'] : "" ?>" /></td>
                                            </tr>
                                            <tr <?php echo ($cc_expire_date_month == true) ? "class='error'" : ""; ?>>
                                                <td width="100px">Card Expiry Date:</td>
                                                <td>
                                                    <select name="cc_expire_date_month" class="select" style="width: 100px;">
                                                    <?php foreach ($months as $month) { ?>
                                                            <option value="<?php echo $month['value']; ?>" ><?php echo $month['text']; ?></option>
                                                    <?php } ?>
                                                    </select> /
                                                    <select name="cc_expire_date_year" class="select" style="width: 100px;">
                                                    <?php foreach ($year_expire as $year) { ?>
                                                            <option value="<?php echo $year['value']; ?>" ><?php echo $year['text']; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr <?php echo ($cc_cvv2 == true) ? "class='error'" : ""; ?>>
                                                <td>Card Security Code (CVV):</td>
                                                <td><input type="text" class="custForm" name="cc_cvv2" value="<?php echo isset($_REQUEST['cc_cvv2']) ? $_REQUEST['cc_cvv2'] : "" ?>" size="3" style="width: 45px;" /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input type="checkbox"  name="chkTerms" id="chkTerms" />   <a href="terms.php" class="fancy" title="I agree to the terms and conditions.">I agree to the terms and conditions.</a>
                                                    <br />
                                                    <input type="image" onclick="return requestForm()" name="confirm" src="assets/img/connfir_print.png" value="ok" style="border:none" />
                                                <td>     
                                            </tr>
                                        </table>
                                        <!--Ende Side-->
                                    </td>   
                                </tr>
                            </table>
                        </div>
                        <div class="inner-bottom"></div>
                    </div>
                </form>