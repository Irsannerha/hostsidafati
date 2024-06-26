// var chartbarOptions5 = {
// 	chart: {
// 		height: 350,
// 		type: 'bar',
// 		parentHeightOffset: 0,
// 		fontFamily: 'Poppins, sans-serif',
// 		toolbar: {
// 			show: false,
// 		},
// 	},
// 	colors: ['#097488'], // Menghapus warna untuk bar 'Complete'
// 	grid: {
// 		borderColor: '#c7d2dd',
// 		strokeDashArray: 5,
// 	},
// 	plotOptions: {
// 		bar: {
// 			horizontal: false,
// 			columnWidth: '50%', // Mengatur lebar kolom menjadi 15%
// 			endingShape: 'rounded'
// 		},
// 	},
// 	dataLabels: {
// 		enabled: false
// 	},
// 	stroke: {
// 		show: true,
// 		width: 2,
// 		colors: ['transparent']
// 	},
// 	series: [{
// 		name: 'Mahasiswa',
// 		data: [400, 650, 778, 820, 996],
// 	}],
// 	xaxis: {
// 		categories: ['2020', '2021', '2022', '2023', '2024'],
// 		labels: {
// 			style: {
// 				colors: ['#353535'],
// 				fontSize: '16px',
// 			},
// 		},
// 		axisBorder: {
// 			color: '#8fa6bc',
// 		}
// 	}, // Tambah koma di sini
// 	yaxis: {
// 		title: {
// 			text: ''
// 		},
// 		labels: {
// 			style: {
// 				colors: '#353535',
// 				fontSize: '16px',
// 			},
// 		},
// 		axisBorder: {
// 			color: '#8fa6bc',
// 		}
// 	},
// 	legend: {
// 		show: false, // Menghilangkan legend untuk bar 'Complete'
// 	},
// 	fill: {
// 		opacity: 1
// 	},
// 	tooltip: {
// 		style: {
// 			fontSize: '15px',
// 			fontFamily: 'Poppins, sans-serif',
// 		},
// 		y: {
// 			formatter: function (val) {
// 				return val
// 			}
// 		}
// 	}
// }

// var chartbar = new ApexCharts(document.querySelector("#chartbar"), chartbarOptions5);
// chartbar.render();

// // Highcharts.chart('chartpie', {
// // 	chart: {
// // 			type: 'pie',
// // 			options3d: {
// // 					enabled: true,
// // 					alpha: 45
// // 			}
// // 	},
// // 	title: {
// // 			text: 'Mahasiswa Berdasarkan Jenis Kelamin'
// // 	},
// // 	subtitle: {
// // 			text: 'Tahun 2024'
// // 	},
// // 	plotOptions: {
// // 			pie: {
// // 					innerSize: 200,
// // 					depth: 55,
// // 					colors: ['#097488', '#10bad9']
// // 			}
// // 	},
// // 	series: [{
// // 			name: 'Jumlah Mahasiswa',
// // 			data: [
// // 					['Laki-laki', 1260],
// // 					['Perempuan', 970]
// // 			]
// // 	}]
// // });

// Highcharts.chart('chartPie', {
// 	chart: {
// 			type: 'pie',
// 			options3d: {
// 					enabled: true,
// 					alpha: 45
// 			}
// 	},
// 	title: {
// 			text: 'Mahasiswa Berdasarkan Jenis Kelamin'
// 	},
// 	plotOptions: {
// 			pie: {
// 					innerSize: 200,
// 					depth: 55,
// 					dataLabels: {
// 							enabled: true,
// 							format: '{point.name}: {point.y}' // Menambahkan label pada chart
// 					}
// 			}
// 	},
// 	series: [{
// 			name: 'Jumlah Mahasiswa',
// 			data: [
// 					{ name: 'Laki-laki', y: 650, color: '#097488' }, // Warna untuk Laki-laki
// 					{ name: 'Perempuan', y: 970, color: '#10bad9' }  // Warna untuk Perempuan
// 			]
// 	}],
// 	legend: {
// 			layout: 'vertical',
// 			align: 'right',
// 			verticalAlign: 'middle',
// 			itemStyle: {
// 					color: '#333333',
// 					fontWeight: 'bold'
// 			},
// 			symbolHeight: 14, // Menyesuaikan tinggi simbol warna di legend
// 			symbolWidth: 14   // Menyesuaikan lebar simbol warna di legend
// 	},
// 	responsive: {
// 			rules: [{
// 					condition: {
// 							maxWidth: 500
// 					},
// 					chartOptions: {
// 							legend: {
// 									layout: 'horizontal',
// 									align: 'center',
// 									verticalAlign: 'bottom'
// 							},
// 							chart: {
// 									height: 300
// 							}
// 					}
// 			}]
// 	}
// });


