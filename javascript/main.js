$(document).ready(function (){
	
});

function loadCourses(){
	var currentSchool = $("#school_id option:selected").val();
     $.ajax({    //create an ajax request to load_page.php
        type: "POST",
        url: "../includes/functions.php",             
        dataType: "html",   //expect html to be returned
		data:{"function" : "get_courses", "parameter" : currentSchool } ,          
        success: function(response){
			$("#course").html("");                    
            $("#course").append(response);
			alert(response);
        }
	 });
}

