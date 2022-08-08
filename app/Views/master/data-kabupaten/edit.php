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
                <a href="<?= base_url('data-kabupaten') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-kabupaten/update/' . $data['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 pr-0">
                                <div class="form-group <?= ($validation->hasError('kode')) ? 'has-error' : ''; ?>">
                                    <input name="kode" type="text" class="form-control" autocomplete="off" placeholder="Kode Wilayah Administratif" value="<?= (old('kode')) ? old('kode') : $data['kode_wilayah']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('kode'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('kabupaten')) ? 'has-error' : ''; ?>">
                                    <input name="kabupaten" type="text" class="form-control" autocomplete="off" placeholder="Nama Kabupaten" value="<?= (old('kabupaten')) ? old('kabupaten') : $data['kabupaten']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('kabupaten'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-kabupaten') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>