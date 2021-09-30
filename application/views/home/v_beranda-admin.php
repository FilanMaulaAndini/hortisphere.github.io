<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<h4 class="page-title">Selamat Datang <?php echo $this->session->userdata('nama_lengkap'); ?></h4>
						<div class="row">
							<div class="col-md-2">
								<div class="card card-stats card-warning">
									<div class="card-body ">
										<div class="row">
											<div class="col-4">
												<div class="icon-big text-center">
													<i class="la la-book"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-title">Informasi</p>
													<p class="card-title">&nbsp</p>
													<h5 class="card-category">Tanaman Hortikultura</h5>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="card card-stats card-success">
									<div class="card-body ">
										<div class="row">
											<div class="col-4">
												<div class="icon-big text-center">
													<i class="la la-bullhorn"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
                                                    <p class="card-title">Berita</p>
													<p class="card-title">&nbsp</p>
													<h5 class="card-category">Terbaru Pertanian</h5>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="card card-stats card-danger">
									<div class="card-body">
										<div class="row">
											<div class="col-4">
												<div class="icon-big text-center">
													<i class="la la-pencil"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
                                                    <p class="card-title">Pembuku</p>
													<p class="card-title">an</p>
													<h5 class="card-category">Keuangan Bertani</h5>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="card card-stats card-primary">
									<div class="card-body ">
										<div class="row">
											<div class="col-4">
												<div class="icon-big text-center">
													<i class="la la-money"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
                                                    <p class="card-title">Harga Pasar</p>
													<h5 class="card-category">Terbaru Komoditas</h5>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="card card-stats card-warning">
									<div class="card-body ">
										<div class="row">
											<div class="col-4">
												<div class="icon-big text-center">
													<i class="la la-calculator"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
                                                    <p class="card-title">Simulasi</p>
													<p class="card-title">&nbsp</p>
													<h5 class="card-category">Analisis Usaha</h5>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="card card-stats card-success">
									<div class="card-body ">
										<div class="row">
											<div class="col-4">
												<div class="icon-big text-center">
													<i class="la la-comment"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
                                                    <p class="card-title">Tanya Jawab</p>
													<h5 class="card-category">Antar Petani</h5>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
						<div class="row">
                        <div class="col-md-6">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Pembukuan </h4>
										<p class="card-category">Catatan Keuangan</p>
									</div>
									<div class="card-body">
										<table class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">No.</th>
													<th scope="col">Tanggal</th>
													<th scope="col">Pengeluaran</th>
													<th scope="col">Jumlah</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>23/09/2020</td>
													<td>Benih</td>
													<td>Rp. 500.000</td>
												</tr>
												<tr>
													<td>2</td>
													<td>23/10/2020</td>
													<td>Tenaga Kerja</td>
													<td>Rp. 30.000</td>
                                                </tr>
                                                <tr>
													<td>3</td>
													<td>29/10/2020</td>
													<td>Pupuk</td>
													<td>Rp. 50.000</td>
												</tr>
												<tr>
                                                    <td></td>
													<td colspan="2">Jumlah</td>
													<td>Rp. 580.000</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card card-tasks">
									<div class="card-header ">
										<h4 class="card-title">Harga Pasar</h4>
										<p class="card-category">Komoditas</p>
									</div>
									<div class="card-body ">
										<div class="table-full-width">
											<table class="table">
												<thead>
													<tr>
														<th>
															<div class="form-check">
																<label class="form-check-label">
																	<input class="form-check-input  select-all-checkbox" type="checkbox" data-select="checkbox" data-target=".task-select">
																	<span class="form-check-sign"></span>
																</label>
															</div>
														</th>
														<th>Komoditas</th>
														<th>Harga</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div class="form-check">
																<label class="form-check-label">
																	<input class="form-check-input task-select" type="checkbox">
																	<span class="form-check-sign"></span>
																</label>
															</div>
														</td>
														<td>Jagung</td>
														<td>Rp. 6.000</td>
													</tr>
													<tr>
														<td>
															<div class="form-check">
																<label class="form-check-label">
																	<input class="form-check-input task-select" type="checkbox">
																	<span class="form-check-sign"></span>
																</label>
															</div>
														</td>
														<td>Jagung</td>
														<td>Rp. 6.000</td>
													</tr>
													<tr>
														<td>
															<div class="form-check">
																<label class="form-check-label">
																	<input class="form-check-input task-select" type="checkbox">
																	<span class="form-check-sign"></span>
																</label>
															</div>
														</td>
														<td>Jagung</td>
														<td>Rp. 6.000</td>
													</tr>
													<tr>
														<td>
															<div class="form-check">
																<label class="form-check-label">
																	<input class="form-check-input task-select" type="checkbox">
																	<span class="form-check-sign"></span>
																</label>
															</div>
														</td>
														<td>Jagung</td>
														<td>Rp. 6.000</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer ">
										<div class="stats">
											<i class="now-ui-icons loader_refresh spin"></i> Update 23 November 2020
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-card-no-pd">
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										<p class="fw-bold mt-1">Simulasi</p>
										<h4><b>Analisis Usaha</b></h4>
										<a href="#" class="btn btn-primary btn-full text-left mt-3 mb-3"><i class="la la-plus"></i> Tambah</a>
									</div>
									<div class="card-footer">
										<ul class="nav">
											<li class="nav-item ml-auto"><a class="btn btn-default btn-link" href="#"><i class="la la-refresh"></i> Refresh</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="card">
									<div class="card-body">
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Total Biaya Produksi</span>
												<span class="text-muted fw-bold"> 1.000.000</span>
											</div>
											<div class="progress mb-2" style="height: 7px;">
												<div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="78%"></div>
											</div>
										</div>
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Keuntungan</span>
												<span class="text-muted fw-bold"> 300.000</span>
											</div>
											<div class="progress mb-2" style="height: 7px;">
												<div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="65%"></div>
											</div>
										</div>
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Pendapatan</span>
												<span class="text-muted fw-bold"> 1.300.000</span>
											</div>
											<div class="progress mb-2" style="height: 7px;">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="70%"></div>
											</div>
										</div>
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Produktivitas</span>
												<span class="text-muted fw-bold"> 60%</span>
											</div>
											<div class="progress mb-2" style="height: 7px;">
												<div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="60%"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats">
									<div class="card-body">
										<p class="fw-bold mt-1">Statistic</p>
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center icon-warning">
													<i class="la la-pie-chart text-warning"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Number</p>
													<h4 class="card-title">150GB</h4>
												</div>
											</div>
										</div>
										<hr/>
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-heart-o text-primary"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Followers</p>
													<h4 class="card-title">+45K</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Pesan</h4>
										<p class="card-category">
                                        Tanya Jawab Petani</p>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">TaeTae</h4>
                                        <div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect2" multiple="">
                                                <option><button class="btn btn-success">Success</button></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
