<?php $this->load->view("header");?>
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="<?=base_url()?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a></div>
    	<h1><i class="fa fa-plus"></i> Tambah Service</h1>
	</div>
	<div class="content-fluid">
		<div class="row-fluid">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="fa fa-table"></i> </span>
		        	<h5>Service</h5>
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
			            <label class="control-label">Nama Service</label>
			            <div class="controls">
			              <input type="text" name="nama_service" id="nama_service" required value="<?php if(isset($dataedit)){echo $dataedit['nama_service']; }else{  echo set_value('nama_service');} ?>">
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Harga</label>
			            <div class="controls">
			              <input type="text" name="harga" id="harga" required value="<?php if(isset($dataedit)){echo $dataedit['harga']; }else{  echo set_value('harga');} ?>">
			            </div>
			          </div>
			          <div class="control-group">
			            <label class="control-label">Fee</label>
			            <div class="controls">
			              <input type="text" name="fee" id="fee" required value="<?php if(isset($dataedit)){echo $dataedit['fee']; }else{  echo set_value('fee');} ?>">
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