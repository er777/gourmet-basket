<?php
?>

  <h2 style="text-align:center">SUMMARY</h2>
  <h5>Quote about your company and products. Maximum 2 sentences.</h5>
  			<div style="margin-bottom:30px"><textarea name="shop_quote" id="shopQuote" style="width:500px;height:60px;" ><?=$v["shop_quote"]?></textarea>
            </div>
       
            <div><textarea name="shop_description" id="shopDescription" style="width:600px;height:700px;" ><?=$v["shop_description"]?></textarea>   </div>
            

  
     		<script type="text/javascript">
                                    //<![CDATA[
                    
                                    CKEDITOR.replace( 'shopDescription' );
                    
                                    //]]>
             </script>
  
    
      