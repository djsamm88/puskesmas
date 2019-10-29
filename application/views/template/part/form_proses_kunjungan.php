
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


			<?php 
			$no_pendaftaran = str_pad($all[0]->no_pendaftaran, 5, '0', STR_PAD_LEFT);
			?>
			
			<div class="row">
				
				
				<div class="col-sm-6">
					<div class="col-sm-4">No.Pendaftaran </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="no_pendaftaran_x" id="no_pendaftaran_x" readonly="readonly" value="<?php echo $no_pendaftaran?>">
					</div>
					<div style="clear:both"></div><br>

					<div class="col-sm-4">NAMA </div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nama" id="nama" disabled="" value="<?php echo $all[0]->nama?>">
					</div>
					<div style="clear:both"></div><br>

					<div class="col-sm-4">No.BPJS </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="no_bpjs" id="no_bpjs" readonly="" value="<?php echo $all[0]->no_bpjs?>">
					</div>
					<div style="clear:both"></div><br>

					<div class="col-sm-4">USIA </div>
					<div class="col-sm-8"><input type="text" class="form-control" name="usia" id="usia" readonly="" value="<?php echo $all[0]->usia?>">
					</div>
					<div style="clear:both"></div><br>
				</div>
				<form action ="home/edit_profil" method="post" id="v_edituser">
					<input type="hidden" name="no_pendaftaran" id="no_pendaftaran" value="<?php echo $no_pendaftaran?>">
					<input type="hidden" name="id_kunjungan" id="id_kunjungan" value="<?php echo $all[0]->id_kunjungan?>">
					<div class="col-sm-6">
						<div class="col-sm-4">Tanggal </div>
						<div class="col-sm-8"><input type="text" class="form-control" name="tgl_mulai" id="tgl_mulai" value="<?php echo date('Y-m-d')?>" disabled>
						</div>
						<div style="clear:both"></div><br>

						<div class="col-sm-4">Jam Mulai </div>
						<div class="col-sm-8"><input type="time" class="form-control" name="jam_mulai" id="jam_mulai" value="<?php echo date('H:i')?>" readonly>
						</div>
						<div style="clear:both"></div><br>


						<div class="col-sm-4">Jam Selesai </div>
						<div class="col-sm-8"><input type="time" class="form-control" name="jam_selesai" id="jam_selesai" readonly>
						</div>
						<div style="clear:both"></div><br>


						<div class="col-sm-4">lama pemeriksaan </div>
						<div class="col-sm-4"><input type="number" class="form-control" name="lama_pemeriksaan" id="lama_pemeriksaan" readonly>
						</div>
						<div class="col-sm-4"> menit</div>
						<div style="clear:both"></div><br>
					</div>
					<div style="clear:both"></div><br>

						<div class="col-sm-2">Keluhan Utama </div>
						<div class="col-sm-10"><textarea disabled="" class="form-control"><?php echo $all[0]->keluhan_umum?></textarea></div>

					<div style="clear:both"></div><br>

					<hr>
					<div class="col-sm-4"><b>SUBJECTIF</b></div><div style="clear: both;"></div>
					
					<div class="col-sm-4">Autonamnesis/Alloanamnesis</div>
					<br>
					<hr>
					
					<div class="col-sm-2">KU </div>
					<div class="col-sm-10"><textarea type="text" class="form-control" name="ku" required><?php echo $all[0]->ku?></textarea>
					</div>					
					<div style="clear:both"></div><br>
					

					<div class="col-sm-2">KT </div>
					<div class="col-sm-10"><textarea type="text" class="form-control" name="kt" required><?php echo $all[0]->kt?></textarea>
					</div>					
					<div style="clear:both"></div><br>

					<div class="col-sm-2">RPT </div>
					<div class="col-sm-10"><textarea type="text" class="form-control" name="rpt" required><?php echo $all[0]->rpt?></textarea>
					</div>					
					<div style="clear:both"></div><br>
					
					<div class="col-sm-2">RPO </div>
					<div class="col-sm-10"><textarea type="text" class="form-control" name="rpo" required><?php echo $all[0]->rpo?></textarea>
					</div>					
					<div style="clear:both"></div><br>
					
					<div class="col-sm-2">RPK </div>
					<div class="col-sm-10"><textarea type="text" class="form-control" name="rpk" required><?php echo $all[0]->rpk?></textarea>
					</div>					
					<div style="clear:both"></div><br>
					
					
					

					<div style="clear:both"></div><br>

					<hr>
					<div class="col-sm-4"><b>OBJECTIF</b></div><div style="clear: both;"></div>
					<br>
					
					<div class="col-sm-2">TD </div>
					<div class="col-sm-4"><input type="text" class="form-control" name="td" value="<?php echo $all[0]->td?>" required>
					</div>
					<div class="col-sm-4">mmhg</div>
					<div style="clear:both"></div><br>
					
					
					<div class="col-sm-2">HR </div>
					<div class="col-sm-4"><input type="text" class="form-control" name="hr" value="<?php echo $all[0]->hr?>" required>
					</div>
					<div class="col-sm-2">x/menit</div>
					<div style="clear:both"></div><br>
					
					<div class="col-sm-2">RR </div>
					<div class="col-sm-4"><input type="text" class="form-control" name="rr" value="<?php echo $all[0]->rr?>" required>
					</div>
					<div class="col-sm-2">x/menit</div>
					<div style="clear:both"></div><br>
					
					<div class="col-sm-2">T </div>
					<div class="col-sm-4"><input type="text" class="form-control" name="t" value="<?php echo $all[0]->t?>" required>
					</div>
					<div class="col-sm-4">&#176; C</div>
					<div style="clear:both"></div><br>
					
					<div class="col-sm-2">BERAT BADAN </div>
					<div class="col-sm-4"><input type="number" class="form-control" name="berat_badan" value="<?php echo $all[0]->berat_badan?>" required>
					</div>
					<div class="col-sm-4">Kg</div>
					<div style="clear:both"></div><br>
					
					<div class="col-sm-2">TINGGI BADAN </div>
					<div class="col-sm-4"><input type="number" class="form-control" name="tinggi_badan" value="<?php echo $all[0]->tinggi_badan?>" required>
					</div>
					<div class="col-sm-4">cm</div>
					<div style="clear:both"></div><br>


					<div class="col-sm-2">LINGKAR PERUT </div>
					<div class="col-sm-4"><input type="number" class="form-control" name="lingkar_perut" value="<?php echo $all[0]->lingkar_perut?>" required>
					</div>
					<div class="col-sm-4">cm</div>
					<div style="clear:both"></div><br>



					<div class="col-sm-2">PEMERIKSAAN FISIK</div>
					<div class="col-sm-8"><input type="text" class="form-control" name="pemeriksaan_fisik" value="<?php echo $all[0]->pemeriksaan_fisik?>" required>
					</div>
					
					<div style="clear:both"></div>
					
					<br>
					<div style="clear:both"></div>
					<br>
										

					<div class="col-sm-4">Pemeriksaan penunjang</div>
					<div class="col-sm-8">
						<div id="t4_select_hasil"></div>
						<select class="form-control" name="pemeriksaan_penunjang" id="pemeriksaan_penunjang" required="">						
							<option value="">--- Pilih ---</option>
							<option value="5">Rujukan Internal</option>
							<option value="3">Laboratorium</option>
							<option value="4">Ruang Gizi</option>
							<option value="7">Lanjut Resep</option>
						</select>
						<div id="t4_select_kedua"></div>
						
					</div>
					<br>
					<div style="clear:both"></div>
					<br>

				<!--hide pertama mulai-->
				<div id="t4_hide_pertama">
					<hr>
					<center>
						<button type="button" class="btn btn-warning" onclick="modalFoto(<?php echo $all[0]->id_kunjungan?>)"><span class="fa fa-plus-square"></span> FOTO</button>
						<div style="clear: both;"></div>
						<div id="t4_foto"></div>						
					</center>
					<div style="clear: both;"></div>

					<div class="col-sm-4"><b>ASSESMENT</b></div><div style="clear: both;"></div>
					<br>
					
					<div class="col-sm-2">DIAGNOSA </div>
					<div class="col-sm-6">						
						<div id="t4_input_diagnosa_lagi"></div>
					</div>
					<div class="col-sm-2">
						<span class="fa  fa-plus" id="tambah_diag"></span>
					</div>
					<br>
					<div class="col-sm-12">
					<table width="100%" class="table table-bordered">						
						<?php 
							foreach ($diag as $key) {
								echo "
										<tr>
											<td>$key->code_diagnosa</td><td>$key->diagnosa</td>
										</tr>
								";
							}
						?>
					</table>
					</div>
					<div style="clear:both"></div>
					<br>
					<hr>
					

					<hr>
					<div class="col-sm-4"><b>PLANNING</b></div><div style="clear: both;"></div>
					<br>
					

					
					
					<div class="col-sm-4">Rencana Terapi</div>
					<div class="col-sm-8">
						<!--<textarea class="form-control" name="rencana_terapi"></textarea>-->
					</div>
					<br>
					<div style="clear:both"></div><br>
					<!---resep dokter--->
					<div class=" " style="border:5px solid  green">					

						<div class="col-sm-4"><b>Resep Dokter</b></div><div style="clear: both;"></div>
						<br>
						<div style="clear:both"></div><br>
						<div class="col-sm-3">Cari Obat </div>
						<div class="col-sm-7">
							<input type='text' class='form-control obat' id='id_obat' value='' placeholder='Obat' >
						</div>									
						<div style="clear:both"></div><br>
						<div class="col-sm-3">Tabel Order Obat </div>
						<div class="col-sm-12">
							<table class="table table-bordered" id="table_order_obat">
								<thead>
									<tr>					
										<th>Obat</th>					
										<th>Stok</th>					
										<th>Satuan</th>
										<th>Kategori</th>
										<th>Jumlah</th>										
										<th>Aturan Pakai</th>
										<th>Waktu Konsumsi</th>
										<th>Keterangan</th>
										<th>-</th>
									</tr>
								</thead>
								<tbody id="t4_order">
								<?php 
									foreach ($obat_terpakai as $ot) {
										echo "
											<tr>
												<td>
													<input type='hidden' name='id_obat[]' value='$ot->id_obat' disabled>$ot->obat
												</td>
												<td>$ot->stok</td>
												<td>$ot->satuan</td>
												<td>$ot->kategori</td>
												<td>
													<input class='form-control jum' autofocus name='jumlah_obat[]' value='$ot->jumlah' disabled>
												</td>			
												<td>
													<input class='form-control aturan_pakai' name='aturan_pakai[]' id='aturan_pakai' value='$ot->aturan_pakai' disabled>
												</td>
												<td>
													<input class='form-control waktu_konsumsi' name='waktu_konsumsi[]' value='$ot->waktu_konsumsi' disabled>
												</td>
												<td>
													<input class='form-control' name='keterangan[]' value='$ot->waktu_konsumsi' disabled>
												</td>
											<td>
												<!--<button class='btn btn-danger btn-xs' id='remove_order_obat' type='button'>Hapus</button>-->
											</td>
										</tr>
										";
									}
								?>
								</tbody>
							</table>
						</div>
						<div style="clear:both"></div>

						<!---resep dokter--->
						<br>

						<hr style="border:2.5px solid  green">
						<!-------obat lain-------->
						<div style="clear:both"></div><br>
						<div class="col-sm-3">Tabel Obat Lainnya</div>
						<div class="col-sm-12">
							<button type="button" id="tambah_obat_lain" class="btn btn-primary">Tambah</button>
							<table class="table table-bordered" id="table_order_obat_lain">
								<thead>
									<tr>					
										<th>Obat</th>													
										<th>Satuan</th>
										<th>Jumlah</th>
										<th>Aturan Pakai</th>
										<th>Waktu Konsumsi</th>
										<th>Keterangan</th>
										<th>-</th>
									</tr>
								</thead>
								<tbody id="t4_order_obat_lain">
								<?php 
									foreach ($obat_lain as $ol) {
										echo "
											<tr>
												<td><input class='form-control ' type='text' name='nama_obat_lain[]'  value='$ol->nama_obat_lain' disabled></td>
												<td><input class='form-control ' type='text' name='satuan_obat_lain[]'  value='$ol->satuan_obat_lain' disabled></td>
												<td><input class='form-control ' autofocus name='jumlah_obat_lain[]' value='$ol->jumlah_obat_lain'  disabled></td>
												<td><input class='form-control aturan_pakai' name='aturan_pakai_obat_lain[]' value='$ol->aturan_pakai_obat_lain' id='aturan_pakai' disabled></td>
												<td><input class='form-control waktu_konsumsi' name='waktu_konsumsi_obat_lain[]' value='$ol->waktu_konsumsi_obat_lain' disabled></td>
												<td><input class='form-control' name='keterangan_obat_lain[]' value='keterangan_obat_lain' disabled></td>
												<td><!--<button class='btn btn-danger btn-xs' id='remove_order_obat_lain' type='button'>Hapus</button>--></td></tr>											
										";		
									}
								?>
								</tbody>
							</table>
						</div>
						<div style="clear:both"></div>
						<!-------obat lain-------->

						<hr style="border:2.5px solid  green">
						<!-------obat racikan-------->
						<div style="clear:both"></div><br>
						<div class="col-sm-3">Tabel Obat Racikan</div>
						<div class="col-sm-12">
							<table class="table table-bordered">
								<?php
										if(count($obat_racikan)>0)
										{
											echo "
												<tr>
													<td><b>Obat</b></td>
													<td><b>PULV</b></td>
													<td><b>Aturan Pakai</b></td>
													<td><b>Waktu Konsumsi</b></td>
													<td><b>Keterangan</b></td>
												</tr>
											";
										} 
										foreach ($obat_racikan as $or) {
											echo "
												<tr>
													<td>";

														$comma_obat = $this->m_kunjungan->ambil_obat_racikan_by_comma_id($or->id);
														echo "<table class='table table-bordered'>";
														foreach ($comma_obat as $co ) {
															echo "
																
																<tr>
																	<td>$co->obat</td>
																	<td>$co->satuan</td>
																	<td>$co->jumlah</td>
																</tr>

															";
														}
														echo "</table>";
												echo "</td>
													<td>$or->pulv </td>
													<td>$or->aturan_pakai</td>
													<td>$or->waktu_konsumsi</td>
													<td>$or->keterangan</td>
												</tr>
											";
										}
									?>
							</table>
						</div>
						<div class="col-sm-12">
							<button type="button" id="tambah_racikan" class="btn btn-primary">Tambah</button>
							<table class="table table-bordered" id="table_order_obat_racikan">								
								<tbody id="t4_group_racikan">
									
								</tbody>
							</table>
							

							
						</div>
						<div style="clear:both"></div>
						<!-------obat racikan-------->
					</div>
					<div style="clear:both"></div>
					<br>
					
					
					<div class="col-sm-4">KIE</div>
					<div class="col-sm-8">
						<textarea class="form-control" name="kie"><?php echo $all[0]->kie?></textarea>
					</div>
					<br>
					<div style="clear:both"></div>
					<br>
					
					
					<div class="col-sm-4">Rencana Rujukan</div>
					<div class="col-sm-8">
						<div id="t4_select_hasil_rujuk"></div>
						<select class="form-control" name="rencana_rujukan" id="rencana_rujukan">							
							<option value="7">Farmasi</option>
							<option value="8">Ruang Konseling</option>
							<option value="9">Rawat Inap</option>
							<option value="10">Rujukan Eksternal</option>
							
						</select>
						<div id="t4_select_kedua_rujuk"></div>
					</div>
					<br>
					<div style="clear:both"></div>
					<br>
					



					<div class="col-sm-4">DOKTER </div>
					<div class="col-sm-8">
						<select type="text" class="form-control" name="id_dokter" id="id_dokter">
							<option value="">--- Pilih Dokter ---</option>
							<?php 
							foreach ($dokter as $dok) {
								$sel_d = $dok->id_pegawai==$all[0]->id_dokter?"selected":"";								
								echo "<option value='$dok->id_pegawai' $sel_d>$dok->nama</option>";
							}
							?>
						</select>
					</div>
					<div style="clear:both"></div><br>
					
					
					
					<br>
					<div style="clear:both"></div>
					<br>
				</div>
				<!--hide pertama end-->
					
					<div class="col-sm-12"> 
						<div id="info_edit"></div>
						<div style="clear:both"></div>

						<input type="submit" name="save" value="SIMPAN" class="btn btn-block btn-primary" id="btn_simpan" />
					</div>

				</form>

			</div>

		</section>




