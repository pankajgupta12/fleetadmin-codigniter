
		<style>
        body {
          display: flex;
        }
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}
			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}
			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}
			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}
			.invoice-box table tr.top table td.title {
                font-size: 26px;
                line-height: 46px;
                color: #333;
                font-weight: 600;
			}
			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}
			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}
			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}
			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}
			.invoice-box table tr.item.last td {
				border-bottom: none;
			}
			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}
			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}
				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
			.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}
			.rtl table {
				text-align: right;
			}
			.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>
	<body>
	    <div class="wrapper">

		<div class="invoice-box rtl">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title">
							        	Ram Kripa Pty Ltd
								</td>

								<td  style="text-align: right;">
									Invoice #: <?php  echo  $invoiveid; ?><br />
									 Created on:  <?php  echo  Date('d M Y' , strtotime($createdOn));  ?><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td>
                                   <b style="font-size: 23px;"> Your Company </b>
                                   <address>
                                        <strong>
                                                Gold Coast<br>
                                                ABN 90 640 232 248 <br>
                                                Ph: 0450 711 586<br>
                                                Email: ramkripa.info@gmail.com 
                                            <br>
                                        </strong>
                                     </address>
								</td>
								<td style="text-align: right;">
							     <b style="font-size: 23px;"> Invoice To </b>
                                     <br>
                                    <address>
                                        <strong><?php echo  $driverinfo->name; ?>
                                            <?php if($driverinfo->address !='') { ?>
                                                <br>
                                                 <?php echo  $driverinfo->address; ?>  
                                            <?php  } ?>
                                            <br>  
                                            ABN <?php echo  $driverinfo->abn; ?> <br> 
                                            Phone:<?php echo  $driverinfo->phone; ?> <br>                               
                                            Email:<?php echo  $driverinfo->email; ?>
                                        </strong>    
                                        <br>
                                    </address>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="heading">
					<td>Day/Date</td>
					<td>Run Number</td>
					<td>Rego</td>
					<td style="text-align: center;">Amount</td>
				</tr>
            <?php   
            $totalAMount = 0;
            foreach($valueData as $shiftkey=>$shiftvalue) { 
             $color = '';
             $amount = '';
             $showamount = '';
               if($shiftvalue->form_type == 2) {
                   $color = '#c7e9cb';
                   $showamount = '$ 190';
                    $amount = 190; 
                   $totalAMount = $totalAMount  + $amount;
               }
            ?>
				<tr class="item" style="background: <?php echo $color; ?>">
					<td><?php echo date('d/M/Y' ,  strtotime($shiftvalue->submit_date)); ?></td>
					<td><?php echo $shiftvalue->run_number; ?></td>
					<td><?php echo $regonuInfo[$shiftvalue->rego]; ?></td>
					<td style="text-align: center;"><?php echo $showamount;  ?></td>
				</tr>
	  		<?php  } ?>	
				<tr class="total">
					<td colspan="2"></td>
					<td style="float: right;"><b>Total</b></td>
					<td style="text-align: center;"><strong> <?php echo  '$ '. $totalAMount; ?></strong></td>
				</tr>
			</table>
		</div>
      </div>	