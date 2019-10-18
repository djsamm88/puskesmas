<section class="content-header">
      <h1>
        <?php echo $judul?>
      </h1>     
    </section>

    <!-- Main content -->
    <section class="content">
      
	  
	   <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $judul?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">


			<table class="table table-bordered" id="all_user">
				<thead>
				<tr>
					
					<th> NO. </th>
					<th> ID OBAT </th>
					<th> OBAT </th>					
					<th> SATUAN</th>					
					<th> TGL EXPIRE</th>										
					<th>PERSEDIAAN</th>					
					<th>KATEGORI</th>					
					
				</tr>
				
				
				</thead>

				<tbody>
			<?php
			$no=0;
			foreach($query as $row) {
				$no++;
				
				echo "<tr>";
				echo "
					<td>$no</td>
					<td>$row->id_obat</td>
					<td>$row->obat</td>					
					<td>$row->satuan</td>					
					<td>".tglindo($row->tgl_expire)."</td>					
					<td>$row->stok</td>
					<td>$row->kategori</td>
				";
					
				echo "</tr>";
				
			}
			?>
				</tbody>
			</table>
		
		
		
		<!-- body-->
		</div>
 
 </section>
 