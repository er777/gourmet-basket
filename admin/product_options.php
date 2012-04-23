<?php
$page = "option_product";
include_once("_header.php");




?><div style="background: none repeat scroll 0% 0% white; overflow: hidden;"> 
<form action="option_product.php" method="post" class="uiproduct" name="uiproduct" id="uiproduct">
<table>
<tbody id="a" style="display: none;">
<tr>
	<td>
        <label>Country of manufacture:</label> 
        <select name="country_id" id="country_id" class="left">
            <option value="">Select</option>
            <?php echo DB::db_options("SELECT `country_id`, `name` FROM `countries` order by `country_id`") ?>
        </select>      
    </td>
	<td>
    <input type="text" value="data" name="country_name" id="country_name" />
    </td>
	<td>
     <input type="checkbox" value="1" name="delete_country_id" id="delete_country_id" />
    </td>
</tr>
</tbody>
<tbody id="b">
<tr>
	<td valign="top" width="200">
    <label>Ethnicity:</label> 
    <div class="ethnicity_id">
    <select name="ethnicity_id" id="ethnicity_id" class="left">
        <option value="">Select</option>
        <?php echo DB::db_options("SELECT `ethnicity_id`, `name` FROM `ethnicities` order by `ethnicity_id`") ?>
    </select>
    <label id="label_del" for="delete_etn_id" class="label_del" style="display: none;">
      <input type="checkbox" value="1" onclick="del_etn('ethnicity_id')" name="delete_etn_id" id="delete_etn_id" />
      Delete
     </label> 
    </div>
         
    </td>
	<td id="data">
        <input type="hidden" value="new" name="ethnicity_idx" id="ethnicity_idx" />
        <label>Name:</label> 
        <input type="text" value="" name="name" id="name" />
        <label>Description:</label>
        <input type="text" value="" name="description" id="description" />
    </td>
	<td width="100" valign="bottom" align="right">
        <input type="button" value="Add" id="iu" onclick="add_etn('name', 'description')" id="Add" />
        
    </td>
</tr>
</tbody>
<tbody id="c">
<tr>
	<td valign="top" width="200">
        <label>Culinary Tradition <br />
            <small>(Can include more than one tradition)</small>:</label> 
        <div class="tradition_id">
            <select name="tradition_id" id="tradition_id" class="left" >
            <option value="">Select</option>
            <?php echo DB::db_options("SELECT `tradition_id`, `name` FROM `culinary_tradition` order by `sort_by`") ?>
            </select> 
            <label id="label_delc" for="delete_trad_id" class="label_del" style="display: none;">
            <input type="checkbox" value="1" onclick="del_trad('tradition_id')" name="delete_trad_id" id="delete_trad_id" />
            Delete
            </label>   
        </div>           
    </td>
	<td id="data_trad">
        <input type="hidden" value="new" name="tradition_idx" id="tradition_idx" />
        <label>Name:</label> 
        <input type="text" value="" name="name_trad" id="name_trad" />
        <label>Sort by:</label>
        <input type="text" value="" name="sort_by" id="sort_by" />
    </td>
	<td width="100" valign="bottom" align="right">
     <input type="button" value="Add" id="iuc" onclick="iu_trad('name', 'sort_by')" id="Add" />
       
    </td>
</tr>
</tbody>
</table>
</form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
count = 2;
function add_more(){
html =  ''
html +=  '<tr>'
html +=  '  <td valign="top">'
html +=  '   <label>Ethnicity:</label>' 
html +=  '        <select name="ethnicity_id['+ count +']" id="ethnicity_id['+ count +']" class="left">'
html +=  '            <option value="">Select</option>'
html +=  <?php echo db_options("SELECT `ethnicity_id`, `name` FROM `ethnicities` order by `ethnicity_id`") ?>
         '        </select>'      
html +=  '        </td>'
html +=  '        <td>'
html +=  '            <label>Name:</label>' 
html +=  '            <input type="text" value="data" name="name['+ count +']" id="name['+ count +']" />'
html +=  '            <label>Description:</label>'
html +=  '            <input type="text" value="data" name="description['+ count +']" id="description['+ count +']" />'
html +=  '        </td>'
html +=  '        <td width="100" valign="bottom" align="right">'
html +=  '            <input type="button" value="add"  onclick="add_etn('+ (count + 1) +')" id="add" />'
html +=  '            <input type="checkbox" value="1" name="delete_country_id['+ count +']" id="delete_country_id['+ count +']" />'
html +=  '            <label for="delete_country_id['+ count +']">Delete</label>'
html +=  '        </td>'
html +=  '    </tr>'
count++;
$('#b').append(html);
}

$(function() {
    /* update ethni*/
    $('#ethnicity_id').live('change', function(){
       if($(this).val()!=''){
        $.post( "ajax.php",{ action: 6, get_data: $(this).val() }  ,
        function( data ) {
            $( '#data' ).html(data) 
            $('#iu').val('Update')
            $('#label_del').show()
          /*  $('#ethnicity_idx').val('')*/                   
        });    
       }         
    });
    /* update tradition */
    $('#tradition_id').live('change',function(){
       if($(this).val()!=''){
        $.post( "ajax.php",{ action: 9, get_data_trad: $(this).val() }  ,
        function( data ) {
            $( '#data_trad' ).html(data) 
            $('#iuc').val('Update')
            $('#label_delc').show()                   
        });    
       }         
    });
});
       
/* delete */
function del_etn(id){
   // $('#'+id).val()
   if($('#'+id).val()!=''){
    $.post( "ajax.php",{ action: 5, del_etn_id: $('#'+id).val() }  ,
    function( data ) {
        $( '.'+id ).html(data) 
        $('#name').val('')
        $('#description').val('')
        $('#tradition_idx').val('new')                   
    });    
   }   
}
/* insert */
function add_etn(){
   if($('#name').val()!='' && $('#description').val()!=''){
    $.post( "ajax.php",{ action: 7, ethnicity_id: $('#ethnicity_idx').val(), name: $('#name').val(), description: $('#description').val() }  ,
    function( data ) {
        $('.ethnicity_id').html(data) 
        $('#name').val('')
        $('#description').val('')
        $('#ethnicity_idx').val('new')
        $('#iu').val('Add')
        $('#label_del').hide()    
    });    
   }   
}
/* delete tradition */
function del_trad(id){
   // $('#'+id).val()
   if($('#'+id).val()!=''){
    $.post( "ajax.php",{ action: 8, del_trad_id: $('#'+id).val() }  ,
    function( data ) {
        $( '.'+id ).html(data)  
        $('#name_trad').val('')
        $('#sort_by').val('')
                          
    });    
   }   
}

/* insert tradition */
function iu_trad(){
   if($('#name_trad').val()!=''){
    $.post( "ajax.php",{ action: 10, tradition_id: $('#tradition_idx').val(), name: $('#name_trad').val(), sort_by: $('#sort_by').val() }  ,
    function( data ) {        
        $( '.tradition_id').html(data) 
        $('#name_trad').val('')
        $('#sort_by').val('')
        $('#tradition_idx').val('new')
        $('#iuc').val('Add')
        $('#label_delc').hide()
          
                           
    });    
   }   
}

</script>

<?php
include_once("_footer.php");
?>
