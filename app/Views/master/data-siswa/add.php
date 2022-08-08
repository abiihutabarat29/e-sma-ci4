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
                <a href="<?= base_url('data-siswa') ?>"><?= $titlebar ?></a>
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
                <form action="/data-siswa/save" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('nisn')) ? 'has-error' : ''; ?>">
                                    <input name="nisn" type="text" class="form-control" autocomplete="off" placeholder="NISN" value="<?= old('nisn'); ?>" autofocus>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nisn'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('nmsiswa')) ? 'has-error' : ''; ?>">
                                    <input name="nmsiswa" type="text" class="form-control" autocomplete="off" placeholder="Nama Siswa" value="<?= old('nmsiswa'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nmsiswa'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('tlahir')) ? 'has-error' : ''; ?>">
                                    <textarea name="tlahir" type="text" class="form-control" autocomplete="off" placeholder="Tempat Lahir"><?= old('tlahir'); ?></textarea>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('tlahir'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('tgllhr')) ? 'has-error' : ''; ?>">
                                    <label>Tanggal Lahir</label>
                                    <input name="tgllhr" type="date" class="form-control" autocomplete="off" value="<?= old('tgllhr'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('tgllhr'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-check <?= ($validation->hasError('jenkel')) ? 'has-error' : ''; ?>">
                                    <label>Jenis Kelamin</label><br />
                                    <label class="form-radio-label">
                                        <input class="form-radio-input" type="radio" name="jenkel" value="L" <?= old('jenkel') == 'L' ? 'checked' : ''; ?>>
                                        <span class="form-radio-sign">Laki-laki</span>
                                    </label>
                                    <label class="form-radio-label ml-3">
                                        <input class="form-radio-input" type="radio" name="jenkel" value="P" <?= old('jenkel') == 'P' ? 'checked' : ''; ?>>
                                        <span class="form-radio-sign">Perempuan</span>
                                    </label><br>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('jenkel'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-2 pr-0">
                                <div class="form-group  <?= ($validation->hasError('umur')) ? 'has-error' : ''; ?>">
                                    <label>Umur</label>
                                    <select name="umur" class="form-control">
                                        <option selected disabled><?= (old('umur')) ? old('umur') : ".::Pilih Umur::." ?></option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('umur'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('agama')) ? 'has-error' : ''; ?>">
                                    <label>Agama</label>
                                    <select name="agama" class="form-control">
                                        <option selected disabled><?= (old('agama')) ? old('agama') : ".::Pilih Agama::." ?></option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                        <option value="Kristen Katholik">Kristen Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('agama'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('alamat')) ? 'has-error' : ''; ?>">
                                    <textarea type="text" name="alamat" class="form-control" autocomplete="off" placeholder="Alamat"><?= old('alamat'); ?></textarea>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('alamat'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('kelas')) ? 'has-error' : ''; ?>">
                                    <label>Kelas</label>
                                    <select name="kelas" class="form-control">
                                        <option selected disabled><?= (old('kelas')) ? old('kelas') : ".::Pilih Kelas::." ?></option>
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
                                        <option selected disabled><?= (old('jurusan')) ? old('jurusan') : ".::Pilih Jurusan::." ?></option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                        <option value="Bahasa">Bahasa</option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nurusan'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('status')) ? 'has-error' : ''; ?>">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option selected disabled><?= (old('status')) ? old('status') : ".::Pilih Status::." ?></option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Non-Aktif">Non-Aktif</option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('status'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nohp" class="form-control" autocomplete="off" placeholder="Nomor Handphone" value="<?= old('nohp'); ?>">
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('thnmasuk')) ? 'has-error' : ''; ?>">
                                    <label>Tahun Masuk / Tahun Pelajaran</label>
                                    <select name="thnmasuk" class="form-control">
                                        <option selected disabled><?= (old('thnmasuk')) ? old('thnmasuk') : ".::Pilih Tahun Masuk::." ?></option>
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
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('stsvaksin')) ? 'has-error' : ''; ?>">
                                    <label>Status Vaksinasi</label>
                                    <select name="stsvaksin" class="form-control">
                                        <option selected disabled><?= (old('stsvaksin')) ? old('stsvaksin') : ".::Pilih Status Vaksin::." ?></option>
                                        <option value="Belum">Belum</option>
                                        <option value="Dosis I">Dosis I</option>
                                        <option value="Dosis II">Dosis II</option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('stsvaksin'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-siswa') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>