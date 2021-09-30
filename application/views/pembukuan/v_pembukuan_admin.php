			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Pembukuan </h4>
										<p class="card-category">Catatan Keuangan Member</p>
									</div>
									<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">No.</th>
													<th scope="col">ID User</th>
													<th scope="col">Nama Lengkap</th>
													<th scope="col">Username</th>
													<th scope="col">Email</th>
													<th scope="col">Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?php $No=1; 
                          						foreach ($hortisphere as $user) : ?>
												<tr>
													<td><?php echo $No++ ?></td>
													<td><?php echo $user->id_user ?></td>
													<td><?php echo $user->nama_lengkap ?></td>
													<td><?php echo $user->username ?></td>
													<td><?php echo $user->email ?></td>
													<td><a class="btn btn-warning" href="<?php echo base_url() . 'C_pembukuan/detail_pembukuan/' . $user->id_user; ?>">
														Detail
													</a></td>
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

