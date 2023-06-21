 jQuery(document).ready(function(){  
      jQuery('#upload_csv_form').on("submit", function(e){  
           e.preventDefault(); //form will not submitted  
           jQuery.ajax({  
                url:SLIDER_OPTIONS.controlNav+"upload.php",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,          // The content type used when sending data to the server.  
                cache:false,                // To unable request pages to be cached  
                processData:false,          // To send DOMDocument or non processed data file it is set to false  
                success: function(data){  
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
      });  
 }); 