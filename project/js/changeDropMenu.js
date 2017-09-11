photography=new Array("portrait","people","still life","sport","nature");
painting = new Array("oil","acrylic","pastel","watercolor","ink", "hot wax");
recipes = new Array("north indian","south indian","chinese","italian","magolian");
film_animation = new Array("short film","documentary","advertisement","miscellaneous");
literature = new Array("poem","article","essay","short story");
fashion = new Array("shoes","clothing","accessories");
craft = new Array("basketry and weaving","ceramics","pottery and clay","cullinary arts","miscellaneous");


populateSelect();
$(document).ready(function(){

      $('#category').change(function(){
        populateSelect();
    });
    
});


function populateSelect(){
    category=$('#category').val();
    $('#subcat').html('');
    
    
    if(category=='photography'){
        photography.forEach(function(t) { 
            $('#subcat').append('<option value='+t+'>'+t+'</option>');
        });
    }
    
     if(category=='painting'){
        painting.forEach(function(t) { 
            $('#subcat').append('<option value='+t+'>'+t+'</option>');
        });
    }
	
	 if(category=='recipes'){
        recipes.forEach(function(t) { 
            $('#subcat').append('<option value='+t+'>'+t+'</option>');
        });
    }
	
	 if(category=='film_animation'){
        film_animation.forEach(function(t) { 
            $('#subcat').append('<option value='+t+'>'+t+'</option>');
        });
    }
	
	 if(category=='literature'){
        literature.forEach(function(t) { 
            $('#subcat').append('<option value='+t+'>'+t+'</option>');
        });
    }
	
	 if(category=='fashion'){
        fashion.forEach(function(t) { 
            $('#subcat').append('<option value='+t+'>'+t+'</option>');
        });
    }
	
	 if(category=='craft'){
        craft.forEach(function(t) { 
            $('#subcat').append('<option value='+t+'>'+t+'</option>');
        });
    }
	
	 if(category=='default'){
        $('#subcat').append('<option value="defaultsub" selected="selected">Select subcategory</option>');
     }
	
    
}



 
