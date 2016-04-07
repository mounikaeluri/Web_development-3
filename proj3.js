  
/*proj3.js
Enrolment Form
Mounika Eluri
CS545
Fall 2015
Project #3
*/
var error_state;
var field_message;
var field_array;
var message_line;

var e = {FNAME:0,LNAME:1,DATE_OF_BIRTH:2,EMERCENCY_NAME:3,EMERCENCY_PHONE_AREACODE:4,EMERCENCY_PHONE_PREFIX:5,
EMERCENCY_PHONE:6,PARENT_FNAME:7,PARENT_LNAME:8,
ADDRESS1:9,CITY:10,STATE:11,ZIP:12,HOME_AREACODE:13,HOME_PREFIX:14,HOME_PHONE:15,
CELL_AREACODE:16,CELL_PREFIX:17,CELL_PHONE:18,EMAIL:19,PIC:20};

function isValidState(state) {                                
        var stateList = new Array("AK","AL","AR","AZ","CA","CO","CT","DC",
        "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
        "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
        "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
        "UT","VA","VT","WA","WI","WV","WY");
        for(var i=0; i < stateList.length; i++) 
            if(stateList[i] == state)
                return true;
                message_line.innerHTML = "Please Enter your 2 letter state abbreviation ";
       field_array[e.STATE].style.border = "1px solid red";
      field_array[e.STATE].focus();
	  return false;
        }  

function init_vars(){ 
	error_state =false;
	field_message = new Array(
		"Please enter your first name",
		"Please enter your last name",
		"Please enter date of your birth",
		
        "Please enter emergency contact name",
        "Please enter emergency area code",
        "Please enter emergency phone prefix",
        "Please enter emergency phone number",
		"Please enter parent first name",
        "Please enter parent last name",
		"Please enter your address",
		"Please enter your city",
		"Please enter your state",
		"Please enter your zip",
		"Please enter your home phone area code",
		"Please enter your home phone prefix",
		"Please enter your home phone number",
        "Please enter your cell phone area code",
        "Please enter your cell phone prefix",
        "Please enter your cell phone number",
		"Please enter your email address",
		"Please upload a picture");
	field_array =new Array(
		document.child_info.fname,
		document.child_info.lname,
		document.child_info.date_of_birth,
		
        document.child_info.emergency_name,
        document.child_info.emergency_area_phone,
        document.child_info.emergency_prefix_phone,
        document.child_info.emergency_phone,
		document.child_info.parent_fname,
        document.child_info.parent_lname,
		document.child_info.address_line1,
		document.child_info.city,
		document.child_info.state,
		document.child_info.zip,
		document.child_info.home_area_phone,
		document.child_info.home_prefix_phone,
		document.child_info.home_phone,
        document.child_info.cell_area_phone,
        document.child_info.cell_prefix_phone,
        document.child_info.cell_phone,
		document.child_info.email,
		document.child_info.pic);
		
		message_line =document.getElementById("message_line");

}

// trim function copied from http://doc.infosnel.nl/javascript_trim.html
function trim(s) {
    var l=0; var r=s.length -1;
    while(l < s.length && s[l] == ' ') {
        l++; 
        }
    while(r > l && s[r] == ' ') {
        r-=1;   
        }
    return s.substring(l, r+1);
    }

