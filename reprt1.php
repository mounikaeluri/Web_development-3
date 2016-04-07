<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Summer Camp report</title>

    <meta http-equiv="content-type" 
        content="text/html;charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="report.css" />
</head>

<body>
    <div id="container">
<h1>Report of Summer camp registrations</h2>
<div id="banner">
<h2>Basketball Camp</h2>
<?php
$UPLOAD_DIR = 'pic';
$COMPUTER_DIR = '/home/jadrn062/public_html/proj3/pic/';
function get_db_handle() {
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn062';
    $password = 'sloop';
    $database = 'jadrn062';
    
    if(!($db = mysqli_connect($server, $user, $password, $database))) {
        write_error_page("Cannot Connect!");
        }
    return $db;
    }
    
    $db = get_db_handle(); 
    
    $sql = "SELECT DISTINCT c.first_name as child_first_name, c.last_name as child_last_name, c.nickname,  TIMESTAMPDIFF(YEAR,c.birthdate,CURDATE()) as age, c.emergency_name, c.emergency_phone,c.image_filename, p.first_name, p.last_name, p.primary_phone FROM child c, parent p, enrollment e where p.id = c.parent_id AND c.id = e.child_id AND e.program_id = 1;";
    $result = mysqli_query($db,$sql) or die('error getting results') ;
    
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        echo'<b><span class="headings">';
        echo $row[child_first_name]." ".$row[child_last_name];
        echo'</span></b>';
        $fname = $row['image_filename'];
        $filename = $UPLOAD_DIR."/".$fname;
        $d = dir($COMPUTER_DIR.'/');
            while($fname = $d->read()) {
                $data[$fname] = $fname;
                }
            if($fname == "." || $fname == "..") {
                  ;
            }
            else {
            #echo "<img src=\"$UPLOAD_DIR/$fname\""." width='200px' />\n";
            echo "<img id = \"art\" src=\"$filename\""." width='200px' />\n";
                        }
        print <<<ENDBLOCK
            
        <table>
        <tr><td>Child First name </td><td>$row[child_first_name]</td></tr>
        <tr><td>Child Last Name </td><td>$row[child_last_name]</td></tr>
        <tr><td>Nickname </td><td>$row[nickname]</td></tr>
        <tr><td>AGE</td><td>$row[age]</td></tr>
        <tr><td>Parent/Guardian First Name </td><td>$row[first_name]</td></tr>
        <tr><td>Parent/Guardian Last Name </td><td>$row[last_name]</td></tr>
        <tr><td>Primary phone </td><td>$row[primary_phone]</td></tr>
        <tr><td>Emergency Contact Name </td><td>$row[emergency_name]</td></tr>
        <tr><td>Emergency Contact Number </td><td>$row[emergency_phone]</td></tr>
        </table>
        <hr>
ENDBLOCK;
        
    }
    echo'<h2>Baseball Camp</h2>';
    $sql = "SELECT DISTINCT c.first_name as child_first_name, c.last_name as child_last_name, c.nickname, TIMESTAMPDIFF(YEAR,c.birthdate,CURDATE()) as age, c.emergency_name, c.emergency_phone,c.image_filename, p.first_name, p.last_name, p.primary_phone FROM child c, parent p, enrollment e where p.id = c.parent_id AND c.id = e.child_id AND e.program_id = 2;";
    $result = mysqli_query($db,$sql) or die('error getting results') ;
    
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        echo'<b><span class="headings">';
        echo $row[child_first_name]." ".$row[child_last_name];
        echo'</span></b>';
        $fname = $row['image_filename'];
        $filename = $UPLOAD_DIR."/".$fname;
        $d = dir($COMPUTER_DIR.'/');
            while($fname = $d->read()) {
                $data[$fname] = $fname;
                }
            if($fname == "." || $fname == "..") {
                  ;
            }
            else {
            #echo "<img src=\"$UPLOAD_DIR/$fname\""." width='200px' />\n";
            echo "<img id = \"art\" src=\"$filename\""." width='200px' />\n";
                        }
        print <<<ENDBLOCK
        <table>
        <tr><td>Child First name </td><td>$row[child_first_name]</td></tr>
        <tr><td>Child Last Name </td><td>$row[child_last_name]</td></tr>
        <tr><td>Nickname </td><td>$row[nickname]</td></tr>
        <tr><td>AGE</td><td>$row[age]</td></tr>
        <tr><td>Parent/Guardian First Name </td><td>$row[first_name]</td></tr>
        <tr><td>Parent/Guardian Last Name </td><td>$row[last_name]</td></tr>
        <tr><td>Primary phone </td><td>$row[primary_phone]</td></tr>
        <tr><td>Emergency Contact Name </td><td>$row[emergency_name]</td></tr>
        <tr><td>Emergency Contact Number </td><td>$row[emergency_phone]</td></tr>
        </table>
        <hr>
