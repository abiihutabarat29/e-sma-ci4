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
                <a href="<?= base_url('data-sarpras') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-sarpras/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="col-md-8 pr-0">
                            <div class="form-group <?= ($validation->hasError('prasarana')) ? 'has-error' : ''; ?>">
                                <label>Nama Sarana</label><span class="text-danger">*</span>
                                <select name="prasarana" class="js-example-language" style="width: 100%">
                                    <option selected disabled><?= (old('prasarana')) ? old('prasarana') : ".::Pilih Sarana::." ?></option>
                                    <?php foreach ($sarana as $r) : ?>
                                        <option value="<?= $r['sarana'] ?>"><?= $r['sarana'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('prasarana'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-8 pr-0">
                            <div class="form-group <?= ($validation->hasError('baik')) ? 'has-error' : ''; ?>">
                                <label>Baik</label><span class="text-danger">*</span>
                                <input name="baik" type="text" class="form-control" autocomplete="off" placeholder="Jumlah Kondisi Baik" value="<?= old('baik'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('baik'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-8 pr-0">
                            <div class="form-group <?= ($validation->hasError('rusakr')) ? 'has-error' : ''; ?>">
                                <label>Rusak Ringan</label><span class="text-danger">*</span>
                                <input name="rusakr" type="text" class="form-control" autocomplete="off" placeholder="Jumlah Kondisi Rusak Ringan" value="<?= old('rusakr'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('rusakr'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-8 pr-0">
                            <div class="form-group <?= ($validation->hasError('rusakb')) ? 'has-error' : ''; ?>">
                                <label>Rusak Berat</label><span class="text-danger">*</span>
                                <input name="rusakb" type="text" class="form-control" autocomplete="off" placeholder="Jumlah Kondisi Rusak Berat" value="<?= old('rusakb'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('rusakb'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group <?= ($validation->hasError('ket')) ? 'has-error' : ''; ?>">
                                <textarea type="text" name="ket" class="form-control" autocomplete="off" placeholder="Keterangan"><?= old('ket'); ?></textarea>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('ket'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-sarpras') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>