$(document).ready(function(){
	$.ajax({
		url : "http://192.168.0.175:90/MC_loader/data.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var sec_val = [];
			var requests = [];

			for(var i in data) {
				sec_val.push("Second : "+data[i].sec_val);
				requests.push(data[i].cnt);
			}

			var chartdata = {
				labels: sec_val,
				datasets: [
					{
						label: "Requests/s",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: requests
					},
					{
						// label: "second",
						fill: false,
						lineTension: 0.1,
						// backgroundColor: "rgba(29, 202, 255, 0.75)",
						// borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: sec_val
					}
				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});