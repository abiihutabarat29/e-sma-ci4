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
                <a href="<?= base_url('data-golongan') ?>"><?= $titlebar ?></a>
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><?= $title ?></div>
                </div>
                <form action="/data-golongan/save" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 pr-0">
                                <div class="form-group <?= ($validation->hasError('golongan')) ? 'has-error' : ''; ?>">
                                    <input name="golongan" type="text" class="form-control" autocomplete="off" placeholder="Golongan" value="<?= old('golongan'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('golongan'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-golongan') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>