<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--    Mounika Eluri    
		Account: jadrn062
        CS545, Fall 2015
        Project #3
-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
    <title>Enrolment form</title>
<link rel="stylesheet" type="text/css" href="proj3.css" />
 <script type="text/javascript" src="http://jadran.sdsu.edu/jquery/jquery.js"></script>
    <script type="text/javascript"src="proj3.js"></script>   

</head>
<body>
<?php
	$UPLOAD_DIR = 'pic';
    $COMPUTER_DIR = '/home/jadrn062/public_html/proj3/pic/';
	
	$prog = $_POST['program'];
	$prog_name = "";
	for($i=0; $i<count($prog); $i++){
		if($prog[$i] == "1")
			$prog_name = $prog_name."Basketball Camp"."<br>";
		elseif($prog[$i] == "2")
			$prog_name = $prog_name."Baseball Camp"."<br>";
		elseif($prog[$i] == "3")
			$prog_name = $prog_name."Physical Training"."<br>";
		elseif($prog[$i] == "4")
			$prog_name = $prog_name."Band Camp"."<br>";
		elseif($prog[$i] == "5")
			$prog_name = $prog_name."Swimming"."<br>";
		elseif($prog[$i] == "6")
			$prog_name = $prog_name."Nature Discovery"."<br>";
	}
echo <<<ENDBLOCK
<div class="center"><h1>$params[13], thank you for registering $params[0].</h1>
</div>
<table id="conf">
		<tr>
   <th>Information of Child&parent</th>
   <th>Values</th>
    </tr>
		<tr>
            <td>First Name</td>
            <td>$params[0]</td>
        </tr>
        <tr>
            <td>Middle Name</td>
            <td>$params[1]</td>
        </tr>
		<tr>
            <td>Last Name</td>
            <td>$params[2]</td>
        </tr>
        <tr>
            <td>Nick Name</td>
            <td>$params[3]</td>
        </tr>
        <tr>
            <td>gender</td>
            <td>$params[5]</td>
        </tr>
		<tr>
            <td>Date of Birth</td>
            <td>$params[6]</td>
        </tr> 
		 
		<tr>
            <td>Parent First Name</td>
            <td>$params[13]</td>
        </tr>
		<tr>
            <td>Parent Middle Name</td>
            <td>$params[14]</td>
        </tr>
		<tr>
            <td>Parent Last Name</td>
            <td>$params[15]</td>
        </tr> 
		<tr>
            <td>Relation to child</td>
            <td>$params[16]</td>
        </tr>
		<tr>
            <td>Address Line1</td>
            <td>$params[17]</td>
        </tr> 
		<tr>
            <td>Address Line2</td>
            <td>$params[18]</td>
        </tr> 
		<tr>
            <td>City</td>
            <td>$params[19]</td>
        </tr> 
		<tr>
            <td>State</td>
            <td>$params[20]</td>
        </tr>
		<tr>
            <td>Zip</td>
            <td>$params[21]</td>
        </tr>
		<tr>
            <td>Home phone Number</td>
            <td>$params[22].$params[23].$params[24]</td>
        </tr> 
		<tr>
            <td>Cell phone Number</td>
            <td>$params[25].$params[26].$params[27]</td>
        </tr> 
		<tr>
            <td>Email</td>
            <td>$params[28]</td>
        </tr>
ENDBLOCK;
		$d = dir($COMPUTER_DIR.'/');
			while($fname = $d->read()) {
				$data[$fname] = $fname;
			}
			foreach($data as $fname => $fvalue) {
				if($fname == "." || $fname == "..") {
					;
				}
				else if($fname == "$params[4]"){
					echo <<<ENDBLOCK
					<tr>
						<td id="confirm">Photo</td>
						<td id="confirm"><img src="$UPLOAD_DIR/$fname" width='200px' /></td>
					</tr>
ENDBLOCK;
				}
			}
echo <<<ENDBLOCK
			
			<tr>
				<td>Program</td>
				<td>$prog_name</td>
			</tr>
			<tr>
				<td >Medical Issues</td>
				<td >$params[7]</td>
			</tr>
			
			<tr>
				<td >Special Diet</td>
				<td>$params[8]</td>
			</tr>
			
			<tr>
				<td >Emergency contact</td>
                <td >$params[9]</td>
			</tr>
			
			<tr>
				<td >Emergency Phone</td>
				<td >$params[10]$params[11]$params[12]</td>
			</tr>
    </table>      	
ENDBLOCK;

?>
</body></html>