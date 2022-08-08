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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><?= $title ?></div>
                </div>
                <form action="<?= base_url('data-inventaris/update/' . $data['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('inventaris')) ? 'has-error' : ''; ?>">
                                    <input name="inventaris" type="text" class="form-control" autocomplete="off" placeholder="Jenis Inventaris" value="<?= (old('inventaris')) ? old('inventaris') : $data['inventaris']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('inventaris'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('dibutuhkan')) ? 'has-error' : ''; ?>">
                                    <input name="dibutuhkan" type="text" class="form-control" autocomplete="off" placeholder="Jumlah Dibutuhkan" value="<?= (old('dibutuhkan')) ? old('dibutuhkan') : $data['dibutuhkan']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('dibutuhkan'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('ada')) ? 'has-error' : ''; ?>">
                                    <input name="ada" type="text" class="form-control" autocomplete="off" placeholder="Jumlah Ada" value="<?= (old('ada')) ? old('ada') : $data['ada']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('ada'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('kurang')) ? 'has-error' : ''; ?>">
                                    <input name="kurang" type="text" class="form-control" autocomplete="off" placeholder="Jumlah Kurang" value="<?= (old('kurang')) ? old('kurang') : $data['kurang']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('kurang'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('lebih')) ? 'has-error' : ''; ?>">
                                    <input name="lebih" type="text" class="form-control" autocomplete="off" placeholder="Jumlah Lebih" value="<?= (old('lebih')) ? old('lebih') : $data['lebih']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('lebih'); ?></small>
                                </div>
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