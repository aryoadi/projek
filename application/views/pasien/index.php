<h2>List Pasien</h2>
<div class="pull-right">
	<a href="<?php echo site_url('pasien/add'); ?>" class="btn btn-success">Tambah</a> 
	<a href="<?php echo site_url('pasien/export') ?>"class="btn btn-info" >Export Excel</a>
</div>

<table class="table table-striped table-bordered"id="table">
  <thead>
    <tr>
		<th>No Reg</th>
		<th>Nama Pasien</th>
		<th>Umur</th>
		<th>Jk</th>
		<th>Alamat</th>
		<th>Tanggal</th>
		<th>Actions</th>
		<th></th>
    </tr>
</thead>
	<!-- <?php foreach($pasien as $p){ ?>
    <tr>
		<td><?php echo $p['no_reg']; ?></td>
		<td><?php echo $p['nama_pasien']; ?></td>
		<td><?php echo $p['umur']; ?></td>
		<td><?php echo $p['jk']; ?></td>
		<td><?php echo $p['alamat']; ?></td>
		<td><?php echo $p['tanggal']; ?></td>
		<td>
            <a href="<?php echo site_url('pasien/edit/'.$p['no_reg']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('pasien/remove/'.$p['no_reg']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>xdc
	<?php } ?> -->
</table>
<script type="text/javascript">
	 var save_method; //for save method string
     var table;
 
            $(document).ready(function() {
                //datatables
                table = $('#table').DataTable({ 
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": '<?php echo site_url('index.php/pasien/json'); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": "no_reg",width:170},
                        {"data": "nama_pasien",width:100},
                        {"data": "umur",width:100},
                        {"data": "jk",width:100},
                        {"data": "alamat",width:100},
                        {"data": "tanggal",width:100},
                        {"data": "edit",width:100},
                        {"data": "remove",width:100},

                    ],
 
                });
 
            });

</script>
