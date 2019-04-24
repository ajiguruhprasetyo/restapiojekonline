<?php $this->load->view("header");?>
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="<?=base_url()?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a></div>
		<h1><i class="fa fa-drivers-license-o"></i> Detail Driver</h1>
	</div>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="fa fa-table"></i> </span>
					<h5>Driver <?=$data['nama']?></h5>
				</div>
				<div class="col-md-4">
					<img src="<?=base_url().$data['foto']?>" alt="<?=$data['username']?>" style="height:200px" class="img img-thumbnail"/>
				</div>
				<div class="col-md-8">
					<table class="table table-bordered">
						<tr>
							<td>Username</td>
							<td><?=$data['username']?></td>
						</tr>
						<tr>
							<td>Nama Lengkap</td>
							<td><?=$data['nama']?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><?=$data['alamat']?></td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td><?=$data['tgl_lahir']?></td>
						</tr>
						<tr>
							<td>Status KTP</td>
							<td><?=$data['status_ktp']?></td>
						</tr>
						<tr>
							<td>No KTP</td>
							<td><?=$data['no_ktp']?></td>
						</tr>
						<tr>
							<td>No Telp</td>
							<td><?=$data['no_telp']?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?=$data['email']?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td><?=$data['jenkel']?></td>
						</tr>
						<tr>
							<td>Status</td>
							<td><?=$data['status']?></td>
						</tr>
						<tr>
							<td>Status Akun</td>
							<td><?=$data['status_akun']?></td>
						</tr>
						<tr>
							<td>Status Delete</td>
							<td><?=$data['status_delete']?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="fa fa-asterisk"></i> </span>
					<h5>Kendaraan</h5>
					<div class="buttons"><a href="<?=base_url()?>Kendaraan/add/<?=$username?>" class="btn btn-success btn-mini"><i class="fa fa-plus"></i> Tambah Kendaraan</a></div>
				</div>
				<div class="widget-content">
				<?php
					if($data_kendaraan!=null){
					foreach ($data_kendaraan as $dk) { ?>
						<div class="thumbnail" align="center">
							<img src="<?=base_url().$dk['foto_kendaraan']?>" alt="<?=$dk['id_kendaraan']?>" style="height:100px" class="img img-thumbnail"/>
							<div class="caption">
								<h3><?=$dk['nama_kendaraan']?></h3>
								<p><?=$dk['no_kendaraan']?></p>
								<p><?=$dk['merek']?></p>
								<p><?=$dk['tahun']?></p>
								<p><a href="<?=base_url()?>kendaraan/editKendaraan/<?=$dk['id_kendaraan'].'/'.$username?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Ubah</a> <a href="<?=base_url().'kendaraan/delete/'.$dk['id_kendaraan']?>" data-nama="<?=$dk['id_kendaraan']?>" data-id="<?=$dk['id_kendaraan']?>"  class="del btn btn-danger"><i class="fa fa-trash"></i> Hapus</a></p>
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
</div>

<?php $this->load->view("footer");?>