<!-- Modal -->
<div id="modalHasil" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Hasil </h4>
      </div>
      <div class="modal-body" id="isi_modalHasil">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<style type="text/css">
	@media (min-width: 768px) {
	  .modal-xl {
	    width: 90%;
	   max-width:1200px;
	  }
	}
</style>



<script>
var timeline_ke = "<?php echo $all[0]->ke?>";
var timeline_dari = "<?php echo $all[0]->dari?>";
var id_kunjungan = "<?php echo $all[0]->id_kunjungan?>";
var id_lab = "<?php echo $all[0]->id_lab?>";
var id_ruang_gizi = "<?php echo $all[0]->id_ruang_gizi?>";

//$("#pemeriksaan_penunjang").val(timeline_ke);

load_foto();
function load_foto()
{	
	$("#t4_foto").empty();
	$.get("<?php echo base_url()?>index.php/foto/json_foto/"+id_kunjungan,function(ev){
		
		var z = "";
		$.each(ev,function(a,b){
			//b.url_foto;
			console.log(b);
			z += "<img src='<?php echo base_url()?>uploads/"+b.url_foto+"' width='200px' style='border:1px solid #aaa' onclick=' modalFoto("+id_kunjungan+")'>";
		})
		$("#t4_foto").html(z);

	})
}

