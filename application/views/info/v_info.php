<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<div class="col-md-12">	
							<div class="card-body  text-right">
								<p class="demo">
                  
									<div class="dropdown">
										<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
											Tambah
										</button>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
											<a class="dropdown-item"  data-toggle="modal" data-target="#add_data_Modal">Sayur</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" data-toggle="modal" data-target="#add_data_Modal2" href="#">Buah</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" data-toggle="modal" data-target="#add_data_Modal3" href="#">Kacang</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" data-toggle="modal" data-target="#add_data_Modal4" href="#">Tanaman Hias</a>
										</ul>
									</div>
								</p>
							</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<p class="card-title">Daftar Informasi</p>
										<h5 class="card-category">Jenis Tanaman Hortikultura</h5>
									</div>
									<div class="card-body">
                  
										<div class="table-responsive">
											<table class="table table-striped mt-3">
												<thead>
													<tr>
														<th scope="col">No</th>
														<th scope="col">Tanggal</th>
                            <th scope="col">Nama Komoditas</th>
                            <th scope="col">Jenis Komoditas</th>
                            <th scope="col">Gambar Komoditas</th>
														<th scope="col" colspan="3">Aksi</th>
													</tr>
												</thead>
												<tbody>
                        <?php if($this->session->flashdata('success')){ ?>  
                          <div class="alert alert-success">  
                            <a href="#" class="close" data-dismiss="alert">&times;</a>  
                            <strong><?php echo $this->session->flashdata('success'); ?>  </strong> 
                          </div>  
                        <?php } else if($this->session->flashdata('hapus')){ ?>  
                          <div class="alert alert-danger">  
                            <a href="#" class="close" data-dismiss="alert">&times;</a>  
                            <strong><?php echo $this->session->flashdata('hapus'); ?> </strong>  
                          </div>  
                        <?php } else if($this->session->flashdata('edit')){ ?>  
                          <div class="alert alert-warning">  
                            <a href="#" class="close" data-dismiss="alert">&times;</a>  
                            <strong><?php echo $this->session->flashdata('edit'); ?></strong>   
                          </div>  
                        <?php } ?>
                          <?php $No=1; 
                          foreach ($hortisphere as $data) : ?>
                          <tr>
                            <td><?php echo $No++ ?></td>
                            <td><?php echo $data->tanggal_tambah ?></td>
                            <td><?php echo $data->nama_komoditas ?></td>
                            <td><?php echo $data->jenis ?></td>
                            <td><img src="<?php echo base_url('upload/komoditas/'.$data->gambar_komoditas) ?>" width="64" /></td>
														<td>
                            	<button class="btn btn-success" name="view" value="Lihat" data-toggle="modal" data-target="#data_Modal<?php echo $data->id_info; ?>">Lihat</button>
                              <div id="data_Modal<?php echo $data->id_info; ?>" class="modal fade">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                  <div class="card-header">
                                    <h5 class="card-title text-center">Lihat <?php echo $data->jenis ?></p>
                                    <p class="card-categor text-center">Informasi Jenis Tanaman Hortikultura</h5>
                                  </div>
                                  <div class="card-body">
                                  <form class="form-horizontal" method="post" action="<?php echo base_url() . 'C_info/lihat_info' .  $data->id_info ?>">
                                  <table class="table table-typo">
                                  <table class="table table-typo">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <h6>Gambar Komoditas</h6>
                                        </td>
                                       </tr>
                                    </tbody></table>
                                    <img src="<?=base_url()?>upload/komoditas/<?=$data->gambar_komoditas?>" alt="foto" height="200" width="300" style="display: block; margin: auto;">
                                    <br>
                                  <table class="table table-typo">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <h6>Nama Komoditas</h6>
                                        </td>
                                        <td><p><?php echo $data->nama_komoditas ?></p></span></td>
                                      </tr>
                                    </tbody></table>
                                    <br />
                                    <table class="table table-typo">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <h6>Deskripsi</h6>
                                        </td>
                                        <td><p><?php echo $data->deskripsi_komoditas ?></p></span>
                                          <script type="text/javascript">
                                            var editor = CKEDITOR.replace('deskripsi_komoditas');
                                            CKFinder.setupCKEditor(editor, 'ckfinder/');
                                          </script>
                                      </td>
                                      </tr>
                                    </tbody></table>
                                    <br />
                                    <table class="table table-typo">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <h6>Persiapan Lahan</h6>
                                        </td>
                                        <td><p><?php echo $data->persiapan ?></p></span>
                                          <script type="text/javascript">
                                            var editor = CKEDITOR.replace('persiapan');
                                            CKFinder.setupCKEditor(editor, 'ckfinder/');
                                          </script>
                                      </td>
                                      </tr>
                                    </tbody></table>
                                    <br />
                                    <table class="table table-typo">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <h6>Pembibitan</h6>
                                        </td>
                                        <td><p><?php echo $data->pembibitan?></p></span>
                                          <script type="text/javascript">
                                            var editor = CKEDITOR.replace('persiapan');
                                            CKFinder.setupCKEditor(editor, 'ckfinder/');
                                          </script>
                                      </td>
                                      </tr>
                                    </tbody></table>
                                    <br />
                                    <table class="table table-typo">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <h6>Penanaman</h6>
                                        </td>
                                        <td><p><?php echo $data->penanaman ?></p></span>
                                          <script type="text/javascript">
                                            var editor = CKEDITOR.replace('persiapan');
                                            CKFinder.setupCKEditor(editor, 'ckfinder/');
                                          </script>
                                      </td>
                                      </tr>
                                    </tbody></table>
                                    <br />
                                    <table class="table table-typo">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <h6>Pemeliharaan</h6>
                                        </td>
                                        <td><p><?php echo $data->pemeliharaan ?></p></span>
                                          <script type="text/javascript">
                                            var editor = CKEDITOR.replace('persiapan');
                                            CKFinder.setupCKEditor(editor, 'ckfinder/');
                                          </script>
                                      </td>
                                      </tr>
                                    </tbody></table>
                                    <br />
                                    <table class="table table-typo">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <h6>Obat Pertanian</h6>
                                        </td>
                                        <td><p><?php echo $data->obat_pertanian ?></p></span>
                                          <script type="text/javascript">
                                            var editor = CKEDITOR.replace('persiapan');
                                            CKFinder.setupCKEditor(editor, 'ckfinder/');
                                          </script>
                                      </td>
                                      </tr>
                                    </tbody></table>
                                    <br />
                                    </form>
                                  </div>
                                  <div class="card-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                                  </div>
                                </div>
                                </div>
                          </td>

                          <td>
															<button class="btn btn-warning" name="edit" value="Sunting" data-toggle="modal" data-target="#edit_data_Modal<?php echo $data->id_info; ?>" >Sunting</button>
                              <div id="edit_data_Modal<?php echo $data->id_info; ?>" class="modal fade">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                  <div class="card-header">
                                    <h5 class="card-title text-center">Sunting <?php echo $data->jenis ?></p>
                                    <p class="card-categor text-center">Informasi Jenis Tanaman Hortikultura</h5>
                                  </div>
                                  <div class="modal-body">
                                  <form class="form-horizontal" method="post" action="<?php echo base_url() . 'C_info/update_info/' . $data->id_info; ?>"  enctype="multipart/form-data">
                                    <input type="hidden" name="jenis" class="form-control" value="<?php echo $data->id_info; ?>">
                                    <input type="hidden" name="jenis" class="form-control" value="<?php echo $data->jenis; ?>">
                                    <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>"> 
                                    <h6>Nama Komoditas</h6>
                                    <input type="text" id="nama_komoditas" name="nama_komoditas" class="form-control" value="<?php echo $data->nama_komoditas; ?>">
                                    <br />
                                    <h6>Deskripsi</h6>
                                    <textarea class="ckeditor" id="deskripsi_komoditas" name="deskripsi_komoditas"> <?php echo $data->deskripsi_komoditas; ?></textarea>
                                    <br />
                                    <h6>Persiapan Lahan</h6>
                                    <textarea class="ckeditor" id="persiapan" name="persiapan" class="form-control"> <?php echo $data->persiapan; ?></textarea>
                                    <br />
                                  <h6>Pembibitan</h6>
                                    <textarea class="ckeditor" name="pembibitan" id="pembibitan" class="form-control"><?php echo $data->pembibitan; ?></textarea>
                                  <br />
                                  <h6>Penanaman</h6>
                                    <textarea class="ckeditor" name="penanaman" id="penanaman" class="form-control"><?php echo $data->penanaman; ?></textarea>
                                  <br />
                                  <h6>Pemeliharaan</h6>
                                    <textarea class="ckeditor" name="pemeliharaan" id="pemeliharaan" class="form-control"><?php echo $data->pemeliharaan; ?></textarea>
                                  <br />
                                  <h6>Obat Pertanian</h6>
                                    <textarea class="ckeditor" name="obat_pertanian" id="obat_pertanian" class="form-control"><?php echo $data->obat_pertanian; ?></textarea>
                                    <br />
                                  <h6>Gambar Komoditas</h6>
                                  <input type="file" name="gambar_komoditas"><br>
                                  <input type="text" id="lama" name="lama" class="form-control" value="<?php echo $data->gambar_komoditas; ?>"><br>
                                    <br />
                                    <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-success">Sunting</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    </form>
                                    </div>
                                  </div>
                                  </div>
                                </div>
                                </div>
                          </td>
                          <td>
                              <button class="btn btn-danger" name="delete" value="Hapus" data-toggle="modal" data-target="#delete_data_Modal<?php echo $data->id_info. $data->gambar_komoditas; ?>">Hapus</button>
                              <div id="delete_data_Modal<?php echo $data->id_info. $data->gambar_komoditas; ?>" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="card-header">
                                  <h5 class="card-title text-center">Hapus <?php echo $data->jenis; ?></h5>
                                  <p class="card-categor text-center">Informasi Jenis Tanaman Hortikultura</p>
                                </div>
                                <div class="modal-body">
                                <form class="form-horizontal" method="post" action="<?=base_url()?>C_info/hapus_info/<?=$data->id_info?>/<?=$data->gambar_komoditas?>">
                                <h5 align="center">Apakah Anda yakin ingin menghapus informasi ini?</h5>
                                </div>
                                <div class="card-footer">
                                  <button type="submit" class="btn btn-success">Hapus</button>
                                  </form>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                </div>
                                </div>
                              </div>
                              </div>
														</td>
                            </tr>
                            <?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>	
							</div>
              <div class="col-md-12">
									<div class="card-body">
                  <?php echo $pagination; ?>
									</div>
							</div>	
						</div>
					</div>
				</div>
			</div>

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="card-header">
     <h5 class="card-title text-center">Tambah Sayur</p>
     <p class="card-categor text-center">Informasi Jenis Tanaman Hortikultura</h5>
   </div>
   <div class="modal-body">
   <form action="<?=base_url()?>C_info/tambah_info" method="post" enctype="multipart/form-data">
    <input type="hidden" name="jenis" class="form-control" value="Sayur">
    <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>"> 
     <h6>Nama Komoditas</h6>
     <input type="text" id="nama_komoditas" name="nama_komoditas" class="form-control" required>
     <br />
     <h6>Deskripsi</h6>
     <textarea class="ckeditor" id="deskripsi_komoditas" name="deskripsi_komoditas" class="form-control"></textarea>
     <br />
     <h6>Persiapan Lahan</h6>
     <textarea class="ckeditor" id="persiapan lahan" name="persiapan" class="form-control"></textarea>
     <br />
	 <h6>Pembibitan</h6>
     <textarea class="ckeditor" name="pembibitan" id="pembibitan" class="form-control"></textarea>
	 <br />
	 <h6>Penanaman</h6>
     <textarea class="ckeditor" name="penanaman" id="penanaman" class="form-control"></textarea>
	 <br />
	 <h6>Pemeliharaan</h6>
     <textarea class="ckeditor" name="pemeliharaan" id="pemeliharaan" class="form-control"></textarea>
	 <br />
	 <h6>Obat Pertanian</h6>
     <textarea class="ckeditor" name="obat_pertanian" id="obat_pertanian" class="form-control"></textarea>
     <br />
	 <h6>Gambar Komoditas</h6>
   <input type="file" name="gambar_komoditas"><br><br>
     <br /> 
    </div>
    <div class="card-footer">
    <button type="submit" name="submit" class="btn btn-success">Tambah</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
    </form>
   </div>
  </div>
 </div>
