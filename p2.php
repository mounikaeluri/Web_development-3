<?php

function validate_data($params) {
    $msg = "";
    if(strlen($params[0]) == 0)
        $msg .= "Please enter the first name<br />";  
	if(strlen($params[1]) == 0)
        $msg .= "Please enter the middle name<br />"; 
	if(strlen($params[2]) == 0)
        $msg .= "Please enter the last name<br />"; 
	if(strlen($params[3]) == 0)
        $msg .= "Please enter the general name<br />"; 
	if(strlen($params[4]) == 0)
        $msg .= "Please enter the photo<br />";
	if(strlen($params[5]) == 0)
        $msg .= "Please enter the gender<br />"; 
	if(strlen($params[6]) == 0)
        $msg .= "Please enter the Date of birth<br />"; 
	if(strlen($params[7]) == 0)
        $msg .= "Please enter any medical conditions<br />"; 
    if(strlen($params[8]) == 0)
        $msg .= "Please enter the special dietary requirement<br />"; 
    if(strlen($params[9]) == 0)
        $msg .= "Please enter the Emergency contact name<br />";  
	if(strlen($params[10]) == 0)
        $msg .= "Please enter the Emergency area phone<br />"; 
	if(strlen($params[11]) == 0)
        $msg .= "Please enter the Emergency Prefix phone<br />";  
	if(strlen($params[12]) == 0)
        $msg .= "Please enter the Emergency phone<br />";  
	if(strlen($params[13]) == 0)
        $msg .= "Please enter the Parent first name<br />";  
	if(strlen($params[14]) == 0)
        $msg .= "Please enter the Parent Middle name<br />";  
	if(strlen($params[15]) == 0)
        $msg .= "Please enter the Parent Last name<br />";  
	if(strlen($params[16]) == 0)
        $msg .= "Please enter the Relation to child<br />";  
	if(strlen($params[17]) == 0)
        $msg .= "Please enter the Address Line1<br />";  
	if(strlen($params[18]) == 0)
        $msg .= "Please enter the Address Line1<br />";  
	if(strlen($params[19]) == 0)
        $msg .= "Please enter the city<br />"; 
    if(strlen($params[20]) == 0)
        $msg .= "Please enter the state<br />";                        
    if(strlen($params[21]) == 0)
        $msg .= "Please enter the zip <br />";
    elseif(!is_numeric($params[21])) 
        $msg .= "Zip code may contain only numeric digits<br />"; 
	if(strlen($params[22]) == 0)
        $msg .= "Please enter the Home area phone<br />"; 
	if(strlen($params[23]) == 0)
        $msg .= "Please enter the Home Prefix phone<br />"; 
	if(strlen($params[24]) == 0)
        $msg .= "Please enter the Home phone<br />";  	
	if(strlen($params[25]) == 0)
        $msg .= "Please enter the Cell area phone<br />"; 
	if(strlen($params[26]) == 0)
        $msg .= "Please enter the Cell Prefix phone<br />"; 
	if(strlen($params[27]) == 0)
        $msg .= "Please enter the Cell phone<br />";  
    if(strlen($params[28]) == 0)
        $msg .= "Please enter email<br />";
    elseif(!filter_var($params[28], FILTER_VALIDATE_EMAIL))
        $msg .= "Your email appears to be invalid<br/>";  
	if(strlen($params[29]) == 0)
        $msg .= "Please Select the atleast one program<br />";	
    if($msg) {
        write_form_error_page($msg);
        exit;
        }
    }
  
function write_form_error_page($msg) {
   // write_header();
    echo "<h2>Sorry, an error occurred<br />",
    $msg,"</h2>";
    //write_form();
   // write_footer();
    }  
