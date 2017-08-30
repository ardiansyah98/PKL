
<script type="text/javascript">
		jQuery(function(){
		   new Highcharts.Chart({
		        chart: {
		            renderTo: 'rekap_chart',
		            type: 'line',
		        },
		        title: {
		            text: 'Statistik Penggunaan Anggaran Tahun <?php echo $thn_sekarang[0] ?>',
		            x: -20
		        },
		        subtitle: {
		            text: 'Empowerment',
		            x: -20
		        },
		        xAxis: {
		            categories: <?php echo json_encode($bulan); ?>,
	              labels: {
	                //enabled: false // disable labels
	                step: 1
	              }
		        },
		        yAxis: {
		            title: {
		                text: 'Jumlah Penggunaan'
		            },
	              min: 0
		        },
		        series: [
	            {
		            name: 'Penggunaan',
		            data: <?php echo json_encode($total_penggunaan); ?>
	            }
	            ]
	        });
	      });
		</script> 