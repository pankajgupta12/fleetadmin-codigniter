<style>
 .error{
  color:red;
 }
</style>
<?php  

//$url = "admin/add_vehicle";
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
							 
                                 <h4 class="title">Add Vehicle<a style="float:right;" class="add-question btn btn-primary btn-xs" href="<?php echo base_url('admin/vehicle_list'); ?>">Vehicle List</a></h4>
                            </div>
			<?php if( $this->session->flashdata('message') ){ ?>
				<div class="alert alert-success">
				  <strong>Successful!</strong> <?php echo $this->session->flashdata('message'); ?>
				</div>
			<?php  }?> 			
                            <div class="content">
                                <form method="post" action="<?php echo base_url('admin/add_vehicle'); ?>">
                                    <div class="row">
                            <?php // print_r($driver_staff); ?>            
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Rego Number</label>
                                                <input type="text" name="rego_number" class="form-control" placeholder="Rego name" value="<?php  if(set_value('rego_number')){echo set_value('rego_number');  }  elseif(isset($vehicle_list->rego_number)) { echo trim($vehicle_list->rego_number); }?>">
												 <span class="error"><?php  echo   form_error('rego_number'); ?></span>	
                                            </div>
                                        </div>
										 <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Next  Services Due</label>
                                                <input type="text" name="next_services_due" class="form-control" placeholder="ext  Services Due" value="<?php  if(set_value('next_services_due')){echo set_value('next_services_due');  }  elseif(isset($vehicle_list->next_services_due)) { echo trim($vehicle_list->next_services_due); }?>">
												 <span class="error"><?php  echo   form_error('next_services_due'); ?></span>	
                                            </div>
                                        </div>
									
									 
                                    <input type="hidden" class="form-control"  name="id" id="id" value="<?php if(isset($vehicle_list->id)) {echo $vehicle_list->id;} ?>">	
                                	 <div class="col-md-3">    
                                	    <div class="form-group">
								            <input  type="submit" name="submit" id="submit" class="btn btn-info btn-fill pull-left" value="submit">
								           </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>