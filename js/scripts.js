
$(document).ready(function(){
	$("#amanda_loading").slideUp("fast");
	amandasays("Hello! I'm Amanda! What can I do for you?");

	$('#query').keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
				amanda();
		}
	});

});

function amanda(){
	var query = $("#query").val();
	query = $.trim(query);
	if( query == "" ){ 
		yousay("[said nothing]");
		amandasays("[silence is golden]");
		return
	}
	yousay(query);
	searchAmanda(query);
	$("#query").val("");
}




var answers = 0;

function yousay(saywhat){
	var ans_id = "ans" + answers;
	var saythat = "<div style='display: none;' id='" + ans_id + "' class='you_said'>" + saywhat + "</p>";
	answers ++;
	updateDialogue(saythat, ans_id);
}

function amandasays(saywhat){
	var ans_id = "ans" + answers;
	var saythat = "<div style='display: none;' id='" + ans_id + "' class='amanda_said'>" + saywhat + "</p>";
	answers ++;
	updateDialogue(saythat, ans_id);
}

function updateDialogue(addThis, ans_id){
	$("#amanda_says").append(addThis);
	$("#"+ans_id).slideDown("slow", function(){
		 $('#amanda_says').delay('200').animate({
    		scrollTop: $('#amanda_says').prop("scrollHeight")
    	}, 500);
	});
}

function searchAmanda(question){
	$("#amanda_loading").slideDown("fast");
	$.ajax({
		url: "amanda.php",
		type: "POST",
		data: { 
			query: question
		}, 
		success: function(data){
			$("#amanda_loading").slideUp("fast");
			amandasays(data);
		}
	});
}




function moreinfo(element){
	$(element).parent().find(".more_info").slideToggle("fast", function() {
		$('#amanda_says').delay('200').animate({
			scrollTop: $('#amanda_says').prop("scrollHeight")
		}, 500);
	});
}
