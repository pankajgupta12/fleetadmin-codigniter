<style>
 th {
    width: 50%;
}
</style>
<div class="container">

  <h4><?php echo $_GET['name']; ?> Shift Details on <?php echo  $_GET['date']; ?> (<?php echo $_GET['phone']; ?>)</h4>
  <div class="row"> 
  <?php   
  	$arrList = array('1'=>'Yes','2'=>'No');
  	 $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https://" : "http://";
  foreach($view_shift as $key=>$shiftinfo) { 
  
       if($shiftinfo->form_type == 1) {
           
           $form_type = 'Pre Shift';
           $getImages =  getImages($shiftinfo->id);
           $getvichleinfo =   getvichleInfo($shiftinfo->rego);
           
  ?>
  
   <div class="col-sm-6">
            <h5><?php echo  $form_type; ?></h5>
          <table class="table">
             
              <tr>
                <th>Rego</th>
                <th><?php echo $getvichleinfo->rego_number; ?></th>
              </tr>
              <tr>
                <th>Next Service Due</th>
                <th><?php echo $getvichleinfo->next_services_due; ?></th>
              </tr>
              <tr>
                <td>Run Number</td>
                <td><?php echo $shiftinfo->run_number; ?></td>
              </tr>      
              <tr class=" ">
                <td>Is the Fuel Tank Full?</td>
                <td><?php echo $arrList[$shiftinfo->fule_tank]; ?>
                <br/>
                <?php echo $shiftinfo->fule_tank_reason; ?>
                </td>
              </tr>
                    <tr>
                <td>Have temperature tracker?</td>
                <td><?php echo $arrList[$shiftinfo->temperature_tracker]; ?></td>
                <br/>
                <?php echo $shiftinfo->temperature_tracker_reason; ?>
              </tr>      
              <tr class=" ">
                <td>Faulty or Damaged</td>
                <td><?php echo $shiftinfo->faulty_damage; ?></td>
              </tr>
                    <tr>
                <td>Shift you are working for</td>
                <td><?php echo $shiftinfo->shif_for; ?></td>
              </tr>      
              <tr class=" ">
                <td>Tracker PhotoNo file chosen</td>
                 <td>
                    <?php  foreach($getImages[1] as $key=>$val1) {   
                      if($val1->url_type == 1) {
                    ?>
                    <a href="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" target="_blank"><img src="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php } else { ?>
                     <a href="<?php   echo  $val1->images_name; ?>" target="_blank"><img src="<?php   echo  $val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php }  }   ?>
                </td>
              </tr>
                    <tr>
                <td>Vehicle PhotoNo file chosen</td>
                <td>
                    <?php  foreach($getImages[2] as $key=>$val1) {   
                      if($val1->url_type == 1) {
                    ?>
                    <a href="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" target="_blank"><img src="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php } else { ?>
                     <a href="<?php   echo  $val1->images_name; ?>" target="_blank"><img src="<?php   echo  $val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php }  }   ?>
                </td>
              </tr>      
              <!--<tr class=" ">-->
              <!--  <td>Vehicle Interior PhotoNo file chosen</td>-->
              <!--  <td>-->
              <!--      <?php  foreach($getImages[3] as $key=>$val1) {    ?>-->
              <!--      <a href="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" target="_blank"><img src="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" alt="Img" width="75" height="75"></a>-->
              <!--       <?php }   ?>-->
              <!--  </td>-->
              <!--</tr>-->
              <tr class=" ">
                <td>Work Phone (Front & Back)No file chosen</td>
                  <td>
                    <?php  foreach($getImages[4] as $key=>$val1) {   
                      if($val1->url_type == 1) {
                    ?>
                    <a href="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" target="_blank"><img src="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php } else { ?>
                     <a href="<?php   echo  $val1->images_name; ?>" target="_blank"><img src="<?php   echo  $val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php }  }   ?>
                </td>
              </tr>
              <!--<tr class=" ">-->
              <!--  <td>OPERATORS DECLARATION</td>-->
              <!--  <td><?php  echo $arrList[$shiftinfo->operators]; ?>-->
              <!--  <br/>-->
              <!--  <?php echo $shiftinfo->operators_reason; ?>-->
              <!--  </td>-->
              <!--</tr>-->
              <tr class=" ">
                <td>I am fit to undertake my allocated tasks</td>
                <td><?php  echo $arrList[$shiftinfo->undertake_allocated]; ?>
                <br/>
                <?php echo $shiftinfo->undertake_allocated_reason; ?>
                </td>
              </tr>
              <tr class=" ">
                <td>Have a current and valid license</td>
                <td><?php echo $arrList[$shiftinfo->current_valid_license]; ?>
                <br/>
                <?php echo $shiftinfo->current_valid_license_reason; ?>
                </td>
              </tr>
              
               <tr class=" ">
                <td>To the best of my knowledge, I have had NO driving infringements issued to me in the last 24hrs</td>
                <td><?php  echo $arrList[$shiftinfo->best_knowledge]; ?>
                <br/>
                <?php echo $shiftinfo->best_knowledge_reason; ?>
                </td>
              </tr>
              
               <tr class=" ">
                <td>I have NOT consumed alcohol and/or drugs(prescription) or otherwise that may impair my ability to work and drive</td>
                <td><?php  echo $arrList[$shiftinfo->consumed_alcohol]; ?>
                <br/>
                <?php echo $shiftinfo->consumed_alcohol_reason; ?>
                </td>
              </tr>
               <tr>
                <th>Device Info</th>
                <th>
                    <?php echo $shiftinfo->lat; ?> | <?php echo $shiftinfo->lang; ?><br/>
                    <?php echo $shiftinfo->id_address; ?><br/>
                    <?php echo $shiftinfo->submit_date; ?><br/>
                    
                </th>
              </tr>
              <tr class=" ">
                <td>Signature</td>
                <td> <a href="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/signatureimages/'.$shiftinfo->signature; ?>" target="_blank"><img src="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/signatureimages/'.$shiftinfo->signature; ?>" alt="Img" width="250" height="100"></a> </td>
              </tr>
              
             </table>

    </div>
        <?php  } else {
                 $form_type = 'Post Shift';  
              $getImages =  getImages($shiftinfo->id);
              $getvichleinfo =   getvichleInfo($shiftinfo->rego);
            
            ?>
                 
   <div class="col-sm-6">
            <h5><?php echo  $form_type; ?></h5>
          <table class="table">
               
               <tr>
                <th>Rego</th>
                <th><?php echo $getvichleinfo->rego_number; ?></th>
              </tr>
              <tr>
                <th>Next Service Due</th>
                <th><?php echo $getvichleinfo->next_services_due; ?></th>
              </tr>
              <tr>
                <td>Location</td>
                <td><?php echo $shiftinfo->location; ?></td>
              </tr>      
              <tr class=" ">
                <td>Current Odometer</td>
                <td><?php echo $shiftinfo->current_odometer; ?></td>
              </tr>
             
              <tr class=" ">
                <td>Does your vehicle have a temperature tracker ?</td>
                <td><?php echo $shiftinfo->temperature_tracker; ?></td>
              </tr>
                    <tr>
                <td>Is the Fuel Tank Full ?</td>
                <td><?php echo $arrList[$shiftinfo->fule_tank]; ?>
                 <br/>
                <?php echo $shiftinfo->fule_tank_reason; ?>
                </td>
              </tr>      
              <tr class=" ">
                <td>Comments-</td>
                <td><?php  echo $arrList[$shiftinfo->comments]; ?>
                  <br/>
                <?php echo $shiftinfo->comments_reason; ?>
                </td>
              </tr>
                    <tr>
                <td>Any Incident to Report</td>
                <td><?php echo $arrList[$shiftinfo->any_incident]; ?>
                  <br/>
                <?php echo $shiftinfo->any_incident_reason; ?>
                </td>
              </tr>      
              <tr class=" ">
                <td>Any other comments :</td>
                <td><?php echo $arrList[$shiftinfo->any_other_comment]; ?>
                 <br/>
                <?php echo $shiftinfo->any_other_comment_reason; ?>
                </td>
              </tr>
              <tr class=" ">
                <td>Vehicle/Phone IssueNo file chosen</td>
                 <td>
                    <?php  foreach($getImages[5] as $key=>$val1) {   
                      if($val1->url_type == 1) {
                    ?>
                    <a href="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" target="_blank"><img src="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php } else { ?>
                     <a href="<?php   echo  $val1->images_name; ?>" target="_blank"><img src="<?php   echo  $val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php }  }   ?>
                </td>
              </tr>
              <tr class=" ">
                <td>Work Phone - Front & BackNo file chosen</td>
                 <td>
                    <?php  foreach($getImages[6] as $key=>$val1) {   
                      if($val1->url_type == 1) {
                    ?>
                    <a href="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" target="_blank"><img src="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php } else { ?>
                     <a href="<?php   echo  $val1->images_name; ?>" target="_blank"><img src="<?php   echo  $val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php }  }   ?>
                </td>
              </tr>
              <tr class=" ">
                <td>Fuel CapNo file chosen</td>
                  <td>
                    <?php  foreach($getImages[7] as $key=>$val1) {   
                      if($val1->url_type == 1) {
                    ?>
                    <a href="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" target="_blank"><img src="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php } else { ?>
                     <a href="<?php   echo  $val1->images_name; ?>" target="_blank"><img src="<?php   echo  $val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php }  }   ?>
                </td>
              </tr>
              <tr class=" ">
                <td>Key returned PhotoNo file chosen</td>
                  <td>
                    <?php  foreach($getImages[8] as $key=>$val1) {   
                      if($val1->url_type == 1) {
                    ?>
                    <a href="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" target="_blank"><img src="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php } else { ?>
                     <a href="<?php   echo  $val1->images_name; ?>" target="_blank"><img src="<?php   echo  $val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php }  }   ?>
                </td>
              </tr>
              
               <tr class=" ">
                <td>Fuel receiptNo file chosen</td>
                 <td>
                    <?php  foreach($getImages[9] as $key=>$val1) {   
                      if($val1->url_type == 1) {
                    ?>
                    <a href="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" target="_blank"><img src="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/photos/pre/'.$val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php } else { ?>
                     <a href="<?php   echo  $val1->images_name; ?>" target="_blank"><img src="<?php   echo  $val1->images_name; ?>" alt="Img" width="75" height="75"></a>
                     <?php }  }   ?>
                </td>
              </tr>
              
               <tr class=" ">
                <td>Fuel Amount:</td>
                <td><?php  echo $shiftinfo->fuel_amount; ?></td>
              </tr>
               <tr class=" ">
                <td>Interior of the vehicle has been left clean :</td>
                <td><?php  echo $arrList[$shiftinfo->interior_vehicle]; ?>
                  <br/>
                <?php echo $shiftinfo->interior_vehicle_reason; ?>
                </td>
              </tr>
              
               <tr class=" ">
                <td>Have you closed your route?</td>
                <td><?php  echo $arrList[$shiftinfo->closed_route]; ?>
                 <br/>
                <?php echo $shiftinfo->closed_route_reason; ?>
                </td>
              </tr>
                <tr>
                <th>Device Info</th>
               <th>
                    <?php echo $shiftinfo->lat; ?> | <?php echo $shiftinfo->lang; ?><br/>
                    <?php echo $shiftinfo->id_address; ?><br/>
                    <?php echo $shiftinfo->submit_date; ?><br/>
                    
                </th>
              </tr>
               <tr class=" ">
                <td>Signature</td>
                <td> <a href="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/signatureimages/'.$shiftinfo->signature; ?>" target="_blank"><img src="<?php   echo  $protocol.$_SERVER['SERVER_NAME'].'/fleetlogin/signatureimages/'.$shiftinfo->signature; ?>" alt="Img" width="250" height="100"></a> </td>
              </tr>
             </table>

    </div>                 
                 <?php  }  } ?>
    
  </div>
</div>
