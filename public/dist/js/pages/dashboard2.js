$(function () {

  'use strict';

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  // -----------------------
  // - MONTHLY SALES CHART -
  // -----------------------

  // Get context with jQuery - using jQuery's .get() method.

  let date;
  let sale;
  const api = 'http://localhost:8000/api/sales';

  fetch(api).then(response => response.json())
    .then(data => {
      let {date, sale,tahun} = data;
      getChart(date,sale);
      getChart2(tahun);
    });


  function getChart(date,sale){
    var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas);
    var tgl = [];
    var jual = [];
    for(var i in date){
      tgl[i] = date[i].tgl;
      jual[i] = sale[i].total;
    }

    var salesChartData = {
      labels: tgl,
      datasets: [
        {
          label: 'Digital Goods',
          fillColor: 'rgba(60,141,188,0.9)',
          strokeColor: 'rgba(60,141,188,0.8)',
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data:jual
        }
      ]
    };
  
    var salesChartOptions = {
      // Boolean - If we should show the scale at all
      showScale: true,
      // Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      // String - Colour of the grid lines
      scaleGridLineColor: 'rgba(0,0,0,.05)',
      // Number - Width of the grid lines
      scaleGridLineWidth: 1,
      // Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      // Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      // Boolean - Whether the line is curved between points
      bezierCurve: true,
      // Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      // Boolean - Whether to show a dot for each point
      pointDot: false,
      // Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      // Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      // Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      // Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      // Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      // String - A legend template
      legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      // Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };
  
    // Create the line chart
    salesChart.Bar(salesChartData, salesChartOptions);
  }

 

  function getChart2(tahun){
    var salesTahun = $('#salesChart2').get(0).getContext('2d');
    // This will get the first returned node in the jQuery collection.
    var salesChartTahun = new Chart(salesTahun);
    var jual = [];
    for(var i in tahun){
      jual[i] = tahun[i].TOTAL;
    }

    console.log(jual)

    var salesChartData = {
      labels: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
      datasets: [
        {
          label: 'Digital Goods',
          fillColor: 'rgba(60,141,188,0.9)',
          strokeColor: 'rgba(60,141,188,0.8)',
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data:jual
        }
      ]
    };
  
    var salesChartOptions = {
      // Boolean - If we should show the scale at all
      showScale: true,
      // Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      // String - Colour of the grid lines
      scaleGridLineColor: 'rgba(0,0,0,.05)',
      // Number - Width of the grid lines
      scaleGridLineWidth: 1,
      // Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      // Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      // Boolean - Whether the line is curved between points
      bezierCurve: true,
      // Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      // Boolean - Whether to show a dot for each point
      pointDot: false,
      // Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      // Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      // Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      // Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      // Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      // String - A legend template
      legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      // Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };
  
    // Create the line chart
    salesChartTahun.Bar(salesChartData, salesChartOptions);
  }


fetch('http://localhost:8000/api/salesstand').then(response => response.json())
.then(data => {
  let {sale} = data;

  getChart3(sale);
});

function getChart3(tahun){
  var salesTahun = $('#salesChart3').get(0).getContext('2d');
  // This will get the first returned node in the jQuery collection.
  var salesChartTahun = new Chart(salesTahun);
  var jual = [];
  var name = [];
  for(var i in tahun){
    name[i] = tahun[i].name;
    jual[i] = tahun[i].TOTAL;

  }

  console.log(jual)

  var salesChartData = {
    labels: name,
    datasets: [
      {
        label: 'Digital Goods',
        fillColor: 'rgba(60,141,188,0.9)',
        strokeColor: 'rgba(60,141,188,0.8)',
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data:jual
      }
    ]
  };

  var salesChartOptions = {
    // Boolean - If we should show the scale at all
    showScale: true,
    // Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: false,
    // String - Colour of the grid lines
    scaleGridLineColor: 'rgba(0,0,0,.05)',
    // Number - Width of the grid lines
    scaleGridLineWidth: 1,
    // Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    // Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    // Boolean - Whether the line is curved between points
    bezierCurve: true,
    // Number - Tension of the bezier curve between points
    bezierCurveTension: 0.3,
    // Boolean - Whether to show a dot for each point
    pointDot: false,
    // Number - Radius of each point dot in pixels
    pointDotRadius: 4,
    // Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 1,
    // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius: 20,
    // Boolean - Whether to show a stroke for datasets
    datasetStroke: true,
    // Number - Pixel width of dataset stroke
    datasetStrokeWidth: 2,
    // Boolean - Whether to fill the dataset with a color
    datasetFill: true,
    // String - A legend template
    legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    // Boolean - whether to make the chart responsive to window resizing
    responsive: true
  }

  salesChartTahun.Bar(salesChartData, salesChartOptions);
}

fetch('http://localhost:8000/api/salesmenu').then(response => response.json())
.then(data => {
  let {sale} = data;
  getChart4(sale);
});

function getChart4(tahun){
  var salesTahun = $('#salesChart4').get(0).getContext('2d');
  // This will get the first returned node in the jQuery collection.
  var salesChartTahun = new Chart(salesTahun);
  var jual = [];
  var name = [];
  for(var i in tahun){
    name[i] = tahun[i].nama_menu;
    jual[i] = tahun[i].total;

  }

  console.log(jual)

  var salesChartData = {
    labels: name,
    datasets: [
      {
        label: 'Digital Goods',
        fillColor: 'rgba(60,141,188,0.9)',
        strokeColor: 'rgba(60,141,188,0.8)',
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data:jual
      }
    ]
  };

  var salesChartOptions = {
    // Boolean - If we should show the scale at all
    showScale: true,
    // Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: false,
    // String - Colour of the grid lines
    scaleGridLineColor: 'rgba(0,0,0,.05)',
    // Number - Width of the grid lines
    scaleGridLineWidth: 1,
    // Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    // Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    // Boolean - Whether the line is curved between points
    bezierCurve: true,
    // Number - Tension of the bezier curve between points
    bezierCurveTension: 0.3,
    // Boolean - Whether to show a dot for each point
    pointDot: false,
    // Number - Radius of each point dot in pixels
    pointDotRadius: 4,
    // Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 1,
    // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius: 20,
    // Boolean - Whether to show a stroke for datasets
    datasetStroke: true,
    // Number - Pixel width of dataset stroke
    datasetStrokeWidth: 2,
    // Boolean - Whether to fill the dataset with a color
    datasetFill: true,
    // String - A legend template
    legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    // Boolean - whether to make the chart responsive to window resizing
    responsive: true
  }

  salesChartTahun.Bar(salesChartData, salesChartOptions);
}

fetch('http://localhost:8000/api/topup').then(response => response.json())
.then(data => {
  let {sale} = data;
  getChart5(sale);
});

function getChart5(tahun){
  var salesTahun = $('#salesChart5').get(0).getContext('2d');
  // This will get the first returned node in the jQuery collection.
  var salesChartTahun = new Chart(salesTahun);
  var jual = [];
  var name = [];
  for(var i in tahun){
    name[i] = tahun[i].tgl;
    jual[i] = tahun[i].total;

  }

  console.log(jual)

  var salesChartData = {
    labels: name,
    datasets: [
      {
        label: 'Digital Goods',
        fillColor: 'rgba(60,141,188,0.9)',
        strokeColor: 'rgba(60,141,188,0.8)',
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data:jual
      }
    ]
  };

  var salesChartOptions = {
    // Boolean - If we should show the scale at all
    showScale: true,
    // Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: false,
    // String - Colour of the grid lines
    scaleGridLineColor: 'rgba(0,0,0,.05)',
    // Number - Width of the grid lines
    scaleGridLineWidth: 1,
    // Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    // Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    // Boolean - Whether the line is curved between points
    bezierCurve: true,
    // Number - Tension of the bezier curve between points
    bezierCurveTension: 0.3,
    // Boolean - Whether to show a dot for each point
    pointDot: false,
    // Number - Radius of each point dot in pixels
    pointDotRadius: 4,
    // Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 1,
    // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius: 20,
    // Boolean - Whether to show a stroke for datasets
    datasetStroke: true,
    // Number - Pixel width of dataset stroke
    datasetStrokeWidth: 2,
    // Boolean - Whether to fill the dataset with a color
    datasetFill: true,
    // String - A legend template
    legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    // Boolean - whether to make the chart responsive to window resizing
    responsive: true
  }

  salesChartTahun.Bar(salesChartData, salesChartOptions);
}


});


