<?php echo form_open('pasien/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nama_pasien" class="col-md-4 control-label">Nama Pasien</label>
		<div class="col-md-8">
			<input type="text" name="nama_pasien" value="<?php echo $this->input->post('nama_pasien'); ?>" class="form-control" id="nama_pasien" />
		</div>
	</div>
	<div class="form-group">
		<label for="umur" class="col-md-4 control-label">Umur</label>
		<div class="col-md-8">
			<input type="text" name="umur" value="<?php echo $this->input->post('umur'); ?>" class="form-control" id="umur" />
		</div>
	</div>
	<div class="form-group">
		<label for="jk" class="col-md-4 control-label">Jk</label>
		<div class="col-md-8">
			<input type="text" name="jk" value="<?php echo $this->input->post('jk'); ?>" class="form-control" id="jk" />
		</div>
	</div>
	<div class="form-group">
		<label for="alamat" class="col-md-4 control-label">Alamat</label>
		<div class="col-md-8">
			<input type="text" name="alamat" value="<?php echo $this->input->post('alamat'); ?>" class="form-control" id="alamat" />
		</div>
	</div>
	<div class="form-group">
		<label for="tanggal" class="col-md-4 control-label">Tanggal</label>
		<div class="col-md-8">
			<input type="text" name="tanggal" value="<?php echo $this->input->post('tanggal'); ?>" class="form-control" id="tanggal" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>