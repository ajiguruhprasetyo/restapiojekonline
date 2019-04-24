<?php $this->load->view("header");?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?=base_url()?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a></div>
    <h1><i class="fa fa-user"></i> Order</h1>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fa fa-table"></i> </span>
            <h5>Order</h5>
          </div>
          <div class="widget-content">
	        <table class="table table-bordered">
	          <tr>
	              <th>No</th>
	              <th>Tanggal Order</th>
	              <th>Username Customer</th><!-- 
	              <th>Lat Jemput</th>
	              <th>Long Jemput</th>
	              <th>Lat Tujuan</th>
	              <th>Long Tujuan</th> -->
	              <th>Alamat Jemput</th>
	              <th>Alamat Tujuan</th>
	              <th>status Order</th>
	              <th>Jarak</th>
	              <th>Bayar</th>
	              <th>Fee Driver</th>
	              <th>Driver</th>
	              <th>No Kendaraan</th>
	              <th>Service</th>
	              <th>Action</th>
	          </tr>
          <?php
            if($data!=null){
              foreach ($data as $d) { ?>
                  <?php $i=1;?>
                  <tr>
                      <td><?=$i?></td>
                      <td><?=date("d/m/Y H:i", strtotime($d['tgl_order'])) ." WIB"?></td>
                      <td><?=$d['username_customer']?></td><!-- 
                      <td><?=$d['lat_jemput']?></td>
                      <td><?=$d['long_jemput']?></td>
                      <td><?=$d['lat_tujuan']?></td>
                      <td><?=$d['long_tujuan']?></td> -->
                      <td><?=$d['alamat_jemput']?></td>
                      <td><?=$d['alamat_tujuan']?></td>
                      <td><?=$d['status_order']?></td>
                      <td><?=$d['jarak']?></td>
                      <td><?=rupiah($d['bayar'])?></td>
                      <td><?=rupiah($d['bayar'] * $d['fee_driver']/100)?></td>
                      <td><?=$d['nama']?></td>
                      <td><?=$d['no_kendaraan']?></td>
                      <td><?=$d['nama_service']?></td>
                      <td>
                          <a href="<?=base_url().'Order/delete/'.$d['id_order']?>" data-nama="<?=$d['id_order']?>" data-id="<?=$d['id_order']?>"  class="del btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                      </td>
                  </tr>
            <?php   $i++; }
              }else{
            ?>
              <tr><td colspan="10">Maaf! data kosong!</td></tr>
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