// Highcharts.chart('chartStatusPie', {
// 	chart: {
// 			type: 'pie',
// 			options3d: {
// 					enabled: true,
// 					alpha: 45
// 			}
// 	},
// 	title: {
// 			text: 'Mahasiswa Berdasarkan Keaktifan'
// 	},
// 	plotOptions: {
// 			pie: {
// 					innerSize: 200,
// 					depth: 55,
// 					dataLabels: {
// 							enabled: true,
// 							format: '{point.name}: {point.y}' // Menambahkan label pada chart
// 					}
// 			}
// 	},
// 	series: [{
// 			name: 'Jumlah Mahasiswa',
// 			data: [
// 					{ name: 'Aktif', y: 960, color: '#097488' }, // Warna untuk Laki-laki
// 					{ name: 'Lulus', y: 576, color: '#10bad9' }  // Warna untuk Perempuan
// 			]
// 	}],
// 	legend: {
// 			layout: 'vertical',
// 			align: 'right',
// 			verticalAlign: 'middle',
// 			itemStyle: {
// 					color: '#333333',
// 					fontWeight: 'bold'
// 			},
// 			symbolHeight: 14, // Menyesuaikan tinggi simbol warna di legend
// 			symbolWidth: 14   // Menyesuaikan lebar simbol warna di legend
// 	},
// 	responsive: {
// 			rules: [{
// 					condition: {
// 							maxWidth: 500
// 					},
// 					chartOptions: {
// 							legend: {
// 									layout: 'horizontal',
// 									align: 'center',
// 									verticalAlign: 'bottom'
// 							},
// 							chart: {
// 									height: 300
// 							}
// 					}
// 			}]
// 	}
// });


// const ctx = document.getElementById('myChartBar');

// new Chart(ctx, {
//   type: 'bar',
//   data: {
//     labels: [
//       '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024'
//     ],
//     datasets: [{
//       label: 'My First Dataset',
//       data: [65, 59, 80, 81, 56, 55, 40, 75, 49, 90, 50, 60, 70],
//       backgroundColor: [
//         'rgba(255, 99, 132, 0.2)',
//         'rgba(255, 159, 64, 0.2)',
//         'rgba(255, 205, 86, 0.2)',
//         'rgba(75, 192, 192, 0.2)',
//         'rgba(54, 162, 235, 0.2)',
//         'rgba(153, 102, 255, 0.2)',
//         'rgba(201, 203, 207, 0.2)',
//         'rgba(255, 99, 132, 0.2)',
//         'rgba(255, 159, 64, 0.2)',
//         'rgba(255, 205, 86, 0.2)',
//         'rgba(75, 192, 192, 0.2)',
//         'rgba(54, 162, 235, 0.2)',
//         'rgba(153, 102, 255, 0.2)'
//       ],
//       borderColor: [
//         'rgb(255, 99, 132)',
//         'rgb(255, 159, 64)',
//         'rgb(255, 205, 86)',
//         'rgb(75, 192, 192)',
//         'rgb(54, 162, 235)',
//         'rgb(153, 102, 255)',
//         'rgb(201, 203, 207)',
//         'rgb(255, 99, 132)',
//         'rgb(255, 159, 64)',
//         'rgb(255, 205, 86)',
//         'rgb(75, 192, 192)',
//         'rgb(54, 162, 235)',
//         'rgb(153, 102, 255)'
//       ],
//       borderWidth: 1
//     }]
//   },
//   options: {
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     },
//     responsive: true,
//     maintainAspectRatio: true,
//   }
// });

// const chts = document.getElementById('myPieChart').getContext('2d');

// const data = {
//   labels: ['Laki-laki', 'Perempuan'],
//   datasets: [{
//     label: 'Jumlah Penduduk',
//     data: [500, 450],
//     backgroundColor: [
//       'rgba(54, 162, 235, 0.2)', // Biru
//       'rgba(255, 99, 132, 0.2)',  // Merah
//     ],
//     borderColor: [
//       'rgb(54, 162, 235)', // Biru
//       'rgb(255, 99, 132)',  // Merah
//     ],
//     borderWidth: 1
//   }]
// };

