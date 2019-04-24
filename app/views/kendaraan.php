<?php $this->load->view("header");?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?=base_url()?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a></div>
    <h1><i class="fa fa-user"></i> Kendaraan</h1>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fa fa-table"></i> </span>
            <h5>Kendaraan</h5>
            <div class="buttons"><a href="<?=base_url()?>Kendaraan/add" class="btn btn-success btn-mini"><i class="fa fa-plus"></i> Tambah Kendaraan</a></div>
          </div>
          <div class="widget-content">
          <?php
            if($data!=null){
              foreach ($data as $d) { ?>
              <div class="span4 span3">
                <div class="thumbnail">
                  <img src="<?=base_url().$d['foto_kendaraan']?>" alt="<?=$d['id_kendaraan']?>" style="height:100px" class="img img-thumbnail"/>
                  <div class="caption">
                    <p><?=$d['nama_kendaraan']?></p>
                    <p><?=$d['merek']?></p>
                    <p><?=$d['tahun']?></p>
                    <p><a href="<?=base_url()?>kendaraan/edit/<?=$d['id_kendaraan']?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Ubah</a> <a href="<?=base_url().'kendaraan/delete/'.$d['id_kendaraan']?>" data-nama="<?=$d['id_kendaraan']?>" data-id="<?=$d['id_kendaraan']?>"  class="del btn btn-danger"><i class="fa fa-trash"></i> Hapus</a></p>
                  </div>
                </div>
              </div>
            <?php    }
              }else{
            ?>
              <h1>Maaf! data kosong!</h1>
            <?php } ?>
            <div class="clearfix"></div>
          </div>
        </div>
    </div>
  </div>
  <hr>
</div>
<?php $this->load->view("footer");?>