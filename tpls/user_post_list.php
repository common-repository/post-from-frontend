<script language="JavaScript" src="<?php echo plugins_url('post-from-frontend/js/jquery.dataTables.min.js'); ?>"></script>
<?php $concat= get_option("permalink_structure")?"?":"&";    ?> 
<style type="text/css">
.dataTables_length{
    float: left;
    margin-bottom: 10px;
}
.dataTables_filter{
    float: right;
    margin-bottom: 10px;
}
#user_post_list_paginate a{
    padding:3px 5px;
    font-size:10pt;
    background: #eee;
    margin: 2px;
    border: 1px solid #ccc;
    cursor: pointer;
}
#user_post_list_paginate a:hover{
    border: 1px solid #999;
}
.title.sorting_asc:after{
    content: "\25bc";
}
.title.sorting_desc:after{
    content: "\25b2";
}
.title{
    cursor: pointer;
    text-decoration: underline;
}
</style>
<div class="wrap"> 
<table class="post" id="user_post_list" border="0" width="100%" cellspacing="0" style="clear: both;">
 
<thead>
   <tr>
      <th class="title">
         Title
      </th>
      
      <th class="nosort">
         Category  
      </th>
      <th class="nosort">
         Action  
      </th>
   </tr>
   </thead> 
   <tbody>
   <?php foreach($user_posts as $upost){?>
   <tr>
      <td>
         <a href="<?php the_permalink();?><?php echo $concat;?>task=edit&postid=<?php echo $upost->ID;?>"><?php echo $upost->post_title;?></a>
      </td>
    
      <td>
          <?php  $category=get_the_category( $upost->ID ); echo $category[0]->cat_name;?>
      </td>
      <td>
      <a href="#" onclick="if(confirm('Are you sure?')){location.href='<?php the_permalink();?><?php echo $concat;?>task=delete&postid=<?php echo $upost->ID;?>'}" >Delete</a>
        
      </td>
   </tr><?php } ?>
   </tbody>
</table>
</div>
</div> <!-- ending div for wrapper-->  

<script language="JavaScript">
<!--
  jQuery(document).ready(function() {
    jQuery('#user_post_list').dataTable({
              
                    "sPaginationType": "full_numbers"
                });
                
   jQuery('.nosort').unbind('click');
} );
//-->
</script>