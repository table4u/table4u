var xValues01 = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
var yValues01 = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

new Chart("myChart01", {
  type: "line",
  data: {
    labels: xValues01,
    datasets: [
      {
        fill: false,
        lineTension: 0,
        backgroundColor: "rgba(0,0,255,1.0)",
        borderColor: "rgba(0,0,255,0.1)",
        data: yValues01,
      },
    ],
  },
  options: {
    legend: { display: false },
    scales: {
      yAxes: [{ ticks: { min: 6, max: 16 } }],
    },
  },
});

var xValues02 = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

new Chart("myChart02", {
  type: "line",
  data: {
    labels: xValues02,
    datasets: [
      {
        data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
        borderColor: "red",
        fill: false,
      },
      {
        data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
        borderColor: "green",
        fill: false,
      },
      {
        data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
        borderColor: "blue",
        fill: false,
      },
    ],
  },
  options: {
    legend: { display: false },
  },
});
