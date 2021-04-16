<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift_invoice extends CI_Controller {

 
           public function __construct()
         {
          parent::__construct();
          $this->load->library('pdf');
         }

  
	public function generateinvoice()
	{
	         $fromdate = date('2021-03-19');
             $todate = date('2021-03-26');
	       
	        $this->load->helper('getfunction');
	       
	         $getdata = getInvoiceData($fromdate , $todate);
	         $regonuInfo = getRegoInfo();
	         
	         
	         
	        foreach($getdata as $driver_id=>$valueData) {
	                  
	                   $totalAMount = 0;
	                  
                            $sql ="SELECT * FROM driver_staff where id = " .$driver_id."";
                            $driverinfo = $this->db->query($sql)->row();
                            $createdOn = date('Y-m-d H:i:s');
	                       
	                        $filename =  date('jSM' , strtotime($fromdate)).'_to_'.date('jSF',  strtotime($todate)).'_'.date('Y').'.pdf';
	                       
	                      	$insertData =  array(
       						                    'driver_id'=>$driver_id,
       						                    'createdOn'=>$createdOn,
       						                    'invoicedata'=>serialize($valueData),
       						                    'invoice_fromdate'=>$fromdate,
       						                    'filename'=>$filename,
       						                    'invoice_todate'=>$todate
											);
	           
        	           $this->db->insert('invoice_info',$insertData);	
        	           $lastid = $this->db->insert_id();
        	          $invoiveid =  str_pad($lastid, 4, "0", STR_PAD_LEFT);
     	           // $invoiveid = 12;
                    ob_start(); // start buffer
                    include $_SERVER['DOCUMENT_ROOT'].'/fleetadmin/application/views/tpl/invoice_new.php';
                    $html_content = ob_get_contents(); // assign buffer contents to variable
                    ob_end_clean(); // end buffer and remove buffer contents
        
                     $htmldata =    $html_content;
                     
                      $updatedata =  array(
   						                    'fileinfodata'=> base64_encode($htmldata),
   						                    'amount' => $totalAMount
											);
	           
                            $this->db->where('id',$lastid);
                            $this->db->update('invoice_info',$updatedata);
                     
                     
                    //echo '<br/>';
                    //preg_replace('/>\s+</', '><', $htmldata);
                    
                    
        
                    $fullPath =  $_SERVER['DOCUMENT_ROOT'].'/fleetadmin/files/invoice/'.$driver_id;
                    
                        if (!is_dir($fullPath)) {
                             mkdir($fullPath, 0777, TRUE);
                        } 
                    
                    $filepathname = $fullPath.'/'.$filename;
                
                   // echo  $htmldata; 
                  
                    $this->pdf->loadHtml($htmldata);
                    //$this->pdf->setPaper('A4', 'landscape');
                    $this->pdf->setPaper('letter');
                    $this->pdf->set_option('enable_html5_parser', TRUE);
                    $this->pdf->render();
                    //$this->pdf->stream("Webslesson11.pdf", array("Attachment"=>0));
                     $output = $this->pdf->output();
                     file_put_contents($filepathname , $output);
                    
	        }
        
           
	}
	
}
