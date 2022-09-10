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
                <a href="<?= base_url('data-paket-keahlian') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-paket-keahlian/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="col-md-4">
                            <div class="form-group  <?= ($validation->hasError('kode')) ? 'has-error' : ''; ?>">
                                <label>Kode<span class="text-danger">*</span></label>
                                <input type="text" name="kode" class="form-control" autocomplete="off" value="<?= old('kode'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kode'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <div class="form-group <?= ($validation->hasError('paket')) ? 'has-error' : ''; ?>">
                                <label>Nama Paket Keahlian</label><span class="text-danger">*</span>
                                <input name="paket" type="text" class="form-control" autocomplete="off" value="<?= old('paket'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('paket'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-paket-keahlian') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>