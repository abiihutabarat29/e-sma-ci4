<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"><?= $titlebar ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= base_url('home') ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('buku-induk') ?>"><?= $titlebar ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?= $title ?></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><?= $title ?></div>
                </div>
                <form action="/buku-induk/save" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group <?= ($validation->hasError('tamat')) ? 'has-error' : ''; ?>">
                                    <select name="tamat" <?php if (session()->get('level') == '1') { ?> id="tamat" <?php } ?> <?php if (session()->get('level') == '2') { ?> id="tamatsmk" <?php } ?> class="js-example-language" style="width: 40%">
                                        <option selected disabled><?= (old('tamat')) ? old('tamat') : ".::Pilih Siswa::." ?></option>
                                        <?php foreach ($siswa as $r) : ?>
                                            <option value="<?= $r['id'] ?>"><?= $r['nama'] ?> (<?= $r['nisn'] ?>)</option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('tamat'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" name="nisn" class="form-control" autocomplete="off" id="nisn" value="<?= old('nisn'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" autocomplete="off" id="nama" value="<?= old('nama'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <textarea type="text" name="tlahir" class="form-control" autocomplete="off" id="tlahir" readonly><?= old('tlahir'); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" name="tgllhr" class="form-control" id="tgllhr" value="<?= old('tgllhr'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" name="jenkel" class="form-control" id="jenkel" value="<?= old('jenkel'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agama</label>
                                    <input type="text" name="agama" class="form-control" id="agama" value="<?= old('agama'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="text" name="alamat" class="form-control" id="alamat" readonly><?= old('alamat'); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input type="text" name="kelas" class="form-control" id="kelas" value="<?= old('kelas'); ?>" readonly>
                                </div>
                            </div>
                            <?php if (session()->get('level') == '1') { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?= old('jurusan'); ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (session()->get('level') == '2') { ?>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group">
                                        <label>Paket Keahlian</label>
                                        <input type="text" name="paketk" class="form-control" id="paketk" value="<?= old('paketk'); ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No.HP</label>
                                    <input type="text" name="nohp" class="form-control" id="nohp" value="<?= old('nohp'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tahun Masuk</label>
                                    <input type="text" name="thnmasuk" class="form-control" id="thnmasuk" value="<?= old('thnmasuk'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('thntamat')) ? 'has-error' : ''; ?>">
                                    <select name="thntamat" class="form-control" style="width: 100%">
                                        <option selected disabled><?= (old('thntamat')) ? old('thntamat') : ".::Pilih Tahun Tamat / Tahun Pelajaran::." ?></option>
                                        <?php foreach ($tahun as $r) : ?>
                                            <option value="<?= $r['tahun_akademik'] ?>"><?= $r['tahun_akademik'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('thntamat'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('buku-induk') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>