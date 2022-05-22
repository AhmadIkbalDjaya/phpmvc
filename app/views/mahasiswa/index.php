<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <!-- menampilkan flash massage -->
            <?php Flasher::flash();?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?=BASEURL?>/mahasiswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <br>
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach( $data['mhs'] as $mhs ) : ?>
                    <li class="list-group-item"><?= $mhs['nama']?>
                    <a href="<?= BASEURL;?>mahasiswa/hapus/<?= $mhs['nis']?>" class="badge rounded-pill bg-danger float-end" onclick="return confirm('yakin?')">Hapus</a>
                    <a href="<?= BASEURL;?>mahasiswa/ubah/<?= $mhs['nis']?>" class="badge rounded-pill bg-warning float-end tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-nis="<?=$mhs['nis'];?>">Ubah</a>
                    <a href="<?= BASEURL;?>mahasiswa/detail/<?= $mhs['nis']?>" class="badge rounded-pill bg-primary float-end">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
            <input type="hidden" name="id" id="id" >
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="nis" class="form-label">nis</label>
                    <input type="number" class="form-control" id="nis" name="nis">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>

                <label for="jurusan">Jurusan</label>
                <select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
                    <option selected>Pilih Jurusan</option>
                    <option value="Teknik Informatika">Teknik Infomatika</option>
                    <option value="Teknik Arsitek">Teknik Arsitek</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="Teknik Sipil">Teknik Sipil</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Biologi">Biologi</option>
                </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
        </div>
    </div>
</div>