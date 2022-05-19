
$(document).ready(function(){
document.getElementById("mainbtn").addEventListener('click', function () {
	
	$(".search-description").slideToggle(100);
});

$(".search-description li").click(function () {
	var target = $(this).html();
	var toRemove = "in ";
	var newTarget = target.replace(toRemove, "");
	//remove spaces
	newTarget = newTarget.replace(/\s/g, "");
	$(".search-large").html(newTarget);
	$(".search-description").hide();
	$(".main-input").hide();
	newTarget = newTarget.toLowerCase();
	$(".main-input").show();
});
$("#main-submit-mobile").click(function () {
	$("#main-submit").trigger("click");
});
$(window).resize(function () {
	
});





});
function clearText(thefield) {
	if (thefield.defaultValue == thefield.value) {
		thefield.value = "";
	}
}

function replaceText(thefield) {
	if (thefield.value == "") {
		thefield.value = thefield.defaultValue;
	}
}
