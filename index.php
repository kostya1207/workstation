<?php
  include ('header.php');
  $user_id = $_SESSION['login_user_id'];

  $query = "select max(age) from financial where user_id = '$user_id'";
  $result = mysqli_query($conn,$query);
  $row = $result->fetch_row();
  $max_age = $row[0];

  $query = "select * from financial where user_id = '$user_id'";
  $result = mysqli_query($conn,$query);
  $rows_num = mysqli_num_rows($result);
  $chart_age = "";
  $chart_total_networth = "";
  $chart_total_networth1 = "";
  $chart_roi = "";
  while ($row = mysqli_fetch_assoc($result)) {
    $roi = floatval($row["total_networth"]) * floatval($row["percentage"]) / 100;
    $total_networth1 = round((floatval($row["total_networth"]) + floatval($roi)),2);
    $chart_age .= "'".$row["age"]."',";
    $chart_total_networth .= $row["total_networth"].",";
    $chart_total_networth1 .= $total_networth1.",";
    $chart_roi .= $roi.",";
  }
?>
    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {

      var area_zoom_element = document.getElementById('financial_chart');
      // Zoom option
      if (area_zoom_element) {

          // Initialize chart
          var area_zoom = echarts.init(area_zoom_element);


          //
          // Chart config
          //

          // Options
          area_zoom.setOption({

              // Define colors
              color: ['#b6a2de','#26A69A','#ffb980','#d87a80'],

              // Global text styles
              textStyle: {
                  fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                  fontSize: 13
              },

              // Chart animation duration
              animationDuration: 750,

              // Setup grid
              grid: {
                  left: 0,
                  right: 40,
                  top: 35,
                  bottom: 60,
                  containLabel: true
              },

              // Add legend
              legend: {
                  data: ['Networth (start of Year)', 'Networth (end of Year)', 'Return On Investments (ROI)'],
                  itemHeight: 8,
                  itemGap: 20
              },

              // Add tooltip
              tooltip: {
                  trigger: 'axis',
                  backgroundColor: 'rgba(0,0,0,0.75)',
                  padding: [10, 15],
                  textStyle: {
                      fontSize: 13,
                      fontFamily: 'Roboto, sans-serif'
                  }
              },

              // Horizontal axis
              xAxis: [{
                  type: 'category',
                  boundaryGap: false,
                  axisLabel: {
                      color: '#333'
                  },
                  axisLine: {
                      lineStyle: {
                          color: '#999'
                      }
                  },
                  data: [
                    <?php echo $chart_age;?>
                  ]
              }],

              // Vertical axis
              yAxis: [{
                  type: 'value',
                  axisLabel: {
                      formatter: '{value} ',
                      color: '#333'
                  },
                  axisLine: {
                      lineStyle: {
                          color: '#999'
                      }
                  },
                  splitLine: {
                      lineStyle: {
                          color: '#eee'
                      }
                  },
                  splitArea: {
                      show: true,
                      areaStyle: {
                          color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                      }
                  }
              }],

              // Zoom control
              dataZoom: [
                  {
                      type: 'inside',
                      start: 30,
                      end: 70
                  },
                  {
                      show: true,
                      type: 'slider',
                      start: 30,
                      end: 70,
                      height: 40,
                      bottom: 0,
                      borderColor: '#ccc',
                      fillerColor: 'rgba(0,0,0,0.05)',
                      handleStyle: {
                          color: '#585f63'
                      }
                  }
              ],

              // Add series
              series: [
                  {
                      name: 'Networth (start of Year)',
                      type: 'line',
                      smooth: true,
                      symbolSize: 6,
                      areaStyle: {
                          normal: {
                              opacity: 0.25
                          }
                      },
                      itemStyle: {
                          normal: {
                              borderWidth: 2
                          }
                      },
                      data: [<?php echo $chart_total_networth;?>]
                  },{
                      name: 'Networth (end of Year)',
                      type: 'line',
                      smooth: true,
                      symbolSize: 6,
                      areaStyle: {
                          normal: {
                              opacity: 0.25
                          }
                      },
                      itemStyle: {
                          normal: {
                              borderWidth: 2
                          }
                      },
                      data: [<?php echo $chart_total_networth1;?>]
                  },
                  {
                      name: 'Return On Investments (ROI)',
                      type: 'line',
                      smooth: true,
                      symbolSize: 6,
                      areaStyle: {
                          normal: {
                              opacity: 0.25
                          }
                      },
                      itemStyle: {
                          normal: {
                              borderWidth: 2
                          }
                      },
                      data: [<?php echo $chart_roi;?>]
                  }
              ]
          });
      }

      var triggerChartResize = function() {
          area_zoom_element && area_zoom.resize();
      };

      // On sidebar width change
      $(document).on('click', '.sidebar-control', function() {
          setTimeout(function () {
              triggerChartResize();
          }, 0);
      });

      // On window resize
      var resizeCharts;
      window.onresize = function () {
          clearTimeout(resizeCharts);
          resizeCharts = setTimeout(function () {
              triggerChartResize();
          }, 200);
      };

    });
    </script>
    <!-- Area zoom -->
  <?php if($rows_num > 0){?>
    <div class="alert bg-success alert-rounded">
      <button type="button" class="close" data-dismiss="alert"><span style="font-size: 24px;">×</span><span class="sr-only">Close</span></button>
      <span class="text-semibold" style="font-size: 18px;">
        You can retire at age <?php echo $max_age;?> when your return on investment will cobver your current expenses.
      </span>
    </div>
  <?php }?>
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h5 class="panel-title">Financial Chart</h5>
        <div class="heading-elements">
          <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
            <li><a data-action="close"></a></li>
          </ul>
        </div>
      </div>

      <div class="panel-body">
        <div class="chart-container">
          <div class="chart has-fixed-height" id="financial_chart"></div>
        </div>
      </div>
    </div>
    <!-- /area zoom -->
    
    <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">Financial List<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
      <div class="heading-elements">
        <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
              </ul>
          </div>
    </div>

    <div class="table-responsive" style="padding: 20px;"> 
      <table class="table">
        <thead>
          <tr>
            <th>End Of Year</th>
            <th>Income</th>
            <th>Expenses</th>
            <th>Networth (start of Year)</th>
            <th>Networth (end of Year)</th>
            <th>Return On Investments (ROI)</th>
            <th>Percent Of Expenses Covered By ROI</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $user_id = $_SESSION['login_user_id'];
          $query = "select * from financial where user_id = '$user_id'";
          $result = mysqli_query($conn,$query);
          $rows_num = mysqli_num_rows($result);

          while ($row = mysqli_fetch_assoc($result)) {
            $roi = round((floatval($row["total_networth"]) * floatval($row["percentage"]) / 100),2);
        ?>
          <tr>
            <td><?php echo $row["age"];?></td>
            <td><?php echo number_format($row["ann_total_income"], 2, '.', ',');?></td>
            <td><?php echo number_format($row["ann_total_expenses"], 2, '.', ',');?></td>
            <td><?php echo number_format($row["total_networth"], 2, '.', ',');?></td>
            <td><?php echo number_format(round((floatval($row["total_networth"]) + floatval($roi)),2), 2, '.', ',');?></td>
            <td><?php echo number_format($roi, 2, '.', ',');?></td>
            <td><?php 
                if ($row["ann_total_expenses"] != 0) {
                  echo round(floatval($roi) * 100 / floatval($row["ann_total_expenses"]),2);
                }else{
                  echo 0;
                }
              ?>%
            </td>
          </tr>
        <?php
          }
        ?>
        </tbody>
      </table>
      <div class="text-right" style="margin: 30px;">
      </div>
    </div>
  </div>
<?php
  include ('footer.php');
?>



