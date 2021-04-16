<style>
 .error{
  color:red;
 }
</style>
<?php  
  if(isset($_GET['id'])){
   $id = $_GET['id'];
  $url = "admin/add_driver?id=".$id;
 }else{
  $url = "admin/add_driver";
 } 
 
// $driver_staff->status = 1; 
 
//$url = "admin/add_driver";

$days_array = array(
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday',
        7 => 'Sunday'
	);

 //print_r($driver_staff);
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
							 
                                 <h4 class="title">Add Driver<a style="float:right;" class="add-question btn btn-primary btn-xs" href="<?php echo base_url('admin/driver_list'); ?>">Driver List</a></h4>
                            </div>
			<?php if( $this->session->flashdata('message') ){ ?>
				<div class="alert alert-success">
				  <strong>Successful!</strong> <?php echo $this->session->flashdata('message'); ?>
				</div>
			<?php  }?> 			
                            <div class="content">
                                <form method="post" action="<?php echo base_url($url); ?>">
                                    <div class="row">
                                 <?php // print_r($driver_staff); ?>            
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Driver name" value="<?php  if(set_value('name')){echo set_value('name');  }  elseif(isset($driver_staff->name)) { echo trim($driver_staff->name); }?>">
												 <span class="error"><?php  echo   form_error('name'); ?></span>	
                                            </div>
                                        </div>
										 <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control" placeholder="Driver phone" value="<?php  if(set_value('phone')){echo set_value('phone');  }  elseif(isset($driver_staff->phone)) { echo trim($driver_staff->phone); }?>">
												 <span class="error"><?php  echo   form_error('phone'); ?></span>	
                                            </div>
                                        </div>
										 <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" placeholder="Driver email" value="<?php  if(set_value('email')){echo set_value('email');  }  elseif(isset($driver_staff->email)) { echo trim($driver_staff->email); }?>">
												 <span class="error"><?php  echo   form_error('email'); ?></span>	
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" name="password" class="form-control" placeholder="Driver password" value="<?php  if(set_value('password')){echo set_value('password');  }  elseif(isset($driver_staff->password)) { echo trim($driver_staff->password); }?>">
												 <span class="error"><?php  echo   form_error('password'); ?></span>	
                                            </div>
                                        </div>
										
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label>ABN</label>
                                                <input type="text" name="abn" class="form-control" placeholder="Driver abn" value="<?php  if(set_value('abn')){echo set_value('abn');  }  elseif(isset($driver_staff->abn)) { echo trim($driver_staff->abn); }?>">
												 <span class="error"><?php  echo   form_error('abn'); ?></span>	
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Licence Number </label>
                                                <input type="text" name="licence_no" class="form-control" placeholder="Licence No" value="<?php  if(set_value('licence_no')){echo set_value('licence_no');  }  elseif(isset($driver_staff->licence_no)) { echo trim($driver_staff->licence_no); }?>">
												 <span class="error"><?php  echo   form_error('licence_no'); ?></span>	
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Licence Expiry :</label>
                                                <input type="text" name="licence_exp" class="date_class form-control" placeholder="Licence Expiry" value="<?php  if(set_value('licence_exp')){echo set_value('licence_exp');  }  elseif(isset($driver_staff->licence_exp)) { echo trim($driver_staff->licence_exp); }?>">
												 <span class="error"><?php  echo   form_error('licence_exp'); ?></span>	
                                            </div>
                                        </div>
										
										
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>BSB</label>
                                                <input type="text" name="bsb" class="form-control" placeholder="Driver BSB" value="<?php  if(set_value('bsb')){echo set_value('bsb');  }  elseif(isset($driver_staff->address)) { echo trim($driver_staff->bsb); }?>">
												 <span class="error"><?php  echo   form_error('bsb'); ?></span>	
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Account Number</label>
                                                <input type="text" name="account_number" class="form-control" placeholder="Account Number" value="<?php  if(set_value('account_number')){echo set_value('account_number');  }  elseif(isset($driver_staff->account_number)) { echo trim($driver_staff->account_number); }?>">
												 <span class="error"><?php  echo   form_error('account_number'); ?></span>	
                                            </div>
                                        </div>
                                        
                                        
                                         <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Status :</label>
                                                <select name="status" id="status" class="date_class form-control">
                                                    <option value="1" <?php if($driver_staff->status== '1') { echo 'selected="selected"'; } ?>>Active</option>
                                                    <option value="2" <?php if($driver_staff->status=='2') { echo 'selected="selected"'; } ?>>Deactivate</option>
                                                </select>    
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control" placeholder="Driver address" value="<?php  if(set_value('address')){echo set_value('address');  }  elseif(isset($driver_staff->address)) { echo trim($driver_staff->address); }?>">
												 <span class="error"><?php  echo   form_error('address'); ?></span>	
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">        
                                           <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Availability</label>
                                                            <ul style="margin-left: 71px;margin-top: -36px;">    
                                                                <?php  
                                                                
                                                          //  print_r($_POST); 
                                                                
                                                            $availdata = '';    
                                                            if(isset($_POST['avail']))  {
                                                             $availdata =    implode(',', $_POST['avail']);
                                                            }else if(empty($_POST['avail'])) {
                                                             $availdata =    $driver_staff->avail;
                                                            }
                                                                
                                                                foreach ($days_array as $key => $value) { ?>
                                                                  <li> <input type="checkbox" name="avail[]" id="avail" class="form-control" 
                                                                  style="width: 30px;margin-left: 12px;" value="<?php echo $value; ?>" <?php if($availdata != '') {  if(in_array($value , explode(',',$availdata))) {echo  'checked'; }else {echo ''; }  }?>> <?php echo  $value; ?> </li>                        
                                                                 <?php  } ?>
                                                            </ul> 
                                                     </div>
                                                </div>
                                            </div>    
                                        </div>        
                                        
                                       
                                        
                                     </div>
									 
                     <input type="hidden" class="form-control"  name="id" id="id" value="<?php if(isset($driver_staff->id)) {echo $driver_staff->id;} ?>">		
								
                                    <input  type="submit" name="submit" id="submit" class="btn btn-info btn-fill pull-left" value="submit">
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <style>
        
         ul li {
             /*display: inline-block;*/
                display: inline-block;
                float: none;
         }
        
        </style>