function modalFoto(id_kunjungan)
{
	$.get("<?php echo base_url()?>index.php/foto/view_foto/"+id_kunjungan,function(ev){
		$("#isi_modalHasil").html(ev);
		$("#modalHasil").modal("show");
	})
}



$("#modalHasil").on("hidden.bs.modal", function () {
  load_foto();
});


if(timeline_ke=='4')
{

	
}

if(timeline_ke=='5')
{
	$("#pemeriksaan_penunjang").val('7');

}

if(timeline_ke=='11'){
	hide_tombol(id_kunjungan);
	$("#btn_simpan").hide();
}

if(timeline_dari=='1')
{
	$("#t4_hide_pertama").hide();
	//$("#pemeriksaan_penunjang").val('7');
	//alert();
}


if(id_lab!='0')
{
	r_lab();
	$("#id_lab").val(id_lab);	
	$("#id_lab").attr("disabled","disabled");
	$("#pemeriksaan_penunjang").val('7');
	$("#id_lab").parent().append("<button onclick='view_hasil_by_id_kunjungan("+id_kunjungan+");return false;' class='btn btn-primary' style='width:150px'>Hasil Laboratorium</button>");

}


if(id_ruang_gizi!='0')
{
	r_gizi();
	$("#id_ruang_gizi").val(id_ruang_gizi);	
	$("#id_ruang_gizi").attr("disabled","disabled");
	$("#pemeriksaan_penunjang").val('7');
	$("#id_ruang_gizi").parent().append("<button onclick='view_hasil_gizi_by_id_kunjungan("+id_kunjungan+");return false;' class='btn btn-primary' style='width:150px'>Hasil Gizi</button>");

}

