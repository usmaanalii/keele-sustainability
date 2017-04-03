<html>
	<head>
		<link rel="stylesheet" type="text/stylesheet" href="stylesheet.css" />
		<script type="text/javascript" src="Chart.bundle.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	</head>
	<body>
        <form id="yearsel">
            <select id="yearsal" name="year">
            </select>
        </form>
		<div class="lineChart">
			<h2> Chart.js - Line Line chart demo</h2>
			<div>
				<canvas id="myChart"></canvas>
				<script>
                    function chartmake(nameput, dataput){
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: [ "September",
                                            "October",
                                            "November",
                                            "December",
                                            "January", 
                                            "February",
                                            "March",
                                            "April",
                                            "May",
                                            "June",
                                            "July",
                                            "August"],
                                datasets: [{
                                    label: nameput,
                                    data: dataput,
                                    backgroundColor: "rgba(153,153,51,0.6)"
                                }]
                            }
                        });
                    }
                    $(function() {
                        $.post("graph.php", "y", function(data){
                            $years = JSON.parse(data);
                            $.each($years, function(i, value){
                                $("#yearsal").append($("<option>").text((value)-1).attr("value", value));
                                    var year = $("#yearsal").val();
                                    var name = 'Paper ' + (year-1);
                                    $.post("graph.php", "i=" + year, function(data){
                                        var chartdata = (JSON.parse(data));
                                        chartmake(name, chartdata);
                                        });
                            });
                        });
                        $("#yearsel").on("change load", function() {
                            var year = $("#yearsal").val();
                            var name = 'Paper ' + (year-1);
                            $.post("graph.php", "i=" + year, function(data){
                                var chartdata = (JSON.parse(data));
                                chartmake(name, chartdata);
                            });
                        });
                    });
				</script>
			</div>
		</div>
	</body>
</html>
