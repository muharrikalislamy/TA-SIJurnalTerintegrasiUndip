<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/alte/bower_components/jquery/dist/jquery.min.js') ?>"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/alte/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/alte/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>

<!-- Sparkline -->
<script src="<?php echo base_url('assets/alte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>

<!-- jvectormap -->
<script src="<?php echo base_url('assets/alte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/alte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/alte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>

<!-- Slimscroll -->
<script src="<?php echo base_url('assets/alte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>

<!-- FastClick -->
<script src="<?php echo base_url('assets/alte/bower_components/fastclick/lib/fastclick.js') ?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/alte/dist/js/adminlte.min.js') ?>"></script>

<!-- ChartJS -->
<script src="<?php echo base_url('assets/alte/bower_components/chart.js/Chart.js') ?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/alte/dist/js/demo.js') ?>"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/alte/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script> -->
<script src="<?php echo base_url('assets/alte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

<!-- DataTables Coba -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="<?php echo base_url('assets/charts/') ?>/highcharts.js"></script>
<!-- <script src="<?php echo base_url('assets/template/back/bower_components') ?>/Chart.js/Chart.js"></script> -->

<!-- FLOT CHARTS -->
<script src="<?php echo base_url('assets/alte/bower_components/Flot/jquery.flot.js') ?>"></script>

<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url('assets/alte/bower_components/Flot/jquery.flot.resize.js') ?>"></script>

<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url('assets/alte/bower_components/Flot/jquery.flot.pie.js') ?>"></script>

<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url('assets/alte/bower_components/Flot/jquery.flot.categories.js') ?>"></script>

<script>
  $(document).ready(function() {
    $('#myModal').modal('show');
  });
</script>

<script>
  function confirmDelete() {
    return confirm('Apakah anda yakin ingin menghapus data ini? \nAnda tidak bisa mengembalikan data yang telah dihapus')
  }
</script>

<!-- page script -->
<script>
  $(document).ready(function() {
    $('#penilaian-alternatif-belum').dataTable({
      'paging': false,
      'lengthChange': true,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#penilaian-alternatif-sudah').dataTable({
      'paging': false,
      'lengthChange': true,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#eva-home-belum').dataTable({
      'paging': false,
      'lengthChange': true,
      'searching': false,
      'ordering': false,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#eva-home-sudah').dataTable({
      'paging': false,
      'lengthChange': true,
      'searching': false,
      'ordering': false,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#log-penilaian-pi').dataTable({
      'paging': true,
      'lengthChange': true,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#nilai-murni-e').dataTable({
      'pageLength': 39,
      'lengthChange': true,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#data-jurnalenglish').dataTable({
      'pageLength': 39,
      'lengthChange': true,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': true,
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    })
  })

  $(document).ready(function() {
    $('#data-jurnalakreditasi').dataTable({
      'pageLength': 39,
      'lengthChange': true,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': true,
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    })
  })

  $(document).ready(function() {
    $('#data-jurnalpengindeks').dataTable({
      'pageLength': 39,
      'lengthChange': true,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': true,
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    })
  })

  $(document).ready(function() {
    $('#data-jurnalrekomendasi').dataTable({
      'pageLength': 39,
      'lengthChange': true,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': true,
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    })
  })
</script>


<script>
  $(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-------------
    //- PIE CHART -
    //-------------
    var bobotGraphPieJurnalFakultas = '<?= isset($bobotGraphPieJurnalFakultas) ? $bobotGraphPieJurnalFakultas : null ?>';
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#jurnalfakultaspieChart').get(0).getContext('2d')
    var pieChart = new Chart(pieChartCanvas)
    var PieData = JSON.parse(bobotGraphPieJurnalFakultas)
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
  })
</script>


