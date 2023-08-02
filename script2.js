$(function(){
    
        $.ajax({
            url: "sortear.php",
        }).done(function(data){
            $('.sort').html(data);
        });
    
});