</div>

<div id="add_data_Modal2" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="card-header">
     <h5 class="card-title text-center">Tambah Buah</p>
     <p class="card-categor text-center">Informasi Jenis Tanaman Hortikultura</h5>
   </div>
   <div class="modal-body">
   <form method="post" action="<?php echo base_url() . 'C_info/tambah_info'; ?>" enctype="multipart/form-data">
    <input type="hidden" name="jenis" class="form-control" value="Buah">
    <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>"> 
     <h6>Nama Komoditas</h6>
     <input type="text" id="nama_komoditas" name="nama_komoditas" class="form-control" required></textarea>
     <br />
     <h6>Deskripsi</h6>
     <textarea class="ckeditor" id="deskripsi_komoditas" name="deskripsi_komoditas" class="form-control"></textarea>
     <br />
     <h6>Persiapan Lahan</h6>
     <textarea class="ckeditor" id="persiapan lahan" name="persiapan" class="form-control"></textarea>
     <br />
	 <h6>Pembibitan</h6>
     <textarea class="ckeditor" name="pembibitan" id="pembibitan" class="form-control"></textarea>
	 <br />
	 <h6>Penanaman</h6>
     <textarea class="ckeditor" name="penanaman" id="penanaman" class="form-control"></textarea>
	 <br />
	 <h6>Pemeliharaan</h6>
     <textarea class="ckeditor" name="pemeliharaan" id="pemeliharaan" class="form-control"></textarea>
	 <br />
	 <h6>Obat Pertanian</h6>
     <textarea class="ckeditor" name="obat_pertanian" id="obat_pertanian" class="form-control"></textarea>
     <br />
	 <h6>Gambar Komoditas</h6>
    <input type="file" name="gambar_komoditas"><br>
     <br />
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-success">Tambah</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
    </form>
   </div>
  </div>
 </div>
