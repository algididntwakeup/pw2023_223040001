<?php	
	include './config/koneksi-db.php';

	if(!isset($_POST['simpan'])) {
		if(isset($_GET['id'])) { // memperoleh buku_id
			$id_buku = $_GET['id'];

			if(!empty($id_buku)) {
				// Query
				$sql = "SELECT * FROM buku WHERE id_buku = '{$id_buku}';";
				$query = mysqli_query($db_conn, $sql);
				$row = $query->num_rows;

				if($row > 0) {
					$data = mysqli_fetch_array($query); // memperoleh data buku

					// echo '<pre>';
					// var_dump($data);
					// echo '</pre>';
				} else {
					echo "<script>alert('ID buku tidak ditemukan!');</script>";

					// mengalihkan halaman
					echo "<meta http-equiv='refresh' content='0; url=mainpage.php?p=buku'>";
					exit;
				}
			} else {
				echo "<script>alert('ID buku kosong!');</script>";

				// mengalihkan halaman
				echo "<meta http-equiv='refresh' content='0; url=mainpage.php?p=buku'>";
				exit;
			}
		} else {
			echo "<script>alert('ID buku tidak didefinisikan!');</script>";

			// mengalihkan halaman
			echo "<meta http-equiv='refresh' content='0; url=mainpage.php?p=buku'>";
			exit;
		}
?>

		<div id="container">
			<div class="page-title">
				<h3>Tambah Data buku</h3>	
			</div>
			<div class="page-content">
				<form action="" method="post" enctype="multipart/form-data">
					<table class="form-table">
                        <!-- id buku -->
						<tr>
							<td>
								<label for="id_buku">ID buku</label>
							</td>
							<td>					
								<input type="text" name="id_buku" id="id_buku" value="<?php echo $data['id_buku']; ?>" readonly>
							</td>
						</tr>
                        <!-- Nama Buku -->
						<tr>
							<td>
								<label for="judul_buku">Judul Buku</label>
							</td>
							<td>								
								<input type="text" name="judul_buku" id="judul_buku" value="<?php echo $data['judul_buku']; ?>" required>
							</td>
						</tr>
                        <!-- ID Kategori -->
						<tr>
							<td>
								<label for="id_kategori">ID Kategori</label>
							</td>
							<td>								
								<input type="text" name="id_kategori" id="id_kategori" value="<?php echo $data['id_kategori']; ?>" required>
							</td>
						</tr>
                        <!-- id penulis  -->
						<tr>
							<td>
								<label for="id_penulis">ID Penulis</label>
							</td>
							<td>								
                                 <input type="text" name="id_penulis" id="id_penulis" value="<?php echo $data['id_penulis']; ?>" required>
							</td>
						</tr>
						<tr>
							<td>
								<label for="id_penerbit">ID Penerbit</label>
							</td>
							<td>								
                                 <input type="text" name="id_penerbit" id="id_penerbit" value="<?php echo $data['id_penerbit']; ?>" required>
							</td>
						</tr>
						
						<tr>
							<td>
								&nbsp;
							</td>
							<td>								
								<input type="submit" name="simpan" value="Simpan">
							</td>
						</tr>						
					</table>
				</form>
			</div>
		</div>

<?php 
	} else { 
		/* Proses Penyimpanan Data dari Form */

		$id_buku 	= $_POST['id_buku'];
		$judul_buku 	= $_POST['judul_buku'];
		$id_kategori	= $_POST['id_kategori'];
		$id_penulis			= $_POST['id_penulis'];
		$id_penerbit			= $_POST['id_penerbit'];
	

		// Query
		$sql = "UPDATE buku 
					SET id_buku	= '{$id_buku}',
						judul_buku 	= '{$judul_buku}',
						id_kategori 	= '{$id_kategori}',
						id_penulis 	= '{$id_penulis}',
						id_penerbit 	= '{$id_penerbit}',

					WHERE id_buku	='{$id_buku}'";
		$query = mysqli_query($db_conn, $sql);
		
		if(!$query) {
			echo "<script>alert('Data gagal diubah!');</script>";
		}

		// mengalihkan halaman
		echo "<meta http-equiv='refresh' content='0; url=mainpage.php?p=buku'>";
	}
?>