<?php
    require("function.php");

    $query = query("SELECT * FROM mahasiswa");
    $mahasiswa = $query;

    if(isset($_POST['tombol_search'])){
        
        $mahasiswa = search_data($_POST['keyword']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi PHP MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <!-- NAVBAR SECTION START  -->
    <nav class="navbar navbar-expand-lg navbar-light white bg-danger">
        <div class="container">
            <a class="navbar-brand text-white" href="#">SIAK UPI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="#">Link</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR SECTION END  -->
   
    <!-- CONTENT SECTION START -->
    <section class="p-3">
        <div class="container">

            <h1>Data Mahasiswa</h1>

            <div class="d-flex justify-content-between align-items-center">
                <a href="tambah_data.php">
                    <button class="mb-2 btn-sm btn-primary">Tambah Data</button>
                </a>

                <form class="mb-2" action="" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" placeholder="Cari produk..." autocomplete="off">
                        <button class="btn btn-primary" type="submit" name="tombol_search">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
            
            <table class="table table-striped table-hover">
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                <?php $no=1 ?>
                <?php foreach($mahasiswa as $data): ?>
                <tr>
                    <td> <?= $no ?> </td>
                    <td> <?= $data['nim'] ?> </td>
                    <td> <?= $data['nama'] ?> </td>
                    <td> <?= $data['email'] ?> </td>
                    <td> <?= $data['jurusan'] ?> </td>
                    <td> 
                        <img src="img/<?= $data['gambar'] ?> " height="70" width="70" alt="">
                    </td>
                    <td>
                        <a href="ubah_data.php?id=<?= $data['id'] ?>">
                            <button class="btn-sm btn-success">Edit</button>
                        </a>
                        
                        <a href="hapus_data.php?id=<?= $data['id'] ?>">
                            <button class="btn-sm btn-danger">Hapus</button>
                        </a>
                    </td>
                </tr>
                <?php $no++; ?>
                <?php endforeach; ?>
            </table>


        </div>
    </section>
    <!-- CONTENT SECTION END -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>