function validate_form() { 
    for(i=0; i < field_array.length; i++) {
        if(trim(field_array[i].value) == "") {  // check for blank 
            error_state = true;
            field_array[i].style.border="1px solid red";
            field_array[i].focus();
            message_line.innerHTML = field_message[i];
            return false;
            }    // end if blank check
        if(i == e.STATE) { // check state
            if(!isValidState(document.child_info.state.value.toUpperCase())) { return false; }
            }            
        if(i == e.ZIP) { // check zip code
            if(!check_zip()) { return false; }
            }
        if(i == e.EMERCENCY_PHONE_AREACODE || i == e.EMERCENCY_PHONE_PREFIX || 
            i == e.EMERCENCY_PHONE) { // check phone number
            if(!check_phone()) { return false; }
            } 
        if(i == e.CELL_AREACODE || i == e.CELL_PREFIX || 
            i == e.CELL_PHONE) { // check phone number
            if(!check_cellphone()) { return false; }
            }    
        if(i == e.EMAIL) { // check email address
            if(!check_email()) { return false; }
            } 
         if( i == e.DATE_OF_BIRTH) {
            if(!validate_dob()) {return false;}
         } 
		 
     } // end for
    if(!home_phone()){
        return false;
    }
	if(!check_gender()){
        return false;
    }
    if(!check_relation()){
        return false;
    }
    if(!check_program_selected()){
        return false;
    }
    return true;
    }
	
     function check_gender(){

        if (!$('#male').prop('checked') && !$('#female').prop('checked')){
            message_line.innerHTML ="Please select one gender radio button";
            return false;
        }

        if ($('#male').prop('checked') && $('#female').prop('checked')){
            message_line.innerHTML ="Please select only one gender radio button";
            return false;
        }
        return true;
    }
   function check_relation(){

        if (!$('#ch1').prop('checked') && !$('#ch2').prop('checked') && !$('#ch3').prop('checked')){
        message_line.innerHTML ="Please select relationship radio button";
        return false;
        }
        else if(($('#ch1').prop('checked') && $('#ch2').prop('checked'))|| ($('#ch2').prop('checked') && $('#ch3').prop('checked'))
                || ($('#ch1').prop('checked') && $('#ch3').prop('checked'))){ 

            message_line.innerHTML ="Please select only one relationship radio button";
            return false;
        }
    
        return true;
    }

    function check_program_selected(){

        if (!$('#ch_basket').prop('checked') && !$('#ch_base').prop('checked') && !$('#ch_physical').prop('checked')
                && !$('#ch_band').prop('checked') && !$('#ch_swimming').prop('checked') && !$('#ch_nature').prop('checked')){

                message_line.innerHTML ="Please select at least one program selected checkbox";
                return false;

        }

        return true;
    }


  
  
	
	function check_email() {
    if(field_array[e.EMAIL].value.indexOf(".") == -1 || field_array[e.EMAIL].value.indexOf("@") == -1) {
        error_state = true;
        message_line.innerHTML = "The email address appears to be invalid";        
        field_array[e.EMAIL].style.border = "1px solid red";
        field_array[e.EMAIL].focus();
        return false;
        }
    return true;
    }
    

function check_zip() { 
    var bogus = false;
    if(field_array[e.ZIP].value.length != 5) { bogus = true; }
    if(isNaN(field_array[e.ZIP].value)) { bogus = true; }
    if(bogus) {
        error_state = true;
        message_line.innerHTML = "The zip code appears to be invalid";        
        field_array[e.ZIP].style.border = "1px solid red";
        field_array[e.ZIP].focus();
        field_array[e.ZIP].select(); // highlight the whole field
        return false;
        }
    return true;
    }

//Cell phone checking
function check_cellphone() {        
    var bogus = false;
    var which = 0;
    if(isNaN(field_array[e.CELL_PHONE].value)) { bogus = true; which = 3; }  
    if(isNaN(field_array[e.CELL_PREFIX].value)) { bogus = true; which = 2; }      
    if(isNaN(field_array[e.CELL_AREACODE].value)) { bogus = true; which = 1; }
    if(bogus) {    
        error_state = true;         
        if(which == 1) {       
            field_array[e.CELL_AREACODE].style.border = "1px solid red";
            message_line.innerHTML = "The area code appears to have invalid digits";
            field_array[e.CELL_AREACODE].focus();
            field_array[e.CELL_AREACODE].select();            
            }
        if(which == 2) {       
            field_array[e.CELL_PREFIX].style.border = "1px solid red";
            message_line.innerHTML = "The phone prefix appears to have invalid digits";
            field_array[e.CELL_PREFIX].focus();
            field_array[e.CELL_PREFIX].select();            
            }
        if(which == 3) {       
            field_array[e.CELL_PHONE].style.border = "1px solid red";
            message_line.innerHTML = "The phone number appears to have invalid digits";
            field_array[e.CELL_PHONE].focus();
            field_array[e.CELL_PHONE].select();            
            }                        
        return false;
        } 
    if(field_array[e.CELL_PHONE].value.length != 4) { bogus = true; which=3; } 
    if(field_array[e.CELL_PREFIX].value.length != 3) { bogus = true; which=2; }                      
    if(field_array[e.CELL_AREACODE].value.length != 3) { bogus = true; which=1; }
    if(bogus) { 
        error_state = true;         
        if(which == 1) {       
            field_array[e.CELL_AREACODE].style.border = "1px solid red";
            message_line.innerHTML = "The area code must have three digits";
            field_array[e.CELL_AREACODE].focus();
            }
        if(which == 2) {       
            field_array[e.CELL_PREFIX].style.border = "1px solid red";
            message_line.innerHTML = "The phone prefix must have three digits";
            field_array[e.CELL_PREFIX].focus();
            }
        if(which == 3) {       
            field_array[e.CELL_PHONE].style.border = "1px solid red";
            message_line.innerHTML = "The phone number must have four digits";
            field_array[e.CELL_PHONE].focus();
            }                        
        return false;
        }
    return true;
    }

