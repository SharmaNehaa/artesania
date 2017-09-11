displayFields();
$(document).ready(function(){
	
  	  /*$('#sale').hide();*/
  	  
      $("#uploadInfo input[name='on_sale']").click(function(){

        displayFields();
    });
    
});


function displayFields(){

	if($("#uploadInfo input[name='on_sale']:checked").val() == "yes") {

  		$("#sale").css("display", "block");
	}
	
	else if($("#uploadInfo input[name='on_sale']:checked").val() == "no") {

  		$("#sale").css("display", "none");
	}

}	
