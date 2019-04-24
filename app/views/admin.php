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
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No Telp</th>
                  <th>Gender</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if($data!=null){
                  foreach ($data as $d) { ?>
                <tr>
                  <td><?=$d['username']?></td>
                  <td><?=$d['nama_lengkap']?></td>
                  <td><?=$d['alamat']?></td>
                  <td><?=$d['no_telp']?></td>
                  <td><?=$d['gender']?></td>
                  <td>
                    <div class="btn-group">
                      <button data-toggle="dropdown" class="btn btn-info dropdown-toggle">Action <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="<?=base_url()?>admin/edit/<?=$d['username']?>"><i class="fa fa-pencil"></i> Ubah</a></li>
                        <li><a href="<?=base_url().'admin/delete/'.$d['username']?>" data-nama="<?=$d['username']?>" data-id="<?=$d['username']?>"  class="del"><i class="fa fa-trash"></i> Hapus</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
              <?php    }
                }else{
               ?>
                <tr>
                  <td colspan="6">Maaf! data kosong!</td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
  <hr>
</div>
<?php $this->load->view("footer");?>