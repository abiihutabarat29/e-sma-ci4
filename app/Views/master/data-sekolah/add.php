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
                <a href="<?= base_url('data-sekolah') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-sekolah/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 pr-0">
                                <div class="form-group <?= ($validation->hasError('npsn')) ? 'has-error' : ''; ?>">
                                    <input name="npsn" type="text" class="form-control" autocomplete="off" placeholder="NPSN" value="<?= old('npsn'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('npsn'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group <?= ($validation->hasError('jenjang')) ? 'has-error' : ''; ?>">
                                    <select name="jenjang" class="form-control">
                                        <option selected disabled><?= (old('jenjang')) ? old('jenjang') : ".::Pilih Jenjang::." ?></option>
                                        <option value="SMA">SMA</option>
                                        <option value="SMK">SMK</option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('jenjang'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-8 pr-0">
                                <div class="form-group <?= ($validation->hasError('sekolah')) ? 'has-error' : ''; ?>">
                                    <input name="sekolah" type="text" class="form-control" autocomplete="off" placeholder="Nama Sekolah" value="<?= old('sekolah'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('sekolah'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('kabupaten')) ? 'has-error' : ''; ?>">
                                    <select name="kabupaten" class="js-example-language" style="width: 100%">
                                        <option selected disabled><?= (old('kabupaten')) ? old('kabupaten') : ".::Pilih Kabupaten::." ?></option>
                                        <?php foreach ($kab as $r) : ?>
                                            <option value="<?= $r['kabupaten'] ?>"><?= $r['kabupaten'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('kabupaten'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('status')) ? 'has-error' : ''; ?>">
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
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-sekolah') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>