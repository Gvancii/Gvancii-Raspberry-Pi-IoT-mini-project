
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

      <div id="chart-container" class="container">Live Temperature Measurements</div>



      <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
      <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
      <script type="text/javascript">
        FusionCharts.ready(function() {
          var chart = new FusionCharts({
              type: 'thermometer',
              renderAt: 'chart-container',
              id: 'myThm',
              width: '270',
              height: '500',
              dataFormat: 'json',
              dataSource: {
                "chart": {
                  "caption": "Temperature Monitor",
                  "subcaption": "",
                  "lowerLimit": "0",
                  "upperLimit": "40",
                  "numberSuffix": "°C",
                  "showhovereffect": "1",
                  "thmFillColor": "#008ee4",
                  "showGaugeBorder": "1",
                  "gaugeBorderColor": "#008ee4",
                  "gaugeBorderThickness": "2",
                  "gaugeBorderAlpha": "30",
                  "thmOriginX": "100",
                  "theme": "fint"
                },
                "value": "0",
                //All annotations are grouped under this element
                "annotations": {
                  "showbelow": "0",
                  "groups": [{
                    //Each group needs a unique ID
                    "id": "indicator",
                    "items": [
                      //Showing Annotation
                      {
                        "id": "background",
                        //Polygon item 
                        "type": "rectangle",
                        "alpha": "50",
                        "fillColor": "#AABBCC",
                        "x": "$gaugeEndX-35",
                        "tox": "$gaugeEndX",
                        "y": "$gaugeEndY+55",
                        "toy": "$gaugeEndY+72"
                      }
                    ]
                  }]

                },
              },
              "events": {
                "rendered": function(evt, arg) {
                  var chargeInterval = setInterval(function() {
                    var temp = table();
                    FusionCharts.items["myThm"].feedData("&value=" + temp);
                  }, 1000);
                }
              }
            })
            .render();
        });
      </script>


      <body onload="table();">
        <script type="text/javascript">
          function table() {

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
              document.getElementById("test1").innerHTML = this.responseText;
            }
            xhttp.open("GET", "TempSystem.php");
            xhttp.send();
            return document.getElementById("test1").innerHTML;
          }

          setInterval(function() {
            table();
          }, 1000);
        </script>
        <textarea hidden="hidden" id="test1">

    </textarea>
      </body>



    </div>



    <!-- END PAGE CONTENT -->
  </div>