function check_phone() {        
    var bogus = false;
    var which = 0;
    if(isNaN(field_array[e.EMERCENCY_PHONE].value)) { bogus = true; which = 3; }  
    if(isNaN(field_array[e.EMERCENCY_PHONE_PREFIX].value)) { bogus = true; which = 2; }      
    if(isNaN(field_array[e.EMERCENCY_PHONE_AREACODE].value)) { bogus = true; which = 1; }
    if(bogus) {    
        error_state = true;         
        if(which == 1) {       
            field_array[e.EMERCENCY_PHONE_AREACODE].style.border = "1px solid red";
            message_line.innerHTML = "The area code appears to have invalid digits";
            field_array[e.EMERCENCY_PHONE_AREACODE].focus();
            field_array[e.EMERCENCY_PHONE_AREACODE].select();            
            }
        if(which == 2) {       
            field_array[e.EMERCENCY_PHONE_PREFIX].style.border = "1px solid red";
            message_line.innerHTML = "The phone prefix appears to have invalid digits";
            field_array[e.EMERCENCY_PHONE_PREFIX].focus();
            field_array[e.EMERCENCY_PHONE_PREFIX].select();            
            }
        if(which == 3) {       
            field_array[e.EMERCENCY_PHONE].style.border = "1px solid red";
            message_line.innerHTML = "The phone number appears to have invalid digits";
            field_array[e.EMERCENCY_PHONE].focus();
            field_array[e.EMERCENCY_PHONE].select();            
            }                        
        return false;
        } 
    if(field_array[e.EMERCENCY_PHONE].value.length != 4) { bogus = true; which=3; } 
    if(field_array[e.EMERCENCY_PHONE_PREFIX].value.length != 3) { bogus = true; which=2; }                      
    if(field_array[e.EMERCENCY_PHONE_AREACODE].value.length != 3) { bogus = true; which=1; }
    if(bogus) { 
        error_state = true;         
        if(which == 1) {       
            field_array[e.EMERCENCY_PHONE_AREACODE].style.border = "1px solid red";
            message_line.innerHTML = "The area code must have three digits";
            field_array[e.EMERCENCY_PHONE_AREACODE].focus();
            }
        if(which == 2) {       
            field_array[e.EMERCENCY_PHONE_PREFIX].style.border = "1px solid red";
            message_line.innerHTML = "The phone prefix must have three digits";
            field_array[e.EMERCENCY_PHONE_PREFIX].focus();
            }
        if(which == 3) {       
            field_array[e.EMERCENCY_PHONE].style.border = "1px solid red";
            message_line.innerHTML = "The phone number must have four digits";
            field_array[e.EMERCENCY_PHONE].focus();
            }                        
        return false;
        }
    return true;
    } 
    function home_phone(){

        if (trim(field_array[e.HOME_AREACODE].value) == "" && trim(field_array[e.HOME_PREFIX].value) == "" &&
            trim(field_array[e.HOME_PHONE].value) == "" )
                return true;
        else{
            var bogus = false;
            var which = 0;
            if(isNaN(field_array[e.HOME_AREACODE].value)) { bogus = true; which = 3; }  
            if(isNaN(field_array[e.HOME_PREFIX].value)) { bogus = true; which = 2; }      
            if(isNaN(field_array[e.HOME_PHONE].value)) { bogus = true; which = 1; }
            if(bogus) {    
                error_state = true;         
                if(which == 1) {       
                    field_array[e.HOME_AREACODE].style.border = "1px solid red";
                    message_line.innerHTML = "The area code appears to have invalid digits";
                    field_array[e.HOME_AREACODE].focus();
                    field_array[e.HOME_AREACODE].select();            
                    }
                if(which == 2) {       
                    field_array[e.HOME_PREFIX].style.border = "1px solid red";
                    message_line.innerHTML = "The phone prefix appears to have invalid digits";
                    field_array[e.HOME_PREFIX].focus();
                    field_array[e.HOME_PREFIX].select();            
                    }
                if(which == 3) {       
                    field_array[e.HOME_PHONE].style.border = "1px solid red";
                    message_line.innerHTML = "The phone number appears to have invalid digits";
                    field_array[e.HOME_PHONE].focus();
                    field_array[e.HOME_PHONE].select();            
                    }                        
                return false;
             } 
            if(field_array[e.HOME_PHONE].value.length != 4) { bogus = true; which=3; } 
            if(field_array[e.HOME_PREFIX].value.length != 3) { bogus = true; which=2; }                      
            if(field_array[e.HOME_AREACODE].value.length != 3) { bogus = true; which=1; }
            if(bogus) { 
                error_state = true;         
                if(which == 1) {       
                    field_array[e.HOME_AREACODE].style.border = "1px solid red";
                    message_line.innerHTML = "The area code must have three digits";
                    field_array[e.HOME_AREACODE].focus();
                    }
                if(which == 2) {       
                    field_array[e.HOME_PREFIX].style.border = "1px solid red";
                    message_line.innerHTML = "The phone prefix must have three digits";
                    field_array[e.HOME_PREFIX].focus();
                    }
                if(which == 3) {       
                    field_array[e.HOME_PHONE].style.border = "1px solid red";
                    message_line.innerHTML = "The phone number must have four digits";
                    field_array[e.HOME_PHONE].focus();
                    }                        
                return false;
            }
        return true;
        }

    }
    

