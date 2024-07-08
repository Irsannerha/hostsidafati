// document.addEventListener('DOMContentLoaded', function() {
//   const data = {
//       labels: ['2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024'],
//       datasets: [{
//           label: 'Jumlah Mahasiswa',
//           data: [100, 279, 250, 211, 350, 167, 165, 336, 249, 134, 292, 395, 340],
//           backgroundColor: [
//           '#daa520',
//         	'#1b3133',
//           ],
//           borderColor: [
//           '#1b3133',
//         	'#daa520',
//           ],
//           borderWidth: 1
//       }]
//   };

//   const moveChart = {
//       id: 'moveChart',
//       afterEvent(chart, args) {
//           const { ctx, canvas, chartArea: {left, right, top, height} } = chart;

//           canvas.addEventListener('mousemove', (event) => {
//               const x = event.offsetX;
//               const y = event.offsetY;

//               if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
//                   canvas.style.cursor = 'pointer';
//               } else if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
//                   canvas.style.cursor = 'pointer';
//               } else {
//                   canvas.style.cursor = 'default';
//               }
//           });
//       },
//       afterDraw(chart, args, pluginsOptions) {
//           const { ctx, chartArea: {left, right, top, height} } = chart;

//           class CircleChevron {
//               draw(ctx, x1, pixel) {
//                   const angle = Math.PI / 180;
//                   ctx.beginPath();
//                   ctx.lineWidth = 3;
//                   ctx.strokeStyle = 'rgba(102, 102, 102, 0.5)';
//                   ctx.fillStyle = '#1b3133';
//                   ctx.arc(x1, height / 2 + top, 15, angle * 0, angle * 360, false);
//                   ctx.stroke();
//                   ctx.fill();
//                   ctx.closePath();

//                   ctx.beginPath();
//                   ctx.lineWidth = 3;
//                   ctx.strokeStyle = '#daa520';
//                   ctx.moveTo(x1 + pixel, height / 2 + top - 7.5);
//                   ctx.lineTo(x1 - pixel, height / 2 + top);
//                   ctx.lineTo(x1 + pixel, height / 2 + top + 7.5);
//                   ctx.stroke();
//                   ctx.closePath();
//               }
//           }

//           let drawCircleLeft = new CircleChevron();
//           drawCircleLeft.draw(ctx, left, 5);

//           let drawCircleRight = new CircleChevron();
//           drawCircleRight.draw(ctx, right, -5);
//       }
//   };

//   const config = {
//       type: 'bar',
//       data,
//       options: {
//           layout: {
//               padding: {
//                   right: 18
//               }
//           },
//           scales: {
//               x: {
//                   min: 0,
//                   max: 6,
//               },
//               y: {
//                   beginAtZero: true
//               }
//           }
//       },
//       plugins: [moveChart]
//   };

//   const myChart = new Chart(
//       document.getElementById('myChartBar'),
//       config
//   );

//   function moveScroll() {
//       const { ctx, canvas, chartArea: {left, right, top, height} } = myChart;

//       canvas.addEventListener('click', (event) => {
//           const rect = canvas.getBoundingClientRect();
//           const x = event.clientX - rect.left;
//           const y = event.clientY - rect.top;

//           if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
//               myChart.options.scales.x.min = myChart.options.scales.x.min - 7;
//               myChart.options.scales.x.max = myChart.options.scales.x.max - 7;
//               if (myChart.options.scales.x.min <= 0) {
//                   myChart.options.scales.x.min = 0;
//                   myChart.options.scales.x.max = 6;
//               }
//           }

//           if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
//               myChart.options.scales.x.min = myChart.options.scales.x.min + 7;
//               myChart.options.scales.x.max = myChart.options.scales.x.max + 7;
//               if (myChart.options.scales.x.max >= data.datasets[0].data.length) {
//                   myChart.options.scales.x.min = data.datasets[0].data.length - 7;
//                   myChart.options.scales.x.max = data.datasets[0].data.length;
//               }
//           }
//           myChart.update();
//       });
//   }
//   moveScroll();

// //   // Data untuk chart pertama
// // const dataOne = {
// //   labels: [
// //     'TEKNIK BIOMEDIS',
// //     'TEKNIK BIOSISTEM',
// //     'TEKNIK ELEKTRO',
// //     'TEKNIK FISIKA',
// //     'TEKNIK GEOFISIKA',
// //     'TEKNIK GEOLOGI',
// //     'TEKNIK INFORMATIKA',
// //     'TEKNIK INDUSTRI',
// //     'TEKNIK KIMIA',
// //     'TEKNIK MATERIAL',
// //     'TEKNIK MESIN',
// //     'TEKNIK PERTAMBANGAN',
// //     'TEKNIK SISTEM ENERGI',
// //     'TEKNIK TELEKOMUNIKASI',
// //     'TEKNOLOGI INDUSTRI PERTANIAN',
// //     'TEKNOLOGI PANGAN',
// //     'REKAYASA INSTRUMENTASI DAN AUTOMASI',
// //     'REKAYASA KEHUTANAN',
// //     'REKAYASA KEOLAHRAGAAN',
// //     'REKAYASA KOSMETIK',
// //     'REKAYASA MINYAK DAN GAS'
// //   ],
// //   datasets: [{
// //     label: 'Jumlah Mahasiswa Program Studi',
// //     data: [120, 150, 200, 100, 80, 110, 300, 250, 180, 90, 220, 130, 70, 160, 140, 170, 60, 50, 90, 30, 200],
// //     backgroundColor: [
// //       '#8c1515',
// //       '#e5ba85'
// //     ],
// //     borderColor: [
// //       '#e8c3a0',
// //       '#8c1515'
// //     ],
// //     borderWidth: 1
// //   }]
// // };

// // // Konfigurasi chart pertama
// // const configOne = {
// //   type: 'bar',
// //   data: dataOne,
// //   options: {
// //     maintainAspectRatio: false,
// //     layout: {
// //       padding: {
// //         right: 9.5
// //       }
// //     },
// //     indexAxis: 'y',
// //     scales: {
// //       x: {
// //         beginAtZero: true, 
// //         grid: {
// //           drawTicks: false, 
// //           drawBorder: false 
// //         },
// //         ticks: {
// //           display: false
// //         }
// //       }
// //     }
// //   }
// // };

// // // Render chart pertama
// // const chartProdiOne = new Chart(
// //   document.getElementById('chartProdiOne'),
// //   configOne
// // );

