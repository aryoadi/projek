<h2>List Tindakan</h2>
<div class="pull-right">
	<a href="<?php echo site_url('tindakan/add'); ?>" class="btn btn-success">Tambah</a>
	<a href="<?php echo site_url('tindakan/export') ?>"class="btn btn-info" >Export Excel</a>
</div>
</div>
<table class="table table-striped table-bordered" id="table" class="display" cellspacing="0" width="100%">
	<thead>
    <tr>
		<th>No Reg</th>
		<th>Nama</th>
		<th>Penyakit</th>
		<th>Kategori Perawatan</th>
		<th>Tarif</th>
    </tr>
    </thead>
    <tfoot>
    	<tr>
		<th>No Reg</th>
		<th>Nama</th>
		<th>Penyakit</th>
		<th>Kategori Perawatan</th>
		<th>Tarif</th>
    </tr>
    </tfoot>
	<!-- <?php foreach($tindakan as $t){ ?>
    <tr>
		<td><?php echo $t['no_reg']; ?></td>
		<td><?php echo $t['nama']; ?></td>
		<td><?php echo $t['penyakit']; ?></td>
		<td><?php echo $t['kategori_perawatan']; ?></td>
		<td><?php echo $t['tarif']; ?></td>
		<td>
            <a href="<?php echo site_url('tindakan/edit/'.$t['no_reg']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('tindakan/remove/'.$t['no_reg']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?> -->
</table> 
<script type="text/javascript">
    var table;
    $(document).ready(function() {
        table = $('#table').DataTable({ 
            "processing": true, 
            "serverSide": true, 
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('tindakan/get_data_user')?>",
                "type": "POST"
            },
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });
    });
</script>