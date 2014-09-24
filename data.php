<?php include "layout.php"; ?>
<?php include "header.php"; ?>
    <script type="text/javascript" src="Chart.js"></script>

	
		<div class="main">
			<div class="main-content">
                
                <div id="banner">
                    <h2>Welcome to Data Page</h2>
                </div>
                <br><br>
                <p id="results">Getting data...<br></p>
                
                <div class="charts">
                    <canvas id="myChart0" width="600" height="300"></canvas>
                    <canvas id="myChart1" width="600" height="300"></canvas>
                    <canvas id="myChart2" width="600" height="300"></canvas>
                </div>

                <script type="text/javascript">
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                    } else { // code for IE6, IE5
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange=function() {
                        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                            var dataReturn = xmlhttp.responseText;

                            var resultsArray = dataReturn.split(";");
                            var final2DArray = [];

                            for (var i = 0; i<resultsArray.length;i++){
                                final2DArray[i] = resultsArray[i].split(",");
                            } //10x11 2D Array now made

                            var printHeader = "<table id='dataTable;'>" +
                                "<tr><th>ReadingID</th><th>DateTime</th>" +
                                "<th>Gyro x</th><th>Gyro y</th><th>Gyro z</th>" +
                                "<th>Accel x</th><th>Accel y</th><th>Accel z</th>" +
                                "<th>Compass x</th><th>Compass y</th><th>Compass z</th></tr>";
                            var printData = "";
                            for (var x = 0; x < final2DArray.length; x++){
                                var printString = "<tr>";
                                for (var y = 0; y < final2DArray[x].length; y++){
                                    printString += "<td>" + final2DArray[x][y].toString() + "</td>";
                                }
                                printString += "</tr>";
                                if (printString != "<tr><td></td></tr>"){
                                    printData += printString;
                                }
                                printString = "";
                            }
                            printData += "</table>";
                            //prompt("printString:",printHeader + printData);
                            document.getElementById("results").innerHTML = printHeader + printData;

                            var sensorData = [];
                            for (var z = 0; z < 3; z++){
                                sensorData[z] = {
                                    labels : graphLabels(final2DArray),
                                    datasets : [
                                        {
                                            fillColor : "rgba(172,194,132,0)",
                                            strokeColor : "#ACC26D",
                                            pointColor : "#fff",
                                            pointStrokeColor : "#9DB86D",
                                            data : graphData(final2DArray, ((3*z)+2))
                                        },
                                        {
                                            fillColor : "rgba(172,194,132,0)",
                                            strokeColor : "#75A3FF",
                                            pointColor : "#fff",
                                            pointStrokeColor : "#6699FF",
                                            data : graphData(final2DArray, ((3*z)+2)+1)
                                        },
                                        {
                                            fillColor : "rgba(172,194,132,0)",
                                            strokeColor : "	#FFD119",
                                            pointColor : "#fff",
                                            pointStrokeColor : "#FFCC00",
                                            data : graphData(final2DArray, ((3*z)+2)+2)
                                        }
                                    ]
                                };
                            }
                            var ctx0 = document.getElementById("myChart0").getContext("2d");
                            var myCharts0 = new Chart(ctx0).Line(sensorData[0]);

                            var ctx1 = document.getElementById("myChart1").getContext("2d");
                            var myCharts1 = new Chart(ctx1).Line(sensorData[1]);

                            var ctx2 = document.getElementById("myChart2").getContext("2d");
                            var myCharts2 = new Chart(ctx2).Line(sensorData[2]);
                        }
                    };
                    xmlhttp.open("GET","dbConnect.php",true);
                    xmlhttp.send();

                    function graphData(arrayInput, j){
                        var dataArray = [];
                        for (var i = 0; i < 10; i++){
                            dataArray[i] = parseInt(arrayInput[9-i][j]);
                        }
                        return dataArray;
                    }

                    function graphLabels(arrayInput){
                        var labelArray = [];
                        for (var i = 0; i < 10; i++){
                            labelArray[i] = arrayInput[9-i][1].toString().slice(-8);
                        }
                        return labelArray;
                    }

				</script>

			</div><!-- end main-content -->
		</div><!-- end main wrap -->
	</div><!-- end page wrap -->





<?php include "footer.php"; ?>