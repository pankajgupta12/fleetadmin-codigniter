<style>
.add-question{
background-color: #3F3FF8;
color: #fff;
}

</style>
 <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
			<?php if($this->session->flashdata('SuccessMessage')){ ?>
				<span class="alert alert-success col-lg-12">
				 <button type="button" class="close" data-dismiss="alert">x</button>
                    <?php echo $this->session->flashdata('SuccessMessage'); ?>
                </span>
			<?php } ?>	
							<?php if( $this->session->flashdata('error') ){ ?>
							<div class="alert alert-danger">
							<strong>Warning!</strong> <?php echo $this->session->flashdata('error'); ?>
							</div>
							<?php  }?> 	
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Vehicle List<a style="float:right;" class="add-question btn btn-primary btn-xs" href="<?php echo base_url('admin/add_vehicle'); ?>">Add Vehicle</a></h4>
						<span id="deletemsgshow"  style="display:none;color:red;">One Row Delete Successfully</span>		
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="getusermobileList">
                                    <thead>
                                        <th>S.N.</th>
                                    	<th>Rego No</th>
                                    	<th>Next Service Due</th>
                                    	<th>Date</th>
                                    	<th>Action</th>
                                    	
                                    </thead>
                                    <tbody>
									<?php  $i= 1;
									
							foreach($vehicle_list  as $vehichal){
								
                                    $id = $vehichal->id;
									
								?>
                                        <tr>
                                        	<td><?php echo $i; ?></td>
                                        	<td><?php echo $vehichal->rego_number; ?></td>
                                        	<td><?php echo $vehichal->next_services_due; ?></td>
                                        	<td><?php echo date('Y-m-d', strtotime($vehichal->created_at)); ?></td>
											<td><a href="<?php echo base_url('admin/add_vehicle?id='.$id); ?>" style="cursor: pointer;">Edit</a></td>
                                        	
                                        </tr>
									<?php $i++; } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			</div>