// const config = {
//   type: 'pie',
//   data: data,
//   options: {
//     responsive: true,
//     plugins: {
//       legend: {
//         position: 'top',
//       },
//       title: {
//         display: true,
//         text: 'Jumlah Penduduk Laki-laki dan Perempuan'
//       }
//     }
//   },
// };

// new Chart(chts, config);

document.addEventListener("DOMContentLoaded", function() {
  // const ctx = document.getElementById('myChartBar').getContext('2d');
  
  // // Konfigurasi grafik batang
  // new Chart(ctx, {
  //   type: 'bar',
  //   data: {
  //     labels: [
  //       '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024'
  //     ],
  //     datasets: [{
	// 		label: 'Jumlah Mahasiswa FTI',
  //       data: [65, 59, 80, 81, 56, 55, 40, 75, 49, 90, 50, 60, 70],
  //       backgroundColor: [
  //        	'#097488',
  //       	'#10bad9',
  //         '#097488',
  //       	'#10bad9',
  //         '#097488',
  //       	'#10bad9',
  //         '#097488',
  //       	'#10bad9',
  //         '#097488',
  //       	'#10bad9',
  //         '#097488',
  //       	'#10bad9',
  //         '#097488',
  //       ],
  //       borderColor: [
  //         '#10bad9',
  //       	'#097488',
  //         '#10bad9',
  //       	'#097488',
  //         '#10bad9',
  //       	'#097488',
  //         '#10bad9',
  //      	  '#097488',
	// 				'#10bad9',
  //       	'#097488',
  //         '#10bad9',
  //       	'#097488',
  //         '#10bad9',
  //       ],
  //       borderWidth: 1
  //     }]
  //   },
  //   options: {
  //     scales: {
  //       y: {
  //         beginAtZero: true
  //       }
  //     },
  //     responsive: true,
  //     maintainAspectRatio: true,
  //   }
  // });

  // Konfigurasi grafik pie
  const chts = document.getElementById('myPieChart').getContext('2d');

  const data = {
    labels: ['Laki-laki', 'Perempuan'],
    datasets: [{
      label: 'Jumlah Mahasiswa',
      data: [700, 850],
      backgroundColor: [
        '#8c1515',
        '#e5ba85',
      ],
      borderColor: [
        '#e5ba85',
        '#8c1515',
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'pie',
    data: data,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Jumlah Mahasiswa Laki-laki dan Perempuan'
        }
      }
    },
  };

  new Chart(chts, config);

	// Konfigurasi grafik pie
const x = document.getElementById('myPieStatus').getContext('2d');

const dataLulus = {
  labels: ['Aktif', 'Lulus'],
  datasets: [{
    label: 'Jumlah Mahasiswa',
    data: [700, 850],
    backgroundColor: [
      '#8c1515',
      '#e5ba85',
    ],
    borderColor: [
      '#e5ba85',
      '#8c1515',
    ],
    borderWidth: 1
  }]
};

const configLulus = {
  type: 'pie',
  data: dataLulus,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Jumlah Mahasiswa Aktif dan Lulus'
      }
    }
  },
};

new Chart(x, configLulus);


const Hor = document.getElementById('myChartBart').getContext('2d');

const nama_prodi = [
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
  'REKAYASA MINYAK DAN GAS',
];


const dataHor = {
  labels: nama_prodi,
  datasets: [{
    label: 'Jumlah Mahasiswa FTI',
    data: [65, 59, 80, 81, 56, 55, 40, 75, 49, 90, 50, 60, 70, 68, 77, 80, 90, 76, 78, 56, 90,],
    backgroundColor: [
      '#097488',
      '#10bad9',
      '#097488',
      '#10bad9',
      '#097488',
      '#10bad9',
      '#097488',
      '#10bad9',
      '#097488',
      '#10bad9',
      '#097488',
      '#10bad9',
      '#097488',
    ],
    borderColor: [
      '#10bad9',
      '#097488',
      '#10bad9',
      '#097488',
      '#10bad9',
      '#097488',
      '#10bad9',
      '#097488',
      '#10bad9',
      '#097488',
      '#10bad9',
      '#097488',
      '#10bad9',
    ],
    borderWidth: 1
  }]
};

const configHor = {
  type: 'bar',
  data: dataHor,
  options: {
    indexAxis: 'y',
    scales: {
      x: {
        beginAtZero: true
      }
    },
    responsive: true,
    maintainAspectRatio: true,
  }
};

new Chart(Hor, configHor);

});
