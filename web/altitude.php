
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
    captionpadding: "0",
    origw: "320",
    origh: "300",
    gaugeouterradius: "115",
    gaugestartangle: "270",
    gaugeendangle: "-25",
    showvalue: "1",
    valuefontsize: "30",
    majortmnumber: "13",
    majortmthickness: "2",
    majortmheight: "13",
    minortmheight: "7",
    minortmthickness: "1",
    minortmnumber: "1",
    showgaugeborder: "0",
    theme: "fusion"
  },
  
  colorrange: {
    color: [
      {
        minvalue: "0",
        maxvalue: "800",
        code: "#F6F6F6"
      },
      {
        minvalue: "800",
        maxvalue: "1000",
        code: "#999999"
      }
    ]
  },
  dials: {
    dial: [
      {
        value: "0",
        bgcolor: "#F20F2F",
        basewidth: "8"
      }
    ]
  },
  annotations: {
    groups: [
      {
        items: [
          {
            type: "text",
            id: "text",
            text: "meters",
            x: "$gaugeCenterX",
            y: "$gaugeCenterY + 40",
            fontsize: "20",
            color: "#555555"
          }
        ]
      }
    ]
  }
};

FusionCharts.ready(function() {
  var myChart = new FusionCharts({
    type: "angulargauge",
    renderAt: "chart-container",
    width: "70%",
    height: "70%",
    dataFormat: "json",
    id: 'myThm',
    dataSource,
    events : {
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
        xhttp.open("GET", "AltSystem.php");
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


