/*
- Document for creating the image slider
- Auth Singh
*/


$( document ).ready(function() {
    i=1;
    $('.left-arrow').click(function(){
        if(i<1){
            
            i++;
        }
       
        var newimage = $('#bodyContainer ul li')[i].innerHTML;
        $('.slider_container img').attr('src' ,newimage);
        if(i== 1){
           
        }
        else
            i--;
    });
    
    $('.right-arrow').click(function(){
        
        var newimage = $('#bodyContainer ul li')[i].innerHTML;
        $('.slider_container img').attr('src' ,newimage);
        i++; 
            
    });
    
});
