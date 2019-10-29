<?php  
header("Content-type: application/octet-stream");
header("COntent-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");


?>

<h2>List Tindakan</h2>

<table class="table table-striped table-bordered"border="1">
    <tr>
		<th>No Reg</th>
		<th>Nama</th>
		<th>Penyakit</th>
		<th>Kategori Perawatan</th>
		<th>Tarif</th>
    </tr>
	<?php foreach($tindakan as $t){ ?>
    <tr>
		<td><?php echo $t['no_reg']; ?></td>
		<td><?php echo $t['nama']; ?></td>
		<td><?php echo $t['penyakit']; ?></td>
		<td><?php echo $t['kategori_perawatan']; ?></td>
		<td><?php echo $t['tarif']; ?></td>
    </tr>
	<?php } ?>
</table>
