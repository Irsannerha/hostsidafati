var chartbarOptions5 = {
	chart: {
		height: 350,
		type: 'bar',
		parentHeightOffset: 0,
		fontFamily: 'Poppins, sans-serif',
		toolbar: {
			show: false,
		},
	},
	colors: ['#097488'], // Menghapus warna untuk bar 'Complete'
	grid: {
		borderColor: '#c7d2dd',
		strokeDashArray: 5,
	},
	plotOptions: {
		bar: {
			horizontal: false,
			columnWidth: '50%', // Mengatur lebar kolom menjadi 15%
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
		name: 'Mahasiswa',
		data: [400, 650, 778, 820, 996],
	}],
	xaxis: {
		categories: ['2020', '2021', '2022', '2023', '2024'],
		labels: {
			style: {
				colors: ['#353535'],
				fontSize: '16px',
			},
		},
		axisBorder: {
			color: '#8fa6bc',
		}
	}, // Tambah koma di sini
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
			color: '#8fa6bc',
		}
	},
	legend: {
		show: false, // Menghilangkan legend untuk bar 'Complete'
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

var chartbar = new ApexCharts(document.querySelector("#chartbar"), chartbarOptions5);
chartbar.render();
