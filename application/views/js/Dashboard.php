<script type="text/javascript">
  $(function() {

    //--------------
    //- AREA CHART -
    //--------------



    var areaChartData = {
      labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [{
          label: "Setoran",
          backgroundColor: "lightgreen",
          borderColor: "green",
          borderWidth: 1,
          data:  <?php echo json_encode($sett); ?>
        },
        {
          label: "Penarikan",
          backgroundColor: "pink",
          borderColor: "red",
          borderWidth: 1,
          data:  <?php echo json_encode($sett1); ?>
        },
        {
          label: "Realisasi",
          backgroundColor: "lightblue",
          borderColor: "blue",
          borderWidth: 1,
          data:  <?php echo json_encode($sett2); ?>
        },
        {
          label: "Angsuran",
          backgroundColor: "yellow",
          borderColor: "orange",
          borderWidth: 1,
          data:  <?php echo json_encode($sett3); ?>
        }
      ]
    }
    var chartOptions = {
  responsive: true,
  legend: {
    position: "top"
  },
  title: {
    display: true,
    text: "Grafik Bulanan"
  },
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      }
    }]
  }
}

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: areaChartData,
      options: chartOptions
    })
  })
</script>