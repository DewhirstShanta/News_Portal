
     $(document).ready(function(){ 
          var mytime = Date.now()

             if(id != '')  
             {  
                  $.ajax({  
                       url:"fetch_details.php",  
                       method:"post",  
                       data:{search:mytime, id:id},  
                       dataType:"text",  
                       success:function(data)  
                       {  
                            $('#result').html(data);  
                       }  
                  });  
             }  
             else  
             {  
                  $('#result').html('');                 
             } 
     }); 

