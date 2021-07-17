<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'off');

function connect()
{
		$host = "localhost";//"5.100.152.14:3306";;
		$app_db = "asupyaba_m@p@ly";//"mapolymd";//"newasup";//"kboytamw_asup";////"tcbceagl_eaglesdb";"eagles_webdb";//"aorxrebw_eagle";//////;"aorxrebw_eagle"//"candsvpi_db";
		$user = "asupyaba_mapolyu";//"root";//"root";//"kboytamw_asupuser";////"tcbceagl_entrans";"eagles_webuser";//"aorxrebw_eagle";//////"aorxrebw_eagle"//"root""candsvpi";
		$pwd = "m@p@lydb";////"""";//"asup#01user";////"eagles#01youth";"?qO(fukv1l,w";//"eagle#01";//"eagle#01";//////"""candsvpi#01admin";;
	
	 	$appConnect = mysql_connect($host,$user,$pwd) or die("Database Connection not established!");
	 	mysql_select_db($app_db,$appConnect) or die("No Database Selected");		
}
	


function getUpdateDetail($value, $table, $unique)
{
	$q = "select * from `$table` where `$unique`='$value'";
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_array($r);
	return $row;	
}


function getMemberDetail($unique)
{
	$q = "select * from `register` where `registerID`='$unique'";
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_array($r);
	return $row;	
}

function getStaff()
{
	$q = "select * from `staff` order by `sname` ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1]." ".$row[2]." ".$row[3].'</option>';
		
	}
	return $opt;	
	
}

function getStaffDetail($unique)
{
	$q = "select * from `staff` where `staffID`='$unique'";
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_array($r);
	return $row;	
}

function getStudentDetail($unique)
{
	$q = "select * from `studentrecord` where `studentrecordID`='$unique'";
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_array($r);
	return $row;	
}


function getAlumniDetail($unique)
{
	$q = "select * from `alumnirecord` where `alumnirecordID`='$unique'";
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_array($r);
	return $row;	
}

function getMemberDetailByRef($unique)
{
	$q = "select * from `register` where ref='$unique'";
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_array($r);
	return $row;	
}


function getcolointerchange($i)
{
	return $i % 2 ? "#FFE6FF":"#ffffff";	
}

function getcolointerchange2($i)
{
	return $i % 2 ? "even":"";	
}


function getClass()
{
	$q = "select * from class order by class ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		if($row[2]=="Null" or $row[2]=="null"){$row[2]="";}
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].$row[2].'</option>';
		
	}
	return $opt;	
	
}


function getClassDetail($id)
{
	$q = "select * from class where classID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	if($row[2]=="Null" or $row[2]=="null"){$row[2]="";}
	$opt = $row[1].$row[2];	
	return $opt;	
}


