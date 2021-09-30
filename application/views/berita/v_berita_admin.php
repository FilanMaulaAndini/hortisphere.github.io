<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<div class="col-md-12">	
							<div class="card-body text-right">
								<p class="demo">
									<div class="dropdown">
										<button class="btn btn-primary" type="button" id="dropdownMenu1" data-target="#add_data_Modal" data-toggle="modal">
											Tambah
										</button>
									</div>
								</p>
							</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<p class="card-title">Daftar Berita</p>
										<h5 class="card-category">Pertanian</h5>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped mt-3">
												<thead>
													<tr>
														<th scope="col">No</th>
														<th scope="col">Tanggal</th>
														<th scope="col">Judul Berita</th>
                            <th scope="col">Gambar</th>
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
                          foreach ($hortisphere as $berita) : ?>
                          <tr>
                            <td><?php echo $No++ ?></td>
                            <td><?php echo $berita->tanggal_tambah ?></td>
                            <td><?php echo $berita->judul ?></td>
                            <td><img src="<?php echo base_url('upload/berita/'.$berita->gambar) ?>" width="64" /></td>
														<td>
                             <button class="btn btn-success" name="view" value="Lihat" data-toggle="modal" data-target="#data_Modal<?php echo $berita->id_berita; ?>">Lihat</button>
                              <div id="data_Modal<?php echo $berita->id_berita; ?>" class="modal fade">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                  <div class="card-header">
                                    <h5 class="card-title text-center">Lihat</p>
                                    <p class="card-categor text-center">Berita Pertanian</h5>
                                  </div>
                                  <div class="card-body">
                                  <form class="form-horizontal" method="post" action="<?php echo base_url() . 'C_berita/lihat' .  $berita->id_berita ?>">
                                  <table class="table table-typo">
                                  <table class="table table-typo">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <h6>Gambar</h6>
                                        </td>
                                       </tr>
                                    </tbody></table>
                                    <img src="<?=base_url()?>upload/berita/<?=$berita->gambar?>" alt="foto" height="200" width="300" style="display: block; margin: auto;">
                                    <br>
                                  <table class="table table-typo">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <h6>Judul Berita</h6>
                                        </td>
                                        <td><p><?php echo $berita->judul ?></p></span></td>
                                      </tr>
                                    </tbody></table>
                                    <br />
                                    <table class="table table-typo">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <h6>Konten Berita</h6>
                                        </td>
                                        <td><p><?php echo $berita->isi ?></p></span>
                                          <script type="text/javascript">
                                            var editor = CKEDITOR.replace('isi');
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
                                <button class="btn btn-warning" name="edit" value="Sunting" data-toggle="modal" data-target="#edit_data_Modal<?php echo $berita->id_berita; ?>" >Sunting</button>
                              <div id="edit_data_Modal<?php echo $berita->id_berita; ?>" class="modal fade">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                  <div class="card-header">
                                    <h5 class="card-title text-center">Sunting</p>
                                    <p class="card-categor text-center">Berita Pertanian</h5>
                                  </div>
                                  <div class="modal-body">
                                  <form class="form-horizontal" method="post" action="<?php echo base_url() . 'C_berita/update_berita/' . $berita->id_berita; ?>"  enctype="multipart/form-data">
                                    <input type="hidden" name="jenis" class="form-control" value="<?php echo $berita->id_berita; ?>">
                                    <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>"> 
                                    <h6>Judul Berita</h6>
                                    <input type="text" id="judul" name="judul" class="form-control" value="<?php echo $berita->judul; ?>">
                                    <br />
                                    <h6>Konten Berita</h6>
                                    <textarea class="ckeditor" id="isi" name="isi"> <?php echo $berita->isi; ?></textarea>
                                    <br />
                                  <h6>Gambar</h6>
                                  <input type="file" name="gambar"><br>
                                  <input type="hidden" id="lama" name="lama" value="<?php echo $berita->gambar; ?>"><br>
                                    <br />
                                    <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-success" value="Upload">Sunting</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    </form>
                                    </div>
                                  </div>
                                  </div>
                                </div>
                                </div>
                          </td>

                          <td>
                                <button class="btn btn-danger" name="delete" value="Hapus" data-toggle="modal" data-target="#delete_data_Modal<?php echo $berita->id_berita. $berita->gambar; ?>">Hapus</button>
                              <div id="delete_data_Modal<?php echo $berita->id_berita. $berita->gambar; ?>" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="card-header">
                                  <h5 class="card-title text-center">Hapus</h5>
                                  <p class="card-categor text-center">Berita Pertanian</p>
                                </div>
                                <div class="modal-body">
                                <form class="form-horizontal" method="post" action="<?=base_url()?>C_berita/hapus_berita/<?=$berita->id_berita?>/<?=$berita->gambar?>">
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
     <h5 class="card-title text-center">Tambah</p>
     <p class="card-categor text-center"> Berita Pertanian</h5>
   </div>
   <div class="modal-body">
   <form action="<?=base_url()?>C_berita/tambah_berita" method="post" enctype="multipart/form-data">
   <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>"> 
     <h6>Judul Berita</h6>
     <input type="text" id="judul" name="judul" class="form-control" required>
     <br />
     <h6>Konten Berita</h6>
     <textarea class="ckeditor" id="isi" name="isi" class="form-control"></textarea>
     <br />
      <h6>Gambar</h6>
      <input type="file" name="gambar"><br><br>
      <br />
     <div class="card-footer">
    <button type="submit" name="submit" class="btn btn-success">Tambah</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
    </form>
    </div>
   </div>
  </div>
 </div>
</div>

