$(document).ready(function(){
	$.ajax({
		url:"http://localhost/charts/data.php",
		method:"GET",
		success:function(data){
			console.log(data);
          var player=[];
          var score=[];
          for(var i in data){
          	player.push("player"+data[i].playerid);
          	score.push(data[i].score);
          }
          var chartdata={
          	labels:player,
          	datasets:[
                {
                	label:'player score',
                	backgroundColor:'rgba(200,200,200,0.75)',
                	boderColor:'rgba(200,200,200,0.75)',
                	hoverBackgroundColor:'rgba(200,200,200,1)',
                	hoverBorderColor:'rgba(200,200,200,1)',
                	data:score
                }
          	]
          };
          var ctx=$("#mycanvas");
          var barGraph=new Chart(ctx,{
          	type:'bar',
          	data: chartdata
          });
		},
         error:function(data){
         	console.log(data);
         }
	});
});