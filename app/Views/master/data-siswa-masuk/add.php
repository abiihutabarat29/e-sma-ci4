<?php if (session()->get('status') == 1) : ?>
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
                    <div class="card-body">
                        <ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
                            <li class="nav-item submenu">
                                <a class="nav-link active" id="pills-panduan-tab" data-toggle="pill" href="#pills-panduan" role="tab" aria-controls="pills-panduan" aria-selected="false">Panduan Penginputan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-identitas-tab" data-toggle="pill" href="#pills-identitas" role="tab" aria-controls="pills-identitas" aria-selected="true">Identitas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-status-tab" data-toggle="pill" href="#pills-status" role="tab" aria-controls="pills-status" aria-selected="false">Status Pendidikan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-kontak-tab" data-toggle="pill" href="#pills-kontak" role="tab" aria-controls="pills-kontak" aria-selected="false">Kontak</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-vaksin-tab" data-toggle="pill" href="#pills-vaksin" role="tab" aria-controls="pills-vaksin" aria-selected="false">Vaksinasi</a>
                            </li>
                        </ul>
                        <form action="<?= base_url('data-siswa-masuk/save') ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-panduan" role="tabpanel" aria-labelledby="pills-panduan-tab">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title">Mohon Baca Terlebih Dahulu</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-list">
                                            <div class="item-list">
                                                <div class="info-user ml-3">
                                                    <span class="text-muted">1. Isilah data siswa dengan benar.</span>
                                                </div>
                                                <button class="btn btn-icon btn-success btn-round btn-xs">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </div>
                                            <div class="item-list">
                                                <div class="info-user ml-3">
                                                    <span class="text-muted">2. Field yang memiliki tanda (<span class="text-danger">*</span>) artinya wajib diinput atau tidak boleh kosong.</span>
                                                </div>
                                                <button class="btn btn-icon btn-success btn-round btn-xs">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </div>
                                            <div class="item-list">
                                                <div class="info-user ml-3">
                                                    <span class="text-muted">3. NISN wajib memiliki 10 karakter berupa angka.</span>
                                                </div>
                                                <button class="btn btn-icon btn-success btn-round btn-xs">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-identitas" role="tabpanel" aria-labelledby="pills-identitas-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('nisn')) ? 'has-error' : ''; ?>">
                                                    <label>NISN<span class="text-danger">*</span></label>
                                                    <input name="nisn" type="text" class="form-control" autocomplete="off" value="<?= old('nisn'); ?>" autofocus>
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('nisn'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?= ($validation->hasError('nmsiswa')) ? 'has-error' : ''; ?>">
                                                    <label>Nama<span class="text-danger">*</span></label>
                                                    <input name="nmsiswa" type="text" class="form-control" autocomplete="off" value="<?= old('nmsiswa'); ?>">
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('nmsiswa'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('alamat')) ? 'has-error' : ''; ?>">
                                                    <label>Alamat<span class="text-danger">*</span></label>
                                                    <textarea type="text" name="alamat" class="form-control" autocomplete="off"><?= old('alamat'); ?></textarea>
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('alamat'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('tlahir')) ? 'has-error' : ''; ?>">
                                                    <label>Tempat Lahir<span class="text-danger">*</span></label>
                                                    <textarea name="tlahir" type="text" class="form-control" autocomplete="off"><?= old('tlahir'); ?></textarea>
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('tlahir'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('tgllhr')) ? 'has-error' : ''; ?>">
                                                    <label>Tanggal Lahir<span class="text-danger">*</span></label>
                                                    <input name="tgllhr" type="date" class="form-control" autocomplete="off" value="<?= old('tgllhr'); ?>">
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('tgllhr'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-check <?= ($validation->hasError('jenkel')) ? 'has-error' : ''; ?>">
                                                    <label>Jenis Kelamin<span class="text-danger">*</span></label></br>
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
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('agama')) ? 'has-error' : ''; ?>">
                                                    <label>Agama<span class="text-danger">*</span></label>
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

                                            <div class="col-md-2 pr-0">
                                                <div class="form-group  <?= ($validation->hasError('umur')) ? 'has-error' : ''; ?>">
                                                    <label>Umur<span class="text-danger">*</span></label>
                                                    <select name="umur" class="form-control">
                                                        <option selected disabled><?= (old('umur')) ? old('umur') : ".::Pilih Umur::." ?></option>
                                                        <!-- <option value="13">13</option> -->
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
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-status" role="tabpanel" aria-labelledby="pills-status-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('kelas')) ? 'has-error' : ''; ?>">
                                                    <label>Kelas<span class="text-danger">*</span></label>
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
                                            <?php if (session()->get('level') == '1') { ?>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('jurusan')) ? 'has-error' : ''; ?>">
                                                        <label>Jurusan<span class="text-danger">*</span></label>
                                                        <select name="jurusan" class="form-control">
                                                            <option selected disabled><?= (old('jurusan')) ? old('jurusan') : ".::Pilih Jurusan::." ?></option>
                                                            <option value="IPA">IPA</option>
                                                            <option value="IPS">IPS</option>
                                                            <option value="Bahasa">Bahasa</option>
                                                        </select>
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('jurusan'); ?></small>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if (session()->get('level') == '2') { ?>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('paketk')) ? 'has-error' : ''; ?>">
                                                        <label>Paket Keahlian<span class="text-danger">*</span></label>
                                                        <select name="paketk" class="form-control">
                                                            <option selected disabled><?= (old('paketk')) ? old('paketk') : ".::Pilih Paket Keahlian::." ?></option>
                                                            <option value="TKRO">Teknik Kendaraan Ringan Otomotif</option>
                                                            <option value="TBSM">Teknik dan Bisnis Sepeda Motor</option>
                                                            <option value="OTP">Otomatisasi dan TataKelola Perkantoran</option>
                                                            <option value="TKJ">OTeknik Komputer dan Jaringan</option>
                                                        </select>
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('paketk'); ?></small>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('status')) ? 'has-error' : ''; ?>">
                                                    <label>Status<span class="text-danger">*</span></label>
                                                    <select name="status" class="form-control">
                                                        <option selected disabled><?= (old('status')) ? old('status') : ".::Pilih Status::." ?></option>
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Non-Aktif">Non-Aktif</option>
                                                    </select>
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('status'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('thnmasuk')) ? 'has-error' : ''; ?>">
                                                    <label>Tahun Masuk / Tahun Pelajaran<span class="text-danger">*</span></label>
                                                    <select name="thnmasuk" class="form-control" style="width: 100%">
                                                        <option selected disabled><?= (old('thnmasuk')) ? old('thnmasuk') : ".::Pilih Tahun Masuk / Tahun Pelajaran::." ?></option>
                                                        <?php foreach ($tahun as $r) : ?>
                                                            <option value="<?= $r['tahun_akademik'] ?>"><?= $r['tahun_akademik'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('thnmasuk'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('nosurat')) ? 'has-error' : ''; ?>">
                                                    <label>Nomor Surat Pindah<span class="text-danger">*</span></label>
                                                    <input name="nosurat" type="text" class="form-control" autocomplete="off" value="<?= old('nosurat'); ?>">
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('nosurat'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('asalsekolah')) ? 'has-error' : ''; ?>">
                                                    <label>Asal Sekolah<span class="text-danger">*</span></label>
                                                    <input name="asalsekolah" type="text" class="form-control" autocomplete="off" value="<?= old('asalsekolah'); ?>">
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('asalsekolah'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('ket')) ? 'has-error' : ''; ?>">
                                                    <label>Keterangan</label>
                                                    <textarea name="ket" type="text" class="form-control" autocomplete="off"><?= old('ket'); ?></textarea>
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('ket'); ?></small>
                                                </div>
                                            </div>
                                            <?php if (session()->get('level') == '2') { ?>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('pip')) ? 'has-error' : ''; ?>">
                                                        <label>Program PIP<span class="text-danger">*</span></label>
                                                        <select name="pip" class="form-control">
                                                            <option selected disabled><?= (old('pip')) ? old('pip') : ".::Pilih Program PIP::." ?></option>
                                                            <option value="KPS">KPS</option>
                                                            <option value="KIP">KIP</option>
                                                            <option value="PKH">PKH</option>
                                                        </select>
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('pip'); ?></small>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-kontak" role="tabpanel" aria-labelledby="pills-kontak-tab">
                                    <div class="card-body">
                                        <div class="col-md-6 pr-0">
                                            <div class="form-group <?= ($validation->hasError('nohp')) ? 'has-error' : ''; ?>">
                                                <label>Nomor Handphone Aktif<span class="text-danger">*</span></label>
                                                <input type="text" name="nohp" class="form-control" autocomplete="off" value="<?= old('nohp'); ?>">
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('nohp'); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-0">
                                            <div class="form-group <?= ($validation->hasError('email')) ? 'has-error' : ''; ?>">
                                                <label>Email Aktif<span class="text-danger">*</span></label>
                                                <input type="text" name="email" class="form-control" placeholder="example@gmail.com" autocomplete="off" value="<?= old('email'); ?>">
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('email'); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-vaksin" role="tabpanel" aria-labelledby="pills-vaksin-tab">
                                    <div class="card-body">
                                        <div class="col-md-6 pr-0">
                                            <div class="form-group <?= ($validation->hasError('stsvaksin')) ? 'has-error' : ''; ?>">
                                                <label>Status Vaksin<span class="text-danger">*</span></label>
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
                                    <div class="card-action">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                                        <a href="<?= base_url('/data-siswa-masuk') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="col-md-12">
        <div class="card mt-4">
            <div class="card-body">
                <h2>
                    <center>Maaf, akun anda sudah tidak aktif . . .</center>
                </h2>
            </div>
        </div>
    </div>
<?php endif ?>
</div>