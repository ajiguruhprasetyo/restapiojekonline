<?php $this->load->view("header");?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?=base_url()?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a></div>
    <h1><i class="fa fa-user"></i> Profil Admin</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="widget-box">
          <div class="widget-content">
            <div class="thumbnail">
              <img src="<?=base_url().$data['foto']?>" alt="<?=$data['username']?>" style="height:100px" class="img img-thumbnail"/>
              <div class="caption">
                <h3><?=$data['username']?></h3>
                <p><?=$data['nama_lengkap']?></p>
                <p><?=$data['no_telp']?></p>
                <p><?=$data['alamat']?></p>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
    </div>
  </div>
  <hr>
</div>
<?php $this->load->view("footer");?>