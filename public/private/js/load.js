$(function(){
	$.get("../../features/background/changeBg.php", function(data){
        $("head").append(data);
    });
	//$("head").append('../../features/background/changeBg.php');
	//$.get('../../features/background/changeBg.php', function(response) { 
	//	//alert(response); 
	//});
})