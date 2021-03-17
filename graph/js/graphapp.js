$(document).ready(function(){
	$.ajax({
		url:"http://localhost/chartsjs/graphdata.php",
		method:"GET",
		success:function(data){
			console.log(data);
			var month=[];
			var total =[];
			for(var i in data){
				month.push(data[i].month_name);
				total.push(data[i].total);
			}
			var chartdata={
				labels:month,
				datasets:[
                  {
                  	label:'Total litres sold',
                  	backgroundColor:'#ffa62f',
                  	borderColor:'green',
                  	hoverBackgroundColor:'cyan',
                  	hoverBorderColor:'rgba(200,200,200,1)',
                  	data:total
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