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
                <a href="<?= base_url('data-user') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-user/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('sekolah')) ? 'has-error' : ''; ?>">
                                    <select name="sekolah" id="sekolah" class="js-example-language" style="width: 100%">
                                        <option selected disabled><?= (old('sekolah')) ? old('sekolah') : ".::Pilih Sekolah::." ?></option>
                                        <?php foreach ($sekolah as $r) : ?>
                                            <option value="<?= $r['id'] ?>"><?= $r['sekolah'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('sekolah'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="npsn" name="npsn" value="<?= old('npsn'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="jenjang" name="jenjang" value="<?= old('jenjang'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nmsekolah" name="nmsekolah" value="<?= old('nmsekolah'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('nik')) ? 'has-error' : ''; ?>">
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" autocomplete="off" value="<?= old('nik'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nik'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('nama')) ? 'has-error' : ''; ?>">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" autocomplete="off" value="<?= old('nama'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nama'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('nohp')) ? 'has-error' : ''; ?>">
                                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Nomor Handphone" autocomplete="off" value="<?= old('nohp'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nohp'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('email')) ? 'has-error' : ''; ?>">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" value="<?= old('email'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('email'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('username')) ? 'has-error' : ''; ?>">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" value="<?= old('username'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('username'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('password')) ? 'has-error' : ''; ?>">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" value="<?= old('password'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('password'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('repassword')) ? 'has-error' : ''; ?>">
                                    <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Retype password" autocomplete="off" value="<?= old('repassword'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('repassword'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('level')) ? 'has-error' : ''; ?>">
                                    <select name="level" class="form-control">
                                        <option selected disabled><?= (old('level')) ? old('level') : ".::Pilih Level::." ?></option>
                                        <option value="1">Admin SMA</option>
                                        <option value="2">Admin SMK</option>
                                        <option value="3">Kasih SMA</option>
                                        <option value="4">Kasih SMK</option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('level'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('data-user') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>