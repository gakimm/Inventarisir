<?php 
	$host = "localhost";
	$database = "db_inventyii";
	$username = "root",
	$pass = "",

	$con = $mysqli_connect($host,$username,$pass,$database);
	$sql = "SELECT inventaris.nama, inventaris.jumlah, inventaris.keterangan, jenis.nama, ruang.nama, petugas.nama FROM app_jenis jenis JOIN app_inventaris inventaris  ON inventaris.id_jenis = jenis.id_jenis JOIN app_ruang ruang ON  ruang.id_ruang = inventaris.id_ruang JOIN app_petugas petugas ON petugas.id_petugas = inventaris.id_petugas";
	$query = mysqli_query($con,)

/* @var $this yii\web\View */

$this->title = 'Report Inventaris';
?>	
	<div class="report-inventaris">
	<div class="container">
		<table class="table table-bordered">
			<th>
				<td>Nama Inventaris</td>
				<td>Jumlah</td>
				<td>Jenis</td>
				<td>Ruang</td>
				<td>Petugas</td>
			</th>

		</table>
	</div>
</div>

