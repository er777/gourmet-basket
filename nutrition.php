<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<style>
td {
	text-align:right;
	
}

th {
	text-align:left;
}
</style>
<table style=>
  <tr>
    <th colspan="6"> <label> Nutrition Label Information:</label>
    </th>
  </tr>
  <tr>
    <td> Serving Size </td>
    <td><input type="text" size="5" <?php echo ($p['serv_size']) ?> name="serv_size" id="serv_size" /></td>
    <td> Calories </td>
    <td><input type="text" size="5"<?php echo ($p['cal']) ?> name="cal" id="cal" /></td>
    <td> Calories from Fat</td>
    <td><input type="text" size="5" <?php echo ($p['cal_fat']) ?> name="cal_fat" id="cal_fat" /></td>
  </tr>
  <tr>
    <td> Servings per Container </td>
    <td><input type="text" size="5" <?php echo ($p['serv_per_cont']) ?> name="serv_per_cont" id="serv_per_cont" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Total Fat</td>
    <td><input type="text" size="5"<?php echo($p['total_fat']) ?> name="total_fat" id="total_fat" /></td>
    <td>Saturated Fat</td>
    <td><input type="text" size="5"<?php echo($p['sat_fat']) ?> name="sat_fat" id="sat_fat" /></td>
    <td>Trans Fat</td>
    <td><input type="text" size="5"<?php echo($p['trans_fat']) ?> name="trans_fat" id="trans_fat" /></td>
  </tr>
  <tr>
    <td>Cholesterol</td>
    <td><input type="text" size="5"<?php echo($p['chol']) ?> name="chol" id="chol" /></td>
    <td>Sodium</td>
    <td><input type="text" size="5"<?php echo($p['sodium']) ?> name="sodium" id="sodium" /></td>
  </tr>
  <tr>
    <td>Total Carbohydrate</td>
    <td><input type="text" size="5"<?php echo($p['carbo']) ?> name="carbo" id="carbo" /></td>
    <td>Dietary Fiber</td>
    <td><input type="text" size="5"<?php echo($p['fiber']) ?> name="fiber" id="fiber" /></td>
    <td>Sugars</td>
    <td><input type="text" size="5"<?php echo($p['sugar']) ?> name="sugar" id="sugar" /></td>
  </tr>
  <tr>
    <td>Protein</td>
    <td><input type="text" size="5"<?php echo($p['protein']) ?> name="protein" id="protein" /></td>
    <td>Vitamin A</td>
    <td><input type="text" size="5"<?php echo($p['vit_A']) ?> name="vit_A" id="vit_A" /></td>
    <td>Vitamin C</td>
    <td><input type="text" size="5"<?php echo($p['vit_C']) ?> name="vit_C" id="vit_C" /></td>
  </tr>
  <tr>
    <td>Calcium</td>
    <td><input type="text" size="5"<?php echo($p['calcium']) ?> name="calcium" id="calcium" /></td>
    <td>Vitamin C</td>
    <td><input type="text" size="5"<?php echo($p['iron']) ?> name="iron" id="iron" /></td>
  </tr>
  <tr> </tr>
</table>
</body>
</html>
