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
                <a href="<?= base_url('data-inventaris') ?>"><?= $titlebar ?></a>
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><?= $title ?></div>
                </div>
                <form action="<?= base_url('data-inventaris/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="col-md-8">
                            <div class="form-group <?= ($validation->hasError('inventaris')) ? 'has-error' : ''; ?>">
                                <label>Nama Inventaris</label><span class="text-danger">*</span>
                                <select name="inventaris" class="js-example-language" style="width: 100%">
                                    <option selected disabled><?= (old('inventaris')) ? old('inventaris') : ".::Pilih Inventaris::." ?></option>
                                    <?php foreach ($inventaris as $r) : ?>
                                        <option value="<?= $r['inventaris'] ?>"><?= $r['inventaris'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('inventaris'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group <?= ($validation->hasError('dibutuhkan')) ? 'has-error' : ''; ?>">
                                <label>Jumlah Dibutuhkan</label><span class="text-danger">*</span>
                                <input name="dibutuhkan" type="text" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('dibutuhkan'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('dibutuhkan'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group <?= ($validation->hasError('ada')) ? 'has-error' : ''; ?>">
                                <label>Jumlah Ada</label><span class="text-danger">*</span>
                                <input name="ada" type="text" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('ada'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('ada'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group <?= ($validation->hasError('kurang')) ? 'has-error' : ''; ?>">
                                <label>Jumlah Kurang</label><span class="text-danger">*</span>
                                <input name="kurang" type="text" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('kurang'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kurang'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group <?= ($validation->hasError('lebih')) ? 'has-error' : ''; ?>">
                                <label>Jumlah Lebih</label><span class="text-danger">*</span>
                                <input name="lebih" type="text" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('lebih'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('lebih'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-inventaris') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>