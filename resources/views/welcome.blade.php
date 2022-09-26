<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.stock.min.js"></script>
<script type="text/javascript">
window.onload = function () {
  var dataPoints1 = [], dataPoints2 = [], dataPoints3 = [];
  var stockChart = new CanvasJS.StockChart("chartContainer",{
    exportEnabled: true,
    theme: "light2",
    title:{
      text:"StockChart"
    },
    charts: [{
      toolTip: {
        shared: true
      },
      axisX: {
        lineThickness: 5,
        tickLength: 0,
        labelFormatter: function(e) {
          return "";
        },
        crosshair: {
          enabled: true,
          snapToDataPoint: true,
          labelFormatter: function(e) {
            return ""
          }
        }
      },
      axisY2: {
        title: "Litecoin Price",
        prefix: "€"
      },
      legend: {
        verticalAlign: "top",
        horizontalAlign: "left"
      },
      data: [{
        name: "Price (in EUR)",
        yValueFormatString: "€#,###.##",
        axisYType: "secondary",
        type: "candlestick",
        risingColor: "green",
        fallingColor: "red",
        dataPoints : dataPoints1
      }]
    },{
      height: 100,
      toolTip: {
        shared: true
      },
      axisX: {
        crosshair: {
          enabled: true,
          snapToDataPoint: true
        }
      },
      axisY2: {
        prefix: "€",
        title: "LTC/EUR"
      },
      legend: {
        horizontalAlign: "left"
      },
      data: [{
        yValueFormatString: "€#,###.##",
        axisYType: "secondary",
        name: "LTC/EUR",
        dataPoints : dataPoints2
      }]
    }],
    navigator: {
      data: [{
        color: "grey",
        dataPoints: dataPoints3
      }],
      slider: {
        minimum: new Date(2018, 06, 01),
        maximum: new Date(2018, 08, 01)
      }
    }
  });
  $.getJSON("http://127.0.0.1:8000/api/stocks/", function(data) {
    for(var i = 0; i < data.length; i++){
      dataPoints1.push({x: new Date(data[i].date), y: [Number(data[i].open), Number(data[i].high), Number(data[i].low), Number(data[i].close)], color: data[i].open < data[i].close ? "green" : "red"});;
      dataPoints2.push({x: new Date(data[i].date), y: Number(data[i].volume_usd), color: data[i].open < data[i].close ? "green" : "red"});
      dataPoints3.push({x: new Date(data[i].date), y: Number(data[i].close)});
    }
    stockChart.render();
  });
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 500px; width: 100%;"></div>
//////////////////////////////tradingView///////////////////////////////////
<div>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_c1a74"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "autosize": true,
  "symbol": "NASDAQ:AAPL",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": true,
  "withdateranges": true,
  "range": "YTD",
  "hide_side_toolbar": false,
  "allow_symbol_change": true,
  "details": true,
  "hotlist": true,
  "calendar": true,
  "show_popup_button": true,
  "popup_width": "1000",
  "popup_height": "650",
  "container_id": "tradingview_c1a74"
}
  );
  </script>
</div>
<!-- TradingView Widget END -->
</div>
</body>
</html>