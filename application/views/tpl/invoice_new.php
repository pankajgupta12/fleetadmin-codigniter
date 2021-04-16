<table width='100%' style='border-collapse: collapse;' CELLPADDING="5">
	<tr class="top">
		<td colspan="4" style="	padding: 5px;vertical-align: top;">
			<table width='100%' style="width: 100%;text-align: left;">
				<tr>
					<td class="title" style="font-size: 26px;
                line-height: 46px;
                color: #333;
                font-weight: 600;">Invoice To
                </td>
					<td style="text-align: right; color: #333;">
						<span>Invoice #:<?php  echo $invoiveid; ?><span/><br/>
								<span>Created on:	<?php echo date('dS M Y', strtotime($todate)); ?><span/> <br/>
							<span><?php echo date('dS M', strtotime($fromdate)); ?> To <?php echo  date('dS M', strtotime($todate)); ?>  <?php echo  date('Y', strtotime($todate)); ?>  <span/>	
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr class="information">
		<td colspan="4">
			<table width='100%' style="width: 100%;text-align: left;">
				<tr>
					<td style="padding: 5px; width: 50%; vertical-align: bottom; padding-bottom: 20px;"> <b></b>
					                <strong>
					                       Ram Kripa Pty Ltd <br/>
                                            <span>Gold Coast</span><br/>
                                            <span>ABN 90 640 232 248 </span><br/>
                                            <span>Ph: 0450 711 586 </span><br/>
                                            <span>ramkripa.info@gmail.com </span>
                                    </strong>
                                </td>
        					<td style=" padding-bottom: 20px; vertical-align: bottom;  width: 50%; text-align: right;">
                                    <strong><span><?php echo  $driverinfo->name; ?></span>
                                    <?php if($driverinfo->address !='') { ?>
                                    <br/>
                                    <span> <?php echo  $driverinfo->address; ?></span>
                                    <?php  } ?>
                                    <br/>
                                    <span> ABN <?php echo  $driverinfo->abn; ?> </span><br/>
                                    <span>Phone:<?php echo  $driverinfo->phone; ?></span><br/>
                                    <span><?php echo  $driverinfo->email; ?></span>
                                    </strong> 
                            </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr class="heading">
		<td style="text-align:center;padding: 5px;vertical-align: top; background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">Day/Date</td>
		<td style="text-align:center;padding: 5px;vertical-align: top; background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">Run Number</td>
		<td style="text-align:center;padding: 5px;vertical-align: top; background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">Rego</td>
		<td style="text-align:center;padding: 5px;vertical-align: top; background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">Amount</td>
	</tr>
	
    	        <?php
    	        
                            $totalAMount = 0;
                            foreach($valueData as $shiftkey=>$shiftvalue) { 
                                
                                    // $getrosterIn = $getRosterInfo[$shiftvalue->submit_date];
                                    //echo $shiftvalue->submit_date;
                                    
                                    $submitdate = date('Y-m-d',  strtotime($shiftvalue->submit_date));
                                    
                                    $statuscheck = $getRosterInfo[$submitdate];
                                        
                                     $color = '';
                                     $amount = '';
                                     $showamount = '';
                                     $shifttype = '( Pre )';
                                       if($shiftvalue->form_type == 2) {
                                           $color = '#c7e9cb';
                                            $shifttype = '( Post ) ';
                                           $showamount = '$ 190';
                                            $amount = 190; 
                                           $totalAMount = $totalAMount  + $amount;
                                       }
                            ?>
		<tr class="item" style="background: <?php echo $color; ?>">
			<td style="text-align:center;padding: 5px;vertical-align: top;">
			   <?php  if($statuscheck == 1) { ?> 
			     <span style="height: 12px; width: 12px; background-color: #7aba9a;  border-radius: 25%;  display: inline-block;"></span>
			     <?php  }else { ?>
			     <span style="height: 12px; width: 12px; background-color: #f38686;  border-radius: 25%;  display: inline-block;"></span>
			     <?php  } ?>
				<?php echo date('d/M/Y' ,  strtotime($shiftvalue->submit_date)); ?>
			</td>
			<td style="text-align:center;padding: 5px;vertical-align: top;">
				<?php echo $shiftvalue->run_number; ?>
			</td>
			<td style="text-align:center;padding: 5px;vertical-align: top;">
				<?php echo $regonuInfo[$shiftvalue->rego]; ?>
					<?php echo  $shifttype; ?>
			</td>
			<td style="text-align:center;padding: 5px;vertical-align: top;">
				<?php echo $showamount;  ?>
			</td>
		</tr>
		<?php  } ?>
			<tr class="total">
				<td colspan="2"></td>
				<td style="float: right;"><b>Total</b></td>
				<td style="text-align: center;"><strong> <?php echo  '$ '. $totalAMount; ?></strong></td>
			</tr>
</table>