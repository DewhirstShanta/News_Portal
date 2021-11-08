
 
  

           setInterval(function(){ 
               var mytime = Date.now()

                  if(mytime != '')  
                  {  
                       $.ajax({  
                            url:"fetch.php",  
                            method:"post",  
                            data:{search:mytime},  
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
           }, 10000); 


 
  

