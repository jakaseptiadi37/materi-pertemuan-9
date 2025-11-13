<?php 

// koneksi ke database
// var conn = fungsi koneksi("nama_host", "username", "password", "nama_db"); 
// cara cek username di db mysql dengan CMD --> select user();
$conn = mysqli_connect("localhost", "root", "", "siak_upi");

// fungsi untuk menampilkan data dari database
function query($query){
    global $conn;

	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

// fungsi untuk menambahkan data ke database
function tambah_data($data){
    global $conn;

    $nim = $data['nim'];
    $nama = $data['nama'];
    $email = $data['email'];
    $jurusan = $data['jurusan'];
    $gambar = $data['gambar'];

    $query = "INSERT INTO mahasiswa (nim, nama, email, jurusan, gambar)
                  VALUES ('$nim', '$nama', '$email', '$jurusan', '$gambar')
                 ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);    
}

// fungsi untuk menghapus data dari database
function hapus_data($id){
    global $conn;

    $query = "DELETE FROM mahasiswa WHERE id = $id";

    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);    
}

// fungsi untuk mengubah data dari database
function ubah_data($data){
    global $conn;

    $id = $data['id'];
    $nim = $data['nim'];
    $nama = $data['nama'];
    $email = $data['email'];
    $jurusan = $data['jurusan'];
    $gambar = $data['gambar'];

    $query = "UPDATE mahasiswa SET
                nim = '$nim',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
              WHERE id = $id
             ";

     $result = mysqli_query($conn, $query);
     
     return mysqli_affected_rows($conn); 
}

// fungsi untuk mencari data
function search_data($keyword){
    global $conn;

    $query = "SELECT * FROM mahasiswa
			  WHERE
			  nama LIKE '%$keyword%' OR
			  nim LIKE '%$keyword%' OR
			  email LIKE '%$keyword%' OR
			  jurusan LIKE '%$keyword%'
			";
	return query($query);
}
?>