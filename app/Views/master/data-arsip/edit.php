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
                <a href="<?= base_url('data-arsip') ?>"><?= $titlebar ?></a>
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
                    <div class="swal-valid" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                    <div class="card-title"><?= $title ?></div>
                </div>
                <form action="<?= base_url('data-arsip/update/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group <?= ($validation->hasError('nmlabul')) ? 'has-error' : ''; ?>">
                                    <input type="text" class="form-control" id="nmlabul" name="nmlabul" placeholder="Nama Labul" autocomplete="off" value="<?= (old('nmlabul')) ? old('nmlabul') : $data['nama_labul']; ?>" autofocus>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nmlabul'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group <?= ($validation->hasError('bulan')) ? 'has-error' : ''; ?>">
                                    <select name="bulan" class="form-control">
                                        <option><?= (old('bulan')) ? old('bulan') : $data['bulan'] ?></option>
                                        <option value="<?= format_bulan(date('Y-m-d')); ?>"><?= format_bulan(date('Y-m-d')); ?></option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('bulan'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group <?= ($validation->hasError('tahun')) ? 'has-error' : ''; ?>">
                                    <select name="tahun" class="form-control">
                                        <option><?= (old('tahun')) ? old('tahun') : $data['tahun'] ?></option>
                                        <option value="<?= format_tahun(date('Y-m-d')); ?>"><?= format_tahun(date('Y-m-d')); ?></option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('tahun'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>File Sebeleumnya</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" value="<?= $data['file_labul'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default <?= ($validation->hasError('file')) ? 'has-error' : ''; ?>">
                                    <label>File Laporan Bulanan</label>
                                    <input type="file" name="file" class="form-control-file">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('file'); ?></small>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="valid" value="<?= session()->get('npsn') ?><?= date('m') ?><?= date('Y') ?>">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="card-title fw-mediumbold">Aturan Arsip Digital</div>
                                <div class="card-list">
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <span class="text-muted">1. File harus ektensi *excel, *xls, *xlsx dan dengan ukuran maksimal 2MB.</span>
                                            <p>
                                                <span class="text-muted">2. Dalam sebulan hanya bisa upload 1 kali file arsip laporan bulanan.</span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/data-arsip') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>