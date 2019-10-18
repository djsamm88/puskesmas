<?php
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$file");

header("Pragma: no-cache");

header("Expires: 0");

?>

<b><center>LAPORAN BULANAN DIARE</center></b>
<br>
<center><?php echo bulanindo($bulan)?>  <?php echo $tahun?> </center>
<br>


<table border="1" width="100%">
	
		<tr>
			<th rowspan="2">No.</th>
			<th rowspan="2">Desa/Kel</th>
			<th colspan="2">0-7Hr</th>
			<th colspan="2">8-30Hr</th>
			<th colspan="2"><1Th</th>
			<th colspan="2">1-4Th</th>
			<th colspan="2">5-9Th</th>
			<th colspan="2">10-14Th</th>
			<th colspan="2">15-19Th</th>
			<th colspan="2">20-24Th</th>
			<th colspan="2">25-44Th</th>
			<th colspan="2">45-54Th</th>
			<th colspan="2">55-59Th</th>
			<th colspan="2">60-69Th</th>
			<th colspan="2">>=70Th</th>
			<th colspan="3">Jml</th>
		</tr>
	

	<tr>
	    
		
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								L
							</td>
							<td style="min-width:30px">
								P
							</td>
							<td style="min-width:30px">
								Baru
							</td>
							<td style="min-width:30px">
								Lama
							</td>
							<td style="min-width:30px">
								Total
							</td>
	</tr>
<?php
$no=0;

foreach ($data as $get)
{
	
	
	$no++;
		
		
	$L07	= $get->L07	;
	$P07	= $get->P07	;
	$L830	= $get->L830	;
	$P830	= $get->P830	;
	$L301	= $get->L301	;
	$P301	= $get->P301	;
	$L14	= $get->L14	;
	$P14	= $get->P14	;
	$L59	= $get->L59	;
	$P59	= $get->P59	;
	$L1014	= $get->L1014	;
	$P1014	= $get->P1014	;
	$L1519	= $get->L1519	;
	$P1519	= $get->P1519	;
	$L2024	= $get->L2024	;
    $P2024	= $get->P2024	;
    $L2544	= $get->L2544	;
    $P2544	= $get->P2544	;
    $L4554	= $get->L4554	;
    $P4554  = $get->P4554 ;
    $L5559  = $get->L5559 ;
    $P5559  = $get->P5559 ;
    $L6069  = $get->L6069 ;
    $P6069  = $get->P6069 ;
    $L70	= $get->L70	;
    $P70	= $get->P70	;
	
	
	$total_baru=0;
	$total_lama=0;
	if($get->status_kunjungan=='BARU')
	{
		$total_baru = 	$L07	+
						$P07	+
						$L830	+
						$P830	+
						$L301	+
						$P301	+
						$L14	+
						$P14	+
						$L59	+
						$P59	+
						$L1014	+
						$P1014	+
						$L1519	+
						$P1519	+
						$L2024	+
						$P2024	+
						$L2544	+
						$P2544	+
						$L4554	+
						$P4554  +
						$L5559  +
						$P5559  +
						$L6069  +
						$P6069  +
						$L70	+
						$P70	;
	}else{
		$total_lama = 	$L07	+
						$P07	+
						$L830	+
						$P830	+
						$L301	+
						$P301	+
						$L14	+
						$P14	+
						$L59	+
						$P59	+
						$L1014	+
						$P1014	+
						$L1519	+
						$P1519	+
						$L2024	+
						$P2024	+
						$L2544	+
						$P2544	+
						$L4554	+
						$P4554  +
						$L5559  +
						$P5559  +
						$L6069  +
						$P6069  +
						$L70	+
						$P70	;
	}
	
	$total = 	$L07	+
				$P07	+
				$L830	+
				$P830	+
				$L301	+
				$P301	+
				$L14	+
				$P14	+
				$L59	+
				$P59	+
				$L1014	+
				$P1014	+
				$L1519	+
				$P1519	+
				$L2024	+
				$P2024	+
				$L2544	+
				$P2544	+
				$L4554	+
				$P4554  +
				$L5559  +
				$P5559  +
				$L6069  +
				$P6069  +
				$L70	+
				$P70	;
    
	
			
echo "<tr>
		<td>$no</td>
		<td>$get->all_desa</td>			
		<td>$get->L07	</td>
		<td>$get->P07	</td>
		<td>$get->L830	</td>
		<td>$get->P830	</td>
		<td>$get->L301	</td>
		<td>$get->P301	</td>
		<td>$get->L14	</td>
		<td>$get->P14	</td>
		<td>$get->L59	</td>
		<td>$get->P59	</td>
		<td>$get->L1014	</td>
		<td>$get->P1014	</td>
		<td>$get->L1519	</td>
		<td>$get->P1519	</td>
		<td>$get->L2024	</td>
		<td>$get->P2024	</td>
		<td>$get->L2544	</td>
		<td>$get->P2544	</td>
		<td>$get->L4554	</td>
		<td>$get->P4554 </td>
		<td>$get->L5559 </td>
		<td>$get->P5559 </td>
		<td>$get->L6069 </td>
		<td>$get->P6069 </td>
		<td>$get->L70	</td>
		<td>$get->P70	</td>
		<td>$total_baru</td>
		<td>$total_lama</td>
		<td>$total</td>
	</tr>";
			
	
}

?>
		
	
</table>
<script>

</script>