</div>

<div id="add_data_Modal3" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="card-header">
     <h5 class="card-title text-center">Tambah Kacang</p>
     <p class="card-categor text-center">Informasi Jenis Tanaman Hortikultura</h5>
   </div>
   <div class="modal-body">
   <form method="post" action="<?php echo base_url() . 'C_info/tambah_info'; ?>" enctype="multipart/form-data">
    <input type="hidden" name="jenis" class="form-control" value="Kacang">
    <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>"> 
     <h6>Nama Komoditas</h6>
     <input type="text" id="nama_komoditas" name="nama_komoditas" class="form-control" required></textarea>
     <br />
     <h6>Deskripsi</h6>
     <textarea class="ckeditor" id="deskripsi_komoditas" name="deskripsi_komoditas" class="form-control"></textarea>
     <br />
     <h6>Persiapan Lahan</h6>
     <textarea class="ckeditor" id="persiapan lahan" name="persiapan" class="form-control"></textarea>
     <br />
	 <h6>Pembibitan</h6>
     <textarea class="ckeditor" name="pembibitan" id="pembibitan" class="form-control"></textarea>
	 <br />
	 <h6>Penanaman</h6>
     <textarea class="ckeditor" name="penanaman" id="penanaman" class="form-control"></textarea>
	 <br />
	 <h6>Pemeliharaan</h6>
     <textarea class="ckeditor" name="pemeliharaan" id="pemeliharaan" class="form-control"></textarea>
	 <br />
	 <h6>Obat Pertanian</h6>
     <textarea class="ckeditor" name="obat_pertanian" id="obat_pertanian" class="form-control"></textarea>
     <br />
	 <h6>Gambar Komoditas</h6>
   <input type="file" name="gambar_komoditas"><br>
     <br />
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-success">Tambah</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
    </form>
   </div>
  </div>
 </div>
