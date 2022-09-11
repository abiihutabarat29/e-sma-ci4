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
                    <div class="card-title"><?= $titlebar ?></div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('profil-sekolah/bangunan/save') ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row">
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