<?php
function navigation($subject_name){
	$output = "<ul>";
	$output .= "<a href=\"index.php\"><li";
	if ($subject_name == strtolower("Home")){
		$output .= " class = \"selected\" ";
	}
	$output .= ">Home</li></a>";
	$output .= "<a href=\"foods.php\"><li";
	if ($subject_name == strtolower("Foods")){
		$output .= " class = \"selected\" ";
	}
	$output .= ">Foods</li></a>";
	$output .= "<a href=\"orders.php\"><li";
	if ($subject_name == strtolower("Orders")){
		$output .= " class = \"selected\" ";
	}
	$output .= ">Orders</li></a>";
	$output .= "<a href=\"payments.php\"><li";
	if ($subject_name == strtolower("Payments")){
		$output .= " class = \"selected\" ";
	}
	$output .= ">Payments</li></a>";
	$output .= "<a href=\"contactus.php\"><li";
	if ($subject_name == strtolower("Contact Us")){
		$output .= " class = \"selected\" ";
	}
	$output .= ">Contact Us</li></a>";
	$output .= "<a href=\"customerlogin.php\"><li";
	if ($subject_name == strtolower("Customer Login")){
		$output .= " class = \"selected\" ";
	}
	$output .= ">Customer Login</li></a>";
	$output .= "<a href=\"userlogin.php\"><li";
	if ($subject_name == strtolower("Admin Login")){
		$output .= " class = \"selected\" ";
	}
	$output .= ">Admin Login</li></a>";
	$output .= "</ul>";
	return $output;
}

function get_all_foods()	
	{
		$query = "SELECT `foods`.id, `foods`.name,`foods`.price,`foods`.remarks,`foods`.image_path,`food_category`.category_name,
				 `food_category`.position FROM `foods` LEFT JOIN `food_category` ON `foods`.cat_id = `food_category`.id
				 WHERE visible=1
				  ORDER BY `food_category`.position,`foods`.name;";
		$result_foods = mysql_query($query);
		
		if (!empty($result_foods)){
			return $result_foods;
		}
	}
	
function redirect_to($page_to = NULL)	
	{
		if ($page_to != NULL){
			header("Location: {$page_to}");
			exit;
		}
	}

function get_customer_orders ($cust_id = NULL){
	if (!is_null($cust_id)){
		$query = "SELECT `customer_users`.id,`customer_users`.cust_id,`customers`.id,`customers`.name AS cust_name,`customers`.contacts,
				  `customers`.location, `orders`.id,`orders`.food_id,`orders`.quantity,`orders`.paid,`orders`.order_date,
				  `orders`.delivery_date, `foods`.id,`foods`.name AS food_name,`foods`.price,`foods`.cat_id, `food_category`.id,
				  `food_category`.category_name FROM `customer_users` 
				  INNER JOIN `customers` ON `customer_users`.cust_id = `customers`.id 
				  INNER JOIN `orders` ON `customer_users`.id = `orders`.cust_id 
				  INNER JOIN `foods` ON `orders`.food_id = `foods`.id 
				  INNER JOIN `food_category` ON `foods`.cat_id = `food_category`.id WHERE `customer_users`.id=".$cust_id."";
		$cust_orders = mysql_query($query);
		
		if (!empty($cust_orders)){
			return $cust_orders;
		}
	}
}

function update_order_number($month,$year){
	$query = "SELECT IFNULL(MAX(number),0)+1 AS order_no FROM orders_number WHERE (month='".mysql_real_escape_string($month)."') 
			  AND (year='".mysql_real_escape_string($year)."')";
	$query_run = mysql_query($query);
	if ($query_run){
		$order_no = mysql_result($query_run,0,'order_no');
		$query = "INSERT INTO `orders_number`(number,month,year) VALUES('".$order_no."','".$month."','".$year."');";
		$query_run = mysql_query($query);
	}
}

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
	$output .= "<a href=\"exams.php\"><li"; if($sm == "exams") { $output .= " class = \"selected\""; }$output .=">Exams</li></a>";
	$output .= "<a href=\"examresults.php\"><li"; if($sm == "examresults") { $output .= " class = \"selected\""; }$output .=">Exam Results</li></a>";
	$output .= "<a href=\"extracurriculum.php\"><li"; if($sm == "extracurriculum") { $output .= " class = \"selected\""; }$output .=">Extra Curriculum</li></a>";
	$output .= "<a href=\"fundsusage.php\"><li"; if($sm == "fundsusage") { $output .= " class = \"selected\""; }$output .=">Funds Usage</li></a>";
	$output .= "<a href=\"affiliations.php\"><li"; if($sm == "affiliations") { $output .= " class = \"selected\""; }$output .=">Affiliations</li></a>";
	$output .= "<a href=\"leavingrecords.php\"><li"; if($sm == "leavingrecords") { $output .= " class = \"selected\""; }$output .=">Leaving Records</li></a>";
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
?>