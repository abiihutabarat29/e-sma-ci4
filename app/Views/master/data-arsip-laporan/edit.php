<?php if (session()->get('status') == 1) : ?>
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
                    <a href="<?= base_url('data-arsip-laporan') ?>"><?= $titlebar ?></a>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="swal-valid" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                            <div class="card-title"><?= $title ?></div>
                        </div>
                        <form action="<?= base_url('data-arsip-laporan/update/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group <?= ($validation->hasError('judul')) ? 'has-error' : ''; ?>">
                                            <label>Judul Laporan</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Laporan" autocomplete="off" value="<?= (old('judul')) ? old('judul') : $data['judul']; ?>" autofocus>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('judul'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" class="form-control" name="bulan" value="<?= $data['bulan'] ?>">
                                        <input type="hidden" class="form-control" name="tahun" value="<?= $data['tahun'] ?>">
                                        <input type="hidden" class="form-control" name="valid" value="<?= session()->get('npsn') ?><?= date('m') ?><?= date('Y') ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>File Sebelumnya</label>
                                            <input type="text" class="form-control" value="<?= $data['file'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group <?= ($validation->hasError('file')) ? 'has-error' : ''; ?>">
                                            <label>File Laporan Bulanan</label>
                                            <input type="file" name="file" class="form-control-file">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('file'); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="card-title fw-mediumbold">Aturan Arsip Digital</div>
                                        <div class="card-list">
                                            <div class="item-list">
                                                <div class="info-user ml-3">
                                                    <span class="text-muted">1. File harus ektensi *excel, *xls, *xlsx dan dengan ukuran maksimal 2MB.</span>
                                                </div>
                                                <button class="btn btn-icon btn-success btn-round btn-xs">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </div>
                                            <div class="item-list">
                                                <div class="info-user ml-3">
                                                    <span class="text-muted">2. Data yang di arsipkan harus dari fitur <b>Generate Laporan</b>.</span>
                                                </div>
                                                <button class="btn btn-icon btn-success btn-round btn-xs">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </div>
                                            <div class="item-list">
                                                <div class="info-user ml-3">
                                                    <span class="text-muted">3. Dalam sebulan hanya bisa upload 1 kali file arsip laporan bulanan.</span>
                                                </div>
                                                <button class="btn btn-icon btn-success btn-round btn-xs">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </div>
                                            <div class="item-list">
                                                <div class="info-user ml-3">
                                                    <span class="text-muted">4. Data yang sudah ter-arsip hanya bisa di edit kembali jika tidak lewat dari bulan saat upload laporan bulanan.</span>
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
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                                <a href="<?= base_url('/data-arsip-laporan') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
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
                            <a href="<?= base_url('data-arsip-laporan') ?>" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
<?php else : ?>
    <div class="col-md-12">
        <div class="card mt-4">
            <div class="card-body">
                <h2>
                    <center>Maaf, akun anda sudah tidak aktif . . .</center>
                </h2>
            </div>
        </div>
    </div>
<?php endif ?>
</div>