function write_form() {
    print <<<ENDBLOCK
	<div>
        <h1>Happy Days Summer Camp Enrolment Form<a id="form" href="index.html"><img id="name" src="button1.png" alt="Picture For Enroll Link" /></a></h1>
		<fieldset><legend>Enrolment Information</legend>
			   <form name="child_info"	
	      method="POST"
	      enctype="multipart/form-data"
	      action="http://jadran.sdsu.edu/~jadrn062/proj3/process_request.php"
	      id ="signUpForm">
			
			<legend>Child Information</legend>
			<ul>
				<li><label for="fname">First Name</label>
					<input type="text" name="fname" size="25" /></li>    
				<li><label for="mname">Middle Name</label>
					<input type="text" name="mname" size="25" /></li>			
				<li><label for="lname">Last Name</label>
					<input type="text" name="lname" size="25" /></li> 
				<li><label>Name</label>
					<input type="text" name="generalname" size="50" /></li>
				<li><label for="pic">Photo</label>
					<input type="file" name="pic" accept="image/*" /></li>					     
				<li><label for="gender">Gender</label>
			     		<input type ="radio" name="gender" id="male"value="m"/>Male
			     		<input type ="radio" name="gender" id="female"value="f"/>Female</li>
				<li><label>Date of Birth</label> 
					<input type="text" name="date_of_birth" size="20" maxlength="15" placeholder="mm/dd/yyyy" /></li> 
				<li><label>Any Medical Condition</label><br />
				<TEXTAREA name= "medical" rows="4" cols="50"></TEXTAREA></li>
				<li><label>Special Dietary Requirements</label><br />
				<TEXTAREA name= "dietary" rows="4" cols="50"></TEXTAREA></li>
				<li><label>Emergency Contact</label><br>
					<label>Name</label>
					<input type="text" name="emergency_name" size="25" /><br>
					<label>Phone</label>
					(<input type="text" name="emergency_area_phone" size="4" maxlength="3"/>)
					<input type="text" name="emergency_prefix_phone" size="4" maxlength="3"/>
					<input type="text" name="emergency_phone" size="5" maxlength="4"/> </li> 
				</ul>
       <hr>
			<legend>Parent Information</legend>
			<ul>
				<li><label>First Name</label>
					<input type="text" name="parent_fname" size="25" /></li>    
				<li><label>Middle Name</label>
					<input type="text" name="parent_mname" size="25" /></li>			
				<li><label>Last Name</label>
					<input type="text" name="parent_lname" size="25" /></li> </ul>
			<ul>
				<li><label>Relation to child</label>
		     		<input type ="radio" name="relation" id="ch1" value="father"/>Father
		     		<input type ="radio" name="relation" id="ch2"  value="Mother"/>Mother
		     		<input type ="radio" name="relation" id="ch3" value="Guardian"/>Guardian
		     		
		     	</li></ul>
			<ul>
				<li><label>Address Line1</label>
					<input type="text" name="address_line1" size="55" /><br />
					<label>Address Line2</label>
					<input type="text" name="address_line2" size="55" /><br />				
					<label>City</label>
					<input type="text" name="city" size="25" /> 
					<label>State</label>
					 <input type="text" name="state" size="3" maxlength="2" />

					<label>Zip</label>
					<input type="text" name="zip" size="10" maxlength="10" /></li>      
				<li><label>Home Phone</label>
					(<input type="text" name="home_area_phone" size="4" maxlength="3"/>)
					<input type="text" name="home_prefix_phone" size="4" maxlength="3"/>
					<input type="text" name="home_phone" size="5" maxlength="4"/></li> 
				<li><label>Cell Phone</label>
					(<input type="text" name="cell_area_phone" size="4" maxlength="3"/>)
					<input type="text" name="cell_prefix_phone" size="4" maxlength="3"/>
					<input type="text" name="cell_phone" size="5" maxlength="4"/></li>
				<li><label>Email address:</label>
                		<input type="text" name="email" size="25"  /></li>
			</ul>
			<hr>
			<legend>Select Atleast One Program</legend>
	    		<input type="checkbox" name="program[]" id="ch_basket" value="1"/>Basketball Camp<br />
	    		<input type ="checkbox" name="program[]"  id="ch_base"value="2"/> Baseball Camp <br />
	    		<input type ="checkbox" name="program[]" id="ch_physical" value="3"/>Physical Training<br />
	    		<input type ="checkbox" name="program[]" id="ch_band" value="4"/>Band Camp<br />
	    		<input type ="checkbox" name="program[]" id="ch_swimming" value="5"/>Swimming<br />
	    		<input type ="checkbox" name="program[]" id="ch_nature"value="6"/>Nature Discovery
			
		<div id="message_line">&nbsp;</div>
        <div id="button_panel">  
            <input type="reset" value="Clear Data" class="button" />
            <input type="button" value="Submit Data"  id="ck_button" /> 
         <h3 id="status"></h3>
            <!---<img id="busy_wait" src="loading.gif" />---->
		</div> 		
        </form>
        </fieldset>  
    </div> 
ENDBLOCK;
}                        

