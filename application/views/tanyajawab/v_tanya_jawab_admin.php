<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-8">
							<?php
									$query = $this->db->query("SELECT * FROM tanya_jawab WHERE status_komen='0'");
									foreach ($query->result() as $utama):
								?>
							<div class="card">
								<div class="media border p-2 mb-2">
								<img src="<?php echo base_url() ?>assets/img/profil.jpg" alt="foto-user" class="mr-3 mt-3 rounded-circle" style="width:60px;">
								<div class="media-body">
								<div class="row">
									<div class="col-sm-10">
									<h5><b><?php echo $utama->nama_lengkap?></b> </h5>
									<h5><small><i>(<?php echo $utama->email?>) <?php echo $utama->tanggal?></i></small></h5>
									<p><?php echo $utama->komentar?></p>
									</div>
									<div class="col-sm-2" align="right">
									<button class="btn btn-warning" name="edit" id="dropdownMenu"  data-toggle="collapse" href="#edit_data_Modal<?php echo $utama->id_komen; ?>" >Balas</button>
									</div>
								</div>
								</div>
								</div>
								<?php
									$id_komen=$utama->id_komen;
									$query = $this->db->query("SELECT * FROM tanya_jawab WHERE status_komen='$id_komen' ");
									foreach ($query->result() as $balasan):
								?>
								<div class="container">
								<div class="media border p-2 mb-2">
								<img src="<?php echo base_url() ?>assets/img/profil.jpg" alt="foto-user" class="mr-3 mt-3 rounded-circle" style="width:60px;">
								<div class="media-body">
								<div class="row">
									<div class="col-sm-10">
									<h5><b><?php echo $balasan->nama_lengkap?></b> </h5>
									<h5><small><i>(<?php echo $balasan->email?>) <?php echo $balasan->tanggal?></i></small></h5>
									<p><?php echo $balasan->komentar?></p>
									</div>
								</div>
								</div>
								</div>
								</div>
								<?php endforeach;?>
								<div id="edit_data_Modal<?php echo $utama->id_komen; ?>" class="collapse" >
									<form class="form-horizontal" method="post" action="<?=base_url()?>C_tanya_jawab/balas_admin">
										<input type="hidden" name="id_komen" value="<?php echo $utama->id_komen?>">	
										<input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>">
										<input type="hidden" name="nama_lengkap" class="form-control" value="Administrator">  
										<input type="hidden" name="email" class="form-control" value="admin">
										<div class="card-body ">
										<p class="card-category">Balasan:</p>
											<div class="form-group">
												<label for="comment">Masukkan Balasan</label>
												<textarea class="form-control"name="balasan" rows="5"></textarea>
											</div>
										</div>
										<div class="card-footer ">
											<button type="submit" name="submit" class="btn btn-success">Kirim</button>
										</div>
									</form>
								</div>
							</div>
							<?php endforeach;?>
							</div>

							<div class="col-md-4">
							<div class="card">
								<div class="card-header ">
										<h4 class="card-title">Tanya Jawab </h4>
										<p class="card-category">Antar Sesama Petani</p>
								</div>
								<form method="POST" action="<?=base_url()?>C_tanya_jawab/kirim_admin">
								<input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>">
								<input type="hidden" name="nama_lengkap" class="form-control" value="Administrator">  
								<input type="hidden" name="email" class="form-control" value="admin">
								<div class="card-body ">
								<p class="card-category">Kolom Tanya Jawab:</p>
									<div class="form-group">
										<label for="comment">Masukkan Pertanyaan</label>
										<textarea class="form-control"name="komentar" rows="5"></textarea>
									</div>
								</div>
								<div class="card-footer ">
									<button type="submit" name="submit" class="btn btn-success">Kirim</button>
								</div>
								</form>
								</div>
							</div>				
						</div>
						
					</div>
				</div>
				

