<script type="text/javascript"> 
var massages=getElementById('massages');
var textbox=getElementById('textbox');
var button=getElementById('button');
button.addEventListener("click",function () {
	var newmassage=document.createElement("li");
	newmassage.innerHTML=textbox.value;
	massages.appendchild(newmassage);
    textbox.value="";

});
	</script>