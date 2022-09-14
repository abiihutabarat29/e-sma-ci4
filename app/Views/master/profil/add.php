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
                    <a href="<?= base_url('profil-sekolah') ?>"><?= $titlebar ?></a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#"><?= $title ?></a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $titlebar ?></h4>
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
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-kontak-tab" data-toggle="pill" href="#pills-kontak" role="tab" aria-controls="pills-kontak" aria-selected="false">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-kepsek-tab" data-toggle="pill" href="#pills-kepsek" role="tab" aria-controls="pills-kepsek" aria-selected="false">Kepala Sekolah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-yayasan-tab" data-toggle="pill" href="#pills-yayasan" role="tab" aria-controls="pills-yayasan" aria-selected="false">Yayasan</a>
                        </li>
                    </ul>
                    <form action="<?= base_url('profil-sekolah/save') ?>" method="post" enctype="multipart/form-data">
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
                                                <span class="text-muted">1. Isilah data profil sekolah dengan benar.</span>
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
                                                <span class="text-muted">3. Nama Sekolah dan NPSN Sekolah otomatis.</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <span class="text-muted">4. NSS wajib memiliki 12 karakter berupa angka.</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <span class="text-muted">5. NDS wajib memiliki 8 karakter berupa angka.</span>
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Sekolah<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="<?= session()->get('nama_sekolah'); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NPSN<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="<?= session()->get('npsn'); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group  <?= ($validation->hasError('nss')) ? 'has-error' : ''; ?>">
                                                <label>NSS<span class="text-danger">*</span></label>
                                                <input type="text" name="nss" class="form-control" autocomplete="off" value="<?= old('nss'); ?>">
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('nss'); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group <?= ($validation->hasError('nds')) ? 'has-error' : ''; ?>">
                                                <label>NDS<span class="text-danger">*</span></label>
                                                <input type="text" name="nds" class="form-control" autocomplete="off" value="<?= old('nds'); ?>">
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('nds'); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group <?= ($validation->hasError('nosiop')) ? 'has-error' : ''; ?>">
                                                <label>Nomor SIOP<span class="text-danger">*</span></label>
                                                <input type="text" name="nosiop" class="form-control" autocomplete="off" value="<?= old('nosiop'); ?>">
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('nosiop'); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group <?= ($validation->hasError('akreditas')) ? 'has-error' : ''; ?>">
                                                <label>Akreditas<span class="text-danger">*</span></label>
                                                <select name="akreditas" class="form-control">
                                                    <option selected disabled><?= (old('akreditas')) ? old('akreditas') : ".::Pilih Akreditas::." ?></option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                </select>
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('akreditas'); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group <?= ($validation->hasError('thnberdiri')) ? 'has-error' : ''; ?>">
                                                <label>Tahun Berdiri<span class="text-danger">*</span></label>
                                                <input type="text" name="thnberdiri" class="form-control" autocomplete="off" value="<?= old('thnberdiri'); ?>">
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('thnberdiri'); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group <?= ($validation->hasError('nosk')) ? 'has-error' : ''; ?>">
                                                <label>Nomor SK Pendirian<span class="text-danger">*</span></label>
                                                <input type="text" name="nosk" class="form-control" autocomplete="off" value="<?= old('nosk'); ?>">
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('nosk'); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group <?= ($validation->hasError('tglsk')) ? 'has-error' : ''; ?>">
                                                <label>Tanggal SK<span class="text-danger">*</span></label>
                                                <input type="date" name="tglsk" class="form-control" autocomplete="off" value="<?= old('tglsk'); ?>">
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('tglsk'); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group <?= ($validation->hasError('standar')) ? 'has-error' : ''; ?>">
                                                <label>Standar Sekolah Bertaraf<span class="text-danger">*</span></label>
                                                <select name="standar" class="form-control">
                                                    <option selected disabled><?= (old('standar')) ? old('standar') : ".::Pilih Standar::." ?></option>
                                                    <option value="SSN">SSN</option>
                                                    <option value="SBI">SBI</option>
                                                    <option value="SPM">SPM</option>
                                                    <option value="SNS">SNS</option>
                                                </select>
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('standar'); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group <?= ($validation->hasError('waktub')) ? 'has-error' : ''; ?>">
                                                <label>Waktu Belajar<span class="text-danger">*</span></label>
                                                <select name="waktub" class="form-control">
                                                    <option selected disabled><?= (old('waktub')) ? old('waktub') : ".::Pilih Waktu Belajar::." ?></option>
                                                    <option value="Pagi">Pagi</option>
                                                    <option value="Siang">Siang</option>
                                                    <option value="Sore">Sore</option>
                                                </select>
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('waktub'); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group <?= ($validation->hasError('status')) ? 'has-error' : ''; ?>">
                                                <label>Status Sekolah<span class="text-danger">*</span></label>
                                                <select name="status" class="form-control">
                                                    <option selected disabled><?= (old('status')) ? old('status') : ".::Pilih Status::." ?></option>
                                                    <option value="Negeri">Negeri</option>
                                                    <option value="Swasta">Swasta</option>
                                                </select>
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('status'); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group <?= ($validation->hasError('kdpos')) ? 'has-error' : ''; ?>">
                                                    <label>Kode Pos<span class="text-danger">*</span></label>
                                                    <input type="text" name="kdpos" class="form-control" autocomplete="off" value="<?= old('kdpos'); ?>">
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('kdpos'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group <?= ($validation->hasError('alamat')) ? 'has-error' : ''; ?>">
                                                    <label>Alamat Lengkap Sekolah<span class="text-danger">*</span></label>
                                                    <textarea type="text" name="alamat" class="form-control" autocomplete="off"><?= old('alamat'); ?></textarea>
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('alamat'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group <?= ($validation->hasError('kabupaten')) ? 'has-error' : ''; ?>">
                                                    <label>Kabupaten<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="kabupaten" id="kabupaten" style="width: 100%">
                                                        <option selected disabled><?= (old('kabupaten')) ? old('kabupaten') : ".::Pilih Kabupaten::." ?></option>
                                                    </select>
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('kabupaten'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group <?= ($validation->hasError('kecamatan')) ? 'has-error' : ''; ?>">
                                                    <label>Kecamatan<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="kecamatan" id="kecamatan" style="width: 100%">
                                                    </select>
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('kecamatan'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group <?= ($validation->hasError('gmap')) ? 'has-error' : ''; ?>">
                                                    <label>Link Google MAP</label>
                                                    <textarea type="text" rows="6" name="gmap" class="form-control" autocomplete="off"><?= old('gmap'); ?></textarea>
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('gmap'); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Foto Sekolah</label>
                                            </div>
                                            <div class="col-md-6">
                                                <img class="img-thumbnail rounded img-preview" src="<?= base_url('media/profil/blank.png'); ?>" width="220px" alt="Foto">
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group form-group-default">
                                                    <input type="file" name="foto" class="form-control-file" id="foto" onchange="previewImg();" accept=".png, .jpg, .jpeg">
                                                    <small class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-kontak" role="tabpanel" aria-labelledby="pills-kontak-tab">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('telp')) ? 'has-error' : ''; ?>">
                                            <label>Telepon / Nomor Handphone<span class="text-danger">*</span></label>
                                            <input type="text" name="telp" class="form-control" autocomplete="off" value="<?= old('telp'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('telp'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('email')) ? 'has-error' : ''; ?>">
                                            <label>Email<span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control" placeholder="example@gmail.com" autocomplete="off" value="<?= old('email'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('email'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('web')) ? 'has-error' : ''; ?>">
                                            <label>Website<span class="text-danger">*</span></label>
                                            <input type="text" name="web" class="form-control" autocomplete="off" placeholder="https://example.ac.id" value="<?= old('web'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('web'); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-kepsek" role="tabpanel" aria-labelledby="pills-kepsek-tab">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group <?= ($validation->hasError('kepsek')) ? 'has-error' : ''; ?>">
                                                    <label>Nama Kepala Sekolah<span class="text-danger">*</span></label>
                                                    <input type="text" name="kepsek" class="form-control" autocomplete="off" value="<?= old('kepsek'); ?>">
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('kepsek'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group <?= ($validation->hasError('nip')) ? 'has-error' : ''; ?>">
                                                    <label>NIP<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="nip" name="nip" autocomplete="off" value="<?= old('nip'); ?>">
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('nip'); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Foto</label>
                                            </div>
                                            <div class="col-md-6">
                                                <img class="img-thumbnail rounded img-preview-kep" src="<?= base_url('media/kepsek/blank.png'); ?>" width="150px" alt="Foto">
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group form-group-default">
                                                    <input type="file" name="fotoks" class="form-control-file" id="foto-kep" onchange="previewImg2();" accept=".png, .jpg, .jpeg">
                                                    <small class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-yayasan" role="tabpanel" aria-labelledby="pills-yayasan-tab">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="form-group <<?= ($validation->hasError('namayys')) ? 'has-error' : ''; ?>">
                                            <label>Nama Yayasan Perguruan</label>
                                            <input type="text" name="namayys" class="form-control" autocomplete="off" value="<?= old('namayys'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('namayys'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('alamatyys')) ? 'has-error' : ''; ?>">
                                            <label>Alamat Yayasan</label>
                                            <textarea type="text" name="alamatyys" class="form-control" autocomplete="off"><?= old('alamatyys'); ?></textarea>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('alamatyys'); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="<?= base_url('/profil-sekolah') ?>" class="btn btn-default  btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
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