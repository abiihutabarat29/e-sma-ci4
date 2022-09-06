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
                <a href="<?= base_url('data-siswa') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-kebutuhan/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('mapel')) ? 'has-error' : ''; ?>">
                                    <label>Mata Pelajaran</label><span class="text-danger">*</span>
                                    <select name="mapel" id="mapel" class="js-example-language" style="width: 100%">
                                        <option selected disabled><?= (old('mapel')) ? old('mapel') : ".::Pilih Mata Pelajaran::." ?></option>
                                        <?php foreach ($mapel as $r) : ?>
                                            <option value="<?= $r['mapel'] ?>"><?= $r['mapel'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('mapel'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('butuh')) ? 'has-error' : ''; ?>">
                                    <label>Jumlah Dibutuhkan</label><span class="text-danger">*</span>
                                    <input name="butuh" type="text" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('butuh'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('butuh'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('pns')) ? 'has-error' : ''; ?>">
                                    <label>Jumlah PNS</label><span class="text-danger">*</span>
                                    <input name="pns" type="text" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('pns'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('pns'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('kurang')) ? 'has-error' : ''; ?>">
                                    <label>Jumlah Kurang</label><span class="text-danger">*</span>
                                    <input name="kurang" type="text" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('kurang'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('kurang'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('nonpns')) ? 'has-error' : ''; ?>">
                                    <label>Jumlah Non-PNS</label><span class="text-danger">*</span>
                                    <input name="nonpns" type="text" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('nonpns'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nonpns'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('lebih')) ? 'has-error' : ''; ?>">
                                    <label>Jumlah Lebih</label><span class="text-danger">*</span>
                                    <input name="lebih" type="text" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?= old('lebih'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('lebih'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('ket')) ? 'has-error' : ''; ?>">
                                    <label>Keterangan</label>
                                    <textarea type="text" name="ket" class="form-control" autocomplete="off" placeholder="Keterangan"><?= old('ket'); ?></textarea>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('ket'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-kebutuhan') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>