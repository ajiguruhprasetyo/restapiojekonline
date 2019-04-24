<?php $this->load->view("header");?>
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="<?=base_url()?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a></div>
    	<h1><i class="fa fa-plus"></i> Tambah Driver</h1>
	</div>
	<div class="content-fluid">
		<div class="row-fluid">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="fa fa-table"></i> </span>
		        	<h5>Driver</h5>
		      	</div>
		      	<div class="widget-content nopadding">
		        	<?php if(validation_errors() || isset($alert)){ ?> 
			        <div class="alert alert-error">
			          <button class="close" data-dismiss="alert">×</button>
			          <?php if(isset($alert)){echo $alert;} echo validation_errors(); ?> 
			        </div>
		        	<?php } ?>
			        <form class="form-horizontal" method="post" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data" >
			          <div class="control-group">
			            <label class="control-label">Username</label>
			            <div class="controls">
			              <input type="text" name="username" id="required" maxlength="25"  <?php if(!isset($dataedit)){echo("required");}else{ echo  "readonly";}?> value="<?php if(isset($dataedit)){echo $dataedit['username']; }else{ echo set_value('username');} ?>">
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Password</label>
			            <div class="controls">
			              <input type="Password" name="password" id="password"  <?php if(!isset($dataedit)){echo("required");}?> value="<?php echo set_value('password'); ?>">
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Nama Lengkap</label>
			            <div class="controls">
			              <input type="text" name="nama" id="nama" required value="<?php if(isset($dataedit)){echo $dataedit['nama']; }else{  echo set_value('nama');} ?>">
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Alamat</label>
			            <div class="controls">
			              <textarea placeholder="Alamat" name="alamat" required><?php if(isset($dataedit)){echo $dataedit['alamat']; }else{ echo set_value('alamat');} ?></textarea>
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Tanggal Lahir</label>
			            <div class="controls">
			              <input type="date" name="tgl_lahir" id="tgl_lahir" required value="<?php if(isset($dataedit)){echo $dataedit['tgl_lahir']; }else{  echo set_value('tgl_lahir');} ?>">
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Status KTP</label>
			            <div class="controls">
			              <input type="radio" name="status_ktp" value="Belum Kawin" checked> Belum Kawin<br>
			              <input type="radio" name="status_ktp" value="Kawin" > Kawin<br>
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">No KTP</label>
			            <div class="controls">
			              <input type="text" name="no_ktp" id="no_ktp" required value="<?php if(isset($dataedit)){echo $dataedit['no_ktp']; }else{ echo set_value('no_ktp');} ?>">
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">No Telp</label>
			            <div class="controls">
			              <input type="text" name="no_telp" id="no" maxlength="13" value="<?php if(isset($dataedit)){echo $dataedit['no_telp']; }else{  echo set_value('no_telp');} ?>" required />
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Email</label>
			            <div class="controls">
			              <input type="text" name="email" id="email" required value="<?php if(isset($dataedit)){echo $dataedit['email']; }else{  echo set_value('email');} ?>">
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Jenis Kelamin</label>
			            <div class="controls">
			              <input type="radio" name="jenkel" value="pria" checked> Pria<br>
			              <input type="radio" name="jenkel" value="wanita" > Wanita<br>
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Status</label>
			            <div class="controls">
			              <input type="radio" name="status" value="off" checked> Off<br>
			              <input type="radio" name="status" value="ready" > Ready<br>
			              <input type="radio" name="status" value="busy" > Busy<br>
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Status</label>
			            <div class="controls">
			              <input type="radio" name="status_akun" value="activ" checked> Aktif<br>
			              <input type="radio" name="status_akun" value="nonaktif" > Non Aktif<br>
			              <input type="radio" name="status_akun" value="banned" > Banned<br>
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Status</label>
			            <div class="controls">
			              <input type="radio" name="status_delete" value="No" > No<br>
			              <input type="radio" name="status_delete" value="Yes" checked> Yes<br>
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Foto</label>
			            <div class="controls">
			              <?php if(isset($dataedit)){?>
			              <img src="<?=base_url().$dataedit['foto']?>" class="img img-responsive" style='height:100px;''><br/>
			              <?php } ?>
			              <input type="file" name="photo" id="photo" <?php if(!isset($dataedit)){echo("required");}?>>
			            </div>
			          </div>
			          <div class="form-actions">
			            <button type="submit" class="btn btn-success">Save</button>
			          </div>
			        </form>
		      	</div>
    		</div>
  	</div>
  <hr>
</div>
<?php $this->load->view("footer");?>