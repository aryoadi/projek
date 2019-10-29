<?php  
header("Content-type: application/octet-stream");
header("COntent-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>


<h2>List Pasien</h2>

<table class="table table-striped table-bordered"border="1">
    <tr>
		<th>No Reg</th>
		<th>Nama Pasien</th>
		<th>Umur</th>
		<th>Jk</th>
		<th>Alamat</th>
		<th>Tanggal</th>
    </tr>
	<?php foreach($pasien as $p){ ?>
    <tr>
		<td><?php echo $p['no_reg']; ?></td>
		<td><?php echo $p['nama_pasien']; ?></td>
		<td><?php echo $p['umur']; ?></td>
		<td><?php echo $p['jk']; ?></td>
		<td><?php echo $p['alamat']; ?></td>
		<td><?php echo $p['tanggal']; ?></td>
    </tr>
	<?php } ?>
</table>
