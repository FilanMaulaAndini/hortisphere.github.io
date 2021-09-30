<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-8">
								<div class="card">
								<form action="<?=base_url()?>C_analisis/tambah_analisis" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>">
									<div class="card-header ">
										<h4 class="card-title">Produktivitas </h4>
										<p class="card-category">Simulasi Analisis Usaha</p>
									</div>
									<div class="card-body">
									<div class="form-group form-inline">
										<label class="col-md-2 col-form-label" for="inlineinput">Nama komoditas</label>
										<div class="col-md-9 p-0">
											<input class="form-control input-full" id="komoditas" name="komoditas" type="text" required/>
										</div>
									</div>
									<div class="form-group form-inline">
										<label class="col-md-2 col-form-label" for="inlineinput">Luas lahan (m2)</label>
										<div class="col-md-9 p-0">
											<input class="form-control input-full" id="luas_lahan" name="luas_lahan" type="number"  required/>
										</div>			
									</div>
									<div class="form-group form-inline">
										<label class="col-md-2 col-form-label" for="inlineinput">Hasil panen / masa tanam (kg)</label>
										<div class="col-md-9 p-0">
											<input class="form-control input-full" id="hasil_panen_tahun" name="hasil_panen_tahun" type="number"  required/>
										</div>	
									</div>
									<div class="form-group form-inline">
										<label class="col-md-2 col-form-label" for="inlineinput">Jumlah panen / tahun</label>
										<div class="col-md-9 p-0">
											<input class="form-control input-full" id="jumlah_panen_tahun" name="jumlah_panen_tahun" type="number" required />
										</div>
									</div>
									<div class="form-group form-inline">
										<label class="col-md-2 col-form-label" for="inlineinput">Harga saat ini (Rp./kg)</label>
										<div class="col-md-9 p-0">
											<input class="form-control input-full" id="harga_sekarang" name="harga_sekarang" type="number" required/>
										</div>		
									</div>
									</div>
									<div class="card-header ">
										<h4 class="card-title">Biaya Operasional </h4>
										<p class="card-category">Simulasi Analisis Usaha</p>
									</div>
									<div class="card-body">
									<div class="form-group form-inline">
										<label class="col-md-2 col-form-label" for="inlineinput">Persiapan lahan (biaya/tahun)</label>
										<div class="col-md-9 p-0">
											<input class="form-control input-full" id="persiapan_lahan" name="persiapan_lahan" type="number" required/>
										</div>
									</div>
									<div class="form-group form-inline">
										<label class="col-md-2 col-form-label" for="inlineinput">Pemeliharaan</label>
										<div class="col-md-9 p-0">
											<input class="form-control input-full" id="pemeliharaan" name="pemeliharaan" type="number" required/>
										</div>			
									</div>
									<div class="form-group form-inline">
										<label class="col-md-2 col-form-label" for="inlineinput">Obat pertanian</label>
										<div class="col-md-9 p-0">
											<input class="form-control input-full" id="obat_tani" name="obat_tani" type="number" required />
										</div>	
									</div>
									<div class="form-group form-inline">
										<label class="col-md-2 col-form-label" for="inlineinput">Sarana prasarana</label>
										<div class="col-md-9 p-0">
											<input class="form-control input-full" id="saprotaan" name="saprotaan" type="number" required/>
										</div>
									</div>
									<div class="form-group form-inline">
										<label class="col-md-2 col-form-label" for="inlineinput">Lainnya &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</label>
										<div class="col-md-9 p-0">
											<input class="form-control input-full" id="lainnya" name="lainnya" type="number" required/>
										</div>		
									</div>
									</div>
									<div class="card-footer ">
										<button type="submit" name="submit" class="btn btn-success">Lihat Hasil</button>
    									<button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
									</div>
								</div>
								</form>
							</div>

							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Keterangan </div>
										<p class="card-category"></p>
									</div>
									<div class="card-header ">
										<h4 class="card-title">Persiapan Lahan</h4>
										<ul class="card-category">- Sewa lahan (jika bukan kepemilikan pribadi)</ul>
										<ul class="card-category">- Pembersihan lahan</ul>
										<ul class="card-category">- Pencangkulan</ul>
										<ul class="card-category">- Penanaman, dll</ul>
									</div>
									<div class="card-header ">
										<h4 class="card-title">Sarana Prasarana </h4>
										<ul class="card-category">- Alat pertanian </ul>
										<ul class="card-category">- Benih</ul>
										<ul class="card-category">- Tenaga kerja, dll</ul>
									</div>
									</div>
									
							</div>				
						</div>
						
					</div>
				</div>
				

