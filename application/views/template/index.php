<?php
include("part/head.php");
?>

<body class="hold-transition skin-yellow sidebar-mini fixed">
<div class="wrapper">

<?php
include("part/menu_atas.php");
include("part/menu_kiri.php");
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat datang di Aplikasi
        <small>Sistem Informasi Manajemen PUSKESMAS <b></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
		
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo $this->session->userdata('nama')." ".bulanindo(date('m')). " ". date('Y')?> </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">


		<div class="col-sm-4">
			  <!-- small box -->
			  <div class="small-box bg-yellow">
				<div class="inner">
				  <h3><?php echo $dashboard->umum?></h3>

				  <p>PASIEN UMUM</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="#" onclick="eksekusi_controller('index.php/pasien/data_list')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>

		<div class="col-sm-4">
			  <!-- small box -->
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3><?php echo $dashboard->bpjs?></h3>

				  <p>PASIEN BPJS</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="#" onclick="eksekusi_controller('index.php/pasien/data_list')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>

		<div class="col-sm-4">
			  <!-- small box -->
			  <div class="small-box bg-blue">
				<div class="inner">
				  <h3><?php echo $dashboard->umum+$dashboard->bpjs?></h3>

				  <p>SEMUA PASIEN BULAN INI</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="#" onclick="eksekusi_controller('index.php/pasien/data_list')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>

		
			
        </div>
		
        <!-- /.box-body -->
        <div class="box-footer">
          ------
        </div>
		
      </div>
      <!-- /.box -->
	  
	  
	  
	  
	</section>
	
	
    <!-- Main content -->
    <section class="content">
		
		
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        
		 <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">PENYAKIT TERBANYAK</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
              <br>
              <table class="table">
                <thead>
                  <th>No</th>
                  <th>Code</th>
                  <th>Diagnosa</th>
                  <th>Jumlah</th>
                </thead>
                <tbody>
                  <?php
                  $no=0; 
                    foreach ($diagnosa_terbanyak as $key) {
                      $no++;
                      echo "
                        <tr>
                          <td>$no</td>
                          <td>$key->code_diagnosa</td>
                          <td>$key->diagnosa</td>
                          <td>$key->jumlah</td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		
		
			
        </div>
		
        <!-- /.box-body -->
        <div class="box-footer">
          ------
        </div>
		
      </div>
      <!-- /.box -->
	  
	  
	  
	  
	</section>
	
	
	
	
	
 </div>
<?php
require_once("part/footer.php"); 
?>


<script>

<?php 
$label="";
$jumlah="";
foreach($diagnosa_terbanyak as $data)
{
	$label .= '"'.htmlentities($data->code_diagnosa).'",';
	$jumlah .= htmlentities($data->jumlah).',';
}

?>



 var areaChartData = {
      labels: [<?php echo $label?>],
      datasets: [
        {
          label: "Electronics",
		  
          backgroundColor: ["#f1c40f","#16a085","#3498db","#2ecc71","#2c3e50"],
		  borderColor: "#e67e22",
		  borderWidth: 2,
		  hoverBackgroundColor: "rgba(255,99,132,0.4)",
		  hoverBorderColor: "rgba(255,99,132,1)",
          data: [<?php echo $jumlah?>]
        }
      ]
    };

//-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
	
	barChartData.datasets[0].fillColor = ["#023e64","#034e7d","#035e96","#046daf","#047dc8","#058ce1","#059cfa","#1ea6fa","#37b0fb","#50bafb"];
    barChartData.datasets[0].strokeColor = "#00a65a";
    barChartData.datasets[0].pointColor = "#00a65a";

    
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      //scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      //legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };
	
	
	
	

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
</script>