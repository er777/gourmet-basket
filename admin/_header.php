<?php
session_start();
if(@$_SESSION["enter"] != "on"){
    header("location: login.php");
    exit();
}
include_once '_init.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Expires" content="Tue, Feb 02 2099 00:00:00 GMT"/>
        <meta http-equiv="Pragma" content="no-cache"/>
        <meta http-equiv="Cache-Control" content="no-cache"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="content-language" content="en"/>
        <meta name="author" content=""/>
        <meta http-equiv="Reply-to" content="@.com"/>
        <meta name="generator" content="PhpED 5.0"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="creation-date" content="12/02/2011"/>
        <meta name="revisit-after" content="15 days"/>
        <title>Administrator</title>
        <link rel="stylesheet" type="text/css" href="css/st.css"/>
        <link rel="stylesheet" type="text/css" href="css/menu.css"/>
        <link media="all" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" rel="stylesheet">
<link media="all" type="text/css" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" rel="stylesheet">
        
        <script type="text/javascript" src="js/st.js" language="javascript" ></script>
        <?php if($page!="vendors" || $page!="orders"){ ?>
        <script type="text/javascript" src="library/js/lib/prototype.js"></script>
        <script type="text/javascript" src="library/js/lib/scriptaculous.js?load=effects"></script>
        <script type="text/javascript" src="library/js/lib/unittest.js"></script>
        <script type="text/javascript" src="library/js/xml.js"></script>
        <script type="text/javascript" src="library/js/modalbox.js"></script>
        <link rel="stylesheet" href="library/js/modalbox.css" type="text/css"/>
        
       <?php  }?>
       <?php if($page=="vendors" || "products"){ ?>
       <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
       <?php  }?>
       <script type="text/javascript">
       function open_window(link,w,h) //opens new window
        {
            var win = "width="+w+",height="+h+",menubar=no,location=no,resizable=yes,scrollbars=yes";
            newWin = window.open(link,'newWin',win);
            newWin.focus();
        }
       </script>
    </head>
    <body style="margin:0px; background:#FFFFFF;">
        <div align="center">
            <table style="width:1000px" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td><a href="admin.php"><img src="images/logo.png" width="75"/></a></td>
                    <td width="98%" style="background:url(images/bkg_top.jpg);">&nbsp;</td>
                    <td><img src="images/img_corner_top.jpg" /></td>
                </tr>
            </table>
            <table style="width:1000px" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="background:url(images/bkg_left.jpg); background-repeat:y; width:35px;">&nbsp;</td>
                    <td style="background:#FFFFFF; width:930px;">
                        <div id="subnavbar">
                            <ul id="subnav">
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <?php if($_SESSION['l_level']!='vendor'){ ?>
                                <li>
                                    <a href="administrators.php">Admins</a>
                                </li>
                                <?php } ?>
                                <?php if($_SESSION['l_level']!='vendor'){ ?>
                                <li>
                                    <a href="vendors.php">Vendor(s)</a>
                                </li>
                                <?php } else { ?>
                                <li>
                                    <a href="vendors.php">Vendors</a>
                                </li>
                                <?php } ?>
                                <li>
                                    <a href="<?php echo $_SESSION['l_level']=='admin'?'orders':'orders_vendor';?>.php">Orders</a>
                                </li>
                                <li>
                                    <a href="products.php">Products</a>
                                <ul>  
                                    <?php if($_SESSION['l_level']!='vendor'){ ?>
                                    <li>
                                        <a href="product_options.php">Option Product</a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a href="insert_csv.php">Quick CSV import</a>
                                    </li>
                                </ul>
                                </li>
                                <li>
                                    <a href="customers.php">Costumers</a>
                                </li>
                                <?php if($_SESSION['l_level']!='vendor'){ ?>
                                <li>
                                    <a href="categories.php">Categories</a>
                                    <ul>
                                        <li><a href="subcategories.php">Subcategories</a></li>
                                        <li><a href="sub-subcategories.php">Sub subcategories</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="settings.php">Settings</a>
                                </li>
                                <?php } ?>

                                <?php if($_SESSION['l_level']!='vendor'){ ?>
                                <ul>
                                    <li>
                                        <a href="home_editor.php">Editor Home Page</a>
                                    </li>
                                    <li>
                                        <a href="taxes.php">Taxes</a>
                                    </li>
                                </ul>
                                <?php } ?>
                                </li> 
                                <li>
                                    <a href="logout.php" style="text-decoration:none;color:gray;"><img src="images/lock_open.png"> Logout</a>
                                </li> 
                                <li>
                                   <span style="color: #666464;">User ID:</span>  <?php echo $_SESSION['l_user_id'] ?>
                                   <span style="color: #666464;">UserName:</span> <?php echo $_SESSION['l_user_name'] ?>
                                </li>                          
                            </ul>
                        </div>
                    </td>
                    <td style="background:url(images/bkg_right.jpg); background-repeat:y; width:35px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="background:url(images/bkg_left.jpg); background-repeat:y; width:35px;">&nbsp;</td>
                    <td style="background:#FFFFFF; width:730px;">
                    <div align="center">