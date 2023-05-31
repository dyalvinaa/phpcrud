<?php
// membuat instance
$dataOutlet=NEW Outlet;
// aksi tampil data
if($_GET['aksi']=='tampil'){
// aksi untuk tampil data
$html = null;
$html .='<center><h2>Daftar Outlet</h2>';
$html .='<center><p>Berikut Ini Daftar Outlet Mixue</p>';
$html .='<table border="1" width="100%" class="table">
<br/>
<thead class="thead-dark">
<th>Kode Outlet</th>
<th>Nama</th>
<th>Alamat</th>
<th>Telepon</th>
<th>Aksi</th>
</thead>
<tbody>';
// variabel $data menyimpan hasil return 
$data = $dataOutlet->tampil();

if(isset($data)){
foreach($data as $barisOutlet){

$html .='<tr>
<td>'.$barisOutlet->kode_outlet.'</td>
<td>'.$barisOutlet->nama_outlet.'</td>
<td>'.$barisOutlet->alamat_outlet.'</td>
<td>'.$barisOutlet->telepon.'</td>
<td>
<a href="index.php?file=outlet&aksi=edit&kode_outlet='.$barisOutlet->kode_outlet.'">Edit</a>
<a href="index.php?file=outlet&aksi=hapus&kode_outlet='.$barisOutlet->kode_outlet.'">Hapus</a>
</td>
</tr>';
}
}
$html .='</tbody>
</table>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='tambah') {
$html =null;
$html .='<h2>Form Tambah</h2>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST" action="index.php?file=outlet&aksi=simpan">';
$html .='<p>Kode Outlet<br/>';
$html .='<input type="text" name="txtKode" placeholder="Masukan kode outlet" autofocus/></p>';
$html .='<p>Nama Outlet<br/>';
$html .='<input type="text" name="txtNama" placeholder="Masukan Nama Outlet" size="30" required/></p>';
$html .='<p>Alamat Outlet<br/>';
$html .='<textarea name="txtAlamat" placeholder="Masukan alamat lengkap" cols="50" rows="5" required/></textarea></p>';
$html .='<p>Telepon<br/>';
$html .='<input type="text" name="txtTelepon" placeholder="Masukan No Telepon" size="30" required/></p>';
$html .='<p><input type="submit" name="tombolSimpan" value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='simpan') {
	
$data=array(
'kode_outlet'=>$_POST['txtKode'],
'nama_outlet'=>$_POST['txtNama'],
'alamat_outlet'=>$_POST['txtAlamat'],
'telepon'=>$_POST['txtTelepon']
);
// simpan siswa dengan menjalankan method simpan
$dataOutlet->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=outlet&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='edit') {
// ambil data siswa
$outlet=$dataOutlet->detail($_GET['kode_outlet']);
$html =null;
$html .='<h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST" action="index.php?file=outlet&aksi=update">';
$html .='<p> kode outlet<br/>';
$html .='<input type="text" name="txtKode" value="'.$outlet->kode_outlet.'" placeholder="Masukan No. Induk" autofocus/></p>';
$html .='<p>Nama outlet<br/>';
$html .='<input type="text" name="txtNama" value="'.$outlet->nama_outlet.'" placeholder="Masukan alamat lengkap" required/></p>';
$html .='<p>Alamat<br/>';
$html .='<textarea name="txtAlamat" value="" placeholder="Masukanalamat lengkap" cols="50" rows="5" required/> '.$outlet->alamat_outlet.'</textarea></p>';
$html .='<p>telepon<br/>';
$html .='<input type="text" name="txtTelepon" value="'.$outlet->telepon.'" placeholder="Masukan no telepon" required/></p>';;
$html .='<p><input type="submit" name="tombolSimpan" value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='update') {
$data=array(
'kode_outlet'=>$_POST['txtKode'],
'nama_outlet'=>$_POST['txtNama'],
'alamat_outlet'=>$_POST['txtAlamat'],
'telepon'=>$_POST['txtTelepon']
);
$dataOutlet->update($_POST['txtKode'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=outlet&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$dataOutlet->hapus($_GET['kode_outlet']);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=outlet&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>
