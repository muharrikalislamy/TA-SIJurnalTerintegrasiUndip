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

<script>
  function lettersOnly(input) {
    var regex = /[^a-z]/gi;
    input.value = input.value.replace(regex, "");
  }
</script>

<script>
  function letterlowerOnly(input) {
    var regex = /[^a-z]/g;
    input.value = input.value.replace(regex, "");
  }
</script>

<!-- page script -->
<script>
  // $(document).ready(function() {
  //   $('#data-kriteria').dataTable({
  //     'paging'      : false,
  //     'lengthChange': true,
  //     'searching'   : false,
  //     'ordering'    : true,
  //     'info'        : true,
  //     'autoWidth'   : true,
  //   })
  // })

  $(document).ready(function() {
    $('#data-kriteria').DataTable({
      'paging': false,
      'lengthChange': true,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': true,
      // dom: 'Bfrtip',
      // buttons: [
      //     'copy', 'csv', 'excel', 'pdf', 'print'
      // ]
    });
  });

  $(document).ready(function() {
    $('#data-users').dataTable({
      'paging': true,
      'lengthChange': true,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#log-penilaian').dataTable({
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#data-indikator').dataTable({
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#data-nilai-indikator').dataTable({
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#data-alternatif-sudah').dataTable({
      'paging': false,
      'lengthChange': true,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#data-alternatif-belum').dataTable({
      'paging': false,
      'lengthChange': true,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#nilai-kepentingan').dataTable({
      'paging': false,
      'lengthChange': true,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#kriteria-home').dataTable({
      'paging': false,
      'lengthChange': true,
      'searching': false,
      'ordering': false,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#alternatif-home').dataTable({
      'paging': false,
      'lengthChange': true,
      'searching': false,
      'ordering': false,
      'info': true,
      'autoWidth': true,
    })
  })

  $(document).ready(function() {
    $('#nilai-murni-a').dataTable({
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
    $('#peringkat-alte-a').dataTable({
      'paging': false,
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
    $('#bobot-tanpa').dataTable({
      'paging': false,
      'lengthChange': true,
      'searching': false,
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
    $('#bobot-dengan').dataTable({
      'paging': false,
      'lengthChange': true,
      'searching': false,
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
    $('#tiapkrit').dataTable({
      'paging': true,
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
    $('#tiapindi').dataTable({
      'paging': true,
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
  $(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-------------
    //- PIE CHART -
    //-------------
    var bobotGraphPie = '<?= isset($bobotGraphPie) ? $bobotGraphPie : null ?>';
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart = new Chart(pieChartCanvas)
    var PieData = JSON.parse(bobotGraphPie)
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
  $(function() {
    /*
     * BAR CHART
     * ---------
     */
    var bobotGraphBar = '<?= isset($bobotGraphBar) ? $bobotGraphBar : null ?>';
    var bar_data = {
      data: JSON.parse(bobotGraphBar),
      color: '#3c8dbc'
    }
    $.plot('#bar-chart', [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor: '#f3f3f3'
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: 'center'
        }
      },
      xaxis: {
        mode: 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */
  })

  /*
   * Custom Label formatter
   * ----------------------
   */
</script>

<script>
  $(function() {
    /*
     * BAR CHART
     * ---------
     */
    var jurnalakreditasiGraphBar = '<?= isset($jurnalakreditasiGraphBar) ? $jurnalakreditasiGraphBar : null ?>';
    var bar_data = {
      data: JSON.parse(jurnalakreditasiGraphBar),
      color: '#3c8dbc'
    }
    $.plot('#jurnalakreditasiGraphBar', [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor: '#f3f3f3'
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: 'center'
        }
      },
      xaxis: {
        mode: 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */
  })

  /*
   * Custom Label formatter
   * ----------------------
   */
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




</body>

</html>