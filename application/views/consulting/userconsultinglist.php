<legend >- <?php echo trP('Consultings');?></legend>
<div>
<div class="hidden-print">
<?php echo anchor('consulting/new_consulting', tr('RegisterNewConsulting'),array('class'=>'btn btn-info'))?>
</div>
<?php //pagination should be added if have time.
if($consultings)
{
  echo "<div>".$pagination."<div class='table-responsive'><table id='consulting_list_table' class='table table-bordered table-striped'><thead><tr>
           
           <th>".tr('ConsultingTitle')."</th>
           <th>".tr('Question')."</th>
           <th>".tr('Answer')."</th>
           <th>".tr('ConsultingDate')."</th>
           <th></th>
       </tr></thead><tbody>";
  $start = ($page-1) * $per_page;
  $i=0;
  foreach($consultings as $consulting)
  {
    if($i>=(int)$start&&$i<(int)$start+(int)$per_page)
    {
        $actions = '';
        $actions .= anchor('consulting/show/'.$consulting['id'], '<span class="glyphicon glyphicon-edit"></span>',array('title'=>tr('ShowConsulting')));
        
        echo '<tr id="consulting'.$consulting['id'].'" title="'.$consulting['consulting_title'].'"'; 
        if ($consulting['read'] == 1)
            echo 'style="color:black" >';
        elseif($consulting['status'] == 1 && $consulting['read'] == 0)
            echo 'style="color:brown" >';
        else
            echo 'style="color:#358aa5" >';
        
        echo
          '<td>'.html_escape($consulting['consulting_title']).'</td>'.
          '<td>'.html_escape(character_limiter($consulting['question'], 30,'...')).'</td>';
        echo'<td>';
        if ($consulting['answer'] == NULL ) echo trP('NotAnswered').'</td>';
        else echo html_escape(character_limiter($consulting['answer'], 30,'...')).'</td>';
        echo
          '<td>'.html_escape($consulting['date']).'</td>'.
          '<td class="hidden-print">'.$actions.'</td>'.
        '</tr>';
    }
    $i++;
  }
  echo '</tbody></table></div>'.$pagination."</div>";
  ?>
<script>
    $(document).ready(function(){ 
        $('#consulting_list_table a').on('click',function(e){
            if($(this).attr('title')=='حذف التحليل'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
    });
</script>

<?php
}
?>
    
</div>
