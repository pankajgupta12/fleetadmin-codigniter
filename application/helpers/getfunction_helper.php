<?php 
function getImages($id)
{
            //get main CodeIgniter object
            $ci =& get_instance();
            
            //load databse library
            $ci->load->database();
           $data = $ci->db->get_where('upload_photo',array('shift_id'=>$id))->result();
           
          foreach($data as $key=>$info) {
               
              $getdata[$info->images_type][] = $info;
          }
           
           
           return ($getdata);
      
}

function getvichleInfo($rego)
{
            //get main CodeIgniter object
            $ci =& get_instance();
            
            //load databse library
            $ci->load->database();
           $data = $ci->db->get_where('vehicle_list',array('id'=>$rego))->row();
           
           return ($data);
      
}


function getRegoInfo()
{
            //get main CodeIgniter object
            $ci =& get_instance();
            
            //load databse library
            $ci->load->database();
            $data =   $ci->db->select('id, rego_number')->from('vehicle_list')->get()->result();
           // return ($data);
           
            foreach($data as $key=>$val) {
                
                $getVichinfo[$val->id] = $val->rego_number;
                
            }
            
       return $getVichinfo;        
}


function getDriverInfo($id)
{
             //get main CodeIgniter object
            $ci =& get_instance();
            
            //load databse library
            $ci->load->database();
           $data = $ci->db->get_where('driver_staff',array('id'=>$id))->row();
           
           return ($data);
}


function getInvoiceData($fromdate , $todate)
{
            //get main CodeIgniter object
            $ci =& get_instance();
            //load databse library
            $ci->load->database();
            
            /* $sql ="SELECT * FROM driver_staff where id = " .$driver_id."";
                                        $getinfo = $this->db->query($sql)->row();*/
            
           $data =  $ci->db->select('id, form_type, submit_date, rego, run_number, driver_id, shiftid')
           ->from('pre_shift')->where('submit_date >=', $fromdate)
           ->where('submit_date <=', $todate)->order_by("driver_id", "asc")->get()->result();
         
           foreach($data as $key=>$val) {
                
                $shiftinfo[$val->driver_id][] = $val;
            }
            
        return $shiftinfo;        
}

        function getcheckAvail($driver_id, $month, $year) {
         
         $availinfo = [];
          $ci =& get_instance();
            //load databse library
            $ci->load->database();
            
            
           $sql ="SELECT id, date, status FROM driver_roster where driver_id = " .$driver_id." and MONTH(date) = '".$month."' AND  YEAR(date) = '".$year."' ";
           $getinfo = $ci->db->query($sql)->result();
            
            foreach($getinfo as $key=>$val) {
                $availinfo[$val->date] = $val->status;
            }   
            
             return $availinfo;
         
        } 


?>