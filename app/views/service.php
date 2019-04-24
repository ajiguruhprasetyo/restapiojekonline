<?php $this->load->view("header");?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?=base_url()?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a></div>
    <h1><i class="fa fa-user"></i> Service</h1>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fa fa-table"></i> </span>
            <h5>Service</h5>
            <div class="buttons"><a href="<?=base_url()?>service/add" class="btn btn-success btn-mini"><i class="fa fa-plus"></i> Tambah Service</a></div>
          </div>
          <div class="widget-content">
                <table class="table table-bordered">
                  <tr>
                      <th>ID Service</th>
                      <th>Nama Service</th>
                      <th>Harga</th>
                      <th>Fee</th>
                      <th>Action</th>
                  </tr>
          <?php
            if($data!=null){
              foreach ($data as $d) { ?>
                  <tr>
                      <td><?=$d['id_service']?></td>
                      <td><?=$d['nama_service']?></td>
                      <td><?=$d['harga']?></td>
                      <td><?=$d['fee']?></td>
                      <td>
						<div class="btn-group">
                          <a href="<?=base_url()?>service/editService/<?=$d['id_service']?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Ubah</a> <a href="<?=base_url().'Service/delete/'.$d['id_service']?>" data-nama="<?=$d['id_service']?>" data-id="<?=$d['id_service']?>"  class="del btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
						</div>
					  </td>
                  </tr>
            <?php    }
              }else{
            ?>
              <h1>Maaf! data kosong!</h1>
            <?php } ?>
                </table>
            <div class="clearfix"></div>
          </div>
        </div>
    </div>
  </div>
  <hr>
</div>
<?php $this->load->view("footer");?>