function view_hasil_by_id_kunjungan(id_kunjungan)
{
	$.get("<?php echo base_url()?>index.php/lab/view_hasil_by_id_kunjungan/"+id_kunjungan,function(ev){
		$("#isi_modalHasil").html(ev);
		$("#modalHasil").modal("show");
	})
}

function view_hasil_gizi_by_id_kunjungan(id_kunjungan)
{
	$.get("<?php echo base_url()?>index.php/master_gizi/view_hasil_gizi_by_id_kunjungan/"+id_kunjungan,function(ev){
		$("#isi_modalHasil").html(ev);
		$("#modalHasil").modal("show");
	})
}


function hide_tombol(id_kunjungan)
{
	$("#info_edit").html("<div class='alert alert-success'>Telah Tersimpan... <button onclick='print_diagnosa("+id_kunjungan+")' class='btn btn-danger' type='button'>Cetak</button></div>");

	//$("#btn_simpan").fadeOut();
}




$("#pemeriksaan_penunjang").on("change",function(){
	var x = $(this).val();
	cek_hide_pertama(x);
})

$("#rencana_rujukan").on("change",function(){
	var y = $(this).val();
	if(y=='8')
	{
		r_konseling();
	}

	if(y=='9')
	{
		r_rawatinap();
	}


	if(y=='10')
	{
		rujuk_eksternal();
	}
})

