<br/>
 <div class="container" >
                    <table class="table" id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <th>S.N.</th>
                                        <th>Driver name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Run Number</th>
                                        <th>Rego</th>
                                    	<th>Shift</th>
                                    	<!--<th>have a vehicle temperature tracker ?</th>
                                    	<th>Is the Fuel Tank Full ?</th>
                                    	<th>Comments</th>
                                    	<th>Any Incident to Report</th>
                                    	<th>Any other comments :</th>-->
                                    	<th>CreatedOn</th>
                                    	<th>View</th>
                                    	
                                    </thead>
                                    <tbody>
									<?php  $i= 1;
									$arrList = array('1'=>'Yes','2'=>'No');
									
                                 $regonuInfo = getRegoInfo();
							foreach($pre_shift as $shiftinfo){
								
                                    $driver_id = ($shiftinfo->driver_id);
                                    
                                        $sql ="SELECT * FROM driver_staff where id = " .$driver_id."";
                                        $getinfo = $this->db->query($sql)->row();
                                       
                                       $regonu = $shiftinfo->rego;
                                       
                                       if($shiftinfo->form_type == 1) { $shifttype = 'Pre'; $color = '' ; }else {  $shifttype = 'Post'; $color='success'; }
                                 	 
								?>
                                        <tr class="<?php echo $color; ?>">
                                        	<td><?php echo $shiftinfo->id; ?></td>
                                        	<td><?php echo $getinfo->name; ?></td>
                                        	<td><?php echo $getinfo->phone; ?></td>
                                        	<td><?php echo $getinfo->email; ?></td>
                                        	<td><?php echo $shiftinfo->run_number; ?></td>
                                        	<td><?php echo $regonuInfo[$regonu]; ?></td>
                                        	<td><?php echo  $shifttype; ?></td>
                                            <?php /* ?> <td><?php  if(is_numeric($shiftinfo->temperature_tracker)) { echo $arrList[$shiftinfo->temperature_tracker]; }  ?></td>
                                            <td><?php  if(is_numeric($shiftinfo->fule_tank)) { echo $arrList[$shiftinfo->fule_tank]; }  ?></td>
                                            <td><?php  if(is_numeric($shiftinfo->comments)) { echo $arrList[$shiftinfo->comments]; }  ?></td>
                                            <td><?php  if(is_numeric($shiftinfo->any_incident)) { echo $arrList[$shiftinfo->any_incident]; }  ?></td>
                                            <td><?php  if(is_numeric($shiftinfo->any_other_comment)) { echo $arrList[$shiftinfo->any_other_comment]; }  ?></td> <?php */  ?>
                                            <td><?php  echo date('Y-m-d', strtotime($shiftinfo->submit_date)); ?></td>
                                        	 <!--<td><a href="<?php echo base_url('admin/view_shift?'); ?>driverid=<?php echo $driver_id; ?>&date=<?php echo date('Y-m-d', strtotime($shiftinfo->submit_date));?>" target="_blank"> View </a></td>-->
                                        	 <?php  // if($shiftinfo->form_type == 1) {  ?>
                                        	    <td><a href="<?php echo base_url('admin/view_shift?'); ?>shiftid=<?php echo $shiftinfo->shiftquoteid; ?>&phone=<?php echo $getinfo->phone; ?>&name=<?php echo $getinfo->name; ?>&date=<?php echo date('Y-m-d', strtotime($shiftinfo->submit_date));?>" target="_blank"> View </a></td>
                                        	 <?php  //}  else { ?>  
                                        	 <?php // } ?>
                                        </tr>
                                        
                                        
									<?php $i++;
									}  ?>
                                    </tbody>
                                </table>
                                
                     </div>