ENDBLOCK;
        
    }        
    echo'<h2>Physical Training</h2>';
    $sql = "SELECT DISTINCT c.first_name as child_first_name, c.last_name as child_last_name, c.nickname,TIMESTAMPDIFF(YEAR,c.birthdate,CURDATE()) as age, c.emergency_name, c.emergency_phone,c.image_filename, p.first_name, p.last_name, p.primary_phone FROM child c, parent p, enrollment e where p.id = c.parent_id AND c.id = e.child_id AND e.program_id = 3;";
    $result = mysqli_query($db,$sql) or die('error getting results') ;
    
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        echo'<b><span class="headings">';
        echo $row[child_first_name]." ".$row[child_last_name];
        echo'</span></b>';
        $fname = $row['image_filename'];
        $filename = $UPLOAD_DIR."/".$fname;
        $d = dir($COMPUTER_DIR.'/');
            while($fname = $d->read()) {
                $data[$fname] = $fname;
                }
            if($fname == "." || $fname == "..") {
                  ;
            }
            else {
            #echo "<img src=\"$UPLOAD_DIR/$fname\""." width='200px' />\n";
            echo "<img id = \"art\" src=\"$filename\""." width='200px' />\n";
                        }
        print <<<ENDBLOCK
        <table>
        <tr><td>Child First name </td><td>$row[child_first_name]</td></tr>
        <tr><td>Child Last Name </td><td>$row[child_last_name]</td></tr>
        <tr><td>Nickname </td><td>$row[nickname]</td></tr>
        <tr><td>AGE</td><td>$row[age]</td></tr>
        <tr><td>Parent/Guardian First Name </td><td>$row[first_name]</td></tr>
        <tr><td>Parent/Guardian Last Name </td><td>$row[last_name]</td></tr>
        <tr><td>Primary phone </td><td>$row[primary_phone]</td></tr>
        <tr><td>Emergency Contact Name </td><td>$row[emergency_name]</td></tr>
        <tr><td>Emergency Contact Number </td><td>$row[emergency_phone]</td></tr>
        </table>
        <hr>
ENDBLOCK;
        
    }    
    echo'<h2>Band Camp</h2>';
    $sql = "SELECT DISTINCT c.first_name as child_first_name, c.last_name as child_last_name, c.nickname, TIMESTAMPDIFF(YEAR,c.birthdate,CURDATE()) as age, c.emergency_name, c.emergency_phone,c.image_filename, p.first_name, p.last_name, p.primary_phone FROM child c, parent p, enrollment e where p.id = c.parent_id AND c.id = e.child_id AND e.program_id = 4;";
    $result = mysqli_query($db,$sql) or die('error getting results') ;
    
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        echo'<b><span class="headings">';
        echo $row[child_first_name]." ".$row[child_last_name];
        echo'</span></b>';
        $fname = $row['image_filename'];
        $filename = $UPLOAD_DIR."/".$fname;
        $d = dir($COMPUTER_DIR.'/');
            while($fname = $d->read()) {
                $data[$fname] = $fname;
                }
            if($fname == "." || $fname == "..") {
                  ;
            }
            else {
            #echo "<img src=\"$UPLOAD_DIR/$fname\""." width='200px' />\n";
            echo "<img id = \"art\" src=\"$filename\""." width='200px' />\n";
                        }
        print <<<ENDBLOCK
        <table>
        <tr><td>Child First name </td><td>$row[child_first_name]</td></tr>
        <tr><td>Child Last Name </td><td>$row[child_last_name]</td></tr>
        <tr><td>Nickname </td><td>$row[nickname]</td></tr>
        <tr><td>AGE</td><td>$row[age]</td></tr>
        <tr><td>Parent/Guardian First Name </td><td>$row[first_name]</td></tr>
        <tr><td>Parent/Guardian Last Name </td><td>$row[last_name]</td></tr>
        <tr><td>Primary phone </td><td>$row[primary_phone]</td></tr>
        <tr><td>Emergency Contact Name </td><td>$row[emergency_name]</td></tr>
        <tr><td>Emergency Contact Number </td><td>$row[emergency_phone]</td></tr>
        </table>
        <hr>