function rujuk_eksternal()
{

	var x = "<div id='div_rujuk'><textarea class='form-control' name='ket_rujukan' placeholder='Keterangan Rujukan'></textarea>";
	x += "<button type='button' class='btn btn-xs btn-danger' onclick='$(this).parent().remove()'> x </button></div>";
	$("#t4_select_kedua_rujuk").prepend(x);
}

function r_konseling()
{
	var r_konseling = JSON.parse('<?php echo $r_konseling?>');
	var x = "<div id='div_konse'><br>Ruang Konseling <select class='form-control' name='id_ruang_konseling' id='id_ruang_konseling' required>";
	
	$.each(r_konseling,function(a,b){
		console.log(b);
		x += "<option value='"+b.id+"'>"+b.ruang_konseling+"</option>";
	})
	x += "</select><button type='button' class='btn btn-xs btn-danger' onclick='$(this).parent().remove()'> x </button></div>";
	$("#t4_select_kedua_rujuk").prepend(x);
}


function r_rawatinap()
{
	var r_rawatinap = JSON.parse('<?php echo $r_rawatinap?>');
	var x = "<div id='div_rawatinap'><br>Rawat Inap <select class='form-control' name='id_rawatinap' id='id_rawatinap' required>";
	
	$.each(r_rawatinap,function(a,b){
		console.log(b);
		x += "<option value='"+b.id+"'>"+b.nama_kamar+"</option>";
	})
	x += "</select><button type='button' class='btn btn-xs btn-danger' onclick='$(this).parent().remove()'> x </button></div>";
	$("#t4_select_kedua_rujuk").prepend(x);
}

function r_poli()
{
	var poli = JSON.parse('<?php echo $poli?>');
	var x = "<div id='div_poli'><br>Poli Rujukan <select class='form-control' name='id_poli' id='id_poli' required>";
	
	$.each(poli,function(a,b){
		console.log(b);
		x += "<option value='"+b.id_poli+"'>"+b.poli+"</option>";
	})
	x += "</select><button type='button' class='btn btn-xs btn-danger' onclick='$(this).parent().remove()'> x </button></div>";
	$("#t4_select_kedua").prepend(x);
}


