  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('NAMA');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
	  
	  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
       
	   
		
		
		<li>
			<a href="">
				<i class="fa fa-home"></i> <span>Beranda </span>            
			</a>
		 </li>


		 <?php 
		 if($is_super_admin)
		 {
		 ?>
		 
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>MASTER</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
		<li>
			<a href="#" onclick="eksekusi_controller('index.php/home/list_admin')">
				<i class="fa fa-user-md"></i> <span>Master Pegawai </span>            
			</a>
		 </li>

		 <hr>
		 

					 <li>
						<a href="#" onclick="eksekusi_controller('index.php/home/list_relasi_dokter')">
							<i class="fa fa-user-md"></i> <span>Dokter </span>            
						</a>
					 </li>

					 <li>
						<a href="#" onclick="eksekusi_controller('index.php/relasi_perawat/list_relasi_perawat')">
							<i class="fa fa-user-md"></i> <span>Perawat </span>            
						</a>
					 </li>

					 


					 <li>
						<a href="#" onclick="eksekusi_controller('index.php/home/list_relasi_jabatan')">
							<i class="fa fa-user-md"></i> <span>Pejabat </span>            
						</a>
					 </li>

					<li>
						<a href="#" onclick="eksekusi_controller('index.php/relasi_staff/list_relasi_staff')">
							<i class="fa fa-user-md"></i> <span>Staff </span>            
						</a>
					 </li>

					 



					 <li>
						<a href="#" onclick="eksekusi_controller('index.php/home/list_relasi_unit')">
							<i class="fa fa-user-md"></i> <span>Petugas Unit </span>            
						</a>
					 </li>
					 


					 <li>
						<a href="#" onclick="eksekusi_controller('index.php/relasi_farmasi/list_relasi_farmasi')">
							<i class="fa fa-user-md"></i> <span>Petugas Farmasi </span>            
						</a>
					 </li>

					 <li>
						<a href="#" onclick="eksekusi_controller('index.php/home/list_relasi_lab')">
							<i class="fa fa-user-md"></i> <span>Petugas Lab </span>            
						</a>
					 </li>
					 

					 <li>
						<a href="#" onclick="eksekusi_controller('index.php/relasi_konseling/list_relasi_konseling')">
							<i class="fa fa-user-md"></i> <span>Petugas Konseling </span>            
						</a>
					 </li>
					 

					 <li>
						<a href="#" onclick="eksekusi_controller('index.php/relasi_gizi/list_relasi_gizi')">
							<i class="fa fa-user-md"></i> <span>Petugas Gizi </span>            
						</a>
					 </li>


					 <li>
						<a href="#" onclick="eksekusi_controller('index.php/relasi_rawatinap/list_relasi_rawatinap')">
							<i class="fa fa-user-md"></i> <span>Petugas Rawat Inap </span>            
						</a>
					 </li>


					 <li>
						<a href="#" onclick="eksekusi_controller('index.php/relasi_rujukan/list_relasi_rujukan')">
							<i class="fa fa-user-md"></i> <span>Petugas Rujukan </span>            
						</a>
					 </li>

		 <hr>
		 

		<li>
			<a href="#" onclick="eksekusi_controller('index.php/pasien/data_list')">
				<i class="fa fa-users"></i> <span>Master Pasien </span>            
			</a>
		 </li>


		<li>
			<a href="#" onclick="eksekusi_controller('index.php/diagnosa/all')">
				<i class="fa fa-folder"></i> <span>Master Diagnosa </span>            
			</a>
		 </li>


		<li>
			<a href="#" onclick="eksekusi_controller('index.php/diagnosa_perawat/all')">
				<i class="fa fa-folder"></i> <span>Master Diagnosa Perawat</span>            
			</a>
		 </li>


		<li>
			<a href="#" onclick="eksekusi_controller('index.php/obat/data_list')">
				<i class="fa fa-folder"></i> <span>Master Obat</span>            
			</a>
		 </li>
		 


		<li>
			<a href="#" onclick="eksekusi_controller('index.php/home/list_poli')">
				<i class="fa fa-folder"></i> <span>Master Poli</span>            
			</a>
		 </li>


		
		<li>
			<a href="#" onclick="eksekusi_controller('index.php/home/list_dokter')">
				<i class="fa fa-folder"></i> <span>Master Spesialis </span>            
			</a>
		 </li>


		<li>
			<a href="#" onclick="eksekusi_controller('index.php/home/list_kecamatan')">
				<i class="fa fa-folder"></i> <span>Master Kecamatan </span>            
			</a>
		 </li>
		 
		 <li>
			<a href="#" onclick="eksekusi_controller('index.php/home/list_desa')">
				<i class="fa fa-folder"></i> <span>Master Desa </span>            
			</a>
		 </li>

		 <li>
			<a href="#" onclick="eksekusi_controller('index.php/master_lab/all_master_lab')">
				<i class="fa fa-folder"></i> <span>Master Lab </span>            
			</a>
		 </li>
		 <li>
			<a href="#" onclick="eksekusi_controller('index.php/master_rawat_inap/all_master_rawat_inap')">
				<i class="fa fa-folder"></i> <span>Master Rawat Inap </span>            
			</a>
		 </li> 
		 <li>
			<a href="#" onclick="eksekusi_controller('index.php/master_konseling/all_master_ruang_konseling')">
				<i class="fa fa-folder"></i> <span>Master Ruang Konseling </span>            
			</a>
		 </li>
		 <li>
			<a href="#" onclick="eksekusi_controller('index.php/master_gizi/all')">
				<i class="fa fa-folder"></i> <span>Master Ruang Gizi </span>            
			</a>
		 </li>
		 
		 
          </ul>
        </li>

        <!--
		 <li>
			<a href="#" onclick="eksekusi_controller('index.php/obat/persetujuan_kapus')">
				<i class="fa  fa-heart-o"></i> <span>DISTRIBUSI OBAT/KAPUS <span class="label label-warning badge_kapus" ></span></span>            
			</a>
		 </li>


		  <li class="treeview">
          <a href="#">
            <i class="fa fa-medkit"></i> <span>DISTRIBUSI OBAT/UNIT <span class="label label-warning" id=""></span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>          
          <ul class="treeview-menu">
            <li><a href="#" onclick="eksekusi_controller('index.php/obat/form_permintaan')">
					<i class="fa fa-circle-o"></i> <span>Form Permintaan</span>            
				</a>
			 </li>
            
			<li><a href="#" onclick="eksekusi_controller('index.php/obat/data_obat_permintaan_by_id_pegawai')">
					<i class="fa fa-circle-o"></i> <span>History Permintaan</span>            
				</a>
			</li>
            
          </ul>
        </li>
    	-->


    <?php } ?>
		 
		 
		 
		 <hr>
		 <!--
		<li>			
			<a href="#" >
				<button onclick="eksekusi_controller('index.php/kunjungan/form_simpan')" class="btn btn-primary"><span class="fa fa-eyedropper"></span> PEMERIKSAAN</button>
			</a>
		 </li>
		 
		 
		<li>
			<a href="#" onclick="eksekusi_controller('index.php/kunjungan/data_list')">
				<i class="fa  fa-heart-o"></i> <span>DATA PEMERIKSAAN</span>            
			</a>
		 </li>
		 -->
		 <?php 
		 if($is_staff)
		 {?>
		 	
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>REKAM MEDIS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="eksekusi_controller('index.php/pasien/data_list')">
					<i class="fa fa-circle-o"></i> <span>Daftar Pasien</span>            
				</a>
			 </li>
            
			<li><a href="#" onclick="eksekusi_controller('index.php/keluhan/form')">
					<i class="fa fa-circle-o"></i> <span>Keluhan</span>            
				</a>
			</li>
		
			
            
          </ul>
        </li>
		 
		 
		 <?php 
		 }

		 ?>

		<?php 
		if($is_dokter || $is_perawat ||$is_super_admin)
		{
		 ?>
		 
		 
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>REKAM MEDIS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="eksekusi_controller('index.php/pasien/data_list')">
					<i class="fa fa-circle-o"></i> <span>Daftar Pasien</span>            
				</a>
			 </li>
            
			<li><a href="#" onclick="eksekusi_controller('index.php/keluhan/form')">
					<i class="fa fa-circle-o"></i> <span>Keluhan</span>            
				</a>
			</li>
		
			
            
          </ul>
        </li>
		 
		 
		 
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>PEMERIKSAAN <span class="label label-warning badge_keluhan" id=""></span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="eksekusi_controller('index.php/keluhan/data_list')">
					<i class="fa fa-circle-o"></i> <span>Diagnosa Dokter <span class="label label-warning badge_keluhan" id=""></span></span>            
				</a>
			 </li>
			 <li><a href="#" onclick="eksekusi_controller('index.php/keluhan/data_list_history')">
					<i class="fa fa-circle-o"></i> <span>History</span>            
				</a>
			 </li>
		
			
            
          </ul>
        </li>
		 

        <?php 
        }
        
        if($petugas_farmasi || $is_pengelola_obat || $is_super_admin)
        {
        ?>

		 
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-medkit"></i> <span>FARMASI <span class="label label-warning badge_farmasi" ></span> <span class="label label-warning badge_farmasi_verifikasi" ></span> <span class="label label-warning badge_farmasi_cetak"></span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="eksekusi_controller('index.php/kunjungan/data_list_farmasi')">
					<i class="fa fa-circle-o"></i> <span>Cetak Resep <span class="label label-warning badge_farmasi" ></span></span>            
				</a>
			 </li>
			 <li><a href="#" onclick="eksekusi_controller('index.php/kunjungan/data_list_farmasi_history')">
					<i class="fa fa-circle-o"></i> <span>History Resep <span class="label label-warning" ></span></span>            
				</a>
			 </li>
            
			<li><a href="#" onclick="eksekusi_controller('index.php/obat/data_permintaan_farmasi')">
					<i class="fa fa-circle-o"></i> <span>Verifikasi Distribusi <span class="label label-warning badge_farmasi_verifikasi"></span></span>            
				</a>
			</li>


			<li><a href="#" onclick="eksekusi_controller('index.php/obat/cetak_pegiriman')">
					<i class="fa fa-circle-o"></i> <span>Cetak Distribusi <span class="label label-warning badge_farmasi_cetak"></span></span>            
				</a>
			</li>



			<li><a href="#" onclick="eksekusi_controller('index.php/obat/data_obat_permintaan_history')">
					<i class="fa fa-circle-o"></i> <span>History Distribusi <span class="label label-warning badge_farmasi_cetak"></span></span>            
				</a>
			</li>
            
          </ul>
        </li>

        <?php 
        }

        if($petugas_gizi || $is_super_admin)
        {
        ?>

		  <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>RUANG GIZI <span class="label label-warning badge_gizi" id=""></span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="eksekusi_controller('index.php/master_gizi/data_kunjungan_gizi')">
					<i class="fa fa-circle-o"></i> <span>Proses <span class="label label-warning badge_gizi"></span></span>            
				</a>
			 </li>
			 <li><a href="#" onclick="eksekusi_controller('index.php/master_gizi/data_kunjungan_gizi_history')">
					<i class="fa fa-circle-o"></i> <span>History</span>            
				</a>
			 </li>		
          </ul>
        </li>

        <?php 
    	}

    	if($is_petugas_lab || $is_super_admin)
    	{
        ?>

		  <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>PETUGAS LAB <span class="label label-warning badge_lab" id=""></span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="eksekusi_controller('index.php/lab/data_kunjungan_lab')">
					<i class="fa fa-circle-o"></i> <span>Proses <span class="label label-warning badge_lab"></span></span>            
				</a>
			 </li>
			 <li><a href="#" onclick="eksekusi_controller('index.php/lab/data_kunjungan_lab_history')">
					<i class="fa fa-circle-o"></i> <span>History</span>            
				</a>
			 </li>		
          </ul>
        </li>

        <?php 
    	}

    	if($is_petugas_konse || $is_super_admin)
    	{
        ?>

		  <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>PETUGAS KONSELING <span class="label label-warning badge_konse" id=""></span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="eksekusi_controller('index.php/c_konseling/data_kunjungan_konse')">
					<i class="fa fa-circle-o"></i> <span>Proses <span class="label label-warning badge_konse"></span></span>            
				</a>
			 </li>
			 <li><a href="#" onclick="eksekusi_controller('index.php/c_konseling/data_kunjungan_konse_history')">
					<i class="fa fa-circle-o"></i> <span>History</span>            
				</a>
			 </li>		
          </ul>
        </li>


        <?php 
    	}

    	if($is_petugas_rawat_inap || $is_super_admin)
    	{
        ?>
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>PETUGAS RAWAT INAP <span class="label label-warning badge_rawat" id=""></span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="eksekusi_controller('index.php/c_rawat_inap/data_kunjungan_rawatinap')">
					<i class="fa fa-circle-o"></i> <span>Proses <span class="label label-warning badge_rawat"></span></span>            
				</a>
			 </li>
			 <li><a href="#" onclick="eksekusi_controller('index.php/c_rawat_inap/data_kunjungan_rawatinap_history')">
					<i class="fa fa-circle-o"></i> <span>History</span>            
				</a>
			 </li>		
          </ul>
        </li>

        <?php 
    	}

    	if($is_rujukan || $is_super_admin)
    	{
        ?>


		  <li class="treeview">
	          <a href="#">
	            <i class="fa fa-user"></i> <span>RUJUK EKSTERNAL <span class="label label-warning badge_rujuk" id=""></span></span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="#" onclick="eksekusi_controller('index.php/rujuk_eksternal/data')">
						<i class="fa fa-circle-o"></i> <span>Proses <span class="label label-warning badge_rujuk"></span></span>            
					</a>
				 </li>
				 <li><a href="#" onclick="eksekusi_controller('index.php/rujuk_eksternal/data_history')">
						<i class="fa fa-circle-o"></i> <span>History</span>            
					</a>
				 </li>		
	          </ul>
	        </li>

       <?php 
   		}
       ?>


		 
		 
		 <!--
		 
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>LAPORAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="eksekusi_controller('index.php/laporan/form_lb1')">
					<i class="fa fa-circle-o"></i> <span>LAPORAN LB1</span>            
				</a>
			 </li>
            
			<li><a href="#" onclick="eksekusi_controller('index.php/laporan/form_p2p_diare')">
					<i class="fa fa-circle-o"></i> <span>LAPORAN P2P DIARE</span>            
				</a>
			</li>
		
			<li><a href="#" onclick="eksekusi_controller('index.php/laporan/form_laporan_ispa')">
					<i class="fa fa-circle-o"></i> <span>LAPORAN ISPA(J06)</span>            
				</a>
			</li>
		
			<li><a href="#" onclick="eksekusi_controller('index.php/laporan/form_laporan_ispa_j22')">
					<i class="fa fa-circle-o"></i> <span>LAPORAN ISPA(J22)</span>            
				</a>
			</li>
		
			<li><a href="#" onclick="eksekusi_controller('index.php/laporan/form_laporan_pneumonia')">
					<i class="fa fa-circle-o"></i> <span>LAPORAN PNEUMONIA</span>            
				</a>
			</li>
		    
          </ul>
        </li>
    	-->
		 <hr>
		<?php 
		if($is_kapus || $is_super_admin)
		{?>


		 <li>
			<a href="#" onclick="eksekusi_controller('index.php/obat/persetujuan_kapus')">
				<i class="fa  fa-heart-o"></i> <span>DISTRIBUSI OBAT/KAPUS <span class="label label-warning badge_kapus" ></span></span>            
			</a>
		 </li>

		 <hr>
		 		 

		<li>
			<a href="#" onclick="eksekusi_controller('index.php/laporan/form_laporan_by_date')">
				<i class="fa  fa-heart-o"></i> <span>LAPORAN PASIEN</span>            
			</a>
		 </li>

		<?php }
		?>

		<hr>

		<?php 
		if($is_pengelola_obat || $is_super_admin || $is_kapus)
		{
		?>


		<li>
			<a href="#" onclick="eksekusi_controller('index.php/obat/data_list_penerimaan')">
				<i class="fa fa-book"></i> <span>PENERIMAAN OBAT</span>            
			</a>
		 </li>
		 
		 
		<li>
			<a href="#" onclick="eksekusi_controller('index.php/obat/form_laporan_obat')">
				<i class="fa fa-edit"></i> <span>LAPORAN OBAT</span>            
			</a>
		 </li>


		<li>
			<a href="#" onclick="eksekusi_controller('index.php/obat/form_laporan_lplpo')">
				<i class="fa fa-edit"></i> <span>LAPORAN LPLPO</span>            
			</a>
		 </li>

		<?php 
		}
		?>

		<hr>

		 <?php 
		 if($is_unit || $is_super_admin)
		 {		 	
		 ?>

		  <li class="treeview">
          <a href="#">
            <i class="fa fa-medkit"></i> <span>DISTRIBUSI OBAT/UNIT <span class="label label-warning" id=""></span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="eksekusi_controller('index.php/obat/form_permintaan')">
					<i class="fa fa-circle-o"></i> <span>Form Permintaan</span>            
				</a>
			 </li>
            
			<li><a href="#" onclick="eksekusi_controller('index.php/obat/data_obat_permintaan_by_id_pegawai')">
					<i class="fa fa-circle-o"></i> <span>History Permintaan <span class="label label-warning badge_farmasi_unit"></span></span>            
				</a>
			</li>
            
          </ul>
        </li>
        <?php 
    		}
    	?>

		 
		
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>