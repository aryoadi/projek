<?php echo form_open('tindakan/edit/'.$tindakan['no_reg'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nama" class="col-md-4 control-label">Nama</label>
		<div class="col-md-8">
			<input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $tindakan['nama']); ?>" class="form-control" id="nama" />
		</div>
	</div>
	<div class="form-group">
		<label for="penyakit" class="col-md-4 control-label">Penyakit</label>
		<div class="col-md-8">
			<input type="text" name="penyakit" value="<?php echo ($this->input->post('penyakit') ? $this->input->post('penyakit') : $tindakan['penyakit']); ?>" class="form-control" id="penyakit" />
		</div>
	</div>
	<div class="form-group">
		<label for="kategori_perawatan" class="col-md-4 control-label">Kategori Perawatan</label>
		<div class="col-md-8">
			<input type="text" name="kategori_perawatan" value="<?php echo ($this->input->post('kategori_perawatan') ? $this->input->post('kategori_perawatan') : $tindakan['kategori_perawatan']); ?>" class="form-control" id="kategori_perawatan" />
		</div>
	</div>
	<div class="form-group">
		<label for="tarif" class="col-md-4 control-label">Tarif</label>
		<div class="col-md-8">
			<input type="text" name="tarif" value="<?php echo ($this->input->post('tarif') ? $this->input->post('tarif') : $tindakan['tarif']); ?>" class="form-control" id="tarif" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>