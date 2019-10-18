
	
<!-- Modal penolakan-------------------------------------------------------------------->
<div id="modal_cancel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" id="modal_isi">
      <div class="modal-header">        
        <h4 class="modal-title">Alasan Penolakan</h4>
		
		<form id="go_alasan">
		<input name="id" value="" id="id" readonly class="form-control">
		<textarea class="form-control" id="alasan" required></textarea>
		<br>
		<input type="submit" value="Kirim" class="btn btn-block btn-primary">
		</form>
		
      </div>
      <div class="modal-body" id="t4_form_penolakan">
        
      </div>
      
    </div>

  </div>
</div>
<!-- Modal penolakan-------------------------------------------------------------------->




	
<!-- Modal view-------------------------------------------------------------------->
<div id="modal_view_alasan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" id="modal_isi">
      <div class="modal-header">        
        <h4 class="modal-title">Alasan Penolakan</h4>
		
		
      </div>
      <div class="modal-body" id="t4_alasan_penolakan">
        
      </div>
      
    </div>

  </div>
</div>
<!-- Modal view-------------------------------------------------------------------->

<script>
function alasan(id)
{
	
	$('#modal_view_alasan').modal({backdrop: true});
	
	$.get("index.php/home/view_alasan/"+id,function(e){
			
		$("#t4_alasan_penolakan").html(e);				
	})
	
}

</script>




  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url()?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SI</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>P</b>USKESMAS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top skin-green">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
		  
		   <!-- Modal -->
			  <div class="modal fade modal-success " id="myModal_admin_online" role="dialog" tabindex="-1">
				<div class="modal-dialog modal-sm">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Admin Online</h4>
					</div>
					<div class="modal-body" id="t4_all_admin_online">
					  
					  
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
					</div>
				  </div>
				</div>
			  </div>
			
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()?>assets/dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url()?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama');?> - <?php echo $this->session->userdata('jabatan');?>
                  
                </p>
              </li>
             
			 
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#profil_admin" onclick="eksekusi_controller('index.php/home/form_edit/<?php echo $this->session->userdata('id_user');?>')" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()?>index.php/login/logout" class="btn btn-default btn-flat" onclick="logout();return false;">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  
 <script>
	function logout()
	{
			set_log('<?php echo $this->session->userdata('id_admin')?>', '<?php echo $this->session->userdata('username')?>', 'Logout admin', '<?php echo date('Y-m-d H:i:s')?>',function(){
				window.location.replace("<?php echo base_url()?>index.php/login/logout");
			})
			
			
	}
	
 </script>
 
 
 
 </script>