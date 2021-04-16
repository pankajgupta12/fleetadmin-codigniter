 <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
		
		                <div class="card">
                            <div class="header">
                                <h4 class="title"><?php  echo $driverinfo->name ?> Roster<a style="float:right;" class="add-question btn btn-primary btn-xs" href="<?php echo base_url('admin/driver_list'); ?>"> Driver List</a></h4>
					        </div>
                            <div class="content table-responsive table-full-width">
                                <div class="row">
                                    <div class="col-md-12">
                                    <?php
                                        include 'driver_calendar.php';
                                        $calendar = new Calendar();
                                        echo $calendar->show();
                                    ?>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
	</div>


<script>

     function DriverdateMarked(id,date , status){
		        $.ajax({
	                
					 url: "<?php echo base_url(); ?>Admin/DriverdateMarked",
					  type: 'get',
					  data: {'id': id,'date':date , 'status':status},
					  success: function(data) {
						  window.location.reload();
					  }
		        });
    } 
  
  
   function updateNextMonth(driverid, month,year){
        
          var formData = {
                 'driverid':driverid,
                 'month':month,
                 'year':year
          };
          
            $.ajax({
                url: "<?php echo base_url(); ?>Admin/NextavailUpdate",
                type: "post",
                data: formData,
                success: function(d) {
                   window.location.href = "./staff_roster?id=" + driverid+'&month='+month+'&year='+year; 
                }
            });
       
   }

</script>

<style>

div#calendar {
   
    width: 800px;
    
}

div#calendar ul.label li {
    width: 100px;
}

div#calendar ul.dates li{
    
     width: 106px;
}
div#calendar div.header {
    width: 750px;
}
div#calendar .box{
    background: #996ddb;
}
.card .header {
    padding: 2px 12px 2px;
}

</style>