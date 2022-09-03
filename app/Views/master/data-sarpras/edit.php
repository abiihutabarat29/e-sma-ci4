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
        <?php if (!empty($data) && is_array($data)) : ?>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title ?></div>
                    </div>
                    <form action="<?= base_url('data-sarpras/update/' . $data['id']); ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                        <div class="card-body">
                            <div class="col-md-8 pr-0">
                                <div class="form-group <?= ($validation->hasError('prasarana')) ? 'has-error' : ''; ?>">
                                    <label>Sarana</label><span class="text-danger">*</span>
                                    <select name="prasarana" class="js-example-language" style="width: 100%">
                                        <option><?= (old('prasarana')) ? old('prasarana') : $data['prasarana']; ?></option>
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
                                    <input name="baik" type="text" class="form-control" autocomplete="off" placeholder="Jumlah Kondisi Baik" value="<?= (old('baik')) ? old('baik') : $data['baik']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('baik'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-8 pr-0">
                                <div class="form-group <?= ($validation->hasError('rusakr')) ? 'has-error' : ''; ?>">
                                    <label>Rusak Ringan</label><span class="text-danger">*</span>
                                    <input name="rusakr" type="text" class="form-control" autocomplete="off" placeholder="Jumlah Kondisi Rusak Ringan" value="<?= (old('rusakr')) ? old('rusakr') : $data['rusak_ringan']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('rusakr'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-8 pr-0">
                                <div class="form-group <?= ($validation->hasError('rusakb')) ? 'has-error' : ''; ?>">
                                    <label>Rusak Berat</label><span class="text-danger">*</span>
                                    <input name="rusakb" type="text" class="form-control" autocomplete="off" placeholder="Jumlah Kondisi Rusak Berat" value="<?= (old('rusakb')) ? old('rusakb') : $data['rusak_berat']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('rusakb'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-8 pr-0">
                                <div class="form-group <?= ($validation->hasError('ket')) ? 'has-error' : ''; ?>">
                                    <textarea type="text" name="ket" class="form-control" autocomplete="off" placeholder="Keterangan"><?= (old('ket')) ? old('ket') : $data['keterangan']; ?></textarea>
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
        <?php else : ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title ?></div>
                    </div>
                    <div class="card-body">
                        <h2>
                            <center><i>Maaf, data ini tidak dapat ditampilkan . . .</i></center>
                        </h2>
                        <a href="<?= base_url('data-sarpras') ?>" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
</div>