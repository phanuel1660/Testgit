<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function starTime(){
			var today =new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById('txt').innerHTML =h+":"+m+":"+s;
			var t = starTimeout(starTime, 500);
		}
		function checkTime(i){
			if(i<10){i="0"+i};
			return i;
		}
	</script>
</head>
<body onload="starTime()">
<div id="txt"></div>
<style type="text/css">
	#txt{
		color: cyan;
		text-align: center;
		padding-top: 25%;
		font-weight: bold;
		font-size: 55px;
	}
</style>
</body>
</html>