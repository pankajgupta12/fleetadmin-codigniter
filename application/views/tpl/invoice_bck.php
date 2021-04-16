<table width='100%' style='border-collapse: collapse;' CELLPADDING="5">
	<tr class="top">
		<td colspan="4" style="	padding: 5px;vertical-align: top;">
			<table width='100%' style="width: 100%;text-align: left;">
				<tr>
					<td class="title" style="font-size: 26px;
                line-height: 46px;
                color: #333;
                font-weight: 600;"> Ram Kripa Pty Ltd </td>
					<td style="text-align: right; color: #333;">
						<p>Invoice #:
							<?php  echo $invoiveid; ?>
								<p/>
								<p>Created on:
									<?php echo date('dS M Y'); ?>
										<p/> </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr class="information">
		<td colspan="4">
			<table width='100%' style="width: 100%;line-height: inherit;text-align: left;">
				<tr>
					<td style="padding: 5px; width: 50%; vertical-align: bottom; padding-bottom: 20px;"> <b></b> <b>
                                                Gold Coast<br>
                                                ABN 90 640 232 248 <br>
                                                Ph: 0450 711 586<br>
                                                ramkripa.info@gmail.com 
                                        </b> </td>
					<td style=" padding-bottom: 20px; vertical-align: bottom;  width: 50%; text-align: right;"> <b style="font-size: 18px;">To Ram Kripa Pty Ltd </b> <strong><?php echo  $driverinfo->name; ?>
                                            <?php if($driverinfo->address !='') { ?>
                                                <br>
                                                 <?php echo  $driverinfo->address; ?>  
                                            <?php  } ?>
                                            <br>  
                                            ABN <?php echo  $driverinfo->abn; ?> <br> 
                                            Phone:<?php echo  $driverinfo->phone; ?> <br>                               
                                            <?php echo  $driverinfo->email; ?>
                                        </strong> </td>
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