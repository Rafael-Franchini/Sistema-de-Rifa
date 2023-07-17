$(function(){
    $.ajax({
        url: "listar.php",
    }).done(function(data){
        $('.conteudo').html(data);
    });
});