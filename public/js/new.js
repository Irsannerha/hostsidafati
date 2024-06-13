document.addEventListener('DOMContentLoaded', function() {
  const data = {
      labels: ['2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024'],
      datasets: [{
          label: 'Jumlah Mahasiswa',
          data: [100, 279, 250, 211, 350, 167, 165, 336, 249, 134, 292, 395, 340],
          backgroundColor: [
          '#8c1515',
        	'#e5ba85',
          ],
          borderColor: [
          '#e8c3a0',
        	'#8c1515',
          ],
          borderWidth: 1
      }]
  };

  const moveChart = {
      id: 'moveChart',
      afterEvent(chart, args) {
          const { ctx, canvas, chartArea: {left, right, top, height} } = chart;

          canvas.addEventListener('mousemove', (event) => {
              const x = event.offsetX;
              const y = event.offsetY;

              if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
                  canvas.style.cursor = 'pointer';
              } else if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
                  canvas.style.cursor = 'pointer';
              } else {
                  canvas.style.cursor = 'default';
              }
          });
      },
      afterDraw(chart, args, pluginsOptions) {
          const { ctx, chartArea: {left, right, top, height} } = chart;

          class CircleChevron {
              draw(ctx, x1, pixel) {
                  const angle = Math.PI / 180;
                  ctx.beginPath();
                  ctx.lineWidth = 3;
                  ctx.strokeStyle = 'rgba(102, 102, 102, 0.5)';
                  ctx.fillStyle = '#e8c3a0';
                  ctx.arc(x1, height / 2 + top, 15, angle * 0, angle * 360, false);
                  ctx.stroke();
                  ctx.fill();
                  ctx.closePath();

                  ctx.beginPath();
                  ctx.lineWidth = 3;
                  ctx.strokeStyle = '#8c1515';
                  ctx.moveTo(x1 + pixel, height / 2 + top - 7.5);
                  ctx.lineTo(x1 - pixel, height / 2 + top);
                  ctx.lineTo(x1 + pixel, height / 2 + top + 7.5);
                  ctx.stroke();
                  ctx.closePath();
              }
          }

          let drawCircleLeft = new CircleChevron();
          drawCircleLeft.draw(ctx, left, 5);

          let drawCircleRight = new CircleChevron();
          drawCircleRight.draw(ctx, right, -5);
      }
  };

  const config = {
      type: 'bar',
      data,
      options: {
          layout: {
              padding: {
                  right: 18
              }
          },
          scales: {
              x: {
                  min: 0,
                  max: 6,
              },
              y: {
                  beginAtZero: true
              }
          }
      },
      plugins: [moveChart]
  };

  const myChart = new Chart(
      document.getElementById('myChartBar'),
      config
  );

  function moveScroll() {
      const { ctx, canvas, chartArea: {left, right, top, height} } = myChart;

      canvas.addEventListener('click', (event) => {
          const rect = canvas.getBoundingClientRect();
          const x = event.clientX - rect.left;
          const y = event.clientY - rect.top;

          if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
              myChart.options.scales.x.min = myChart.options.scales.x.min - 7;
              myChart.options.scales.x.max = myChart.options.scales.x.max - 7;
              if (myChart.options.scales.x.min <= 0) {
                  myChart.options.scales.x.min = 0;
                  myChart.options.scales.x.max = 6;
              }
          }

          if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
              myChart.options.scales.x.min = myChart.options.scales.x.min + 7;
              myChart.options.scales.x.max = myChart.options.scales.x.max + 7;
              if (myChart.options.scales.x.max >= data.datasets[0].data.length) {
                  myChart.options.scales.x.min = data.datasets[0].data.length - 7;
                  myChart.options.scales.x.max = data.datasets[0].data.length;
              }
          }
          myChart.update();
      });
  }
  moveScroll();

  // Data untuk chart pertama
const dataOne = {
  labels: [
    'TEKNIK BIOMEDIS',
    'TEKNIK BIOSISTEM',
    'TEKNIK ELEKTRO',
    'TEKNIK FISIKA',
    'TEKNIK GEOFISIKA',
    'TEKNIK GEOLOGI',
    'TEKNIK INFORMATIKA',
    'TEKNIK INDUSTRI',
    'TEKNIK KIMIA',
    'TEKNIK MATERIAL',
    'TEKNIK MESIN',
    'TEKNIK PERTAMBANGAN',
    'TEKNIK SISTEM ENERGI',
    'TEKNIK TELEKOMUNIKASI',
    'TEKNOLOGI INDUSTRI PERTANIAN',
    'TEKNOLOGI PANGAN',
    'REKAYASA INSTRUMENTASI DAN AUTOMASI',
    'REKAYASA KEHUTANAN',
    'REKAYASA KEOLAHRAGAAN',
    'REKAYASA KOSMETIK',
    'REKAYASA MINYAK DAN GAS'
  ],
  datasets: [{
    label: 'Jumlah Mahasiswa Program Studi',
    data: [120, 150, 200, 100, 80, 110, 300, 250, 180, 90, 220, 130, 70, 160, 140, 170, 60, 50, 90, 30, 200],
    backgroundColor: [
      '#8c1515',
      '#e5ba85'
    ],
    borderColor: [
      '#e8c3a0',
      '#8c1515'
    ],
    borderWidth: 1
  }]
};

// Konfigurasi chart pertama
const configOne = {
  type: 'bar',
  data: dataOne,
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        right: 9.5
      }
    },
    indexAxis: 'y',
    scales: {
      x: {
        beginAtZero: true, 
        grid: {
          drawTicks: false, 
          drawBorder: false 
        },
        ticks: {
          display: false
        }
      }
    }
  }
};

// Render chart pertama
const chartProdiOne = new Chart(
  document.getElementById('chartProdiOne'),
  configOne
);

// Data untuk chart kedua
const dataTwo = {
  labels: [],
  datasets: [{
    label: 'Weekly Sales',
    data: chartProdiOne.data.datasets[0].data,
    backgroundColor: [
      'rgba(255, 26, 104, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(255, 206, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(0, 0, 0, 0.2)'
    ],
    borderColor: [
      'rgba(255, 26, 104, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(255, 206, 86, 1)',
      'rgba(75, 192, 192, 1)',
      'rgba(153, 102, 255, 1)',
      'rgba(255, 159, 64, 1)',
      'rgba(0, 0, 0, 1)'
    ],
    borderWidth: 1
  }]
};

// Konfigurasi chart kedua
const configTwo = {
  type: 'bar',
  data: dataTwo,
  options: {
    maintainAspectRatio: false,
    indexAxis: 'y',
    scales: {
      x: {
        beginAtZero: true,
        afterFit: ((context) => {
          console.log(context)
          context.height += 20
        }),
      },
      y: {
        afterFit: ((context) => {
          console.log(context.width);
          context.width += chartProdiOne.chartArea.left
        }),
        grid: {
          drawTicks: false,
        }
      }
    },
    plugins: {
      legend: {
        display: false
      }
    }
  }
};

// Render chart kedua
const chartProdiTwo = new Chart(
  document.getElementById('chartProdiTwo'),
  configTwo
);

// Mengatur tinggi box scroll sesuai dengan jumlah label
const scrollBoxBody = document.querySelector('.scrollBoxBody');
if (chartProdiOne.data.labels.length > 7) {
  const newHeight = 300 + (chartProdiOne.data.labels.length - 7) * 20;
  scrollBoxBody.style.height = `${newHeight}px`;
}

});