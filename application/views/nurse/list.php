<legend class="legend_colour">-
    <?php echo trP('NursesList');?>
</legend>
<div>

<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" ><?php trP('NurseFilter')?></h3>
            </div>
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal filter-body">                   
                    <div class="form-group">
                        
                        
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="address">
                        </div>
                        <label for="LastName" class="col-sm-1 control-label"><?php trP('Address')?></label>
                        
                        
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="name">
                        </div>
                        <label for="FirstName" class="col-sm-1 control-label" ><?php trP('Name')?></label>
                        
                    </div>                      
                    <div class="form-group">                        
                        <div class="col-sm-12">
                            <button type="button" id="btn-filter" class="btn btn-primary"><?php trP('Filter')?></button>
                            <button type="button" id="btn-reset" class="btn btn-default"><?php trP('Reset')?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
  <table id="nurse_list_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><?php trP('Number')?></th>
                    <th><?php trP('NurseName')?></th>
                    <th><?php trP('Age')?></th>
                    <th><?php trP('Phone')?></th>                    
                    <th><?php trP('Address')?></th>                    
                    <th></th>                    
                </tr>
            </thead>
            <tbody>
            </tbody>                 
        </table>
        
<script type="text/javascript">
      
var table;

$(document).ready(function() {

    //datatables
    table = $('#nurse_list_table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "searchable": false,
        "searching": false,
//        "bPaginate": false,
        "bInfo" : false,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('nurse/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {                
                data.name = $('#name').val();
                data.address = $('#address').val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
        loadTotal();
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });
});

</script>        
        

<script>
    $(document).ready(function(){ 
        $('#nurse_list_table').on('click','a',function(e){
            if($(this).attr('title')=='Delete nurse'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
    });
	
	function HandleActions(){
		$('#nurse_list_table').on('click','a',function(e){
            if($(this).attr('title')=='Delete nurse'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
	}
	
	function loadTotal(){
		$.ajax({
        url: '<?php echo site_url('nurse/total')?>',
        type: 'POST',
        data: {
            min_date : $('#min').datepicker({ dateFormat: 'yy-mm-dd' }).val(),
            max_date : $('#max').datepicker({ dateFormat: 'dd-mm-yy' }).val(),
            doctor_id : 1
        },
        dataType: 'json',
        success: function(data) {
			HandleActions();
//			alert(data.data[0].total);            
            $("#total").html(data.data[0].total);
//            console.log(data);
        }
    });
	}
</script>
</div>