// // // Data untuk chart kedua
// // const dataTwo = {
// //   labels: [],
// //   datasets: [{
// //     label: 'Weekly Sales',
// //     data: chartProdiOne.data.datasets[0].data,
// //     backgroundColor: [
// //       'rgba(255, 26, 104, 0.2)',
// //       'rgba(54, 162, 235, 0.2)',
// //       'rgba(255, 206, 86, 0.2)',
// //       'rgba(75, 192, 192, 0.2)',
// //       'rgba(153, 102, 255, 0.2)',
// //       'rgba(255, 159, 64, 0.2)',
// //       'rgba(0, 0, 0, 0.2)'
// //     ],
// //     borderColor: [
// //       'rgba(255, 26, 104, 1)',
// //       'rgba(54, 162, 235, 1)',
// //       'rgba(255, 206, 86, 1)',
// //       'rgba(75, 192, 192, 1)',
// //       'rgba(153, 102, 255, 1)',
// //       'rgba(255, 159, 64, 1)',
// //       'rgba(0, 0, 0, 1)'
// //     ],
// //     borderWidth: 1
// //   }]
// // };

// // // Konfigurasi chart kedua
// // const configTwo = {
// //   type: 'bar',
// //   data: dataTwo,
// //   options: {
// //     maintainAspectRatio: false,
// //     indexAxis: 'y',
// //     scales: {
// //       x: {
// //         beginAtZero: true,
// //         afterFit: ((context) => {
// //           console.log(context)
// //           context.height += 20
// //         }),
// //       },
// //       y: {
// //         afterFit: ((context) => {
// //           console.log(context.width);
// //           context.width += chartProdiOne.chartArea.left
// //         }),
// //         grid: {
// //           drawTicks: false,
// //         }
// //       }
// //     },
// //     plugins: {
// //       legend: {
// //         display: false
// //       }
// //     }
// //   }
// // };

// // // Render chart kedua
// // const chartProdiTwo = new Chart(
// //   document.getElementById('chartProdiTwo'),
// //   configTwo
// // );

// // // Mengatur tinggi box scroll sesuai dengan jumlah label
// // const scrollBoxBody = document.querySelector('.scrollBoxBody');
// // if (chartProdiOne.data.labels.length > 7) {
// //   const newHeight = 300 + (chartProdiOne.data.labels.length - 7) * 20;
// //   scrollBoxBody.style.height = `${newHeight}px`;
// // }

// });

