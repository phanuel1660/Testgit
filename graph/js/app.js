$(document).ready(function(){
	$.ajax({
		url:"http://localhost/chartsjs/data.php",
		method:"GET",
		success:function(data){
			console.log(data);
			var forms=[];
			var score =[];
			for(var i in data){
				forms.push("FORM"+"   "+data[i].form);
				score.push(data[i].marks);
			}
			var chartdata={
				labels:forms,
				datasets:[
                  {
                  	label:'MEAN SCORE',
                  	backgroundColor:'brown',
                  	borderColor:'red',
                  	hoverBackgroundColor:'cyan',
                  	hoverBorderColor:'rgba(200,200,200,1)',
                  	data:score
                  }
				]
			};
			var ctx= $("#mycanvas");
			var barGraph= new Chart(ctx,{
				type:'bar',
				data:chartdata
			});
     },
     error:function(data){
      console.log(data);
    }
  });
});