ENDBLOCK;
        
    }    
    echo'<h2>Swimming</h2>';
    $sql = "SELECT DISTINCT c.first_name as child_first_name, c.last_name as child_last_name, c.nickname,TIMESTAMPDIFF(YEAR,c.birthdate,CURDATE()) as age, c.emergency_name, c.emergency_phone,c.image_filename, p.first_name, p.last_name, p.primary_phone FROM child c, parent p, enrollment e where p.id = c.parent_id AND c.id = e.child_id AND e.program_id = 5;";
    $result = mysqli_query($db,$sql) or die('error getting results') ;
    
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        echo'<b><span class="headings">';
        echo $row[child_first_name]." ".$row[child_last_name];
        echo'</span></b>';
        $fname = $row['image_filename'];
        $filename = $UPLOAD_DIR."/".$fname;
        $d = dir($COMPUTER_DIR.'/');
            while($fname = $d->read()) {
                $data[$fname] = $fname;
                }
            if($fname == "." || $fname == "..") {
                  ;
            }
            else {
            #echo "<img src=\"$UPLOAD_DIR/$fname\""." width='200px' />\n";
            echo "<img id = \"art\" src=\"$filename\""." width='200px' />\n";
                        }
        print <<<ENDBLOCK
        <table>
        <tr><td>Child First name </td><td>$row[child_first_name]</td></tr>
        <tr><td>Child Last Name </td><td>$row[child_last_name]</td></tr>
        <tr><td>Nickname </td><td>$row[nickname]</td></tr>
        <tr><td>AGE</td><td>$row[age]</td></tr>
        <tr><td>Parent/Guardian First Name </td><td>$row[first_name]</td></tr>
        <tr><td>Parent/Guardian Last Name </td><td>$row[last_name]</td></tr>
        <tr><td>Primary phone </td><td>$row[primary_phone]</td></tr>
        <tr><td>Emergency Contact Name </td><td>$row[emergency_name]</td></tr>
        <tr><td>Emergency Contact Number </td><td>$row[emergency_phone]</td></tr>
        </table>
        <hr>
ENDBLOCK;
        
    }
    echo'<h2>Nature Discovery</h2>';
    $sql = "SELECT DISTINCT c.first_name as child_first_name, c.last_name as child_last_name, c.nickname, TIMESTAMPDIFF(YEAR,c.birthdate,CURDATE()) as age, c.emergency_name, c.emergency_phone,c.image_filename, p.first_name, p.last_name, p.primary_phone FROM child c, parent p, enrollment e where p.id = c.parent_id AND c.id = e.child_id AND e.program_id = 6;";
    $result = mysqli_query($db,$sql) or die('error getting results') ;
    
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        echo'<b><span class="headings">';
        echo $row[child_first_name]." ".$row[child_last_name];
        echo'</span></b>';
        $fname = $row['image_filename'];
        $filename = $UPLOAD_DIR."/".$fname;
        $d = dir($COMPUTER_DIR.'/');
            while($fname = $d->read()) {
                $data[$fname] = $fname;
                }
            if($fname == "." || $fname == "..") {
                  ;
            }
            else {
            #echo "<img src=\"$UPLOAD_DIR/$fname\""." width='200px' />\n";
            echo "<img id = \"art\" src=\"$filename\""." width='200px' />\n";
                        }
        print <<<ENDBLOCK
        <table>
        <tr><td>Child First name </td><td>$row[child_first_name]</td></tr>
        <tr><td>Child Last Name </td><td>$row[child_last_name]</td></tr>
        <tr><td>Nickname </td><td>$row[nickname]</td></tr>
        <tr><td>AGE</td><td>$row[age]</td></tr>
        <tr><td>Parent/Guardian First Name </td><td>$row[first_name]</td></tr>
        <tr><td>Parent/Guardian Last Name </td><td>$row[last_name]</td></tr>
        <tr><td>Primary phone </td><td>$row[primary_phone]</td></tr>
        <tr><td>Emergency Contact Name </td><td>$row[emergency_name]</td></tr>
        <tr><td>Emergency Contact Number </td><td>$row[emergency_phone]</td></tr>
        </table>
        <hr>
ENDBLOCK;
        
    }                        
?>  
</div> 
</div>
    

        

</body>
</html>    