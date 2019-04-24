<?php $this->load->view("header");?>
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="<?=base_url()?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a></div>
    	<h1><i class="fa fa-user"></i> Tambah Kendaraan</h1>
	</div>
	<div class="content-fluid">
		<div class="row-fluid">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="fa fa-user"></i> </span>
		        	<h5>Kendaraan</h5>
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
			            <label class="control-label">Nama Kendaraan</label>
			            <div class="controls">
			              <input type="text" name="nama_kendaraan" id="nama_kendaraan" required value="<?php if(isset($dataedit)){echo $dataedit['nama_kendaraan']; }else{  echo set_value('nama_kendaraan');} ?>">
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Merk</label>
			            <div class="controls">
			              <input type="text" name="merek" value="<?php if(isset($dataedit)){echo $dataedit['merek']; }else{  echo set_value('merek');} ?>" maxlength="10" />
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Tahun</label>
			            <div class="controls">
			              <input type="number" name="tahun" value="<?php if(isset($dataedit)){echo $dataedit['tahun']; }else{  echo set_value('tahun');} ?>" maxlength="4" />
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Jenis</label>
			            <div class="controls">
			              <input type="radio" name="jenis" value="manual" checked> Manual<br>
			              <input type="radio" name="jenis" value="matic" > Matic<br>
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Warna</label>
			            <div class="controls">
			              <input type="text" name="warna" id="warna" required value="<?php if(isset($dataedit)){echo $dataedit['warna']; }else{  echo set_value('warna');} ?>">
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Isi Silinder</label>
			            <div class="controls">
			              <input type="text" name="isi_silinder" id="isi_silinder" required value="<?php if(isset($dataedit)){echo $dataedit['isi_silinder']; }else{  echo set_value('isi_silinder');} ?>">
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">No Kendaraan</label>
			            <div class="controls">
			              <input type="text" name="no_kendaraan" id="no_kendaraan" maxlength="11" required value="<?php if(isset($dataedit)){echo $dataedit['no_kendaraan']; }else{  echo set_value('no_kendaraan');} ?>">
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Foto</label>
			            <div class="controls">
			              <?php if(isset($dataedit)){?>
			              <img src="<?=base_url().$dataedit['foto_kendaraan']?>" class="img img-responsive" style='height:100px;''><br/>
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