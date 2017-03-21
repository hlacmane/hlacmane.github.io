function Edit_Profile_Handler(event){
	console.log("link clicked");
	$("#changesForm input").prop("disabled", false); //used to enable the fields for the forms
	$("#changesForm select").prop("disabled", false);
}


/**
 * The code below does 2 things, firstly disables the fields in the form for the user, so to show editting it currently turned off. The second is to make an ajax request to an 
 * external php file using data gathered from the current page and posted to the external file, this is used to override the normal php post function which would run without
 * javascript.
 *
 */


function Save_Changes_Handler(event){
	console.log("changes saved");
	$("#changesForm input").prop("disabled", true);
	$("#changesForm select").prop("disabled", true);
	var data = {"age": $('#ageValue').val(), "gender": $('#genderValue').val(), "location": $('#locationValue').val(), "website": $('#websiteValue').val(), "phoneno": $('#phonenoValue').val(), "prefrole":$('#prefroleValue').val(), "prefsalary":$('#prefsalaryValue').val(), "linkedin":$('#linkedinValue').val()}
	$.post("./candedittingprofileajax.php", data, function(result){
		console.log(data);
		console.log(result);
		if(result == true){
			location.reload(true);
		}
	});
}


/*
simple javascript for making the form disabled or enabled depending on whether the candidate is editting his profile or not, can be removed or changed if not necessary  

*/

$(document).ready(function (){
	console.log("page ready");
	$("a#editProfLink").on("click", Edit_Profile_Handler); //if you click on the edit profile link, run the fucnction "Edit_Profile_Handler"
	$("#savechanges").on("click", Save_Changes_Handler); //if you click on the Save changes button, run the fucnction "Save_Changes_Handler"
})