function r_gizi()
{
	var r_gizi = JSON.parse('<?php echo $r_gizi?>');
	var x = "<div id='div_gizi'><br>Ruang Gizi<select class='form-control' name='id_ruang_gizi' id='id_ruang_gizi' required>";
		
		$.each(r_gizi,function(a,b){
			console.log(b);
			x += "<option value='"+b.id+"'>"+b.ruang_gizi+"</option>";
		})
		x += "</select><button type='button' class='btn btn-xs btn-danger' onclick='$(this).parent().remove()'> x </button></div>";
	$("#t4_select_kedua").append(x);
}


function r_lab()
{
	var r_lab = JSON.parse('<?php echo $lab?>');	
	var x = "<div id='div_lab'><br>Ruang Lab<select class='form-control' name='id_lab' id='id_lab' required>";
		
		$.each(r_lab,function(a,b){
			console.log(b);
			x += "<option value='"+b.id_lab+"'>"+b.nama_lab+"</option>";
		})
		x += "</select><button type='button' class='btn btn-xs btn-danger' onclick='$(this).parent().remove()'> x </button></div>";
	$("#t4_select_kedua").append(x);
}



function cek_hide_pertama(value)
{
	if(value=="7")
	{
		$("#t4_hide_pertama").fadeIn();
	}else if(value=="5"){
		
		r_poli();
		
	}else if(value=="4")
	{
		r_gizi();
	
	}else if(value=="3")
	{
		r_lab();

	}else{
		$("#t4_hide_pertama").fadeOut();
	
	}
}

$("#v_edituser").submit(function(){

	if(confirm("Apakah data diagnosa sudah selesai?"))
	{

		$.post("<?php echo base_url()?>index.php/kunjungan/go_simpan/",$(this).serialize(),function(e){
			hide_tombol(id_kunjungan);
			console.log(e);
			$("#btn_simpan").hide();

		})
	return false;
	}
return false;

});

<?php
$a=''; 
foreach($tbl_master_diagnosa as $diagnosa)
{
	$a.='{value:"'.$diagnosa->code.'",label:"'.htmlentities($diagnosa->code).' | '.htmlentities($diagnosa->diagnosa).'"},';
} 
?>

  var availableTags = [
  <?php echo $a?>
  ];
  
  tambah_diag();

  function tambah_diag()
  {

		//var $input = $("<input>", {name: "code_diagnosa[]","class": "code_diagnosa form-control"});		 
		
		var input = $("<div><input name='code_diagnosa[]' class='form-control'><span>-</span></div><br>");		 
		input.appendTo("div#t4_input_diagnosa_lagi").find("input").focus().autocomplete({
			source: availableTags,
			minLength: 1,
			select: function(event, ui) {
				console.log($(this).parent().find("span").html(ui.item.label));

			}

		});

	}
	$("#tambah_diag").click(function(){
		tambah_diag();
	})



	function pad_with_zeroes(number, length) {

		var my_string = '' + number;
		while (my_string.length < length) {
			my_string = '0' + my_string;
		}

		return my_string;

	}


	$("#jam_selesai").on("input",function(){
		jam();
	})


	function jam()
	{
		var startDate = new Date("<?php echo date('Y-m-d')?> "+$("#jam_mulai").val()+":00");
		// Do your operations
		var endDate   = new Date("<?php echo date('Y-m-d')?> "+$("#jam_selesai").val()+":00");
		
		var seconds = (endDate.getTime() - startDate.getTime()) / 1000;

		//$("#lama_pemeriksaan").val(seconds);
		var minutes = Math.floor(seconds / 60);
		//console.log(minutes);
		$("#lama_pemeriksaan").val(minutes);
	}


	startTime();

	function startTime() 
	{
		var today = new Date();
		var h = today.getHours();
		h = ("0" + h).slice(-2);

		var m = today.getMinutes();
		var s = today.getSeconds();
		m = checkTime(m);
		s = checkTime(s);

		$("#jam_selesai").val(h + ":" + m + ":" + s);
		var t = setTimeout(startTime, 500);
		jam();
	}

	function checkTime(i) 
	{
	  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
	  return i;
	}


	function print_diagnosa(id_kunjungan)
	{
		window.open("<?php echo base_url()?>index.php/kunjungan/cetak_diagnosa/"+id_kunjungan);
		console.log(id_kunjungan);
	}





