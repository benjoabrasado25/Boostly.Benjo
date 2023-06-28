 jQuery(document).ready(function(){  

 	var amenities = [];
 	var is_amenities = false;

 	queryFromDB();

	jQuery('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:false,
	    dots: false,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:5
	        }
	    }
	})	  
	jQuery("#filterAmenities").click(function(){

		is_amenities = !is_amenities;

		console.log(is_amenities)

		if(is_amenities){
			// jQuery("#amenetyList").show();
			jQuery("#amenetyList").css("display", "block");
			console.log("show");

		}
		else{
			jQuery("#amenetyList").css("display", "none");
			// jQuery("#amenetyList").hide();
			console.log("hide");

		}
	})


	jQuery('input[name="listing_checkbox"').click(function(){

		if(!amenities.includes(jQuery(this).val())){
			amenities.push(jQuery(this).val())
		}
		else{
			let index = amenities.findIndex(x=> x === jQuery(this).val());
			amenities.splice(index , 1);
		}

		// queryFromDB();

		console.log("amenities", amenities)

	
	})

	function queryFromDB(){
		var test_data ={ 
            	city: jQuery("#city").val(),
            	amenities: amenities,
            	guests: jQuery("#guests").val(),
            	num_of_rooms: jQuery("#no_of_rooms").val(),
            }
       jQuery.ajax({  
            url:BENJOCPT_OPTIONS.controlNav+"/search-results.php",  
            method:"POST",  
            data: test_data,  
            success: function(data){  
            	console.log("123", test_data)
                jQuery('#main_container').html(data);

                console.log("City", jQuery("#city").val())
                 if(data=='Error1')  
                 {  
                      alert("Invalid File");  
                 }  
                 else if(data == "Error2")  
                 {  
                      alert("Please Select File");  
                 }                           
                 else if(data == "Success")  
                 {  
                     alert("CSV file data has been imported");  
                     jQuery('#upload_csv_form')[0].reset();
                 }  
                 else  
                 {  

                 }  
            }  
       }) 		
	}

	jQuery("#searchListing").click(function(){
		queryFromDB();
	});	
 })