var chartmhs = {
	chart: {
			height: 350,
			type: 'bar',
			parentHeightOffset: 0,
			fontFamily: 'Poppins, sans-serif',
			toolbar: {
					show: false,
			},
	},
	colors: ['#1b00ff', '#f56767'],
	grid: {
			borderColor: '#c7d2dd',
			strokeDashArray: 5,
	},
	plotOptions: {
			bar: {
					horizontal: false,
					columnWidth: '45%',
					endingShape: 'rounded'
			},
	},
	dataLabels: {
			enabled: false
	},
	stroke: {
			show: true,
			width: 2,
			colors: ['transparent']
	},
	series: [{
			name: 'Ganjil',
			data: [40, 28, 47, 22, 34, 25, 20, 15, 10, 35, 40, 30, 28, 45, 32, 27, 33, 24, 18, 26, 19]
	}, {
			name: 'Genap',
			data: [30, 20, 37, 10, 28, 11, 25, 17, 8, 32, 35, 25, 21, 37, 29, 20, 30, 20, 15, 21, 13]
	}],
	xaxis: {
			categories: [
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
			labels: {
					style: {
							colors: ['#353535'],
							fontSize: '0.6em',
					},
			},
			axisBorder: {
					color: '#8fa6bc',
			}
	},
	yaxis: {
			title: {
					text: ''
			},
			labels: {
					style: {
							colors: '#353535',
							fontSize: '16px',
					},
			},
			axisBorder: {
					color: '#f00',
			}
	},
	legend: {
			horizontalAlign: 'right',
			position: 'top',
			fontSize: '16px',
			offsetY: 0,
			labels: {
					colors: '#353535',
			},
			markers: {
					width: 10,
					height: 10,
					radius: 15,
			},
			itemMargin: {
					vertical: 0
			},
	},
	fill: {
			opacity: 1
	},
	tooltip: {
			style: {
					fontSize: '15px',
					fontFamily: 'Poppins, sans-serif',
			},
			y: {
					formatter: function (val) {
							return val
					}
			}
	}
}
var chartmhs = document.querySelector("#chartmhs");
if (chartmhs) {
	var chart = new ApexCharts(
			chartmhs,
			chartmhs
	);
	chart.render();
}

// document.addEventListener('DOMContentLoaded', function() {
//   const data = {
//       labels: [], // Label akan diisi berdasarkan jumlah mahasiswa (genap/ganjil)
//       datasets: [{
//           label: 'Jumlah Mahasiswa',
//           data: [100, 279, 250, 211, 350, 167, 165, 336, 249, 134, 292, 395, 340],
//           backgroundColor: [],
//           borderColor: [],
//           borderWidth: 1
//       }]
//   };

//   // Warna untuk jumlah mahasiswa genap dan ganjil
//   const evenColor = '#1b3133';
//   const oddColor = '#daa520';

//   // Mengisi labels, backgroundColor, dan borderColor berdasarkan jumlah mahasiswa genap/ganjil
//   data.datasets[0].data.forEach((value) => {
//       if (value % 2 === 0) {
//           data.labels.push('Genap');
//           data.datasets[0].backgroundColor.push(evenColor);
//           data.datasets[0].borderColor.push(evenColor);
//       } else {
//           data.labels.push('Ganjil');
//           data.datasets[0].backgroundColor.push(oddColor);
//           data.datasets[0].borderColor.push(oddColor);
//       }
//   });

//   const moveChart = {
//       id: 'moveChart',
//       afterEvent(chart, args) {
//           const { ctx, canvas, chartArea: {left, right, top, height} } = chart;

//           canvas.addEventListener('mousemove', (event) => {
//               const x = event.offsetX;
//               const y = event.offsetY;

//               if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
//                   canvas.style.cursor = 'pointer';
//               } else if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
//                   canvas.style.cursor = 'pointer';
//               } else {
//                   canvas.style.cursor = 'default';
//               }
//           });
//       },
//       afterDraw(chart, args, pluginsOptions) {
//           const { ctx, chartArea: {left, right, top, height} } = chart;

//           class CircleChevron {
//               draw(ctx, x1, pixel) {
//                   const angle = Math.PI / 180;
//                   ctx.beginPath();
//                   ctx.lineWidth = 3;
//                   ctx.strokeStyle = 'rgba(102, 102, 102, 0.5)';
//                   ctx.fillStyle = '#1b3133';
//                   ctx.arc(x1, height / 2 + top, 15, angle * 0, angle * 360, false);
//                   ctx.stroke();
//                   ctx.fill();
//                   ctx.closePath();

//                   ctx.beginPath();
//                   ctx.lineWidth = 3;
//                   ctx.strokeStyle = '#daa520';
//                   ctx.moveTo(x1 + pixel, height / 2 + top - 7.5);
//                   ctx.lineTo(x1 - pixel, height / 2 + top);
//                   ctx.lineTo(x1 + pixel, height / 2 + top + 7.5);
//                   ctx.stroke();
//                   ctx.closePath();
//               }
//           }

//           let drawCircleLeft = new CircleChevron();
//           drawCircleLeft.draw(ctx, left, 5);

//           let drawCircleRight = new CircleChevron();
//           drawCircleRight.draw(ctx, right, -5);
//       }
//   };

//   const config = {
//       type: 'bar',
//       data,
//       options: {
//           layout: {
//               padding: {
//                   right: 18
//               }
//           },
//           scales: {
//               x: {
//                   min: 0,
//                   max: 6,
//               },
//               y: {
//                   beginAtZero: true
//               }
//           }
//       },
//       plugins: [moveChart]
//   };

//   const myChart = new Chart(
//       document.getElementById('myChartRekap'),
//       config
//   );

//   function moveScroll() {
//       const { ctx, canvas, chartArea: {left, right, top, height} } = myChart;

//       canvas.addEventListener('click', (event) => {
//           const rect = canvas.getBoundingClientRect();
//           const x = event.clientX - rect.left;
//           const y = event.clientY - rect.top;

//           if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
//               myChart.options.scales.x.min = myChart.options.scales.x.min - 7;
//               myChart.options.scales.x.max = myChart.options.scales.x.max - 7;
//               if (myChart.options.scales.x.min <= 0) {
//                   myChart.options.scales.x.min = 0;
//                   myChart.options.scales.x.max = 6;
//               }
//           }

//           if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
//               myChart.options.scales.x.min = myChart.options.scales.x.min + 7;
//               myChart.options.scales.x.max = myChart.options.scales.x.max + 7;
//               if (myChart.options.scales.x.max >= data.datasets[0].data.length) {
//                   myChart.options.scales.x.min = data.datasets[0].data.length - 7;
//                   myChart.options.scales.x.max = data.datasets[0].data.length;
//               }
//           }
//           myChart.update();
//       });
			
//   }
//   moveScroll();
// });


// chart dashboard akademik
// document.addEventListener('DOMContentLoaded', function() {
// 	const endpoint = '/chart-data';

// 	fetch(endpoint)
// 			.then(response => response.json())
// 			.then(data => {
// 					if (!data || !data.labels || !data.jumlah_mhs_aktif_ts || !data.jumlah_mhs_aktif_th || !data.total) {
// 							throw new Error("Invalid data format received from the server");
// 					}

// 					const moveChart = {
// 							id: 'moveChart',
// 							afterEvent(chart, args) {
// 									const { ctx, canvas, chartArea: { left, right, top, height } } = chart;

// 									canvas.addEventListener('mousemove', (event) => {
// 											const x = event.offsetX;
// 											const y = event.offsetY;

// 											if ((x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) ||
// 													(x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15)) {
// 													canvas.style.cursor = 'pointer';
// 											} else {
// 													canvas.style.cursor = 'default';
// 											}
// 									});
// 							},
// 							afterDraw(chart, args, pluginsOptions) {
// 									const { ctx, chartArea: { left, right, top, height } } = chart;

// 									class CircleChevron {
// 											draw(ctx, x1, pixel) {
// 													const angle = Math.PI / 180;
// 													ctx.beginPath();
// 													ctx.lineWidth = 3;
// 													ctx.strokeStyle = '#8c1515';
// 													ctx.fillStyle = '#e8c3a0';  
// 													ctx.arc(x1, height / 2 + top, 15, angle * 0, angle * 360, false);
// 													ctx.stroke();
// 													ctx.fill();
// 													ctx.closePath();

// 													ctx.beginPath();
// 													ctx.lineWidth = 3;
// 													ctx.strokeStyle = '#8c1515'; // Warna panah
// 													ctx.moveTo(x1 + pixel, height / 2 + top - 7.5);
// 													ctx.lineTo(x1 - pixel, height / 2 + top);
// 													ctx.lineTo(x1 + pixel, height / 2 + top + 7.5);
// 													ctx.stroke();
// 													ctx.closePath();
// 											}
// 									}

// 									let drawCircleLeft = new CircleChevron();
// 									drawCircleLeft.draw(ctx, left, 5);

// 									let drawCircleRight = new CircleChevron();
// 									drawCircleRight.draw(ctx, right, -5);
// 							}
// 					};

// 					const config = {
// 							type: 'bar',
// 							data: {
// 									labels: data.labels,
// 									datasets: [
// 											{
// 													label: data.ts,
// 													data: data.jumlah_mhs_aktif_ts,
// 													backgroundColor: "#031e23",
// 													borderColor: "#daa520",
// 													order: 1,
// 											},
// 											{
// 													label: data.th,
// 													data: data.jumlah_mhs_aktif_th,
// 													backgroundColor: "#daa520",
// 													borderColor: "#031e23",
// 													order: 1,
// 											},
// 											{
// 													label: "Total",
// 													data: data.total,
// 													backgroundColor: "red",
// 													borderColor: "red",
// 													fill: false,
// 													pointHoverRadius: 20,
// 													pointHoverBorderWidth: 5,
// 													type: "line",
// 													order: 0,
// 											},
// 									],
// 							},
// 							options: {
// 									responsive: true,
// 									maintainAspectRatio: false,
// 									layout: {
// 											padding: {
// 													right: 18
// 											}
// 									},
// 									scales: {
// 											x: {
// 													min: 0,
// 													max: 6,
// 													stacked: true,
// 													title: {
// 															display: true,
// 															text: "Program Studi"
// 													},
// 											},
// 											y: {
// 													beginAtZero: true,
// 													stacked: true,
// 													title: {
// 															display: true,
// 															text: "Jumlah Mahasiswa Aktif + PMB"
// 													},
// 											},
// 									},
// 									plugins: [moveChart]
// 							}
// 					};

// 					const myChart = new Chart(
// 							document.getElementById('myChartRekap'),
// 							config
// 					);

// 					function moveScroll() {
// 							const { ctx, canvas, chartArea: { left, right, top, height } } = myChart;

// 							canvas.addEventListener('click', (event) => {
// 									const rect = canvas.getBoundingClientRect();
// 									const x = event.clientX - rect.left;
// 									const y = event.clientY - rect.top;

// 									if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
// 											myChart.options.scales.x.min = Math.max(myChart.options.scales.x.min - 7, 0);
// 											myChart.options.scales.x.max = Math.min(myChart.options.scales.x.max - 7, data.labels.length);
// 									}

// 									if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
// 											myChart.options.scales.x.min = Math.max(myChart.options.scales.x.min + 7, 0);
// 											myChart.options.scales.x.max = Math.min(myChart.options.scales.x.max + 7, data.labels.length);
// 									}

// 									myChart.update();
// 							});
// 					}

// 					moveScroll();
// 			})
// 			.catch(error => console.error('Error fetching chart data:', error));
// });


// chart dashboard Pegawai - Jumlah Dosen
document.addEventListener("DOMContentLoaded", function() {
	const endpoint = '/chartDataJumlahDosen';

	fetch(endpoint)
			.then(response => response.json())
			.then(data => {
					const labels = data.map(prodi => prodi.prodi);
					const jumlahDosen = data.map(prodi => prodi.jumlah_dosen);

					const chartData = {
							labels: labels,
							datasets: [{
									label: 'Jumlah Dosen',
									data: jumlahDosen,
									backgroundColor: '#daa520',
									borderColor: '#1b3133',
									borderWidth: 4
							}]
					};

					const moveChart = {
							id: 'moveChart',
							afterEvent(chart, args) {
									const { ctx, canvas, chartArea: {left, right, top, bottom, width, height} } = chart;

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
									const { ctx, chartArea: {left, right, top, bottom, width, height} } = chart;

									class CircleChevron {
											draw(ctx, x1, pixel) {
													const angle = Math.PI / 180;
													ctx.beginPath();
													ctx.lineWidth = 3;
													ctx.strokeStyle = 'rgba(102, 102, 102, 0.5)';
                  				ctx.fillStyle = '#1b3133';
													ctx.arc(x1, height / 2 + top, 15, angle * 0, angle * 360, false);
													ctx.stroke();
													ctx.fill();
													ctx.closePath();

													// Chevron Arrow Left
													ctx.beginPath();
													ctx.lineWidth = 3;
													ctx.strokeStyle = '#daa520';
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
					}

					const config = {
							type: 'bar',
							data: chartData,
							options: {
									layout: {
											padding: {
													right: 18
											}
									},
									responsive: true,
									maintainAspectRatio: false,
									scales: {
											x: {
													min: 0,
													max: 6,
													grid: {
															display: true,
															color: "#a7a7a7",
															lineWidth: 1
													}
											},
											y: {
													beginAtZero: true,
													grid: {
															display: true,
															color: "#a7a7a7",
															lineWidth: 1
													}
											}
									}
							},
							plugins: [moveChart]
					};

					// const myChart = new Chart(
					// 		document.getElementById('myChartJumlahDosen'),
					// 		config
					// );

					var myChart = null;
					const myChartElement = document.getElementById('myChartJumlahDosen');
					if (myChartElement) {
							myChart = new Chart(myChartElement, config);
					}
					
					function moveScroll() {
							const { ctx, canvas, chartArea: {left, right, top, bottom, width, height} } = myChart;

							canvas.addEventListener('click', (event) => {
									const rect = canvas.getBoundingClientRect();
									const x = event.clientX - rect.left;
									const y = event.clientY - rect.top;

									if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
											console.log("Clicked left button");
											myChart.options.scales.x.min = myChart.options.scales.x.min - 7;
											myChart.options.scales.x.max = myChart.options.scales.x.max - 7;
											if (myChart.options.scales.x.min <= 0) {
													myChart.options.scales.x.min = 0;
													myChart.options.scales.x.max = 6;
											}
									}

									if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
											console.log("Clicked right button");
											myChart.options.scales.x.min = myChart.options.scales.x.min + 7;
											myChart.options.scales.x.max = myChart.options.scales.x.max + 7;
											if (myChart.options.scales.x.max >= chartData.datasets[0].data.length) {
													myChart.options.scales.x.min = chartData.datasets[0].data.length - 7;
													myChart.options.scales.x.max = chartData.datasets[0].data.length;
											}
									}
									myChart.update();
							})
					}
					if (myChartElement) {
						moveScroll();
					} 
			});
});

// ============================================================

// chart dashboard Mhs Aktif
document.addEventListener('DOMContentLoaded', function() {
	const endpoint = '/chart-data-Mhs-Aktif';

	fetch(endpoint)
			.then(response => response.json())
			.then(data => {
					if (!data || !data.labels || !data.jumlah_mhs_aktif_ts || !data.jumlah_mhs_aktif_th || !data.total) {
							throw new Error("Invalid data format received from the server");
					}

					const moveChart = {
							id: 'moveChart',
							afterEvent(chart, args) {
									const { ctx, canvas, chartArea: { left, right, top, height } } = chart;

									canvas.addEventListener('mousemove', (event) => {
											const x = event.offsetX;
											const y = event.offsetY;

											if ((x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) ||
													(x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15)) {
													canvas.style.cursor = 'pointer';
											} else {
													canvas.style.cursor = 'default';
											}
									});
							},
							afterDraw(chart, args, pluginsOptions) {
									const { ctx, chartArea: { left, right, top, height } } = chart;

									class CircleChevron {
											draw(ctx, x1, pixel) {
													const angle = Math.PI / 180;
													ctx.beginPath();
													ctx.lineWidth = 3;
													ctx.strokeStyle = '#8c1515';
													ctx.fillStyle = '#e8c3a0';
													ctx.arc(x1, height / 2 + top, 15, angle * 0, angle * 360, false);
													ctx.stroke();
													ctx.fill();
													ctx.closePath();

													ctx.beginPath();
													ctx.lineWidth = 3;
													ctx.strokeStyle = '#8c1515'; // Warna panah
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
							data: {
									labels: data.labels,
									datasets: [
											{
													label: data.ts,
													data: data.jumlah_mhs_aktif_ts,
													backgroundColor: "#031e23",
													borderColor: "#daa520",
													order: 1,
											},
											{
													label: data.th,
													data: data.jumlah_mhs_aktif_th,
													backgroundColor: "#daa520",
													borderColor: "#031e23",
													order: 1,
											},
											{
													label: "Total",
													data: data.total,
													backgroundColor: "red",
													borderColor: "red",
													fill: false,
													pointHoverRadius: 20,
													pointHoverBorderWidth: 5,
													type: "line",
													order: 0,
											},
									],
							},
							options: {
									responsive: true,
									maintainAspectRatio: false,
									layout: {
											padding: {
													right: 18
											}
									},
									scales: {
											x: {
													min: 0,
													max: 6,
													stacked: true,
													title: {
															display: true,
															text: "Program Studi"
													},
													grid: {
														display: true,
														color: "#a7a7a7",
														lineWidth: 1,
												},
											},
											y: {
													beginAtZero: true,
													stacked: true,
													title: {
															display: true,
															text: "Jumlah Mahasiswa Aktif + PMB"
													},
													grid: {
															display: true,
															color: "#a7a7a7",
															lineWidth: 1, 
													},
											},
									},
									plugins: [moveChart]
							}
					};

					// const myChart = new Chart(
					// 		document.getElementById('myChartMhsAktif'),
					// 		config
					// );

					var myChart = null;
					const myChartElement = document.getElementById('myChartMhsAktif');
					if (myChartElement) {
							myChart = new Chart(myChartElement, config);
					}

					function moveScroll() {
							const { ctx, canvas, chartArea: { left, right, top, height } } = myChart;

							canvas.addEventListener('click', (event) => {
									const rect = canvas.getBoundingClientRect();
									const x = event.clientX - rect.left;
									const y = event.clientY - rect.top;

									if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
											myChart.options.scales.x.min = Math.max(myChart.options.scales.x.min - 7, 0);
											myChart.options.scales.x.max = Math.min(myChart.options.scales.x.max - 7, data.labels.length);
									}

									if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
											myChart.options.scales.x.min = Math.max(myChart.options.scales.x.min + 7, 0);
											myChart.options.scales.x.max = Math.min(myChart.options.scales.x.max + 7, data.labels.length);
									}

									myChart.update();
							});
					}

					if (myChartElement) {
						moveScroll();
					}
			})
			.catch(error => console.error('Error fetching chart data:', error));
});

// chart dashboard Undur Diri
document.addEventListener('DOMContentLoaded', function() {
	const endpoint = '/chart-data-Undur-Diri';

	fetch(endpoint)
			.then(response => response.json())
			.then(data => {
					if (!data || !data.labels || !data.mhs_undur_diri_genap || !data.mhs_undur_diri_ganjil || !data.total) {
							throw new Error("Invalid data format received from the server");
					}

					const moveChart = {
							id: 'moveChart',
							afterEvent(chart, args) {
									const { ctx, canvas, chartArea: { left, right, top, height } } = chart;

									canvas.addEventListener('mousemove', (event) => {
											const x = event.offsetX;
											const y = event.offsetY;

											if ((x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) ||
													(x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15)) {
													canvas.style.cursor = 'pointer';
											} else {
													canvas.style.cursor = 'default';
											}
									});
							},
							afterDraw(chart, args, pluginsOptions) {
									const { ctx, chartArea: { left, right, top, height } } = chart;

									class CircleChevron {
											draw(ctx, x1, pixel) {
													const angle = Math.PI / 180;
													ctx.beginPath();
													ctx.lineWidth = 3;
													ctx.strokeStyle = '#8c1515';
													ctx.fillStyle = '#e8c3a0';
													ctx.arc(x1, height / 2 + top, 15, angle * 0, angle * 360, false);
													ctx.stroke();
													ctx.fill();
													ctx.closePath();

													ctx.beginPath();
													ctx.lineWidth = 3;
													ctx.strokeStyle = '#8c1515'; // Warna panah
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
							data: {
									labels: data.labels,
									datasets: [
											{
													label: 'Genap',
													data: data.mhs_undur_diri_genap,
													backgroundColor: "#031e23",
													borderColor: "#daa520",
													order: 1,
											},
											{
													label: 'Ganjil',
													data: data.mhs_undur_diri_ganjil,
													backgroundColor: "#daa520",
													borderColor: "#031e23",
													order: 1,
											},
											{
													label: "Total",
													data: data.total,
													backgroundColor: "red",
													borderColor: "red",
													fill: false,
													pointHoverRadius: 20,
													pointHoverBorderWidth: 5,
													type: "line",
													order: 0,
											},
									],
							},
							options: {
									responsive: true,
									maintainAspectRatio: false,
									layout: {
											padding: {
													right: 18
											}
									},
									scales: {
											x: {
													min: 0,
													max: 6,
													stacked: true,
													title: {
															display: true,
															text: "Program Studi"
													},
													grid: {
															display: true,
															color: "#a7a7a7",
															lineWidth: 1,
													},
											},
											y: {
													beginAtZero: true,
													stacked: true,
													title: {
															display: true,
															text: "Jumlah Mahasiswa Undur Diri"
													},
													grid: {
															display: true,
															color: "#a7a7a7",
															lineWidth: 1, 
													},
											},
									},
									plugins: [moveChart]
							}
					};

					// const myChart = new Chart(
					// 		document.getElementById('myChartUndurDiri'),
					// 		config
					// );

					var myChart = null;
					const myChartElement = document.getElementById('myChartUndurDiri');
					if (myChartElement) {
							myChart = new Chart(myChartElement, config);
					}

					function moveScroll() {
							const { ctx, canvas, chartArea: { left, right, top, height } } = myChart;

							canvas.addEventListener('click', (event) => {
									const rect = canvas.getBoundingClientRect();
									const x = event.clientX - rect.left;
									const y = event.clientY - rect.top;

									if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
											myChart.options.scales.x.min = Math.max(myChart.options.scales.x.min - 7, 0);
											myChart.options.scales.x.max = Math.min(myChart.options.scales.x.max - 7, data.labels.length);
									}

									if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
											myChart.options.scales.x.min = Math.max(myChart.options.scales.x.min + 7, 0);
											myChart.options.scales.x.max = Math.min(myChart.options.scales.x.max + 7, data.labels.length);
									}

									myChart.update();
							});
					}

					if (myChartElement) {
						moveScroll();
					}

			})
			.catch(error => console.error('Error fetching chart data:', error));
});

// chart dashboard Keluar
document.addEventListener('DOMContentLoaded', function() {
	const endpoint = '/chart-data-Keluar';

	fetch(endpoint)
		.then(response => response.json())
		.then(data => {
			if (!data || !data.labels || !data.mhs_keluar_genap || !data.mhs_keluar_ganjil || !data.total) {
				throw new Error("Invalid data format received from the server");
			}

			const moveChart = {
				id: 'moveChart',
				afterEvent(chart, args) {
					const { ctx, canvas, chartArea: { left, right, top, height } } = chart;

					canvas.addEventListener('mousemove', (event) => {
						const x = event.offsetX;
						const y = event.offsetY;

						if ((x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) ||
							(x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15)) {
							canvas.style.cursor = 'pointer';
						} else {
							canvas.style.cursor = 'default';
						}
					});
				},
				afterDraw(chart, args, pluginsOptions) {
					const { ctx, chartArea: { left, right, top, height } } = chart;

					class CircleChevron {
						draw(ctx, x1, pixel) {
							const angle = Math.PI / 180;
							ctx.beginPath();
							ctx.lineWidth = 3;
							ctx.strokeStyle = '#8c1515';
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
				data: {
					labels: data.labels,
					datasets: [
						{
							label: 'Genap',
							data: data.mhs_keluar_genap,
							backgroundColor: "#031e23",
							borderColor: "#daa520",
							order: 1,
						},
						{
							label: 'Ganjil',
							data: data.mhs_keluar_ganjil,
							backgroundColor: "#daa520",
							borderColor: "#031e23",
							order: 1,
						},
						{
							label: "Total",
							data: data.total,
							backgroundColor: "red",
							borderColor: "red",
							fill: false,
							pointHoverRadius: 20,
							pointHoverBorderWidth: 5,
							type: "line",
							order: 0,
						},
					],
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					layout: {
						padding: {
							right: 18
						}
					},
					scales: {
						x: {
							min: 0,
							max: 6,
							stacked: true,
							title: {
								display: true,
								text: "Program Studi"
							},
							grid: {
								display: true,
								color: "#a7a7a7",
								lineWidth: 1,
							},
						},
						y: {
							beginAtZero: true,
							stacked: true,
							title: {
								display: true,
								text: "Jumlah Mahasiswa Keluar"
							},
							grid: {
								display: true,
								color: "#a7a7a7",
								lineWidth: 1, 
							},
						},
					},
					plugins: [moveChart]
				}
			};

			var myChart = null;
			const myChartElement = document.getElementById('myChartKeluar');
			if (myChartElement) {
				myChart = new Chart(myChartElement, config);
			}

			function moveScroll() {
				const { ctx, canvas, chartArea: { left, right, top, height } } = myChart;

				canvas.addEventListener('click', (event) => {
					const rect = canvas.getBoundingClientRect();
					const x = event.clientX - rect.left;
					const y = event.clientY - rect.top;

					if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
						myChart.options.scales.x.min = Math.max(myChart.options.scales.x.min - 7, 0);
						myChart.options.scales.x.max = Math.min(myChart.options.scales.x.max - 7, data.labels.length);
					}

					if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
						myChart.options.scales.x.min = Math.max(myChart.options.scales.x.min + 7, 0);
						myChart.options.scales.x.max = Math.min(myChart.options.scales.x.max + 7, data.labels.length);
					}

					myChart.update();
				});
			}

			if (myChartElement) {
				moveScroll();
			}

		})
		.catch(error => console.error('Error fetching chart data:', error));
});

// chart dashboard Wafat
document.addEventListener('DOMContentLoaded', function() {
	const endpoint = '/chart-data-Wafat';

	fetch(endpoint)
		.then(response => response.json())
		.then(data => {
			if (!data || !data.labels || !data.mhs_wafat_genap || !data.mhs_wafat_ganjil || !data.total) {
				throw new Error("Invalid data format received from the server");
			}

			const moveChart = {
				id: 'moveChart',
				afterEvent(chart, args) {
					const { ctx, canvas, chartArea: { left, right, top, height } } = chart;

					canvas.addEventListener('mousemove', (event) => {
						const x = event.offsetX;
						const y = event.offsetY;

						if ((x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) ||
							(x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15)) {
							canvas.style.cursor = 'pointer';
						} else {
							canvas.style.cursor = 'default';
						}
					});
				},
				afterDraw(chart, args, pluginsOptions) {
					const { ctx, chartArea: { left, right, top, height } } = chart;

					class CircleChevron {
						draw(ctx, x1, pixel) {
							const angle = Math.PI / 180;
							ctx.beginPath();
							ctx.lineWidth = 3;
							ctx.strokeStyle = '#8c1515';
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
				data: {
					labels: data.labels,
					datasets: [
						{
							label: 'Genap',
							data: data.mhs_wafat_genap,
							backgroundColor: "#031e23",
							borderColor: "#daa520",
							order: 1,
						},
						{
							label: 'Ganjil',
							data: data.mhs_wafat_ganjil,
							backgroundColor: "#daa520",
							borderColor: "#031e23",
							order: 1,
						},
						{
							label: "Total",
							data: data.total,
							backgroundColor: "red",
							borderColor: "red",
							fill: false,
							pointHoverRadius: 20,
							pointHoverBorderWidth: 5,
							type: "line",
							order: 0,
						},
					],
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					layout: {
						padding: {
							right: 18
						}
					},
					scales: {
						x: {
							min: 0,
							max: 6,
							stacked: true,
							title: {
								display: true,
								text: "Program Studi"
							},
							grid: {
								display: true,
								color: "#a7a7a7",
								lineWidth: 1,
							},
						},
						y: {
							beginAtZero: true,
							stacked: true,
							title: {
								display: true,
								text: "Jumlah Mahasiswa Wafat"
							},
							grid: {
								display: true,
								color: "#a7a7a7",
								lineWidth: 1, 
							},
						},
					},
					plugins: [moveChart]
				}
			};

			var myChart = null;
			const myChartElement = document.getElementById('myChartWafat');
			if (myChartElement) {
				myChart = new Chart(myChartElement, config);
			}

			function moveScroll() {
				const { ctx, canvas, chartArea: { left, right, top, height } } = myChart;

				canvas.addEventListener('click', (event) => {
					const rect = canvas.getBoundingClientRect();
					const x = event.clientX - rect.left;
					const y = event.clientY - rect.top;

					if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
						myChart.options.scales.x.min = Math.max(myChart.options.scales.x.min - 7, 0);
						myChart.options.scales.x.max = Math.min(myChart.options.scales.x.max - 7, data.labels.length);
					}

					if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
						myChart.options.scales.x.min = Math.max(myChart.options.scales.x.min + 7, 0);
						myChart.options.scales.x.max = Math.min(myChart.options.scales.x.max + 7, data.labels.length);
					}

					myChart.update();
				});
			}

			if (myChartElement) {
				moveScroll();
			}

		})
		.catch(error => console.error('Error fetching chart data:', error));
});

// chart dashboard Lulus
document.addEventListener('DOMContentLoaded', function() {
	const endpoint = '/chart-data-Lulus';

	fetch(endpoint)
			.then(response => response.json())
			.then(data => {
					if (!data || !data.labels || !data.datasets) {
							throw new Error("Invalid data format received from the server");
					}

					const datasets = data.datasets.map(dataset => ({
							label: dataset.label,
							data: dataset.data,
							backgroundColor: dataset.backgroundColor,
							borderColor: dataset.borderColor,
							borderWidth: 2,
							type: dataset.type,
							order: dataset.order,
							fill: dataset.fill,
					}));

					const config = {
							type: 'bar',
							data: {
									labels: data.labels,
									datasets: datasets,
							},
							options: {
									responsive: true,
									maintainAspectRatio: false,
									scales: {
											x: {
													stacked: true,
													title: {
															display: true,
															text: "Program Studi"
													},
													grid: {
															display: true,
															color: "#a7a7a7",
															lineWidth: 1,
													},
											},
											y: {
													beginAtZero: true,
													stacked: true,
													title: {
															display: true,
															text: "Jumlah Mahasiswa Lulus"
													},
													grid: {
															display: true,
															color: "#a7a7a7",
															lineWidth: 1, 
													},
											},
									},
							},
					};

					var myChart = null;
					const myChartElement = document.getElementById('myChartLulus');
					if (myChartElement) {
							myChart = new Chart(myChartElement, config);
					}

			})
			.catch(error => console.error('Error fetching chart data:', error));
});


// chart dashboard MhsTA
document.addEventListener("DOMContentLoaded", function() {
	const endpoint = '/chartDataMhsTA'; // Ganti dengan endpoint yang sesuai

	fetch(endpoint)
			.then(response => response.json())
			.then(data => {
					const labels = data.labels;
					const mhsTASum = data.mhsTASum;

					const chartData = {
							labels: labels,
							datasets: [{
									label: 'Jumlah Mahasiswa TA', 
									data: mhsTASum,
									backgroundColor: '#daa520',
									borderColor: '#1b3133',
									borderWidth: 3
							}]
					};

					const moveChart = {
							id: 'moveChart',
							afterEvent(chart, args) {
									const { ctx, canvas, chartArea: { left, right, top, height } } = chart;

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
									const { ctx, chartArea: { left, right, top, bottom, width, height } } = chart;

									class CircleChevron {
											draw(ctx, x1, pixel) {
													const angle = Math.PI / 180;
													ctx.beginPath();
													ctx.lineWidth = 3;
													ctx.strokeStyle = 'rgba(102, 102, 102, 0.5)';
													ctx.fillStyle = '#1b3133';
													ctx.arc(x1, height / 2 + top, 15, angle * 0, angle * 360, false);
													ctx.stroke();
													ctx.fill();
													ctx.closePath();

													// Chevron Arrow Left
													ctx.beginPath();
													ctx.lineWidth = 3;
													ctx.strokeStyle = '#daa520';
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
							data: chartData,
							options: {
									layout: {
											padding: {
													right: 18
											}
									},
									responsive: true,
									maintainAspectRatio: false,
									scales: {
											x: {
													min: 0,
													max: 6,
													stacked: true,
													title: {
															display: true,
															text: "Program Studi"
													},
													grid: {
															display: true,
															color: "#a7a7a7",
															lineWidth: 1
													}
											},
											y: {
													beginAtZero: true,
													stacked: true,
													title: {
															display: true,
															text: "Jumlah"
													},
													grid: {
															display: true,
															color: "#a7a7a7",
															lineWidth: 1
													}
											}
									}
							},
							plugins: [moveChart]
					};

					var myChart = null;
					const myChartElement = document.getElementById('myChartMhsTA');
					if (myChartElement) {
							myChart = new Chart(myChartElement, config);
					}

					function moveScroll() {
							const { ctx, canvas, chartArea: { left, right, top, height } } = myChart;

							canvas.addEventListener('click', (event) => {
									const rect = canvas.getBoundingClientRect();
									const x = event.clientX - rect.left;
									const y = event.clientY - rect.top;

									if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
											console.log("Clicked left button");
											myChart.options.scales.x.min = myChart.options.scales.x.min - 7;
											myChart.options.scales.x.max = myChart.options.scales.x.max - 7;
											if (myChart.options.scales.x.min <= 0) {
													myChart.options.scales.x.min = 0;
													myChart.options.scales.x.max = 6;
											}
									}

									if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
											console.log("Clicked right button");
											myChart.options.scales.x.min = myChart.options.scales.x.min + 7;
											myChart.options.scales.x.max = myChart.options.scales.x.max + 7;
											if (myChart.options.scales.x.max >= chartData.datasets[0].data.length) {
													myChart.options.scales.x.min = chartData.datasets[0].data.length - 7;
													myChart.options.scales.x.max = chartData.datasets[0].data.length;
											}
									}
									myChart.update();
							});
					}

					if (myChartElement) {
							moveScroll();
					}
			});
});

// filter chart Rekap Mahasiswa
document.addEventListener("DOMContentLoaded", function() {
	const chartSelector = document.getElementById('chartSelectorRekap');
	const aktifpmbCanvas = document.getElementById('myChartMhsAktif');
	const undurdiriCanvas = document.getElementById('myChartUndurDiri');
	const keluarCanvas = document.getElementById('myChartKeluar');
	const wafatCanvas = document.getElementById('myChartWafat');
	const lulusCanvas = document.getElementById('myChartLulus');
	const MhsTACanvas = document.getElementById('myChartMhsTA');

	function updateChartVisibility() {
			const selectedValue = chartSelector.value;
			if (selectedValue === 'aktifpmb') {
					aktifpmbCanvas.style.display = 'block';
					undurdiriCanvas.style.display = 'none';
					keluarCanvas.style.display = 'none';
					wafatCanvas.style.display = 'none';
					lulusCanvas.style.display = 'none';
					MhsTACanvas.style.display = 'none';
			}	
			else if (selectedValue === 'undurdiri') {
					aktifpmbCanvas.style.display = 'none';
					undurdiriCanvas.style.display = 'block';
					keluarCanvas.style.display = 'none';
					wafatCanvas.style.display = 'none';
					lulusCanvas.style.display = 'none';
					MhsTACanvas.style.display = 'none';
			}
			else if (selectedValue === 'keluar') {
					aktifpmbCanvas.style.display = 'none';
					undurdiriCanvas.style.display = 'none';
					keluarCanvas.style.display = 'block';
					wafatCanvas.style.display = 'none';
					lulusCanvas.style.display = 'none';
					MhsTACanvas.style.display = 'none';
			}
			else if (selectedValue === 'wafat') {
					aktifpmbCanvas.style.display = 'none';
					undurdiriCanvas.style.display = 'none';
					keluarCanvas.style.display = 'none';
					wafatCanvas.style.display = 'block';
					lulusCanvas.style.display = 'none';
					MhsTACanvas.style.display = 'none';
			}
			else if (selectedValue === 'lulus') {
					aktifpmbCanvas.style.display = 'none';
					undurdiriCanvas.style.display = 'none';
					keluarCanvas.style.display = 'none';
					wafatCanvas.style.display = 'none';
					lulusCanvas.style.display = 'block';
					MhsTACanvas.style.display = 'none';
			}
			else if (selectedValue === 'MhsTA') {
					aktifpmbCanvas.style.display = 'none';
					undurdiriCanvas.style.display = 'none';
					keluarCanvas.style.display = 'none';
					wafatCanvas.style.display = 'none';
					lulusCanvas.style.display = 'none';
					MhsTACanvas.style.display = 'block';
			}
	}

	chartSelector.addEventListener('change', updateChartVisibility);
	updateChartVisibility();
});

// ============================================================
// chart dashboard Prestasi
document.addEventListener("DOMContentLoaded", function() {
	const endpoint = '/chartDataPrestasi'; 

	fetch(endpoint)
		.then(response => response.json())
		.then(data => {
			const labels = data.labels;
			const jumlahPrestasi = data.prestasiCount; 

			const chartData = {
				labels: labels,
				datasets: [{
					label: 'Jumlah Prestasi Mahasiswa', 
					data: jumlahPrestasi,
					backgroundColor: '#daa520',
					borderColor: '#1b3133',
					borderWidth: 3
				}]
			};

			const moveChart = {
				id: 'moveChart',
				afterEvent(chart, args) {
					const { ctx, canvas, chartArea: { left, right, top, height } } = chart;

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
					const { ctx, chartArea: { left, right, top, bottom, width, height } } = chart;

					class CircleChevron {
						draw(ctx, x1, pixel) {
							const angle = Math.PI / 180;
							ctx.beginPath();
							ctx.lineWidth = 3;
							ctx.strokeStyle = 'rgba(102, 102, 102, 0.5)';
							ctx.fillStyle = '#1b3133';
							ctx.arc(x1, height / 2 + top, 15, angle * 0, angle * 360, false);
							ctx.stroke();
							ctx.fill();
							ctx.closePath();

							// Chevron Arrow Left
							ctx.beginPath();
							ctx.lineWidth = 3;
							ctx.strokeStyle = '#daa520';
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
			}

			const config = {
				type: 'bar',
				data: chartData,
				options: {
					layout: {
						padding: {
							right: 18
						}
					},
					responsive: true,
					maintainAspectRatio: false,
					scales: {
						x: {
							min: 0,
							max: 6,
							stacked: true,
							title: {
								display: true,
								text: "Program Studi"
							},
							grid: {
								display: true,
								color: "#a7a7a7",
								lineWidth: 1
							}
						},
						y: {
							beginAtZero: true,
							stacked: true,
							title: {
								display: true,
								text: "Jumlah"
							},
							grid: {
								display: true,
								color: "#a7a7a7",
								lineWidth: 1
							}
						}
					}
				},
				plugins: [moveChart]
			};

			var myChart = null;
			const myChartElement = document.getElementById('myChartPrestasi');
			if (myChartElement) {
				myChart = new Chart(myChartElement, config);
			}

			function moveScroll() {
				const { ctx, canvas, chartArea: { left, right, top, height } } = myChart;

				canvas.addEventListener('click', (event) => {
					const rect = canvas.getBoundingClientRect();
					const x = event.clientX - rect.left;
					const y = event.clientY - rect.top;

					if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
						console.log("Clicked left button");
						myChart.options.scales.x.min = myChart.options.scales.x.min - 7;
						myChart.options.scales.x.max = myChart.options.scales.x.max - 7;
						if (myChart.options.scales.x.min <= 0) {
							myChart.options.scales.x.min = 0;
							myChart.options.scales.x.max = 6;
						}
					}

					if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
						console.log("Clicked right button");
						myChart.options.scales.x.min = myChart.options.scales.x.min + 7;
						myChart.options.scales.x.max = myChart.options.scales.x.max + 7;
						if (myChart.options.scales.x.max >= chartData.datasets[0].data.length) {
							myChart.options.scales.x.min = chartData.datasets[0].data.length - 7;
							myChart.options.scales.x.max = chartData.datasets[0].data.length;
						}
					}
					myChart.update();
				})
			}
			if (myChartElement) {
				moveScroll();
			}
		});
});

// chart dashboard Izin Kegiatan HIMA
document.addEventListener("DOMContentLoaded", function() {
	const endpoint = '/chartDataKegiatan'; 

	fetch(endpoint)
		.then(response => response.json())
		.then(data => {
			const labels = data.labels;
			const jumlahKegiatan = data.kegiatanCount; 

			const chartData = {
				labels: labels,
				datasets: [{
					label: 'Jumlah Kegiatan', 
					data: jumlahKegiatan,
					backgroundColor: '#daa520',
					borderColor: '#1b3133',
					borderWidth: 3
				}]
			};

			const moveChart = {
				id: 'moveChart',
				afterEvent(chart, args) {
					const { ctx, canvas, chartArea: { left, right, top, height } } = chart;

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
					const { ctx, chartArea: { left, right, top, bottom, width, height } } = chart;

					class CircleChevron {
						draw(ctx, x1, pixel) {
							const angle = Math.PI / 180;
							ctx.beginPath();
							ctx.lineWidth = 3;
							ctx.strokeStyle = 'rgba(102, 102, 102, 0.5)';
							ctx.fillStyle = '#1b3133';
							ctx.arc(x1, height / 2 + top, 15, angle * 0, angle * 360, false);
							ctx.stroke();
							ctx.fill();
							ctx.closePath();

							// Chevron Arrow Left
							ctx.beginPath();
							ctx.lineWidth = 3;
							ctx.strokeStyle = '#daa520';
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
			}

			const config = {
				type: 'bar',
				data: chartData,
				options: {
					layout: {
						padding: {
							right: 18
						}
					},
					responsive: true,
					maintainAspectRatio: false,
					scales: {
						x: {
							min: 0,
							max: 6,
							stacked: true,
							title: {
								display: true,
								text: "Program Studi"
							},
							grid: {
								display: true,
								color: "#a7a7a7",
								lineWidth: 1
							}
						},
						y: {
							beginAtZero: true,
							stacked: true,
							title: {
								display: true,
								text: "Jumlah"
							},
							grid: {
								display: true,
								color: "#a7a7a7",
								lineWidth: 1
							}
						}
					}
				},
				plugins: [moveChart]
			};

			var myChart = null;
			const myChartElement = document.getElementById('myChartKegiatan');
			if (myChartElement) {
				myChart = new Chart(myChartElement, config);
			}

			function moveScroll() {
				const { ctx, canvas, chartArea: { left, right, top, height } } = myChart;

				canvas.addEventListener('click', (event) => {
					const rect = canvas.getBoundingClientRect();
					const x = event.clientX - rect.left;
					const y = event.clientY - rect.top;

					if (x >= left - 15 && x <= left + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
						console.log("Clicked left button");
						myChart.options.scales.x.min = myChart.options.scales.x.min - 7;
						myChart.options.scales.x.max = myChart.options.scales.x.max - 7;
						if (myChart.options.scales.x.min <= 0) {
							myChart.options.scales.x.min = 0;
							myChart.options.scales.x.max = 6;
						}
					}

					if (x >= right - 15 && x <= right + 15 && y >= height / 2 + top - 15 && y <= height / 2 + top + 15) {
						console.log("Clicked right button");
						myChart.options.scales.x.min = myChart.options.scales.x.min + 7;
						myChart.options.scales.x.max = myChart.options.scales.x.max + 7;
						if (myChart.options.scales.x.max >= chartData.datasets[0].data.length) {
							myChart.options.scales.x.min = chartData.datasets[0].data.length - 7;
							myChart.options.scales.x.max = chartData.datasets[0].data.length;
						}
					}
					myChart.update();
				})
			}
			if (myChartElement) {
				moveScroll();
			}
		});
});

// filter chart Prestasi dan Kegiatan 
document.addEventListener("DOMContentLoaded", function() {
	const chartSelector = document.getElementById('chartSelector');
	const prestasiCanvas = document.getElementById('myChartPrestasi');
	const kegiatanCanvas = document.getElementById('myChartKegiatan');

	function updateChartVisibility() {
			const selectedValue = chartSelector.value;
			if (selectedValue === 'prestasi') {
					prestasiCanvas.style.display = 'block';
					kegiatanCanvas.style.display = 'none';
			} else if (selectedValue === 'kegiatan') {
					prestasiCanvas.style.display = 'none';
					kegiatanCanvas.style.display = 'block';
			} else {
					prestasiCanvas.style.display = 'none';
					kegiatanCanvas.style.display = 'none';
			}
	}

	chartSelector.addEventListener('change', updateChartVisibility);

	// Set default chart visibility on page load
	updateChartVisibility();
});