function process_parameters() {
    global $bad_chars;
    $params = array();

    $params[] = trim(str_replace($bad_chars, "",$_POST['fname']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['mname']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['lname']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['generalname']));
	$params[] = trim(str_replace($bad_chars, "",$_FILES['pic']['name']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['gender']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['date_of_birth']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['medical']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['dietary']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['emergency_name']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['emergency_area_phone']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['emergency_prefix_phone']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['emergency_phone']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['parent_fname']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['parent_mname']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['parent_lname']));
	
	$params[] = trim(str_replace($bad_chars, "",$_POST['relation']));
	
	$params[] = trim(str_replace($bad_chars, "",$_POST['address_line1']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['address_line2']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['city']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['state']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['zip']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['home_area_phone']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['home_prefix_phone']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['home_phone']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['cell_area_phone']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['cell_prefix_phone']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['cell_phone']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['email']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['']));
	
    return $params;
    }
    
function store_data_in_db($params) {
    $db = get_db_handle();
   
        
    ### NOT A DUP
  
	
		$parent_cell_phone = "$params[25]"."$params[26]"."$params[27]";
	
	$parent_id = 0;
    
	 $parent_home_phone = "$params[22]"."$params[23]"."$params[24]";
    $sql = "SELECT id from parent where primary_phone='$parent_home_phone';";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_array($result);
        $parent_id = $row[0];
        }
	else{
	     
	       $sql_parent = "insert into parent(first_name,middle_name,last_name,address1,address2,city,state,zip,primary_phone,secondary_phone,email) ".    
           "values('$params[13]','$params[14]','$params[15]','$params[17]','$params[18]','$params[19]','$params[20]','$params[21]','$parent_home_phone','$parent_cell_phone','$params[28]');";
	        mysqli_query($db,$sql_parent);
	        $how_many = mysqli_affected_rows($db);
	       
            
			if($how_many == 1) echo " ";
            else echo "A critical error occurred parent.";
	        $parent_id = mysqli_insert_id($db);
		}
		
	$child_id = 0;
    $cname=$_POST['fname'];
    $sql = "SELECT id from child where parent_id=$parent_id and first_name='$cname';";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_array($result);
        $child_id = $row[0];
        }
	else{
    
	$emergency_name = "$params[9]";
	$emergency_phone = "$params[10]"."$params[11]"."$params[12]";
	
 $bday =explode('/',$params[6]);
$insertbday = $bday[2].'-'.$bday[0].'-'.$bday[1];
$insertbday = date($insertbday);

//	echo "$child_birthdate";
	
		$sql_child = "insert into child(parent_id,relation,first_name,middle_name,last_name,nickname,image_filename,gender,birthdate,conditions,diet,emergency_name,emergency_phone) ".   
			   "values('$parent_id','$params[16]','$params[0]','$params[1]','$params[2]','$params[3]','$params[4]','$params[5]','$insertbday','$params[7]','$params[8]','$emergency_name','$emergency_phone');";
			 
    
	mysqli_query($db,$sql_child);
   $how_many = mysqli_affected_rows($db);
	        
            
			if($how_many == 1) echo " ";
            else echo "A critical error occurred child.";
	        $child_id = mysqli_insert_id($db);
	}
	
	$enrollment = 0;
	$program=$_POST['program'];
	
	for($i = 0; $i < count($program); $i++) {
		
		$camp_value = intval($program[$i]);
		
        $sql_enroll = "insert into enrollment values('$camp_value','$child_id');";
			
    
	    mysqli_query($db,$sql_enroll);
        $how_many = mysqli_affected_rows($db);
	        
            
			if($how_many == 1) echo " ";
            else echo "A critical error occurred enroll.";
	        $enroll_id = mysqli_insert_id($db);
	
  	}

    mysqli_close($db);
} 
function pic_upload(){   
    $UPLOAD_DIR = 'pic/';

    $fname =  $params[4].$_FILES['pic']['name'];
    

    if(file_exists("$UPLOAD_DIR".$fname))  {
        echo "<b>Error, the file $fname already exists on the server</b><br />\n";
        }
    elseif($_FILES['pic']['error'] > 0) {
    	$err =$_FILES['file']['error'];	
        echo "Error Code: $err ";
	if($err == 1)
		echo "The file was too big to upload, the limit is 2MB<br />";
        } 
    elseif(exif_imagetype($_FILES['pic']['tmp_name']) != IMAGETYPE_JPEG) {
        echo "ERROR, not a jpg file<br />";   
        }
        
    else { 
        move_uploaded_file($_FILES['pic']['tmp_name'], "$UPLOAD_DIR".$fname);
        
    } 

}    
?>   