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
                <a href="<?= base_url('data-siswa-masuk') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-siswa-masuk/update/' . $data['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('nisn')) ? 'has-error' : ''; ?>">
                                    <input name="nisn" type="text" class="form-control" autocomplete="off" placeholder="NISN" value="<?= (old('nisn')) ? old('nisn') : $data['nisn']; ?>" autofocus>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nisn'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('nmsiswa')) ? 'has-error' : ''; ?>">
                                    <input name="nmsiswa" type="text" class="form-control" autocomplete="off" placeholder="Nama Siswa" value="<?= (old('nmsiswa')) ? old('nmsiswa') : $data['nama']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nmsiswa'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-check <?= ($validation->hasError('jenkel')) ? 'has-error' : ''; ?>">
                                    <label>Jenis Kelamin</label><br />
                                    <label class="form-radio-label">
                                        <input class="form-radio-input" type="radio" name="jenkel" value="L" <?= $data['jenis_kel'] == 'L' ? 'checked' : ''; ?>>
                                        <span class="form-radio-sign">Laki-laki</span>
                                    </label>
                                    <label class="form-radio-label ml-3">
                                        <input class="form-radio-input" type="radio" name="jenkel" value="P" <?= $data['jenis_kel'] == 'P' ? 'checked' : ''; ?>>
                                        <span class="form-radio-sign">Perempuan</span>
                                    </label><br>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('jenkel'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('kelas')) ? 'has-error' : ''; ?>">
                                    <label>Kelas</label>
                                    <select name="kelas" class="form-control">
                                        <option><?= (old('kelas')) ? old('kelas') : $data['kelas']; ?></option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('kelas'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('jurusan')) ? 'has-error' : ''; ?>">
                                    <label>Jurusan</label>
                                    <select name="jurusan" class="form-control">
                                        <option><?= (old('jurusan')) ? old('jurusan') : $data['jurusan']; ?></option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                        <option value="Bahasa">Bahasa</option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nurusan'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('thnmasuk')) ? 'has-error' : ''; ?>">
                                    <label>Tahun Masuk / Tahun Pelajaran</label>
                                    <select name="thnmasuk" class="form-control">
                                        <option><?= (old('thnmasuk')) ? old('thnmasuk') : $data['tahun']; ?></option>
                                        <option value="2022/2023">2022/2023</option>
                                        <option value="2023/2024">2023/2024</option>
                                        <option value="2024/2025">2024/2025</option>
                                        <option value="2025/2026">2025/2026</option>
                                        <option value="2026/2027">2026/2027</option>
                                        <option value="2027/2028">2027/2028</option>
                                        <option value="2028/2029">2028/2029</option>
                                        <option value="2029/2030">2029/2030</option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('thnmasuk'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('nosurat')) ? 'has-error' : ''; ?>">
                                    <input name="nosurat" type="text" class="form-control" autocomplete="off" placeholder="Nomor Surat Pindah" value="<?= (old('nosurat')) ? old('nosurat') : $data['no_surat']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nosurat'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('asalsekolah')) ? 'has-error' : ''; ?>">
                                    <input name="asalsekolah" type="text" class="form-control" autocomplete="off" placeholder="Asal Sekolah" value="<?= (old('asalsekolah')) ? old('asalsekolah') : $data['asal_sekolah']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('asalsekolah'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('ket')) ? 'has-error' : ''; ?>">
                                    <textarea name="ket" type="text" class="form-control" autocomplete="off" placeholder="Keterangan"><?= (old('ket')) ? old('ket') : $data['keterangan']; ?></textarea>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('ket'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-siswa-masuk') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>