<style>
.add-question{
background-color: #3F3FF8;
color: #fff;
}

</style>
 <div class="content">
            <div class="container-fluid">
                <div class="row">
                           
                        <div class="card">
                           
                             <div class="alert alert-info" role="alert" id="messageshow" style="display:none;">
                               Payment status update Successfully
                            </div>
                           
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="getusermobileList">
                                    <thead>
                                        <th>Inv$ No.</th>
                                    	<th>Inv# Date</th>
                                    	<th>Driver Name</th>
                                    	<th>From - To</th>
                                    	<th>Amount</th>
                                    	<th>Paid</th>
                                    	<th>Paid Date</th>
                                    	<th>Email Send</th>
                                    	<th>Inv Send Date</th>
                                    	<th>View</th>
                                    	
                                    </thead>
                                    <tbody>
									<?php  $i= 1;
									
							foreach($invoice_info  as $invoice){
								
                                    // $id = $vehichal->id;
                                    
                                    	       
                            $sql ="SELECT id, name FROM driver_staff where id = " .$invoice->driver_id."";
                            $driverinfo = $this->db->query($sql)->row();

									
								?>
                                        <tr>
                                        	<td><?php echo str_pad($invoice->id, 4, "0", STR_PAD_LEFT); ?></td>
                                        	<td><?php echo date('d M Y', strtotime($invoice->createdOn)); ?></td>
                                        	<td><?php echo $driverinfo->name; ?></td>
                                        	<td><?php echo date('dS M', strtotime($invoice->invoice_fromdate)).' - '.date('dS M', strtotime($invoice->invoice_todate)).' ' .date('Y', strtotime($invoice->invoice_fromdate)); ?></td>
                                        	<td><?php echo $invoice->amount; ?></td>
											<td>
											     <select name="checkpaid" id="checkpaid_<?php echo $invoice->id;  ?>" onchange=checkispaid('<?php echo $invoice->id;  ?>');>
											        <option value="0" <?php if($invoice->is_paid == 0) {echo 'selected'; } ?>>Select</option>
											        <option value="1" <?php if($invoice->is_paid == 1) {echo 'selected'; } ?>>No</option>
											        <option value="2" <?php if($invoice->is_paid == 2) {echo 'selected'; } ?>>Yes</option> 
											     </select>
											    
											</td>
											<td><?php  if($invoice->paid_date != '0000-00-00 00:00:00') { echo $invoice->paid_date; } else {echo '-'; }?></td>
											<td><a href="javascript:void(0);" onClick="sendInvoiceEMail('<?php echo $invoice->id;  ?>');">Send Email</a></td>
											<td><?php  if($invoice->send_date != '0000-00-00 00:00:00') { echo $invoice->send_date; } else {echo '-'; }?></td>
											<!--<td><a target="_blank" href="<?php echo base_url('admin/invoice_details?'); ?>invoiceid=<?php echo $invoice->id; ?>">View</a></td>-->
											<td><a target="_blank" href="<?php echo base_url(); ?>/files/invoice/<?php echo $invoice->driver_id; ?>/<?php echo $invoice->filename; ?>">View</a></td>
                                        	
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


<script>
    function checkispaid(id) {
         
     var checkstatus = $('#checkpaid_'+id).val();
         var formData = {'id':id, 'checkstatus':checkstatus};
            $.ajax({
                url: "<?php echo base_url(); ?>/Admin/checkpaidinvoice",
                type: "post",
                data: formData,
                success: function(d) {
                   // alert(d);
                   $('#messageshow').show(); //fadeOut(5000);
                   $('#messageshow').fadeOut(3000);
                }
            });
        
    }
    
    function sendInvoiceEMail(id) {
       
          var formData = {'id':id};
          
            $.ajax({
                url: "<?php echo base_url(); ?>/Admin/sendinvoice",
                type: "post",
                data: formData,
                success: function(d) {
                    alert(d);
                }
            });
        
    }
</script>