function check_email() {
    if(field_array[e.EMAIL].value.indexOf(".") == -1 || field_array[e.EMAIL].value.indexOf("@") == -1) {
        error_state = true;
        message_line.innerHTML = "The email address appears to be invalid";        
        field_array[e.EMAIL].style.border = "1px solid red";
        field_array[e.EMAIL].focus();
        return false;
        }
    return true;
    }          
function validate_dob(){
    
    var validformat=/^\d{2}\/\d{2}\/\d{4}$/ //Basic check for format validity
    var returnval=false
    if (!validformat.test(field_array[e.DATE_OF_BIRTH].value)){
        error_state =true;
        message_line.innerHTML = "Invalid Date Format(mm/dd/yyyy). Please correct and submit again.";
        field_array[e.DATE_OF_BIRTH].style.border ="1px solid red";
        field_array[e.DATE_OF_BIRTH].focus();
        return false;
    }
    
    else{ 

   
    var monthfield=field_array[e.DATE_OF_BIRTH].value.split("/")[0]
    var dayfield=field_array[e.DATE_OF_BIRTH].value.split("/")[1]
    var yearfield=field_array[e.DATE_OF_BIRTH].value.split("/")[2]
    var dayobj = new Date(yearfield, monthfield-1, dayfield)


    
    }
    if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)){
        error_state= true;
        message_line.innerHTML = "Invalid Day, Month, or Year range detected. Please correct and submit again.";
        field_array[e.DATE_OF_BIRTH].style.border ="1px solid red";
        field_array[e.DATE_OF_BIRTH].focus();
        return false;

    }    
    else
        age = get_age(dayobj);
        if(age)
        returnval=true;
    
    
    if (returnval==false){
        error_state= true;
        message_line.innerHTML = "Based on your date of birth, you are not eligible for summer camp.";
        field_array[e.DATE_OF_BIRTH].style.border ="1px solid red";
        field_array[e.DATE_OF_BIRTH].focus();
        
    }
    return returnval;
    
}
function get_age(born){
    
    var cutoff_date = new Date(2016,5,1);
    
    if((cutoff_date.getFullYear() - born.getFullYear()) > 7 && (cutoff_date.getFullYear() - born.getFullYear()) < 16){
         return true;    
    }
    else if((cutoff_date.getFullYear() - born.getFullYear()) == 7 ){
        if(cutoff_date.getMonth() == born.getMonth()){
            return (cutoff_date.getDate() == born.getDate());
        }
        return (cutoff_date.getMonth() > born.getMonth()); 
    }
    else if((cutoff_date.getFullYear() - born.getFullYear()) == 16 ){
        if (cutoff_date.getMonth() == born.getMonth()){
            return (cutoff_date.getDate() <= born.getDate());
        }
        return (cutoff_date.getMonth() < born.getMonth()); 
    }

    else 
        return false;
}
  //function validate_pic

$(document).ready(function() {

    init_vars();
    $('#ck_button').on('click',function() {
      var isCorrect = validate_form();
     
       if (isCorrect){
       var data = $('#signUpForm').serialize();
       $.post("check_dup.php", data, handleData);
         }
		 else{return false;}
       
        });
    });
	
 function handleData(response){
		
  if(response.startsWith("DUP")) 
	
        $('#status').text("This record appears to be a duplicate.");
    else if(response.startsWith("OK")) {
        $('#status').text("This record is OK, not a duplicate."); 
       $('#signUpForm').serialize();
       $('#signUpForm').submit();
//         var confirm = response.split("||");
//         $('body').html(confirm[1]);                
        }

    } 
   