<?php
$o=''; 
foreach($tbl_obat as $obat)
{
	$o.='{value:"'.$obat->id_obat.'",label:"'.htmlentities($obat->obat).'",stok:"'.htmlentities($obat->stok).'",satuan:"'.htmlentities($obat->satuan).'",kategori:"'.htmlentities($obat->kategori).'"},';
} 
?>
$( function() {
	var availableTags_obat = [
	<?php echo $o?>
	];
	$( ".obat" ).autocomplete({
		source: availableTags_obat,
		minLength: 1,
		select: function(event, ui) {
			console.log(ui);

			var template = "<tr>"+
			"<td><input type='hidden' name='id_obat[]' value='"+ui.item.value+"'>"+ui.item.label+"</td><td>"+ui.item.stok+"</td><td>"+ui.item.satuan+"</td><td>"+ui.item.kategori+"</td>"+

			"<td><input class='form-control jum' autofocus name='jumlah_obat[]' placeholder='jumlah'></td>"+			
			"<td><input class='form-control aturan_pakai' name='aturan_pakai[]' placeholder='aturan_pakai' id='aturan_pakai'></td>"+
			"<td><input class='form-control waktu_konsumsi' name='waktu_konsumsi[]' placeholder='waktu_konsumsi'></td>"+
			"<td><input class='form-control' name='keterangan[]' placeholder='keterangan'></td>"+
			"<td><button class='btn btn-danger btn-xs' id='remove_order_obat' type='button'>Hapus</button></td></tr>";

			$("#t4_order").append(template);
			$("#id_obat").val("");
			$("#id_obat").focus();

			$(".aturan_pakai").autocomplete({
				source: aturan_pakai,
				minLength: 0
			}).focus(function(){            			            
				$(this).data("uiAutocomplete").search($(this).val());
			});

			$(".waktu_konsumsi").autocomplete({
				source: waktu_konsumsi,
				minLength: 0
			}).focus(function(){            			            
				$(this).data("uiAutocomplete").search($(this).val());
			});
		}

	});


	var aturan_pakai = [
	"3x1 Sehari",
	"2x1 Sehari",
	"1x1 Sehari"
	];

	var waktu_konsumsi = [
	"Sebelum Makan",
	"Sesudah Makan",
	"1 Jam sebelum Makan"
	];



});

$("#table_order_obat").on("click","tbody tr td button#remove_order_obat",function(x){
	$(this).parent().parent().remove();
	
	return false;
})
$("#table_order_obat").on("click",function(){
	$(".obat").val("");
	//alert($(".obat").val());
})



$("#tambah_obat_lain").on("click",function(){


	var template_obat_lain = "<tr>"+
	"<td><input class='form-control ' type='text' name='nama_obat_lain[]' required></td>"+
	"<td><input class='form-control ' type='text' name='satuan_obat_lain[]' required></td>"+
	"<td><input class='form-control ' autofocus name='jumlah_obat_lain[]' placeholder='jumlah' required></td>"+
	"<td><input class='form-control aturan_pakai' name='aturan_pakai_obat_lain[]' placeholder='aturan_pakai' id='aturan_pakai'></td>"+
	"<td><input class='form-control waktu_konsumsi' name='waktu_konsumsi_obat_lain[]' placeholder='waktu_konsumsi'></td>"+
	"<td><input class='form-control' name='keterangan_obat_lain[]' placeholder='keterangan'></td>"+
	"<td><button class='btn btn-danger btn-xs' id='remove_order_obat_lain' type='button'>Hapus</button></td></tr>"
	;
	$("#t4_order_obat_lain").append(template_obat_lain);


	var aturan_pakai = [
	"3x1 Sehari",
	"2x1 Sehari",
	"1x1 Sehari"
	];

	var waktu_konsumsi = [
	"Sebelum Makan",
	"Sesudah Makan",
	"1 Jam sebelum Makan"
	];


	$(".aturan_pakai").autocomplete({
		source: aturan_pakai,
		minLength: 0
	}).focus(function(){            			            
		$(this).data("uiAutocomplete").search($(this).val());
	});

	$(".waktu_konsumsi").autocomplete({
		source: waktu_konsumsi,
		minLength: 0
	}).focus(function(){            			            
		$(this).data("uiAutocomplete").search($(this).val());
	});

})

$("#table_order_obat_lain").on("click","tbody tr td button#remove_order_obat_lain",function(x){
	$(this).parent().parent().remove();
	
	return false;
})



