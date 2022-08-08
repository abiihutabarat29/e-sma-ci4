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
                <a href="<?= base_url('data-kecamatan') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-kecamatan/update/' . $data['id']); ?>" method="post">
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
                            <div class="col-md-8">
                                <div class="form-group <?= ($validation->hasError('kecamatan')) ? 'has-error' : ''; ?>">
                                    <input name="kecamatan" type="text" class="form-control" autocomplete="off" placeholder="Nama Kecamatan" value="<?= (old('kecamatan')) ? old('kecamatan') : $data['kecamatan']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('kecamatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class=" form-group <?= ($validation->hasError('kab')) ? 'has-error' : ''; ?>">
                                    <select name="kab" class="js-example-language" style="width: 100%">
                                        <option selected disabled><?= (old('kab')) ? old('kab') : $data['kode_kab']; ?></option>
                                        <?php foreach ($kab as $r) : ?>
                                            <option value="<?= $r['kode_wilayah'] ?>"><?= $r['kabupaten'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('kab'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-kecamatan') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>