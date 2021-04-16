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
                                <h4 class="title">Driver List<a style="float:right;" class="add-question btn btn-primary btn-xs" href="<?php echo base_url('admin/add_driver'); ?>">Add Driver</a></h4>
						<span id="deletemsgshow"  style="display:none;color:red;">One Row Delete Successfully</span>		
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="getusermobileList">
                                    <thead>
                                        <th>S.N.</th>
                                    	<th>Name</th>
                                    	<th>Licence Number</th>
                                        <th>Licence Expiry</th>
                                    	<th>Phone</th>
                                    	<th>Email</th>
                                    	<th>Password</th>
                                    	<th>Avail</th>
                                    	<!--<th>ABN</th>-->
                                    	<!--<th>BSB</th>-->
                                    	<th>Account</th>
                                    	<!--<th>Address</th>-->
                                    	<!--<th>Status</th>-->
                                    	<!--<th>Updated</th>-->
                                    	<th>Action</th>
                                    	<th>Roster</th>
                                    	
                                    </thead>
                                    <tbody>
									<?php  $i= 1;
									
							foreach($driver_staff as $driver){
								
                                    $id = ($driver->id);
									if($driver->status == '1') { $status = "Active"; }else{ $status = "Deactive"; } 
									
								?>
                                        <tr <?php  if($driver->status == 2) { ?> style="background: #f1d5d5;" <?php  } ?> >
                                        	<td><?php echo $i; ?></td>
                                        	<td><?php echo $driver->name; ?></td>
                                        	<td><?php echo $driver->licence_no; ?></td>
                                        	<td><?php echo $driver->licence_exp; ?></td>
                                        	<td><?php echo $driver->phone; ?></td>
                                        	<td><?php echo $driver->email; ?></td>
                                        	<td><?php echo $driver->password; ?></td>
                                        	<td>
                                        	  <?php 
                                        	   $avaldd = '';
                                        	    $getavail = explode(',', $driver->avail); 
                                        	    foreach($getavail as $key=>$val) {
                                        	        $avaldd .= substr($val,0,2).',';
                                        	    }
                                        	    echo  rtrim($avaldd,',');
                                        	    
                                        	    ?>
                                        	 </td>
                                        	<!--<td><?php echo $driver->abn; ?></td>-->
                                        	<!--<td><?php echo $driver->bsb; ?></td>-->
                                        	<td><?php echo $driver->account_number; ?></td> 
                                        	<!--<td><?php echo $driver->address; ?></td>-->
                                        	<!--<td><?php echo $status; ?></td>-->
                                        	<!--<td><?php echo date('d M Y', strtotime($driver->createdOn)); ?></td>-->
											<td><a href="<?php echo base_url('admin/add_driver?id='.$id); ?>" style="cursor: pointer;">Edit</a></td>
											<td><a href="<?php echo base_url('admin/staff_roster?id='.$id.'&year='.date('Y').'&month='.date('m')); ?>" style="cursor: pointer;">Roster</a></td>
                                        	
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
