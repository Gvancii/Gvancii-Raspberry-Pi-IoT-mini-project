
<?php
include('common/head.php');
include('common/header.php');

?>
<style>
  
  @import url("css/style.css");

  .container {
    
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>




  <!-- Page Content -->
  <div class="w3-padding-large" id="main">


    <!-- About Section -->
    <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">

     
<?php
include 'db.php';
$conn = OpenCon();
?>
<div id="chart-container" class="container"></div>


<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
<script type="text/javascript">
 




   
 const dataSource = {
  chart: {
    caption: "Live Pressure Measurements",
    lowerlimit: "0",
    upperlimit: "1500",
    showvalue: "1",
    numbersuffix: "hpa",
    theme: "fusion",
    showtooltip: "0"
  },
  colorrange: {
    color: [
      {
        minvalue: "0",
        maxvalue: "500",
        code: "#F2726F"
      },
      {
        minvalue: "500",
        maxvalue: "1000",
        code: "#FFC533"
      },
      {
        minvalue: "1000",
        maxvalue: "1500",
        code: "#62B58F"
      }
    ]
  },
  dials: {
    dial: [
      {
        value: "0"
      }
    ]
  }
};

FusionCharts.ready(function() {
  var myChart = new FusionCharts({
    type: "angulargauge",
    renderAt: "chart-container",
    width: "60%",
    height: "70%",
    dataFormat: "json",
    id: 'myThm',
    dataSource,
    events :{
            "rendered" : function (evt, arg) {
                var chargeInterval = setInterval( function(){
                    var temp = table();
                    FusionCharts.items["myThm"].feedData("&value="+temp);
                }, 1000);
            }   
        }
  }).render();
});
</script>


<body onload = "table();">
    <script type="text/javascript">
      function table(){
        
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
          document.getElementById("test1").innerHTML = this.responseText;
        }
        xhttp.open("GET", "PreSystem.php");
        xhttp.send();
        return document.getElementById("test1").innerHTML;
      }

      setInterval(function(){
        table();
      }, 1000);
    </script>
    <textarea hidden="hidden"  id="test1">

    </textarea>
  </body>



    </div>



    <!-- END PAGE CONTENT -->
  </div>


