<?php

function login_page_menu($boardlogin){
	$output = "<ul>";
	$output .= "<a href=\"schoollogin.php\"><li";
	if($boardlogin == "schoollogin") { $output .= " class = \"selected\""; }
	$output .= ">School Login</li></a>";
	$output .= "<a href=\"boardlogin.php\"><li";
	if($boardlogin == "boardlogin") { $output .= " class = \"selected\""; }
	$output .= ">Board Login</li></a>";
	$output .= "</ul>";
	
	return $output;
}

function school_menu($sm){
	$output = "<ul>";
	$output .= "<a href=\"studentdetails.php\"><li"; if($sm == "studentdetails") { $output .= " class = \"selected\""; }$output .=">Student Details</li></a>";
	$output .= "<a href=\"studentattendance.php\"><li"; if($sm == "studentattendance") { $output .= " class = \"selected\""; }$output .=">Student Attendance</li></a>";
	$output .= "<a href=\"studentdiscipline.php\"><li"; if($sm == "studentdiscipline") { $output .= " class = \"selected\""; }$output .=">Student Discipline</li></a>";
	// $output .= "<a href=\"exams.php\"><li"; if($sm == "exams") { $output .= " class = \"selected\""; }$output .=">Exams</li></a>";
	// $output .= "<a href=\"examresults.php\"><li"; if($sm == "examresults") { $output .= " class = \"selected\""; }$output .=">Exam Results</li></a>";
	$output .= "<a href=\"extracurriculum.php\"><li"; if($sm == "extracurriculum") { $output .= " class = \"selected\""; }$output .=">Extra Curriculum</li></a>";
	$output .= "<a href=\"fundsusage.php\"><li"; if($sm == "fundsusage") { $output .= " class = \"selected\""; }$output .=">Funds Usage</li></a>";
	$output .= "<a href=\"affiliations.php\"><li"; if($sm == "affiliations") { $output .= " class = \"selected\""; }$output .=">Affiliations</li></a>";
	//$output .= "<a href=\"leavingrecords.php\"><li"; if($sm == "leavingrecords") { $output .= " class = \"selected\""; }$output .=">Leaving Records</li></a>";
	$output .= "</ul>";
	return $output;
}

function board_menu($bm){
	$output = "<ul>";
	$output .= "<a href=\"schools.php\"><li"; if($bm == "schools") { $output .= " class = \"selected\""; }$output .=">Schools</li></a>";
	$output .= "<a href=\"users.php\"><li"; if($bm == "users") { $output .= " class = \"selected\""; }$output .=">Users</li></a>";
	$output .= "<a href=\"facilities.php\"><li"; if($bm == "facilities") { $output .= " class = \"selected\""; }$output .=">Facilities</li></a>";
	$output .= "<a href=\"trainingequipment.php\"><li"; if($bm == "trainingequipment") { $output .= " class = \"selected\""; }$output .=">Training Equipment</li></a>";
	$output .= "<a href=\"courses.php\"><li"; if($bm == "courses") { $output .= " class = \"selected\""; }$output .=">Courses</li></a>";
	$output .= "<a href=\"fundsdisbursement.php\"><li"; if($bm == "fundsdisbursement") { $output .= " class = \"selected\""; }$output .=">Funds Disbursement</li></a>";
	$output .= "<a href=\"reports.php\"><li"; if($bm == "reports") { $output .= " class = \"selected\""; }$output .=">Reports</li></a>";
	$output .= "</ul>";
	return $output;
}

function redirect_to($page_to = NULL)	
{
	if ($page_to != NULL){
		header("Location: {$page_to}");
		exit;
	}
}
// if(isset($_POST['function']) && isset($_POST['parameter'])){
	
// 	$school_id = $_POST['parameter'];
// 	$function_name = $_POST['function'];
	
// 	if ( $function_name == 'get_courses'){
// 		get_courses($school_id);
// 	}
// }

// function get_courses($school_id){
// 	$output = "";
// 	$query = "SELECT id,course_Name FROM sch_courses 
// 			  WHERE school_id = '1'";
// 	$query_run = mysql_query($query);
	
// 	$record_count = mysql_num_rows($query_run);
// 	if ($record_count > 0){
// 		for($i=0;$i < $record_count-1;$i++){
// 			$id = mysql_result($loaded_data,$i,'id');
// 			$course_name = mysql_result($loaded_data,$i,'course_Name');
// 			$output .= "<option value=". $id .">". $course_name ."</option>";
			
// 		}
// 	}
// 	echo $output;
// }
?>

