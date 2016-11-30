

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
	} 

//blink effect
  setInterval(function(){
    $('.blink').fadeOut(1000);
    $('.blink').fadeIn(1000);
  },1000);

function updateView(x){
	var info =x;
	document.getElementById('addFNView').innerHTML=x;
}

	function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img=document.getElementById("displayPic");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function(aImg) {
                return function(e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }

$(function(){
            //editing field...
    $('.editfield').jqte();

	setInterval(function(){
		$('.rotMe').fadeOut(1000);
		$('.rotMe').fadeIn(1000);
	},3000);


//send bulk message code
$('#sendMessageBtn').click(function(){
	//alert($('#message').val());
	var topic=$('#topic').val();
	var message=$('#message').val();
	$.post('ajax.php',{'sendBulkMsg':message,'topic':topic},function(data){
		if(data==1){
			$('#msgResult').html("<center><span style='color: #035888'>Message sent!!!</span></center>").fadeOut(5000);
			document.getElementById('message').value=" ";
			document.getElementById('topic').value=" ";
		}else{
			$('#msgResult').html("<center><span style='color: red'>Message not sent!! Try again</span></center>").fadeOut(5000);
		}
	});
});

}); 
