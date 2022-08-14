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
                <a href="<?= base_url('data-siswa-keluar') ?>"><?= $titlebar ?></a>
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
                <form action="/data-siswa-keluar/save" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group <?= ($validation->hasError('siswa')) ? 'has-error' : ''; ?>">
                                    <select name="siswa" id="siswasmk" class="js-example-language" style="width: 40%">
                                        <option selected disabled><?= (old('siswa')) ? old('siswa') : ".::Pilih Siswa::." ?></option>
                                        <?php foreach ($siswa as $r) : ?>
                                            <option value="<?= $r['id'] ?>"><?= $r['nama'] ?> (<?= $r['nisn'] ?>)</option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('siswa'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" name="nisn" class="form-control" id="nisn" value="<?= old('nisn'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?= old('nama'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" name="jenkel" class="form-control" id="jenkel" value="<?= old('jenkel'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input type="text" name="kelas" class="form-control" id="kelas" value="<?= old('kelas'); ?>" readonly>
                                </div>
                            </div>
                            <?php if (session()->get('level') == '1') { ?>
                                <div class="col-md-6 pr-0">
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
                                <div class="form-group <?= ($validation->hasError('thnkeluar')) ? 'has-error' : ''; ?>">
                                    <select name="thnkeluar" class="form-control" style="width: 100%">
                                        <option selected disabled><?= (old('thnkeluar')) ? old('thnkeluar') : ".::Pilih Tahun Keluar / Tahun Pelajaran::." ?></option>
                                        <?php foreach ($tahun as $r) : ?>
                                            <option value="<?= $r['tahun_akademik'] ?>"><?= $r['tahun_akademik'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('thnkeluar'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('nosurat')) ? 'has-error' : ''; ?>">
                                    <input name="nosurat" type="text" class="form-control" autocomplete="off" placeholder="Nomor Surat Pindah" value="<?= old('nosurat'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nosurat'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('ket')) ? 'has-error' : ''; ?>">
                                    <textarea name="ket" type="text" class="form-control" autocomplete="off" placeholder="Keterangan"><?= old('ket'); ?></textarea>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('ket'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('data-siswa-keluar') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>