function getSubject()
{
	$q = "select * from subject order by subjectname ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}


function getSubjectDetail($id)
{
	$q = "select * from subject where subjectID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);	
	$opt = $row[1];
	return $opt;	
}



function getSession()
{
	$q = "select * from session order by sessionID DESC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}

function getSessionDetail($id)
{
	$q = "select * from session where sessionID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	$opt = $row[1];
	return $opt;		
}



function getTeacher()
{
	$q = "select * from teacher order by name ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}


function getTeacherDetail($id)
{
	$q = "select * from teacher where teacherID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}

function getCourseDetail($id)
{
	$q = "select * from courselist where courselistID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}


function getStudent()
{
	$q = "select * from studentrecord order by lname ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[3]." ".$row[1]." ".$row[2].'</option>';
		
	}
	return $opt;	
	
}



function getDesignation()
{
	$q = "select * from designation order by designation ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}


function getDesignationDetail($id)
{
	$q = "select * from designation where designationID='$id'";
	$qr = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_array($qr);
	return $row;	
	
}


function loginAdmin($username, $password)
{
	if($username == "" or $password == "")
	{
		return false;
	}
	
	$qry1 = "select * from admin where username='$username' and password='".md5($password)."' and statusID=0";
	$qry2 = "select * from teacher where username='$username' and password='$password' and statusID=0";
	
	$r1 = mysql_query($qry1) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{
		$row = mysql_fetch_assoc($r1);
		$_SESSION['admin_name'] = $row['name'];
		$_SESSION['adminID'] = $row['adminID'];
		$_SESSION['adminRole'] = $row['role'];
		$_SESSION['username'] = $row['username'];
		//$_SESSION['cursession'] = getCurrentSession();					
		return true;
		
	}
	else
	{

			return false;

	}

	
}



function loginStaff($username, $password)
{
	if($username == "" or $password == "")
	{
		return false;
	}
	
	$qry1 = "select * from staff where mail='$username' and password='".md5($password)."' and status=1";
	$qry2 = "select * from teacher where username='$username' and password='$password' and statusID=0";
	
	$r1 = mysql_query($qry1) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{
		$row = mysql_fetch_assoc($r1);
		$_SESSION['staff_user_name'] = $row['sname']." ".$row['oname'];
		$_SESSION['staff_userID'] = $row['staffID'];
		$_SESSION['staff_phone_number'] = $row['pnumber'];
		$_SESSION['staff_pic'] = $row['pix'];
		$_SESSION['staff_cv'] = $row['resume'];
		$_SESSION['staff_username'] = $row['mail'];
		//$_SESSION['quiz_status'] = getQuizStatus();
		$_SESSION['logged_in'] = true;
		$_SESSION['staff_status'] = $row['status'];
		//$_SESSION['success'] = 'You are welcome. You logged in as <strong>'.$_SESSION['user_name'].'</strong>';
		//$_SESSION['cursession'] = getCurrentSession();					
		return true;
		
	}
	else
	{

			return false;

	}

	
}


function loginStudent($username, $password)
{
	if($username == "" or $password == "")
	{
		return false;
	}
	
	$qry1 = "select * from studentrecord where matric='$username' and password='".md5($password)."'";
	$qry2 = "select * from teacher where username='$username' and password='$password' and statusID=0";
	
	$r1 = mysql_query($qry1) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{
		$row = mysql_fetch_assoc($r1);
		$_SESSION['student_user_name'] = $row['sname']." ".$row['oname'];
		$_SESSION['student_userID'] = $row['studentrecordID'];
		$_SESSION['student_phone_number'] = $row['pnumber'];
		$_SESSION['student_pic'] = $row['pix'];
		$_SESSION['student_username'] = $row['matric'];
		$_SESSION['student_payment_status'] = $row['pstatus'];
		$_SESSION['logged_in'] = true;
		$_SESSION['student_status'] = $row['status'];
		$_SESSION['student_prgm'] = $row['programmeID'];
		$_SESSION['student_lv'] = $row['levelID'];
		$_SESSION['student_mail'] = $row['email'];					
		return true;
		
	}
	else
	{

			return false;

	}

	
}


function loginAlumni($username, $password)
{
	if($username == "" or $password == "")
	{
		return false;
	}
	
	$qry1 = "select * from alumnirecord where email='$username' and password='".md5($password)."'";
	$qry2 = "select * from teacher where username='$username' and password='$password' and statusID=0";
	
	$r1 = mysql_query($qry1) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{
		$row = mysql_fetch_assoc($r1);
		$_SESSION['alumni_user_name'] = $row['sname']." ".$row['oname'];
		$_SESSION['alumni_userID'] = $row['alumnirecordID'];
		$_SESSION['alumni_phone_number'] = $row['pnumber'];
		$_SESSION['alumni_pic'] = $row['pix'];
		$_SESSION['alumni_cv'] = $row['resume'];
		$_SESSION['alumni_username'] = $row['email'];
		$_SESSION['alumni_payment_status'] = $row['pstatus'];
		$_SESSION['alumni_yr_grad'] = $row['ygrad'];
		$_SESSION['alumni_status'] = $row['status'];
		/*$_SESSION['alumni_prgm'] = $row['programmeID'];
		$_SESSION['student_mail'] = $row['email'];*/					
		return true;
		
	}
	else
	{

			return false;

	}

	
}


function encrypt($string){
	return base64_encode(base64_encode(base64_encode($string."youthforum")));
}

function decrypt($string){
	return base64_decode(base64_decode(base64_decode($string."youthforum")));
}


function loggedin()
{
	if((isset($_SESSION['username']) and $_SESSION['username'] != "") or (isset($_SESSION['staff_username']) and $_SESSION['staff_username'] != "") or (isset($_SESSION['student_username']) and $_SESSION['student_username'] != "") or (isset($_SESSION['alumni_username']) and $_SESSION['alumni_username'] != ""))
	{
		$loggedin = true;
	}
	else
	{
		$loggedin = false;
		
	}
		return $loggedin;	
}


function getUserPicture($unique)
{
	$q = "select * from `pix` where `ovc_usersID`='$unique'";
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_array($r);
	return $row;	
}

function getCurrentSession()
{
	$query = "select * from `session` order by sessionID DESC";
	$qr = mysql_query($query);
	$row = mysql_fetch_array($qr);
	$opt = $row[1];
	return $opt;
}


function getCurrentSessionID()
{
	$query = "select * from `session` order by sessionID DESC";
	$qr = mysql_query($query);
	$row = mysql_fetch_array($qr);
	$opt = $row[0];
	return $opt;
}


function isCurrentSessionActive()
{
	$query = "select * from `session` order by sessionID DESC";
	$qr = mysql_query($query);
	$row = mysql_fetch_array($qr);
	$opt = $row[2];
	
	if($opt == 1)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function checkifRegistered($stID, $sessID, $lID, $smt)
{
	$query = "select * from courseregistration where studentrecordID='".$stID."' and sessionID='".$sessID."' and levelID='".$lID."' and semester='".$smt."'";
	$qr = mysql_query($query);
	
	if(mysql_num_rows($qr) > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}


function CheckIfClassTeacher($id)
{
	$q = "select * from classteacher where teacherID='$id' and sessionID=".getCurrentSessionID();
	$r = mysql_query($q) or die(mysql_error());
	$n = mysql_num_rows($r);
	if($n > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}


function getCharacterlevel()
{
	$q = "select * from characterlevel order by characterlevel ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}



function getCharacter()
{
	$q = "select * from `character` order by `character` ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}


function getCharacterDetail($id)
{
	$q = "select * from `character` where characterID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);	
	$opt = $row[1];
	return $opt;	
}



function getCharacterlevelDetail($id)
{
	$q = "select * from characterlevel where characterlevelID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);	
	$opt = $row[1];
	return $opt;	
}


function compile_surname()
{
$result = mysql_query("SELECT lname,fname FROM  studentrecord");
while ($row = mysql_fetch_assoc($result)) {
   		$surnames[]=strtolower($row['lname'])." ".strtolower($row["fname"]);
}
return $surnames;
}


function getPaymentBreakdown($stdID, $sesID)
{
	$query = "select distinct term from schoolfee where studentID='$stdID' and sessionID='$sesID'";
	$result = mysql_query($query) or die(mysql_error());
	
	if(mysql_num_rows($result) > 0)
	{	
	while($row = mysql_fetch_assoc($result))
	{
		
		$term .= "<a href='paymentboard.php?si=".$stdID."&term=".$row['term']."&ses=".$sesID."' target='detail' >".getTermDetail($row['term'])."</a>";
	}
	}
	else
	{
		$term = "<a href='#'>No Payment Made Yet!</a>";
	}
	
	return $term;	
}


function getTermDetail($term)
{
	
	switch($term)
	{
		case 1:
			return "1ST Term";
		break;
		
		case 2:
			return "2ND Term";
		break;
		
		case 3:
			return "3RD Term";
		break;		
	}
}


function verifyFeeCategory($cat, $class, $ses, $term)
{
	$q = "select * from feecategory where category='$cat', classID='$class' and sessionID='$ses' and term='$term'";	
	$r = mysql_query($q) or die(mysql_error());
	$n = mysql_num_rows($r);
	
	if($n > 0)
	{
		return true;	
	}
	else
	{
		return false;
	}
	
}


function getAmount($id)
{
	$q = "select * from feecategory where feecategoryID='$id'";
	$r = mysql_query($q) or die($q);
	$row = mysql_fetch_assoc($r);
	return $row["amount"];	
	
}


function getcompulsoryStatus($id)
{
	$q = "select * from feecategory where feecategoryID='$id'";
	$r = mysql_query($q) or die($q);
	$row = mysql_fetch_assoc($r);
	$state = $row["compulsory"];	
	
	if($state ==0)
	{
		return "";
	}
	else
	{
		return '<span style="color:#ff0000; font-weight:bold">*</span>';
	}
}


function getPaymentCategoryStatus($si, $ses, $cl, $t, $pc, $n)
{
	
	$q1 = "select * from schoolfee where studentID='$si' and sessionID='$ses' and classID='$cl' and term='$t' and feecategoryID='$pc'";
	$r = mysql_query($q1) or die(mysql_error());
	$num = mysql_num_rows($r);
	$row = mysql_fetch_assoc($r);
	$row1 = getPaymentCategoryDetail($pc);
	
	if($num > 0)
	{		
		$category = "<td style='border-bottom:#d8d8d8 solid 1px;  border-right:#ffa6ff solid 1px;'>&nbsp;</td><td style=\"border-bottom:#d8d8d8 solid 1px;  border-right:#ffa6ff solid 1px;\">".$row1["category"].getcompulsoryStatus($pc)."</td><td style=\"border-bottom:#d8d8d8 solid 1px;  border-right:#ffa6ff solid 1px;\">".$row1['amount']."</td>";
	}
	else
	{
		
		$category = "<td style='border-bottom:#d8d8d8 solid 1px;  border-right:#ffa6ff solid 1px;'><input type='checkbox' name='paystatus[]' id='paystatus$n' value='".getAmount($pc)."' onclick=\"latestTotalUpdate('paystatus$n')\"/> </td><td style=\"border-bottom:#d8d8d8 solid 1px;  border-right:#ffa6ff solid 1px;\">".$row1["category"].getcompulsoryStatus($pc)."</td><td style=\"border-bottom:#d8d8d8 solid 1px;  border-right:#ffa6ff solid 1px;\">".$row1['amount']."</td>";		
	}
	
	return $category;
}


function getPaymentCategoryDetail($id)
{
$q = "select * from feecategory where feecategoryID='$id'";
$r = mysql_query($q) or die(mysql_error());
$row = mysql_fetch_array($r);
return $row;
}

function encryptParameter($parameter)
{
	$parameter = "adiosgloballink ".$parameter;
	$parameter = base64_encode(base64_encode($parameter));
	return $parameter;
	
}


function decryptParameter($parameter)
{
	$parameter = base64_decode(base64_decode($parameter));
	$parameter = explode(" ", $parameter);
	//$parameter = "adiosgloballink ".$parameter;
	return $parameter[1];
	
}

function getLink()
{
	$q = "select * from `adio_page` order by adio_page ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}


function getProgramme()
{
	$q = "select * from `programme` order by programmename ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}


function getProgrammemode()
{
	$q = "select * from `programmemode` order by programmemodeID ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}

function getLevel()
{
	$q = "select * from `level` order by levelID ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[2].'</option>';
		
	}
	return $opt;	
	
}


function getLevelforRegistration()
{
	$q = "select * from `level` where programmeID='".$_SESSION['student_prgm']."' order by levelID ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[2].'</option>';
		
	}
	return $opt;	
	
}

function getEvent()
{
	$q = "select * from `event` order by eventname ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}

function getQuizCategory()
{
	$q = "select * from `categories` order by category_name ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}


function getMonth()
{
	
	$row = 1;
	while($row <= 12)
	{
		$opt .=  '<option value=\''.$row.'\'>'.format_month($row).'</option>';
		++$row;
		
	}
	return $opt;	
	
}


function getYear($lower, $upper)
{
	
	$row = $lower;
	while($row <= $upper)
	{
		$opt .=  '<option value=\''.$row.'\'>'.$row.'</option>';
		++$row;
		
	}
	return $opt;	
	
}

function getEventRegister()
{
	$q = "select * from `event` where eventstatus =1 order by eventname ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}


function getEventYear()
{
	$q = "select distinct year from `camp` order by year ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row['year'].'\'>'.$row['year'].'</option>';
		
	}
	return $opt;	
	
}

function getEventGalleryList()
{
	$q = "select distinct eventID from `gallery` order by gallery.eventID ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$ed = getEventDetail($row['eventID']);
		$opt .=  '<option value=\''.encryptParameter($row['eventID']).'\'>'.$ed['eventname'].'</option>';
		
	}
	return $opt;	
	
}

function getEventDay($id)
{
	$q = "select * from `eventdays` where eventID='$id' order by day ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[2].'</option>';
		
	}
	return $opt;	
	
}


function getEventSchedule()
{
	$q = "select * from `eventschedule` where eventschedulestatus=1 order by eventscheduleID ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[4].'</option>';
		
	}
	return $opt;	
	
}

function getUnit()
{
	$q = "select * from `unit` order by unitname ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}


function getEventstatus()
{
	$q = "select * from `event` where eventstatus=1 order by eventname ASC";
	$qr = mysql_query($q);
	$n = mysql_num_rows($qr);
	
	if($n > 0)
	{
		return true;	
	}
	else
	{
		return false;
	}
	
}

function verifyregistration($id, $eid, $y)
{
	
	$q = "select * from `camp` where registerID=$id and eventID=$eid and year=$y";
	$qr = mysql_query($q);
	$n = mysql_num_rows($qr);
	
	if($n > 0)
	{
		return true;	
	}
	else
	{
		return false;
	}
		
}

function verifyeventregistration($mail, $eid, $y)
{
	
	$q = "select * from `conference` where mail='$mail' and eventID='$eid' and YEAR(date_submitted)='$y'";
	$qr = mysql_query($q);
	$n = mysql_num_rows($qr);
	
	if($n > 0)
	{
		return true;	
	}
	else
	{
		return false;
	}
		
}

function verifyconferenceregistration($mail, $eid, $y, $ph)
{
	
	$q = "select * from `conference` where mail='$mail' and eventID='$eid' and YEAR(date_submitted)='$y' and phone='$ph'";
	$qr = mysql_query($q);
	$n = mysql_num_rows($qr);
	
	if($n > 0)
	{
		return true;	
	}
	else
	{
		return false;
	}
		
}

function verifyconferencesubmission($mail, $y, $ph)
{
	
	$q = "select * from `conference` where mail='$mail' and YEAR(date_submitted)='$y' and phone='$ph'";
	$qr = mysql_query($q);
	$n = mysql_num_rows($qr);
	
	if($n > 0)
	{
		//$row = mysql_fetch_array($qr);
		return true;	
	}
	else
	{
		return false;
	}
		
}

function getApplicantDetail($mail)
{
	
	$q = "select * from `conference` where mail='$mail'";
	$qr = mysql_query($q);
	$n = mysql_num_rows($qr);
	
	if($n > 0)
	{
		$row = mysql_fetch_array($qr);
		return $row;	
	}
		
}

function getService()
{
	$q = "select * from `service` order by servicename ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}


function getBand()
{
	$q = "select * from `band` order by bandname ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}

function getAlbum()
{
	$q = "select * from `album` order by `album-name` ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}




function getLinkDetail($id)
{
	$q = "select * from adio_page where adio_pageID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}


function getProgrammeDetail($id)
{
	$q = "select * from programme where programmeID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}


function getProgrammemodeDetail($id)
{
	$q = "select * from programmemode where programmemodeID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}

function getLevelDetail($id)
{
	$q = "select * from level where levelID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}


function getEventDetail($id)
{
	$q = "select * from event where eventID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}

function getQuizCategoryDetail($id)
{
	$q = "select * from categories where `id`='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}


function validateQuizCategory($id)
{
	$q = "select * from answers where userID='".$_SESSION['registerID']."' and categoryID='$id' and MONTH(curdate())=MONTH(ansdate)";
	$r = mysql_query($q) or die(mysql_error());
	$n = mysql_num_rows($r);
	
	if($n >0)
	{
		return true;
	}else
	{
		return false;
	}
	
}

function getEventScheduleDetail($id)
{
	$q = "select * from eventschedule where eventscheduleID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}

function galleryEmpty()
{
	$q = "select * from gallery where description=''";
	$qr = mysql_query($q);	
	$num = mysql_num_rows($qr);
	if($num > 0)
	{
		return true;
		
	}
	else
	{
		return false;
	}
}

function getEventDayDetail($id)
{
	$q = "select * from eventdays where eventdayID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}

function getUnitDetail($id)
{
	$q = "select * from `unit` where unitID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}

function getServiceDetail($id)
{
	$q = "select * from `service` where serviceID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}


function getBandDetail($id)
{
	$q = "select * from `band` where bandID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}

function getAdminDetail($id)
{
	$q = "select * from `admin` where adminID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}

function getAlbumDetail($id)
{
	$q = "select * from album where albumID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}



function getSubLink($p)
{
	$q = "select * from `adio_sub_link` where adio_pageID='$p' order by adio_sub_link ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[2].'</option>';
		
	}
	return $opt;	
	
}


function getLGA($p)
{
	$q = "select * from `lga` where stateID='$p' order by lga ASC";
	$qr = mysql_query($q);
	
	$opt = '<option value="">----Select your Local Government----</option>';
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[2].'</option>';
		
	}
	
	return $opt;	
	
}


function getSemester($p)
{
	$q = "select * from `semester` where sessionID='".getCurrentSessionID()."' and levelID='$p' order by semester ASC";
	$qr = mysql_query($q);
	
	$opt = '<option value="">----Select Current Semester----</option>';
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.format_semester_number($row[3]).'</option>';
		
	}
	
	return $opt;	
	
}


function getSemesterDetail($p)
{
	$q = "select * from `semester` where semesterID='$p'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	
	return $row;	
}


function getStates()
{
	//$state = array();
	//$stateid = array();
	$q = "select * from state";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value="'.$row[0].'">'.$row[1].'</option>';
		
	}
	return $opt;
}

function getStateName($id)
{
	//$state = array();
	//$stateid = array();
	$q = "select * from state where stateID='$id'";
	$qr = mysql_query($q);
	
	if(mysql_num_rows($qr) > 0)
	{
		$row = mysql_fetch_assoc($qr);
		$opt = $row["state"];
	}
	return $opt;
}


function getLGName($id)
{
	//$state = array();
	//$stateid = array();
	$q = "select * from `lga` where lgaID='$id'";
	$qr = mysql_query($q);
	
	if(mysql_num_rows($qr) > 0)
	{
		$row = mysql_fetch_assoc($qr);
		$opt = $row["lga"];
	}
	return $opt;
}

function getSubLinkDetail($id)
{
	$q = "select * from adio_sub_link where adio_sub_linkID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}

function verifyConfirm($userID)
{
	$query = "select * from register where password='".md5($userID)."'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	
	if($row['status'] == 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function getSubPage($id)
{
	$qry1 = "select * from adio_sub_link where adio_pageID='$id' order by sublinkorder";
	$qryresult1 = mysql_query($qry1);
	$num = mysql_num_rows($qryresult1);
	$notting = "";
	
	$pages1= "<ul>";
	
	if($num > 0)
	{
	while($row1 = mysql_fetch_assoc($qryresult1))
	{
		//$pageid = md5("Amos");
		
						
		$sp = getLinkDetail($row1['adio_pageID']); $pagename = $sp["adio_page"];
		
		$url = $row1['url'];
						
		if($url == "")
		{
			$finalurl = "index.php?page=".$pagename."&subpage=".$row1['adio_sub_link'];
		}
		else
		{
			$finalurl = $url;												
		}
											
		$pages1.='<li><a href="'.$finalurl.'">'.$row1['adio_sub_link'].'</a></li>';
	}
	$pages1.="</ul>";
	return $pages1;	
	}
	else
	{
		return $notting;
	}
}

function imageType($image)
{
	switch(strtolower($image['type']))
		{
			//allowed file types
            case 'image/png':
				return true; 
			case 'image/gif': 
				return true;
			case 'image/jpeg': 
				return true;
			case 'image/pjpeg':
				return true;
/*			case 'text/plain':
			case 'text/html': //html file
			case 'application/x-zip-compressed':
			case 'application/pdf':
			case 'application/msword':
			case 'application/vnd.ms-excel':
			case 'video/mp4':
*/				break;
			default:
				return false; //output error
	}
	
	
}


function getDetails($id)
{
	$qry1 = "select * from content where sub_pageID='$id' order by contentID DESC LIMIT 0,4";
	$qryresult1 = mysql_query($qry1);
	$pages1= "<ul>";
	while($row1 = mysql_fetch_assoc($qryresult1))
	{
		//$pageid = md5("Amos");
		$pages1.='<li><a href="index.php?page='.encryptParameter($row1['pageID'])."&subpage=".encryptParameter($id).'&id='.encryptParameter($row1['contentID']).'">'.$row1['title'].'</a></li>';
	}
	$pages1.="</ul>";
	return $pages1;			
}

function getAlbumName($id)
{
	$qry1 = "select * from album where albumID='$id'";
	$qryresult1 = mysql_query($qry1);
	$row1 = mysql_fetch_assoc($qryresult1);
	
	return $row1['album-name'];		
	
}

function findMail($mail)
{
	$qry = "select * from register where email='$mail' and email <> 'admin@eaglesyouthng.org'";
	$qryr = mysql_query($qry);
	$numr = mysql_num_rows($qryr);
	
	if($numr > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function findStaffMail($mail)
{
	$qry = "select * from staff where mail='$mail'";
	$qryr = mysql_query($qry);
	$numr = mysql_num_rows($qryr);
	
	if($numr > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function findStudentMail($mail)
{
	$qry = "select * from studentrecord where email='$mail'";
	$qryr = mysql_query($qry);
	$numr = mysql_num_rows($qryr);
	
	if($numr > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function findAlumniMail($mail)
{
	$qry = "select * from alumnirecord where email='$mail'";
	$qryr = mysql_query($qry);
	$numr = mysql_num_rows($qryr);
	
	if($numr > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function findMatric($matric)
{
	$qry = "select * from studentrecord where matric='$matric'";
	$qryr = mysql_query($qry);
	$numr = mysql_num_rows($qryr);
	
	if($numr > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function confirm_user($table, $identifier, $key )
{
	$q = "select * from `$table` where $identifier='$key'";
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_assoc($r);
	
	if($row['pix'] == "")
	{
		return false;
	}
	else
	{
		return true;
	}
}


function confirm_user_file($table, $identifier, $key )
{
	$q = "select * from `$table` where $identifier='$key'";
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_assoc($r);
	
	if($row['resume'] == "")
	{
		return false;
	}
	else
	{
		return true;
	}
}


function validatefile($files)
{
	$allowedExtensions = array("jpg", "pjpg", "png", "gif");
  foreach ($files as $filename) {
    if ($filename['tmp_name'] > '') {
      if (!in_array(end(explode(".",
            strtolower($filename['name']))),
            $allowedExtensions)) {
		return false;	
      }
	  else
	  {
	  
	  	return true;
	  }
    }
  }

}


function userExists($user)
{
	$userq = "select * from register where username='$user'";
	$userR = mysql_query($userq);
	$usernum = mysql_num_rows($userR);
	
	if($usernum >0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function ValidEmail($email)
	{
	    return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $email);
	}


function blog($id)
{
	
	
}


function referenceConfirm($ref)
{
	$refq = "select * from registration where ref='$ref'";
	$refresult = mysql_query($refq);
	$refnum = mysql_num_rows($refresult);
	if($refnum > 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function getRef()
{
$Reference = strtoupper(substr(md5(rand()*time()),0,4));

return $Reference;
}


function getMarriedStatus($status)
{
	if($status == "1")
	{
		return "Single";
	}
	elseif($status == "2")
	{
		return "Married";
	}
	elseif($status == "3")
	{
		return "Widow";
	}
	else
	{
		return "No Marital status!";	
	}	
	
}


function getSocialStatus($status)
{
	if($status == "1")
	{
		return "Student";
	}
	elseif($status == "2")
	{
		return "Employee";
	}
	elseif($status =="3")
	{
		return "Self Employed";
	}
	else
	{
		return "No social status!";	
	}
}


function processCheckBox($i)
{
	return $i == 1 ? "Yes" : "No";	
}


function getBirthdayCelebrants()
{
	$tdate = date("Y-m-d");
	$date = new DateTime($tdate);
	$week = $date->format("W");
	
	$i = 0;
		
	
	$query = "select * from `studentrecord`  where status=1 order by studentrecordID DESC";
	$result = mysql_query($query) or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	
	$output = "";
	
	if($num_rows > 0)
	{
	
	while($row = mysql_fetch_assoc($result))
	{
		$y = date("Y");
		$m = $row['month'];
		$d = $row['day'];
		
		$bdate = $y."-".$m."-".$d;
		
		$ndate = new DateTime($bdate);
		$nweek = $ndate->format("W");
		
		if($week == $nweek)
		{
			
			if($row['pix'] == "")
			{
				$row['sex'] == 1 ? $myimage = "avarta.png" : $myimage = "girl.png";
			}
			else
			{
				$myimage = $row['pix'];
			}
		
		$output.="<div>
								      <div class=\"testimonials-bg\"> <img alt=\"\" src=\"uploads/student-passport/".$myimage."\" class=\"testimonials-img\"> <span>".getBirthdayWishes($week)."</span>
								        <div class=\"rating\"> <span class=\"fa fa-star\"></span><span class=\"fa fa-star\"></span><span class=\"fa fa-star\"></span><span class=\"fa fa-star\"></span><span class=\"fa fa-star\"></span> </div>
							          </div>
								      <div class=\"testimonials-name\"><strong>".$row['sname']." ".$row['oname']."</strong></div>
							        </div>";
									
									++$i;
									
		}
		
	}
	}
	
	if($i == 0)
	{
		$output.="<div>
								      <div class=\"testimonials-bg\"><img alt=\"\" src=\"images/avarta.png\" class=\"testimonials-img\"><span>No birthday celebrant for this week!</span></div>
				</div>";	
	}
	

	
	return $output;
	
}


function getPublications()
{
	/*$tdate = date("Y-m-d");
	$date = new DateTime($tdate);
	$week = $date->format("W");*/
	
	$i = 0;
		
	
	$query = "select * from `publication` order by publicationID DESC";
	$result = mysql_query($query) or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	
	$output = "";
	
	if($num_rows > 0)
	{
	
	while($row = mysql_fetch_assoc($result))
	{
/*		$y = date("Y");
		$m = $row['month'];
		$d = $row['day'];
		
		$bdate = $y."-".$m."-".$d;
		
		$ndate = new DateTime($bdate);
		$nweek = $ndate->format("W");*/
		$staffD = getStaffDetail($row['staffID']);
		
		
			
			if($staffD['pix'] == "")
			{
				$staffD['sex'] == 1 ? $myimage = "avarta.png" : $myimage = "girl.png";
			}
			else
			{
				$myimage = "people/".$staffD['pix'];
			}
		
		$output.="<div>
								      <div class=\"testimonials-bg\"> <img alt=\"\" src=\"images/".$myimage."\" class=\"testimonials-img\"> <span><strong><a href=\"download.php?dwlod=".encryptParameter($row['file'])."&fn=".$row['title']."\">".$row['title']."</strong></span>
								        <div class=\"rating\"> <span class=\"fa fa-star\"></span><span class=\"fa fa-star\"></span><span class=\"fa fa-star\"></span><span class=\"fa fa-star\"></span><span class=\"fa fa-star\"></span> </div>
							          </div>
								      <div class=\"testimonials-name\"><strong>Author:</strong>".$staffD['sname']." ".$staffD['oname']."</div>
							        </div>";
									
									++$i;
									
		
		
	}
	}
	
	if($i == 0)
	{
		$output.="<div>
								      <div class=\"testimonials-bg\"><img alt=\"\" src=\"images/avarta.png\" class=\"testimonials-img\"><span>No publication yet!</span></div>
				</div>";	
	}
	

	
	return $output;
	
}


function getEventGallery()
{

	
	$query = "select * from `gallery` order by galleryID DESC LIMIT 0, 10";
	$result = mysql_query($query) or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	
	$output = "";
	
	if($num_rows >0)
	{
	
	while($row = mysql_fetch_assoc($result))
	{
		$eventname = getEventDetail($row['eventID']);

		
		$output.='<div>
				        <div class="portfolio-item">
				          <div class="img-holder">
				            <div class="img-over"> <a href="gallery.php" class="fx link"><b class="fa fa-link"></b></a> <a href="images/gallery/'.$row['image'].'" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="'.$eventname['eventname'].'"><b class="fa fa-search-plus"></b></a> </div>
				            <img alt="" src="images/gallery/'.$row['image'].'"> </div>
				        </div>
			          </div>';
		
	}
	}
	else
	{
		$output.='<div>
				        <div class="portfolio-item">
				          <div class="img-holder">
				            <div class="img-over"> <a href="#" class="fx link"><b class="fa fa-link"></b></a> <a href="images/gallery/no-images.jpg" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title=""><b class="fa fa-search-plus"></b></a> </div>
				            <img alt="" src="images/gallery/no-images.jpg"> </div>
				        </div>
			          </div>';	
	}
	

	
	return $output;
	
}


function getBirthdayCelebrantsStatus()
{
	$month = date('m');	
	$bd = $month;	
	
	$query = "select * from `register`  where status=1 and MID(dob,4,2) = '$bd' order by registerID DESC";
	$result = mysql_query($query) or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	if($num_rows == 0){
		return false;
		
	}
	else
	{
		return true;
	}
	
	
}

function getSubResponsPage($id)
{
	$pages1 = "";
	$qry1 = "select * from adio_sub_link where adio_pageID='$id'";
	$qryresult1 = mysql_query($qry1);
	//$pages1= "<ul>";
	while($row1 = mysql_fetch_assoc($qryresult1))
	{
		//$pageid = md5("Amos");
		$pages1.='<option value="index.php?page='.encryptParameter($id).'&subpage='.encryptParameter($row1['adio_sub_linkID']).'"> --- '.$row1['adio_sub_link'].'</option>';
	}
	
	//$pages1.="</ul>";
	return $pages1;	
}


function CheckPage($page)
{
	$qry2 = "select * from adio_page where adio_page='$page'";
	
	$r1 = mysql_query($qry2) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{					
		return true;		
	}
	else
	{
		return false;
	}

	
}

function CheckSession($page)
{
	$qry2 = "select * from session where sessionname='$page'";
	
	$r1 = mysql_query($qry2) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{					
		return true;		
	}
	else
	{
		return false;
	}

	
}


function CheckSemester($s, $p, $se)
{
	$qry2 = "select * from semester where sessionID='$s' and levelID='$p' and semester='$se'";
	
	$r1 = mysql_query($qry2) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{					
		return true;		
	}
	else
	{
		return false;
	}

	
}


function CheckQuizCategory($page)
{
	$qry2 = "select * from categories where category_name='$page'";
	
	$r1 = mysql_query($qry2) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{					
		return true;		
	}
	else
	{
		return false;
	}

	
}

function CheckSubPage($page)
{
	$qry2 = "select * from adio_sub_link where adio_sub_link='$page'";
	
	$r1 = mysql_query($qry2) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{					
		return true;		
	}
	else
	{
		return false;
	}

	
}


function Checklevelname($page)
{
	$qry2 = "select * from level where levelname='$page'";
	
	$r1 = mysql_query($qry2) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{					
		return true;		
	}
	else
	{
		return false;
	}

	
}

function Checkcourseduplicate($li, $s, $cc)
{
	$qry2 = "select * from courselist where levelID='$li' and semester='$s' and coursecode='$cc'";
	
	$r1 = mysql_query($qry2) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{					
		return true;		
	}
	else
	{
		return false;
	}

	
}

function getPageID($p)
{
	$qry2 = "select * from adio_page where adio_page='$p'";
	
	$r1 = mysql_query($qry2) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{
		$row = mysql_fetch_assoc($r1);
		return $row['adio_pageID'];		
	}
	else
	{
		return 0;
	}	
	
}


function getSubPageID($p)
{
	$qry2 = "select * from adio_sub_link where adio_sub_link='$p'";
	
	$r1 = mysql_query($qry2) or die(mysql_error());
	
	if(mysql_num_rows($r1) > 0)
	{
		$row = mysql_fetch_assoc($r1);
		return $row['adio_sub_linkID'];		
	}
	else
	{
		return 0;
	}	
	
}


function getTestimony()
{
	$query = "select * from testimonies order by rand()";
	//echo $query;
	$result = mysql_query($query) or die (mysql_error());
	if(mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		return $row;
	}

}

function getTotalComment($id)
{
	$q = "select * from blog where contentID=$id";
	$r = mysql_query($q) or die(mysql_error());
	$n = mysql_num_rows($r);
	//$row = mysql_fetch_assoc($r);	
	return $n;
	
}


function getArticles()
{
	$q = "select * from content where blog_status=1 order by contentID DESC";
	$r = mysql_query($q) or die(mysql_error());
	$n = mysql_num_rows($r);
	$row = mysql_fetch_assoc($r);
	
	$result = "";
	$date = array();
	$target_dir = $row['pix'];

	
	if($n >0)
	{
		$date = explode("-",$row['date']);
		$day = $date[0];
		$month = format_month($date[1]);
		$year = $date[2];
		
		$result= '<div class="cell-4 post fx" data-animate="fadeInLeft">
							  <div class="post-image"> <a href="articles.php">
							    <div class="mask"></div>
							    <div class="post-lft-info">
							      <div class="main-bg">'.$day.'<br>
							        '.$month.'<br>
							        '.$year.'</div>
						      </div>
						      <a href="articles.php"><img src="uploads/'.$target_dir.'" alt="'.$row['title'].'"></a> </div>
							  <article class="post-content">
							    <div class="post-info-container">
							      <div class="post-info">
							        <h2><a class="main-color" href="articles.php">'.$row['title'].'</a></h2>
						          </div>
						        </div>
							    '.trim_text($row['content_text'], 105).'<a class="read-more" href="articles.php">Read more</a>
						      </article>
						  </div>';
	}
	else
	{
		$result = '<div class="cell-4 post fx" data-animate="fadeInLeft">
							  <div class="post-image"> <a href="#">
							    <div class="mask"></div>
							    <div class="post-lft-info">
							      <div class="main-bg">'.date("d").'<br>
							        '.format_month(date("m")).'<br>
							        '.date("Y").'</div>
						      </div>
						      <a href="#"><img src="uploads/no-article.jpg" alt="article"></a> </div>
							  <article class="post-content">
							    <div class="post-info-container">
							      <div class="post-info">
							        <h2><a class="main-color" href="#">No Article posted yet</a></h2>
						          </div>
						        </div>
							    <p> </p>
						      </article>
						  </div>';
	}
	
	return $result;
	
}

function trim_text($input, $length) {
    //strip tags, if desired

  
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }
  
    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
  
    //add ellipses (...)
    
        $trimmed_text .= '...';
    
  
    return $trimmed_text;
}

function format_month($id)
{
	switch($id)
	{
		case "01":
			return "Jan";
		break;
		
		case "02":
			return "Feb";
		break;
		
		case "03":
			return "Mar";
		break;
		
		case "04":
			return "Apr";
		break;		
		
		case "05":
			return "May";
		break;
		
		case "06":
			return "Jun";
		break;
		
		case "07":
			return "Jul";
		break;
		
		case "08":
			return "Aug";
		break;		
		
		case "09":
			return "Sep";
		break;		
		
		case "10":
			return "Oct";
		break;
		
		case "11":
			return "Nov";
		break;		
		
		case "12":
			return "Dec";
		break;
		
		default:
			return "";															
	}
	
}

function format_day($id)
{
	switch($id)
	{
		case "01":
			return "1ST of";
		break;
		
		case "02":
			return "2ND of";
		break;
		
		case "03":
			return "3RD of";
		break;
		
		case "21":
			return "21ST of";
		break;		
		
		case "22":
			return "22ND of";
		break;
		
		case "23":
			return "23RD of";
		break;
		
		case "31":
			return "31ST of";
		break;
		
		default:
			return $id."TH of";															
	}
	
}


function getWatermarkedImage($image_resource, $image_name, $image_temp)
{
	$max_size = 600;
	$destination_folder = "../images/gallery/";
	$watermark_png_file = 'watermark.png';
	if($image_resource){
		//Copy and resize part of an image with resampling
		list($img_width, $img_height) = getimagesize($image_temp);
		
	    //Construct a proportional size of new image
		$image_scale        = min($max_size / $img_width, $max_size / $img_height); 
		$new_image_width    = ceil($image_scale * $img_width);
		$new_image_height   = ceil($image_scale * $img_height);
		$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);

		if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
		{
			
			if(!is_dir($destination_folder)){ 
				mkdir($destination_folder);//create dir if it doesn't exist
			}
			
			//center watermark
			$watermark_left = ($new_image_width)-(300); //watermark left
			$watermark_bottom = ($new_image_height)-(100); //watermark bottom

			$watermark = imagecreatefrompng($watermark_png_file); //watermark image
			imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 300, 100); //merge image
			
			//output image direcly on the browser.
			//header('Content-Type: image/jpeg');
			//imagejpeg($new_canvas, NULL , 90);
			
			//Or Save image to the folder
			imagejpeg($new_canvas, $destination_folder.'/'.$image_name , 90);
			
			//free up memory
			imagedestroy($new_canvas); 
			//imagedestroy($image_resource);
			
		}
	}	
}


function getWatermarkedImageThumb($image_resource, $image_name, $image_temp)
{
	$max_size = 100;
	$destination_folder = "../images/gallery/thumb/";
	$watermark_png_file = 'watermark.png';
	if($image_resource){
		//Copy and resize part of an image with resampling
		list($img_width, $img_height) = getimagesize($image_temp);
		
	    //Construct a proportional size of new image
		$image_scale        = min($max_size / $img_width, $max_size / $img_height); 
		$new_image_width    = ceil($image_scale * $img_width);
		$new_image_height   = ceil($image_scale * $img_height);
		$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);

		if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
		{
			
			if(!is_dir($destination_folder)){ 
				mkdir($destination_folder);//create dir if it doesn't exist
			}
			
			//center watermark
			$watermark_left = ($new_image_width)-(300); //watermark left
			$watermark_bottom = ($new_image_height)-(100); //watermark bottom

			$watermark = imagecreatefrompng($watermark_png_file); //watermark image
			imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 300, 100); //merge image
			
			//output image direcly on the browser.
			//header('Content-Type: image/jpeg');
			//imagejpeg($new_canvas, NULL , 90);
			
			//Or Save image to the folder
			imagejpeg($new_canvas, $destination_folder.'/'.$image_name , 90);
			
			//free up memory
			//imagedestroy($new_canvas); 
			imagedestroy($image_resource);
			
			
		}
	}	
}

function getBirthdayWishes($month)
{
	$q = "select * from monthlysms where day='$month'";
	$r = mysql_query($q) or die(mysql_error());
	$n = mysql_num_rows($r);
	$row = mysql_fetch_assoc($r);
	//$row = ;
	
	if($n >0)
	{
		
/*	while($row = mysql_fetch_assoc($r))
	{
		$day = $row['day'];
		$tdate = date("Y-m-d");
		$date = new DateTime($tdate);
		$week = $date->format("W");
		
		$ddate = date("Y-".$month."-".$day);
		$ndate = new DateTime($ddate);
		$nweek = $ndate->format("W");		
		
		if($week == $nweek)
				
	}*/
	return $row['sms'];
	}
	else
	{
		return "";
	}
}

function fileexists($name)
{
	$q = "select * from resources where file='$name'";
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_num_rows($r);
	
	if($row == 1)
	{
		return true;
	}
	else
	{
	
		return false;
	}
	
}


function CheckEventtoolStatus1()
{
	$curdate = date("Y-m-d");
	
	$q = "SELECT *
FROM eventtool AS t, event AS e
WHERE t.startdate < e.eventupperdate
AND t.enddate <= e.eventupperdate
AND e.eventupperdate > '$curdate'
AND eventtoolname = 'ad-banner'
AND e.eventID = t.eventID
AND e.eventstatus =1";
	
	$r = mysql_query($q) or die(mysql_error());
	
	$n = mysql_num_rows($r);
	
	if($n >0)
	{
		return true;
	}
	else
	{
		return false;
	}
		
	
}

function CheckEventtoolStatus2()
{
	$curdate = date("Y-m-d");
	
	$q = "select * from eventtool as t,  event as e  where t.startdate >= e.eventupperdate and t.enddate <= e.eventlowerdate and e.eventlowerdate >= '$curdate' and eventtoolname='event-schedule' and e.eventID=t.eventID and  e.eventstatus=1";
	
	$r = mysql_query($q) or die(mysql_error());
	
	$n = mysql_num_rows($r);
	
	if($n >0)
	{
		return true;
	}
	else
	{
		return false;
	}
		
	
}

function getEventDayActivities($dayID)
{
	$q = "select * from eventschedule where eventdayID='$dayID'";
	$r = mysql_query($q) or die(mysql_error);
	$n = mysql_num_rows($r);
	if($n >0)
	{
		while($row= mysql_fetch_assoc($r))
		{
	$output.="<tr>
                   <td>".$row['time']."</td>
                   <td>".$row['activity']."</td>
                   <td>".$row['cordinator']."</td>
             </tr>";
			 
		}
			 
	}
	else
	{
	$output="<tr>
                   <td>No Activity for the day</td>
             </tr>";		
	}
	
	return $output;
}


function getQuizStatus()
{
	$q = "select * from quizstatus";	
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_assoc($r);
	
	$s = $row['status'];
	
	if($s == 0){ return false;}else{return true;}
}

function getQuestionDetail($id)
{
	$q = "select * from questions where `id`='$id'";	
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_array($r, MYSQL_ASSOC);
	return $row;
	
}


function format_time($time)
{
	switch($time)
	{
		case 60:
			return "1 Minute";
			
		break;
		
		case 120:
			return "2 Minute";
			
		break;		
		
		case 180:
			return "3 Minute";
			
		break;
		
		case 240:
			return "4 Minute";
			
		break;
		
		case 300:
			return "5 Minute";
			
		break;
		
		case 360:
			return "6 Minute";
			
		break;
		
		case 420:
			return "7 Minute";
			
		break;
		
		case 480:
			return "8 Minute";
			
		break;
		
		case 540:
			return "9 Minute";
			
		break;
		
		case 600:
			return "10 Minute";
			
		break;
		
		default:
		
			return "<span style=\"color:#ff0000;\">Wrong time format! Reselect time duration.</span>";																			
	}
}

function getFaculty()
{
	$q = "select * from ovc_faculty order by faculty ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}


function getFacultyDetail($id)
{
	$q = "select * from ovc_faculty where ovc_facultyID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);	
	$opt = $row[1];
	return $opt;	
}



function getDepartment($id)
{
	$q = "select * from ovc_department where ovc_facultyID='$id' order by department ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[2].'</option>';
		
	}
	return $opt;	
	
}

function getDepartmentDetail($id)
{
	$q = "select * from ovc_department where ovc_departmentID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);	
	$opt = $row[2];
	return $opt;	
}


function validatepublicationfile($files)
{
	$allowedExtensions = array("docx", "DOCX", "doc", "DOC", "pdf", "PDF", "rtf", "RTF");
  foreach ($files as $filename) {
    if ($filename['tmp_name'] > '') {
      if (!in_array(end(explode(".",
            strtolower($filename['name']))),
            $allowedExtensions)) {
		return false;	
      }
	  else
	  {
	  
	  	return true;
	  }
    }
  }

}

function finddepart($xter)
{
	$query = "select * from ovc_department where department='$xter'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_num_rows($result);
	
	if($row > 0)
	{
		return true;
	}
	else
	{
		return false;
	}	
	
}

function findfaculty($xter)
{
	$query = "select * from ovc_faculty where faculty='$xter'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_num_rows($result);
	
	if($row > 0)
	{
		return true;
	}
	else
	{
		return false;
	}	
	
}

function getSchoolDetail($id)
{
	$q = "select * from ovc_faculty where ovc_facultyID='$id'";
	$qr = mysql_query($q);
	$row = mysql_fetch_array($qr);
	return $row;
	
}

function getSchool()
{
	$q = "select * from `ovc_faculty` order by faculty ASC";
	$qr = mysql_query($q);
	
	while($row = mysql_fetch_array($qr))
	{
		$opt .=  '<option value=\''.$row[0].'\'>'.$row[1].'</option>';
		
	}
	return $opt;	
	
}


function getCourseList($lvID, $smst)
{
	$q = "select * from courselist where levelID='$lvID' and semester='$smst' and status=1";
	$qr = mysql_query($q);
	$result = "";
	$j = 1;
	
	$result .= '<h4 class="bold">'.format_semester_number($smst).'</h4>
											  <table class="table-style2">
											    <thead>
											      <tr>
											        <th width="6%" class="main-bg">SN</th>
											        <th width="14%" class="main-bg">Course Code</th>
											        <th width="66%" class="main-bg">Course Title</th>
											        <th width="14%" class="main-bg">Course Unit</th>
										          </tr>
										        </thead>
											    <tbody>';
	while($row = mysql_fetch_array($qr))
	{
		$result .='<tr class="'.getcolointerchange2($j).'">
						<td>'.$j.'</td>
						<td>'.$row['coursecode'].'</td>
						<td>'.$row['coursetitle'].'</td>
						<td>'.$row['courseunit'].'</td>
				   </tr>';
				   
				  ++$j;
		
	}
	
	$result .= '  </tbody>
					</table>';
					
	return $result;
	
}


function format_semester_number($id)
{
	switch($id)
	{
		case "1":
			return "1ST SEMESTER";
		break;
		
		case "2":
			return "2ND SEMESTER";
		break;
		
		default:
			return "";
			
	}
}

function getPaymentDescription($fref){
	
$analyseref = explode("-", $fref);

switch($analyseref[0])
{
	case 'REG':
	
				return "Student Registration Fee";
	
	break;
	
	case 'ALU':
	
				return "Alumni Due";
	
	break;
	
	case 'SPA':
	
				return "Space Booking";
	
	break;
	
}	
	
}

function encodeWord($xters)
{
	$fxter = "";
	
	$len = strlen($xters);
	
	for($i=1;$i<=$len;++$i)
	{
		$fxter.="*";
	}
	
	return $fxter;	
}

function getJobStatusDetail($js)
{
		switch($js)
		{
			case 0:
				return 'Industrial Attachment';
			break;
			
			case 1:
				return 'National Youth Service Corps (NYSC)';
			break;
			
			case 2:
				return 'Part Time';
			break;	
			
			case 3:
				return 'Unemployed';
			break;
			
			case 4:
				return 'Employed';
			break;											
		}
}

function getCurrentLevel($unique)
{
	$q = "SELECT DISTINCT (
levelID
), semester
FROM `courseregistration`
WHERE `studentrecordID` =".$_SESSION['student_userID']."
and ((levelID=2 and semester=2) or (levelID=4 and semester=2))
ORDER BY semester DESC";
	$r = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_array($r);
	$num_row = mysql_num_rows($r);
	
	if($num_row > 0)
	{
	return true;	
	}
	else
	{
	return false;	
	}
}

function MatricPreg($matric)
{
	if(preg_match("/^[\d]{2}\/\d{3}\/\d{4}$/", $matric))
	{
		return true;
	}
	else
	{
	 return false;	
	}
}

function CheckCourseRegDuplicate($id, $ses, $lv, $sem, $single)
{
	$Q = "SELECT * FROM `courseregistration` WHERE `studentrecordID`=".$id." and `sessionID`=".$ses." and `levelID`=".$lv." and `semester`=".$sem." and `courselistID`=".$single;
	
	$r = mysql_query($Q) or die(mysql_error());
	$num_row = mysql_num_rows($r);	
	
	if($num_row > 0)
	{
	return true;	
	}
	else
	{
	return false;	
	}	
	
}


function Verifyallocation($ss, $se, $pgmid, $lvl, $ci)
{
$Q = "SELECT * FROM `callocation` WHERE `sessionID`=".$ss." and `semester`=".$se." and `programmemodeID`=".$pgmid." and `levelID`=".$lvl." and `courselistID`=".$ci;
	
	$r = mysql_query($Q) or die(mysql_error());
	$num_row = mysql_num_rows($r);	
	
	if($num_row > 0)
	{
	return true;	
	}
	else
	{
	return false;	
	}	
}


function verifyScoreEntry($si, $ses, $sem, $ci)
{
$Q = "SELECT * FROM `scores` WHERE `studentrecordID`=".$si." and `sessionID`=".$ses." and `semester`=".$sem." and `courselistID`=".$ci;
	
	$r = mysql_query($Q) or die(mysql_error());
	$num_row = mysql_num_rows($r);	
	
	if($num_row > 0)
	{
	return true;	
	}
	else
	{
	return false;	
	}	
}

function getScorePointGrade($score)
{
	$gpg = array();
	
	if($score ==0 or $score <=19)
	{
		$gpg["lg"] = "HF";
		$gpg["gp"] = 0.00;
	}
	elseif($score ==20 or $score <=24)
	{
		$gpg["lg"] = "PF";
		$gpg["gp"] = 1.00;		
	}
	elseif($score ==25 or $score <=29)
	{
		$gpg["lg"] = "F";
		$gpg["gp"] = 1.25;		
	}
	elseif($score ==30 or $score <=34)
	{
		$gpg["lg"] = "FF";
		$gpg["gp"] = 1.50;		
	}
	elseif($score ==35 or $score <=39)
	{
		$gpg["lg"] = "EF";
		$gpg["gp"] = 1.75;		
	}
	elseif($score ==40 or $score <=44)
	{
		$gpg["lg"] = "E";
		$gpg["gp"] = 2.00;		
	}
	elseif($score ==45 or $score <=49)
	{
		$gpg["lg"] = "DE";
		$gpg["gp"] = 2.25;		
	}
	elseif($score ==50 or $score <=54)
	{
		$gpg["lg"] = "D";
		$gpg["gp"] = 2.50;		
	}
	elseif($score ==55 or $score <=59)
	{
		$gpg["lg"] = "CD";
		$gpg["gp"] = 2.75;		
	}
	elseif($score ==60 or $score <=64)
	{
		$gpg["lg"] = "C";
		$gpg["gp"] = 3.00;		
	}
	elseif($score ==65 or $score <69)
	{
		$gpg["lg"] = "BC";
		$gpg["gp"] = 3.25;		
	}
	elseif($score ==70 or $score <=74)
	{
		$gpg["lg"] = "B";
		$gpg["gp"] = 3.50;		
	}
	elseif($score ==75 or $score <=79)
	{
		$gpg["lg"] = "AB";
		$gpg["gp"] = 3.75;		
	}
	else
	{
		$gpg["lg"] = "A";
		$gpg["gp"] = 4.00;		
	}
	return $gpg;
												
}

function verifyResultProcessDay($dateprocessed)
{
	if(intval((strtotime('now')-strtotime($dateprocessed))/3600) > 48)
	{
		return true;
	}
	else
	{
		return false;
	}	
}
?>