</div>

<div id="add_data_Modal4" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="card-header">
     <h5 class="card-title text-center">Tambah Tanaman Hias</p>
     <p class="card-categor text-center">Informasi Jenis Tanaman Hortikultura</h5>
   </div>
   <div class="modal-body">
   <form method="post" action="<?php echo base_url() . 'C_info/tambah_info'; ?>" enctype="multipart/form-data">
    <input type="hidden" name="jenis" class="form-control" value="Tanaman Hias">
    <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>"> 
     <h6>Nama Komoditas</h6>
     <input type="text" id="nama_komoditas" name="nama_komoditas" class="form-control" required></textarea>
     <br />
     <h6>Deskripsi</h6>
     <textarea class="ckeditor" id="deskripsi_komoditas" name="deskripsi_komoditas" class="form-control"></textarea>
     <br />
     <h6>Persiapan Lahan</h6>
     <textarea class="ckeditor" id="persiapan lahan" name="persiapan" class="form-control"></textarea>
     <br />
	 <h6>Pembibitan</h6>
     <textarea class="ckeditor" name="pembibitan" id="pembibitan" class="form-control"></textarea>
	 <br />
	 <h6>Penanaman</h6>
     <textarea class="ckeditor" name="penanaman" id="penanaman" class="form-control"></textarea>
	 <br />
	 <h6>Pemeliharaan</h6>
     <textarea class="ckeditor" name="pemeliharaan" id="pemeliharaan" class="form-control"></textarea>
	 <br />
	 <h6>Obat Pertanian</h6>
     <textarea class="ckeditor" name="obat_pertanian" id="obat_pertanian" class="form-control"></textarea>
     <br />
	 <h6>Gambar Komoditas</h6>
   <input type="file" name="gambar_komoditas"><br>
     <br />
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-success">Tambah</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
    </form>
   </div>
  </div>
 </div>
</div>