$("#tambah_racikan").on("click",function(){
	
	var group_racikan = "<tr><td><input class='form-control ' placeholder='PULV' type='text' name='pulv_racikan[]' id='pulv_racikan' required><button class='btn btn-primary btn-xs' id='tambah_order_obat_racikan' type='button'>+ Obat</button></td>"+
	"<td><input class='form-control aturan_pakai' name='aturan_pakai_obat_racikan[]' placeholder='aturan_pakai' id='group_aturan_pakai'></td>"+
	"<td><input class='form-control waktu_konsumsi' name='waktu_konsumsi_obat_racikan[]' placeholder='waktu_konsumsi' id='group_waktu_konsumsi'></td>"+
	"<td><input class='form-control' name='keterangan_obat_racikan[]' placeholder='keterangan' id='group_keterangan'><button class='btn btn-danger btn-xs' id='remove_order_obat_racikan' type='button'>- Hapus</button></td>"+	
	"</tr>";

	$("#t4_group_racikan").append(group_racikan);



	var aturan_pakai = [
	"3x1 Sehari",
	"2x1 Sehari",
	"1x1 Sehari"
	];

	var waktu_konsumsi = [
	"Sebelum Makan",
	"Sesudah Makan",
	"1 Jam sebelum Makan"
	];


	$(".aturan_pakai").autocomplete({
		source: aturan_pakai,
		minLength: 0
	}).focus(function(){            			            
		$(this).data("uiAutocomplete").search($(this).val());
	});

	$(".waktu_konsumsi").autocomplete({
		source: waktu_konsumsi,
		minLength: 0
	}).focus(function(){            			            
		$(this).data("uiAutocomplete").search($(this).val());
	});	
})


$("#table_order_obat_racikan").on("click","tr td button#remove_order_obat_racikan",function(x){
	$(this).parent().parent().remove();
	//alert($(this).parent().parent().html());
	return false;
})


$("#table_order_obat_racikan").on("click","tr td button#tambah_order_obat_racikan",function(x){
	//$(this).parent().parent().remove();
	
	var pulv_racikan = $(this).parent().parent().find("#pulv_racikan").val();
	var group_aturan_pakai = $(this).parent().parent().find("#group_aturan_pakai").val();
	var group_waktu_konsumsi = $(this).parent().parent().find("#group_waktu_konsumsi").val();
	var group_keterangan = $(this).parent().parent().find("#group_keterangan").val();

	if(pulv_racikan=="")
	{
		alert("Isi dulu PULV");
		$(this).parent().parent().find("#pulv_racikan").focus();
		return false;		
	}
		
	if(group_aturan_pakai=="")
	{
		alert("Isi dulu Aturan Pakai");
		$(this).parent().parent().find("#group_aturan_pakai").focus();
		return false;		
	}
	
	if(group_waktu_konsumsi=="")
	{
		alert("Isi dulu Aturan Konsumsi");
		$(this).parent().parent().find("#group_waktu_konsumsi").focus();
		return false;		
	}
	
	if(group_keterangan=="")
	{
		alert("Isi dulu Keterangan");
		$(this).parent().parent().find("#group_keterangan").focus();
		return false;		
	}

	$(this).parent().parent().find("#group_keterangan").attr("readonly","readonly");
	$(this).parent().parent().find("#pulv_racikan").attr("readonly","readonly");
	$(this).parent().parent().find("#group_aturan_pakai").attr("readonly","readonly");
	$(this).parent().parent().find("#group_waktu_konsumsi").attr("readonly","readonly");

	




	var template_obat_racikan = "<tr>"+
	"<td><input name='group_pulv[]' id='group_pulv' value='"+pulv_racikan+"' type='hidden'><input name='group_aturan_pakai[]' id='group_aturan_pakai' value='"+group_aturan_pakai+"' type='hidden'><input name='group_waktu_konsumsi[]' id='group_waktu_konsumsi' value='"+group_waktu_konsumsi+"' type='hidden'><input name='group_keterangan[]' id='group_keterangan' value='"+group_keterangan+"' type='hidden'>"+
	"<input class='form-control ob_racikan' placeholder='nama obat' type='text' name='id_obat_racikan[]' required><span id='label_obat' style='font-size:10;font-style:italic;'></span></td>"+
	"<td><input class='form-control ' placeholder='satuan' type='text' name='satuan_obat_racikan[]' id='satuan_obat_racikan' disabled></td>"+
	"<td><input class='form-control ' autofocus name='jumlah_obat_racikan[]' placeholder='jumlah' required><span id='label_stok' style='font-size:10;font-style:italic;'></span></td>"+
	"<td colspan='2'><button class='btn btn-danger btn-xs' id='remove_order_obat_racikan' type='button'>Hapus</button></td></tr>"
	;
	$(this).parent().append(template_obat_racikan);
	var availableTags_obat = [
	<?php echo $o?>
	];
	$(".ob_racikan").autocomplete({
		source: availableTags_obat,
		minLength: 0,
		select: function(event, ui) {
			console.log(ui.item.satuan);
			$(this).parent().find("#label_obat").html(ui.item.label);
			$(this).parent().parent().find("#label_stok").html("stok:"+ui.item.stok);			
			$(this).parent().parent().find("#satuan_obat_racikan").val(ui.item.satuan);

		}
	}).focus(function(){            			            
		$(this).data("uiAutocomplete").search($(this).val());
	});	

	return false;
})

</script>
