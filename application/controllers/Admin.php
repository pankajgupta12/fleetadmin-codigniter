<?php
defined('BASEPATH') OR exit('No direct script access allowed');

     class Admin extends CI_Controller  
    {

      public function __construct(){
        parent::__construct();
        
      }

	public function index()
	{

            if($this->session->userdata('email_id') != "" && $this->session->userdata('email_id') !="") { 
					  			redirect(base_url('admin/dashboard'));
				}

			   $data = array();
			   $data['title'] = "Login";
	        // $this->load->view('header');
				$this->load->view('admin/index', $data);
	}
	
	
	public function login(){
			//print_r($_POST); die;
			 $this->form_validation->set_rules('user_loginname', 'Email', 'trim|required');
			 $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
			
			 if ($this->form_validation->run() == TRUE)
				{
					
					 	 if($this->input->post() !='')
					    {
					          $email =  $this->input->post('user_loginname');
						      $password =  $this->input->post('user_password');
							  
							$this->db->select('*');
							$this->db->from('admin_login');
							$this->db->where('username',$email);
							$this->db->where('password',$password);  
							$query = $this->db->get();
						 //	echo $this->db->last_query(); die;
							if($query->num_rows() == 1)
							{
								$data = array();
								$row=$query->row();
								
										$data=array(
										'admin_id'=>$row->id,
										'email_id'=>$row->username,
										'name'=>$row->name,
										);
										
								$this->session->set_userdata($data);           
							    redirect(base_url('admin/dashboard'));
							}
							else
							{
							  $this->session->set_flashdata('message', 'Your email and password is wrong.');
							} 
					    } 
				}	   
		    $data['title'] = "Login";
			$this->load->view('admin/index', $data);
		}
		function logout()
		{
			
			  $newdata = array(
						'admin_id'  =>'',
						'email_id' => '',
						'name' => '',
						); 
					   
			$this->session->unset_userdata($newdata);
			$this->session->sess_destroy(); 
			redirect(base_url('admin/index'));
		}
		
        public function login_check()
		{
				if($this->session->userdata('email_id') == "" && $this->session->userdata('email_id') =="") { 
					  			redirect(base_url('admin/index'));
				}
		}
	   
	   public function dashboard()
	   {
		    $this->login_check();
			$data =array();
			
			// echo $this->db->last_query(); die;
			//echo "<pre>";  print_r($data); 
		    $data['title'] = "Dashboard";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		 
	
	public function driver_list()
	{
		$this->login_check();
		   // print_r($_SESSION); 
		    $data['driver_staff'] = $this->db->get('driver_staff')->result();
			  $data['title'] = "Driver Staff";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/driver_staff_list', $data);
			$this->load->view('admin/admin_footer', $data);
	}
	
		public function shiftlist()
	{
		   $this->login_check();
		    $this->load->helper('getfunction');
		     /*$this->db->get('pre_shift')->result();
		     $data['pre_shift'] = $this->db->order_by('Author', 'asc');*/
                
                $this->db->select("*");
                $this->db->from('pre_shift');
                $this->db->order_by("id", "DESC");
                $query = $this->db->get(); 
                $data['pre_shift'] = $query->result();
		     
			  $data['title'] = "Shift List";
			  
			  
			  
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/shiftlist', $data);
			$this->load->view('admin/admin_footer', $data);
	}
	
		public function add_driver()
	{
		 $this->login_check();
		  $data = array();
			if(isset($_GET['id'])){
			   $id =($_GET['id']);
	           $data['driver_staff'] = $this->db->get_where('driver_staff',array('id'=>$id))->row();
			}
		 
		  $this->form_validation->set_rules('name', 'Driver name', 'trim|required');
		  $this->form_validation->set_rules('phone', 'Driver phone', 'trim|required');
		  $this->form_validation->set_rules('email', 'Driver email', 'trim|required');
		  $this->form_validation->set_rules('password', 'Driver password', 'trim|required');
		  //$this->form_validation->set_rules('abn', 'Driver abn', 'trim|required');
		 // $this->form_validation->set_rules('licence_no', 'Licence No', 'trim|required');
		  //$this->form_validation->set_rules('licence_exp', 'Licence Expiry', 'trim|required');
		 // $this->form_validation->set_rules('address', 'Driver address', 'trim|required');
		  
		     if ($this->form_validation->run() == TRUE)
				{
					
					 	 if($this->input->post() !='')
					    {
					          $id =  $this->input->post('id');
					          $name =  $this->input->post('name');
					          $phone =  $this->input->post('phone');
					          $email =  $this->input->post('email');
					          $password =  $this->input->post('password');
					          $abn =  $this->input->post('abn');
                             $licence_no =  $this->input->post('licence_no');
                             $licence_exp =  $this->input->post('licence_exp');
					          $address =  $this->input->post('address');
					          $bsb =  $this->input->post('bsb');
					          $account_number =  $this->input->post('account_number');
					          $status =  $this->input->post('status');
					          $avail =  $this->input->post('avail');
							  
							  $availstr = implode(',',$avail);
							  
							    $created_at  = date("Y-m-d h:i:s");
						     	$insertData =  array(
   							                    'name'=>$name,
   							                    'status'=>$status,
   							                    'phone'=>$phone,
   							                    'email'=>$email,
   							                    'password'=>$password,
   							                    'abn'=>$abn,
   							                    'bsb'=>$bsb,
   							                    'avail'=>$availstr,
   							                    'account_number'=>$account_number,
   							                    'address'=>$address,
   							                    'licence_no'=>$licence_no,
   							                    'licence_exp'=>$licence_exp,
												'createdOn'=>$created_at
												);
												
							  if($id =="") {			
							         
									 $this->db->insert('driver_staff',$insertData);	
									 $lastid = $this->db->insert_id();
									 $this->checkdriveravail($availstr, $lastid);
									$this->session->set_flashdata("message", 'Driver Info has been added successfully.');
									redirect(base_url('admin/driver_list'));
								}elseif($id != ""){
								   $this->db->where('id',$id);
								   $this->db->update('driver_staff',$insertData);	
								   $this->checkdriveravail($availstr, $id);
								 
								   $this->session->set_flashdata("message", 'Driver Info has been updated successfully.');
								   redirect(base_url('admin/driver_list'));
                              }
						}
				}
		 
			  $data['title'] = "Driver Staff";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/add_driver', $data);
			$this->load->view('admin/admin_footer', $data);
	}
	
	public function NextavailUpdate(){
	    
	    if(isset($_POST)) {
	        
            $driverid = $_POST['driverid'];
            $month = $_POST['month'];
            $year = $_POST['year'];
	    
            $availdata = $this->db->select('avail')->get_where('driver_staff',array('id'=>$driverid))->row();
            $avail = $availdata->avail;
            
            if($avail !='') {
                $this->checkdriveravail($avail,$driverid, $month, $year, 1);
            }
	    }
	    
	}
	
	
	
	 function checkdriveravail($avail, $driver_id, $month='', $year='', $flag = 0) 
	 {
	    
		$getdayInarray = explode(',' , ($avail));
		$getdate = array();
	 
	    foreach($getdayInarray as $value) {
	      $getdate[] =  substr($value,0,3);
	    } 
		
		//print_r($getdate);  die; 
		//echo  $month.'===='.$year;
		
		if($month != '') {
		    //$numberday=cal_days_in_month(CAL_GREGORIAN,date('m', strtotime($month)),date('Y', strtotime($year)));
		    
            $month = $month;
            $year = $year;
		    
		}else {
		   //$numberday=cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
		
		   $month = date('m');
		   $year = date('Y');
		   
		}
		
		 $numberday=cal_days_in_month(CAL_GREGORIAN, $month, $year);
	//	echo  $numberday;  die;
		
		for($d=1; $d<=$numberday; $d++)
		{
                    // $time=mktime(12, 0, 0, date('m'), $d, date('Y'));
                    // if (date('m', $time)== date('m'))
		    
				$time=mktime(12, 0, 0, $month, $d, $year);
				if (date('m', $time)== $month)
				$date = date('Y-m-d', $time);
				$checkday1= date('D', $time);
				$day = date('D', $time);
				//echo $date; die;
			if(in_array($checkday1 , $getdate)) { $checkday =  "1"; }else {$checkday = '0';}
			
			 $resultdata = $this->db->select("id, status ")->get_where('driver_roster',array('date'=>$date, 'driver_id'=>$driver_id))->row();
			 
			 //echo  $this->db->last_query();
			 
			 //print_r($resultdata);
			 
			 if($resultdata->id !='' && $flag == 1 ) {
			     
			    // echo '11111111';
			    
			     $rosterupdate =  array(
       				                 'status'=>$checkday,
    								 'createdon'=>date('Y-m-d H:i:s')
									 );
			     
                        $this->db->where('driver_id',$driver_id);
                        $this->db->where('date',$date); 
                        $this->db->update('driver_roster',$rosterupdate);   
			     
			 //    if($resultdata->status == 1 ) {
			         
			         
			         
			 //    }else {
			     
			 //     $rosterupdate =  array(
    //   				                 'status'=>$checkday,
    // 								 'createdon'=>date('Y-m-d H:i:s')
				// 					 );
			     
    //                     $this->db->where('driver_id',$driver_id);
    //                     $this->db->where('date',$date); 
    //                     $this->db->update('driver_roster',$rosterupdate);    
			 //   }
			     
			 }else if($resultdata->id !=''  && $flag == 0) {
			     // update Data
			      //   echo '22222222222';
			      $rosterupdate =  array(
       				                 'status'=>$checkday,
    								 'createdon'=>date('Y-m-d H:i:s')
									 );
			     
                        $this->db->where('driver_id',$driver_id);
                        $this->db->where('date',$date);
                        $this->db->update('driver_roster',$rosterupdate);    
			     
			 }else{
			     
			        // echo '33333333333';
			     // Insert Data
			      $insertData =  array(
   				                    'status'=>$checkday,
   				                    'date'=>$date,
   				                     'driver_id'=>$driver_id,
									'createdon'=>date('Y-m-d H:i:s')
									);
					$this->db->insert('driver_roster',$insertData);					
			 }
			 
			// echo '<br/>';
		  
	    }
	      
	     
	 }
	
		public function add_vehicle()
	{
		 $this->login_check();
		  $data = array();
			if(isset($_GET['id'])){
			   $id =($_GET['id']);
	           $data['vehicle_list'] = $this->db->get_where('vehicle_list',array('id'=>$id))->row();
			}
		 
		  $this->form_validation->set_rules('rego_number', 'Rego Number', 'trim|required');
		  $this->form_validation->set_rules('next_services_due', 'Next Services Due', 'trim|required');
		  
		     if ($this->form_validation->run() == TRUE)
				{
					
					 	 if($this->input->post() !='')
					    {
					          $id =  $this->input->post('id');
					          $rego_number =  $this->input->post('rego_number');
					          $next_services_due =  $this->input->post('next_services_due');
					          
							   $created_at  = date("Y-m-d h:i:s");
							$insertData =  array(
   							                    'rego_number'=>$rego_number,
   							                    'next_services_due'=>$next_services_due,
												'created_at'=>$created_at
												);
												
								//print_r($insertData); die;				
							  if($id =="") {									 
									 $this->db->insert('vehicle_list',$insertData);	
									 $this->session->set_flashdata("message", 'Vehicle Info has been added successfully.');
									redirect(base_url('admin/vehicle_list'));
								}elseif($id != ""){
								   $this->db->where('id',$id);
								   $this->db->update('vehicle_list',$insertData);	
								   $this->session->set_flashdata("message", 'Vehicle Info has been updated successfully.');
								   redirect(base_url('admin/vehicle_list'));
                              }
						}
				}
		 
			  $data['title'] = "Add Vehicle";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/add_vehicle', $data);
			$this->load->view('admin/admin_footer', $data);
	}
    
    	public function vehicle_list()
	{
		$this->login_check();
		   // print_r($_SESSION); 
		    $data['vehicle_list'] = $this->db->get('vehicle_list')->result();
			  $data['title'] = "Vehichal List";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/vehicle_list', $data);
			$this->load->view('admin/admin_footer', $data);
	}	
	
	    	public function invoice_list()
	{
	    	$this->login_check(); 
		   // $data['invoice_info'] = $this->db->get('invoice_info')->order_by("id", "DESC")->result();
                
                $this->db->select("*");
                $this->db->from('invoice_info');
                $this->db->order_by("id", "DESC");
                $query = $this->db->get(); 
                $data['invoice_info'] = $query->result();
		    
		    
			  $data['title'] = "Invoice List";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/invoice_info', $data);
			$this->load->view('admin/admin_footer', $data);
	}
	
	public function view_shift()
	{
            $this->login_check();
            $this->load->helper('getfunction');
            $shiftid = $_GET['shiftid'];
	    	    
            $this->db->select("*");	    	 
            $this->db->from('pre_shift');
            $this->db->where( 'shiftquoteid' , $shiftid);
           // $this->db->or_where('shiftid', $shiftid); 
            $query = $this->db->get(); 
            $data['view_shift'] = $query->result();
            
           // echo $this->db->last_query();
	           
			$data['title'] = "View Shift";
			
			
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/view_shift', $data);
			$this->load->view('admin/admin_footer', $data);
	}	
	
	public function invoice_details()
	{	       
	         $invoicid = $_GET['invoiceid'];
                $this->db->select("fileinfodata");	    	 
                $this->db->from('invoice_info');
                $this->db->where( 'id' , $invoicid);
                 $query = $this->db->get(); 
                $invoiceData =   $query->row();
                echo '<center>'.base64_decode($invoiceData->fileinfodata).'</center>';
                
	}
	
	
	
	public function checkpaidinvoice(){
	     
	     if(isset($_POST)) {
	           $id = $_POST['id'];
	           $checkstatus = $_POST['checkstatus'];
	          $paid_date = date('Y-m-d H:i:s');
                $this->db->where('id',$id);
                 if($checkstatus == 2) {
                  $this->db->update('invoice_info',array('is_paid'=>$checkstatus,'paid_date'=>$paid_date));
                 }else if($checkstatus == 1){
                     $this->db->update('invoice_info',array('is_paid'=>$checkstatus));
                 }
	     }
	    
	}
	
	
	
            public function sendinvoice()
            {
                
                
                if(isset($_POST)) 
	           {
                
                   $id = $_POST['id'];
                
                    $this->db->select("id, driver_id ,  fileinfodata, invoice_todate , invoice_fromdate , filename");	    	 
                    $this->db->from('invoice_info');
                    $this->db->where( 'id' , $id);
                    $query = $this->db->get(); 
                    $invoiceData =   $query->row();
                   // echo '<center>'.base64_decode($invoiceData->fileinfodata).'</center>';
                
                   $driver_staff = $this->db->get_where('driver_staff',array('id'=>$invoiceData->driver_id))->row();
                
                
                        $attchment = $_SERVER['DOCUMENT_ROOT'].'/fleetadmin/files/invoice/'.$invoiceData->driver_id.'/'.$invoiceData->filename;
                        
                        $email=  $driver_staff->email;  // 'pankajgupta7000@gmail.com';  // $driver_staff->email;    //"pankajgupta7000@gmail.com";
                        $name= $driver_staff->name;    //"PaNKAJ";
                        $subject= $name." Invoive ".date('dS M Y' , strtotime($invoiceData->invoice_fromdate)).' to '.date('dS M Y' , strtotime($invoiceData->invoice_todate));
                        
                            // $message_info=  base64_decode($invoiceData->fileinfodata);           // "test by pankaj hehhehhe";
                            //$message = $message_info;admin/send_invoice_info.php
                            //  $message = $this->load->view('admin/send_invoice_info', $data, TRUE);
                       
                          $message   = "  Hello ".$name.PHP_EOL."Please find the attached invoice for the period from ".date('dS M Y' , strtotime($invoiceData->invoice_fromdate))." to ".date('dS M Y' , strtotime($invoiceData->invoice_todate))." In case of any discrepancy in payments, feel free to reply to this email. ".PHP_EOL."Thank you and Regards".PHP_EOL."Ram Kripa Team";
                        $this->sendEmail($email,$subject,$message,$attchment, $id);
	           }
            }
            
        public function sendEmail($email,$subject,$message, $attchment, $id)
            {
        
        
            // accounts@ramkripa.com.au
            // 5i%+-^TrED*b
        
            $config = Array(
              'protocol' => 'smtp',
              'smtp_host' => 'ssl://smtp.googlemail.com',
              'smtp_port' => 465,
              'smtp_user' => 'accounts@ramkripa.com.au', 
              'smtp_pass' => '5i%+-^TrED*b', 
              'mailtype' => 'html',
              'charset' => 'iso-8859-1',
              'wordwrap' => TRUE
            );
            
           
                  $this->load->library('email', $config);
                  $this->email->set_newline("\r\n");
                  $this->email->from('accounts@ramkripa.com.au');
                  $this->email->to($email);
                  $this->email->subject($subject);
                  $this->email->message($message);
                  //$this->email->attach($_SERVER['DOCUMENT_ROOT'].'/fleetadmin/files/invoice/1/12thMar_to_17thMarch_2021.pdf');
                  $this->email->attach($attchment);
                  if($this->email->send())
                 {
                     
                    $updatedate = date('Y-m-d H:i:s');      
                     
                    $this->db->where('id',$id);
                    $this->db->update('invoice_info',array('send_date'=>$updatedate));
                    echo 'Email send.';
                 
                 }
                 else
                {
                     echo 'email failed.';
                  //show_error($this->email->print_debugger());
                }
        
            }
        
          public function staff_roster(){
              
                $id = $_GET['id'];
                $this->load->helper('getfunction');
                $getdriverInfo = getDriverInfo($id);
                
                $data['title'] =  $getdriverInfo->name. 'Driver Roster ';
                $data['driverinfo'] = $getdriverInfo;
              
            $this->load->view('admin/admin_header', $data);
			$this->load->view('admin/staff_roster', $data);
			$this->load->view('admin/admin_footer', $data);
          } 
	
	
	 function DriverdateMarked(){
	     
	     
        $driver_id = $_GET['id'];
        $date = $_GET['date'];
        $status = $_GET['status'];
		
		
		if($status == 0) {
			$changeStatus = 1;
		}else{
			$changeStatus = 0;
		}
		
                $this->db->where('driver_id',$driver_id);
                $this->db->where('date',$date);
                $this->db->update('driver_roster',array('status'=>$changeStatus));
		 
	 }
	
}
