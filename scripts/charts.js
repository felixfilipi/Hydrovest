
var gauge_tds = Gauge(
  document.getElementById('gauge_tds'),
  {
    min: 0,
    max: 1800,
    value: 0,
    label: function(value) {
      return parseFloat(value).toFixed(1) + ' ppm';
    },
    color: function(value) {
      if(value <= 500) {
        return "#ef4655"; // red
      }else if(value > 500 && value <= 1000 ) {
        return "#fffa50"; // yellow
      }else if(value > 1000 && value <= 1500) {
        return "#5ee432"; // green
      }else if(value > 1500){
        return "#ef4655"; // red
      }
    }
  }
);

var gauge_turbidity = Gauge(
  document.getElementById('gauge_turbidity'),
  {
    min: 0,
    max: 50,
    value: 0,
    label: function(value) {
      return parseFloat(value).toFixed(1) + ' NTU';
    },
    color: function(value) {
      if(value < 5){
        return "#ef4655"; // red
      }else if(value > 5 && value < 10) {
        return "#fffa50"; // yellow
      }else if(value > 10 && value <= 20) {
        return "#5ee432"; // green
      }else if(value > 20 && value < 24) {
        return "#fffa50"; // yellow
      }else if(value > 24){
        return "#ef4655"; // red
      }
    }
  }
);

var gauge_temperature = Gauge(
  document.getElementById('gauge_temperature'),
  {
    min: 0,
    max: 50,
    value: 0,
    label: function(value) {
      return parseFloat(value).toFixed(1) + ' C';
    },
    color: function(value) {
      if(value < 15){
        return "#ef4655"; // red
      }else if(value > 15 && value < 20) {
        return "#fffa50"; // yellow
      }else if(value > 20 && value <= 30) {
        return "#5ee432"; // green
      }else if(value > 30 && value < 33) {
        return "#fffa50"; // yellow
      }else if(value > 33){
        return "#ef4655"; // red
      }
    }
  }
);

var gauge_humidity = Gauge(
  document.getElementById('gauge_humidity'),
  {
    min: 0,
    max: 100,
    value: 0,
    label: function(value) {
      return parseFloat(value).toFixed(1) + ' %';
    },
    color: function(value) {
      if(value < 55){
        return "#ef4655"; // red
      }else if(value > 55 && value < 60) {
        return "#fffa50"; // yellow
      }else if(value > 60 && value <= 70) {
        return "#5ee432"; // green
      }else if(value > 70 && value < 73) {
        return "#fffa50"; // yellow
      }else if(value > 73){
        return "#ef4655"; // red
      }
    }
  }
);

// linejs
var chart_tds_div = document.getElementById('chart_tds');
var chart_turbidity_div = document.getElementById('chart_turbidity');
var chart_temperature_div = document.getElementById('chart_temperature');
var chart_humidity_div = document.getElementById('chart_humidity');

var config_tds = {
  type: 'line',
  data: {
    labels: ['0'],
    datasets: [ {
        data: [0],
        backgroundColor: 'rgb(255, 0, 0, 0.2)',
		borderColor: '#ff8080',
        fill: {
          target: 'origin',
        },
      }
    ],
  },
  options:{
    scales: {
      x: {
        grid: {
          color: '#4d4d4d',
        },
        ticks: {
          color: '#fff',
        },
      },
      y: {
        grid: {
          color: '#4d4d4d',
        },
        ticks: {
          color: '#fff',
        },
      },
    },
    plugins: {
      legend: {
        display: false,
      },
    },
    responsive: true,
  }
}

var config_turbidity = {
  type: 'line',
  data: {
    labels: ['0'],
    datasets: [
      {
        data: [0],
        backgroundColor: 'rgb(255, 0, 0, 0.2)',
		borderColor: '#ff8080',
        fill: {
          target: 'origin',
        },
      }
    ],
  },
  options:{
    scales: {
      x: {
        grid: {
          color: '#4d4d4d',
        },
        ticks: {
          color: '#fff',
        },
      },
      y: {
        grid: {
          color: '#4d4d4d',
        },
        ticks: {
          color: '#fff',
        },
      },
    },
    plugins: {
      legend: {
        display: false,
      },
    },
    responsive: true,
  }
}

var config_temperature = {
  type: 'line',
  data: {
    labels: ['0'],
    datasets: [
      {
        data: [0],
        backgroundColor: 'rgb(255, 0, 0, 0.2)',
		borderColor: '#ff8080',
        fill: {
          target: 'origin',
        },
      }
    ],
  },
  options:{
    scales: {
      x: {
        grid: {
          color: '#4d4d4d',
        },
        ticks: {
          color: '#fff',
        },
      },
      y: {
        grid: {
          color: '#4d4d4d',
        },
        ticks: {
          color: '#fff',
        },
      },
    },
    plugins: {
      legend: {
        display: false,
      },
    },
    responsive: true,
  }
}

var config_humidity = {
  type: 'line',
  data: {
    labels: ['0'],
    datasets: [
      {
        data: [0],
        backgroundColor: 'rgb(255, 0, 0, 0.2)',
		borderColor: '#ff8080',
        fill: {
          target: 'origin',
        },
      }
    ],
  },
  options:{
    scales: {
      x: {
        grid: {
          color: '#4d4d4d',
        },
        ticks: {
          color: '#fff',
        },
      },
      y: {
        grid: {
          color: '#4d4d4d',
        },
        ticks: {
          color: '#fff',
        },
      },
    },
    plugins: {
      legend: {
        display: false,
      },
    },
    responsive: true,
  }
}

var chart_tds = new Chart(chart_tds_div, config_tds);
var chart_turbidity = new Chart(chart_turbidity_div, config_turbidity);
var chart_temperature = new Chart(chart_temperature_div, config_temperature);
var chart_humidity = new Chart(chart_humidity_div, config_humidity);
