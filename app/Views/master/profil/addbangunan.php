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
                    <a href="<?= base_url('profil-sekolah/bangunan') ?>"><?= $titlebar ?></a>
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
                            <a class="nav-link" id="pills-keadaan-tab" data-toggle="pill" href="#pills-keadaan" role="tab" aria-controls="pills-keadaan" aria-selected="false">Keadaan Bangunan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-kelas-tab" data-toggle="pill" href="#pills-kelas" role="tab" aria-controls="pills-kelas" aria-selected="false">Kelas / Rombel</a>
                        </li>
                    </ul>
                    <form action="<?= base_url('profil-sekolah/bangunan/save') ?>" method="post">
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
                                                <span class="text-muted">1. Isilah data bangunan sekolah dengan benar.</span>
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
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-keadaan" role="tabpanel" aria-labelledby="pills-keadaan-tab">
                                <div class="card-body">
                                    <div class="col-sm-6">
                                        <div class="form-group <?= ($validation->hasError('lttanah')) ? 'has-error' : ''; ?>">
                                            <label>Luas Tanah Keseluruhan<span class="text-danger">*</span></label>
                                            <input name="lttanah" type="text" class="form-control" autocomplete="off" placeholder="Luas" value="<?= old('lttanah'); ?>" autofocus>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('lttanah'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('ltbangunan')) ? 'has-error' : ''; ?>">
                                            <label>Luas Bangunan<span class="text-danger">*</span></label>
                                            <input type="text" name="ltbangunan" class="form-control" autocomplete="off" placeholder="Luas" value="<?= old('ltbangunan'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('ltbangunan'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('ltrencana')) ? 'has-error' : ''; ?>">
                                            <label>Luas Tanah Untuk Rencana Pembangunan<span class="text-danger">*</span></label>
                                            <input type="text" name="ltrencana" class="form-control" autocomplete="off" placeholder="Luas" value="<?= old('ltrencana'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('ltrencana'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('ststanah')) ? 'has-error' : ''; ?>">
                                            <label>Status Kepemilikan Tanah<span class="text-danger">*</span></label>
                                            <input type="text" name="ststanah" class="form-control" autocomplete="off" placeholder="Status Kepemilikan Tanah" value="<?= old('ststanah'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('ststanah'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('stsgedung')) ? 'has-error' : ''; ?>">
                                            <label>Status Kepemilikan Gedung<span class="text-danger">*</span></label>
                                            <input type="text" name="stsgedung" class="form-control" autocomplete="off" placeholder="Status Kepemilikan Gedung" value="<?= old('stsgedung'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('stsgedung'); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-kelas" role="tabpanel" aria-labelledby="pills-kelas-tab">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('jkelasxmipa')) ? 'has-error' : ''; ?>">
                                            <label>Jumlah Kelas/Rombel X MIPA<span class="text-danger">*</span></label>
                                            <input type="text" name="jkelasxmipa" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('jkelasxmipa'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('jkelasxmipa'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('jkelasxiis')) ? 'has-error' : ''; ?>">
                                            <label>Jumlah Kelas/Rombel X IIS<span class="text-danger">*</span></label>
                                            <input type="text" name="jkelasxiis" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('jkelasxiis'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('jkelasxiis'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('jkelasxbhs')) ? 'has-error' : ''; ?>">
                                            <label>Jumlah Kelas/Rombel X BHS<span class="text-danger">*</span></label>
                                            <input type="text" name="jkelasxbhs" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('jkelasxbhs'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('jkelasxbhs'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('jkelasximipa')) ? 'has-error' : ''; ?>">
                                            <label>Jumlah Kelas/Rombel XI MIPA<span class="text-danger">*</span></label>
                                            <input type="text" name="jkelasximipa" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('jkelasximipa'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('jkelasximipa'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('jkelasxiiis')) ? 'has-error' : ''; ?>">
                                            <label>Jumlah Kelas/Rombel XI IIS<span class="text-danger">*</span></label>
                                            <input type="text" name="jkelasxiiis" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('jkelasxiiis'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('jkelasxiiis'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('jkelasxibhs')) ? 'has-error' : ''; ?>">
                                            <label>Jumlah Kelas/Rombel XI BHS<span class="text-danger">*</span></label>
                                            <input type="text" name="jkelasxibhs" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('jkelasxibhs'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('jkelasxibhs'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('jkelasxiimipa')) ? 'has-error' : ''; ?>">
                                            <label>Jumlah Kelas/Rombel XII MIPA<span class="text-danger">*</span></label>
                                            <input type="text" name="jkelasxiimipa" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('jkelasxiimipa'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('jkelasxiimipa'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('jkelasxiiiis')) ? 'has-error' : ''; ?>">
                                            <label>Jumlah Kelas/Rombel XII IIS<span class="text-danger">*</span></label>
                                            <input type="text" name="jkelasxiiiis" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('jkelasxiiiis'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('jkelasxiiiis'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('jkelasxiibhs')) ? 'has-error' : ''; ?>">
                                            <label>Jumlah Kelas/Rombel XII BHS<span class="text-danger">*</span></label>
                                            <input type="text" name="jkelasxiibhs" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('jkelasxiibhs'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('jkelasxiibhs'); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="<?= base_url('/profil-sekolah/bangunan') ?>" class="btn btn-default  btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
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