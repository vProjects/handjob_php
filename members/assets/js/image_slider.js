/*
- Document for creating the image slider
- Auth Singh
*/


$( document ).ready(function() {
    i=0;
    $('.left-arrow').click(function(){
        if(i<0){
            alert('first Image');
            i++;
            alert(i);
        }
        var newimage = $('#bodyContainer ul li')[i].innerHTML;
        $('.slider_container img').attr('src' ,newimage)
        var newimg = $('.slider_container img').attr('src');
        i--;
    });
    
    $('.right-arrow').click(function(){
        alert(i);
        var newimage = $('#bodyContainer ul li')[i].innerHTML;
        $('.slider_container img').attr('src' ,newimage)
        var newimg = $('.slider_container img').attr('src');
        i++;        
    });
    
});
