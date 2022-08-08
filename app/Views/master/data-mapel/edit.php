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
                <a href="<?= base_url('data-mapel') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-mapel/update/' . $data['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('mapel')) ? 'has-error' : ''; ?>">
                                    <input name="mapel" type="text" class="form-control" autocomplete="off" placeholder="Mata Pelajaran" value="<?= (old('mapel')) ? old('mapel') : $data['mapel']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('mapel'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group <?= ($validation->hasError('jenjang')) ? 'has-error' : ''; ?>">
                                    <select name="jenjang" class="form-control">
                                        <option><?= (old('jenjang')) ? old('jenjang') : $data['jenjang']; ?></option>
                                        <option value="SMA">SMA</option>
                                        <option value="SMK">SMK</option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('jenjang'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-mapel') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>