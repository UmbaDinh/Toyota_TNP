$(document).ready(function() {

	// Bar Chart
	
	Morris.Bar({
		element: 'bar-charts',
		data: [
			{ y: '1', a: 100},
			{ y: '2', a: 75 },
			{ y: '3', a: 100 }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Điểm KPI'],
		lineColors: ['#f43b48','#453a94'],
		lineWidth: '3px',
		barColors: ['#f43b48','#453a94'],
		resize: true,
		redraw: true
	});
	
	// Line Chart
	
	// Morris.Line({
	// 	element: 'line-charts',
	// 	data: [
	// 		{ y: '2006', a: 50, b: 90 },
	// 		{ y: '2007', a: 75,  b: 65 },
	// 		{ y: '2008', a: 50,  b: 40 },
	// 		{ y: '2009', a: 75,  b: 65 },
	// 		{ y: '2010', a: 50,  b: 40 },
	// 		{ y: '2011', a: 75,  b: 65 },
	// 		{ y: '2012', a: 100, b: 50 }
	// 	],
	// 	xkey: 'y',
	// 	ykeys: ['a', 'b'],
	// 	labels: ['Total Sales', 'Total Revenue'],
	// 	lineColors: ['#f43b48','#453a94'],
	// 	lineWidth: '3px',
	// 	resize: true,
	// 	redraw: true
	// });
		
});