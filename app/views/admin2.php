<?php $this->load->view("header");?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?=base_url()?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a></div>
    <h1><i class="fa fa-user"></i> Administrator</h1>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fa fa-table"></i> </span>
            <h5>Administrator</h5>
            <div class="buttons"><a href="<?=base_url()?>admin/add" class="btn btn-success btn-mini"><i class="fa fa-plus"></i> Tambah Admin</a></div>
          </div>
          <div class="widget-content">
          <?php
            if($data!=null){
              foreach ($data as $d) { ?>
              <div class="span4 span3">
                <div class="thumbnail">
                  <img src="<?=base_url().$d['foto']?>" alt="<?=$d['username']?>" style="height:100px" class="img img-thumbnail"/>
                  <div class="caption">
                    <h3><?=$d['username']?></h3>
                    <p><?=$d['nama_lengkap']?></p>
                    <p><?=$d['no_telp']?></p>
                    <p><?=$d['alamat']?></p>
                    <p><a href="<?=base_url()?>admin/edit/<?=$d['username']?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Ubah</a> <a href="<?=base_url().'admin/delete/'.$d['username']?>" data-nama="<?=$d['username']?>" data-id="<?=$d['username']?>"  class="del btn btn-danger"><i class="fa fa-trash"></i> Hapus</a></p>
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