<script>
  var graphDataJurnalAkreditasiPerTahun = '<?php echo isset($graphDataJurnalAkreditasiPerTahun) ? $graphDataJurnalAkreditasiPerTahun : null ?>';
  var jurTahun = JSON.parse(graphDataJurnalAkreditasiPerTahun);
  Highcharts.chart('jurnalakreditasipertahun', {
    title: {
      text: 'Grafik Jurnal Terkareditasi Per Tahun'
    },

    subtitle: {
      text: ''
    },

    xAxis: {
      categories: jurTahun.tahun,
      title: {
        text: 'Tahun Penerbitan',
        style: {
          color: Highcharts.getOptions().colors[1]
        },
      }
    },
    tooltip: {
      // headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:#000"></span><b>{point.y:.0f}</b><br/>'
    },
    yAxis: {
      categories: jurTahun.count,
      title: {
        text: 'Jumlah Jurnal',
        style: {
          color: Highcharts.getOptions().colors[1]
        },
      },
      min: 0,
      tickInterval: 5,
    },

    series: [{

      type: 'column',
      colorByPoint: true,
      data: jurTahun.count,
      showInLegend: false
    }]
  });
</script>


<script>
  $(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-------------
    //- PIE CHART -
    //-------------
    var bobotGraph = '<?= isset($bobotGraph) ? $bobotGraph : null ?>';
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart = new Chart(pieChartCanvas)
    var PieData = JSON.parse(bobotGraph)
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var areaChartData = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
          label: 'Electronics',
          fillColor: 'rgba(210, 214, 222, 1)',
          strokeColor: 'rgba(210, 214, 222, 1)',
          pointColor: 'rgba(210, 214, 222, 1)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label: 'Digital Goods',
          fillColor: 'rgba(60,141,188,0.9)',
          strokeColor: 'rgba(60,141,188,0.8)',
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    }

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChart = new Chart(barChartCanvas)
    var barChartData = areaChartData
    barChartData.datasets[1].fillColor = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor = '#00a65a'
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: 'rgba(0,0,0,.05)',
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
      legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>


<script>
  var graphDataJurnalAkreditasiByPenerbitSinta = '<?= isset($graphDataJurnalAkreditasiByPenerbitSinta) ? $graphDataJurnalAkreditasiByPenerbitSinta : null ?>';
  var jurPenerbitSinta = JSON.parse(graphDataJurnalAkreditasiByPenerbitSinta);
  console.log(jurPenerbitSinta);
  Highcharts.chart('jurnalPenerbitSinta', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Jurnal Undip Terakreditasi Berdasarkan Peringkat Sinta Per Fakultas'
    },
    xAxis: {
      categories: jurPenerbitSinta.categories,
      title: {
        text: 'Fakultas'
      },
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Jumlah Jurnal'
      },
      min: 0,
      tickInterval: 5,
      stackLabels: {
        enabled: true,
        style: {
          fontWeight: 'bold',
          color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
        }
      }
    },
    legend: {
      align: 'right',
      x: -30,
      verticalAlign: 'top',
      y: 25,
      floating: true,
      backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
      borderColor: '#009d00',
      borderWidth: 1,
      shadow: false
    },
    tooltip: {
      headerFormat: '<b>{point.x}</b><br/>',
      pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
      column: {
        stacking: 'normal',
        dataLabels: {
          enabled: true,
          color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
        }
      }
    },
    series: jurPenerbitSinta.series,
  });
</script>

<script>
  var graphDataJurnalAkreditasiByPenerbitSintaByTahun = '<?= isset($graphDataJurnalAkreditasiByPenerbitSintaByTahun) ? $graphDataJurnalAkreditasiByPenerbitSintaByTahun : null ?>';
  var jurPenerbitSintaByTahun = JSON.parse(graphDataJurnalAkreditasiByPenerbitSintaByTahun);
  Highcharts.chart('jurPenerbitSintaByTahun', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Grafik Jurnal Terakreditasi Sinta Per Tahun'
    },
    xAxis: {
      categories: jurPenerbitSintaByTahun.categories,
      title: {
        text: 'Tahun Penerbitan'
      },
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Jumlah Jurnal'
      },
      min: 0,
      tickInterval: 5,
      stackLabels: {
        enabled: true,
        style: {
          fontWeight: 'bold',
          color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
        }
      }
    },
    legend: {
      align: 'right',
      x: -30,
      verticalAlign: 'top',
      y: 25,
      floating: true,
      backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
      borderColor: '#009d00',
      borderWidth: 1,
      shadow: false
    },
    tooltip: {
      headerFormat: '<b>{point.x}</b><br/>',
      pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
      column: {
        stacking: 'normal',
        dataLabels: {
          enabled: true,
          color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
        }
      }
    },
    series: jurPenerbitSintaByTahun.series,
  });
</script>


</body>

</html>