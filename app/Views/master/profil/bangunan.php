<?php if (session()->get('status') == 1) : ?>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title"><?= $titlebar ?></h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="?m=beranda">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('profil-sekolah') ?>">Profil Sekolah</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#"><?= $titlebar ?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <?php if (!empty($data) && is_array($data)) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Foto Sekolah</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <img class="img-thumbnail rounded img-preview" src="<?= base_url('media/profil/' . $data['profil']); ?>" width="100%" alt="Foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"><?= $title ?></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="card-list">
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Luas Tanah Keseluruhan</h6>
                                            <span class="text-muted"><?= $data['luas_tanah']; ?> m2</span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Luas Bangunan</h6>
                                            <span class="text-muted"><?= $data['luas_bangunan']; ?> m2</span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Luas Tanah Untuk Rencana Pembangunan</h6>
                                            <span class="text-muted"><?= $data['luas_rpembangunan']; ?> m2</span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <?php if (session()->get('level') == '2') { ?>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <h6 class="text-uppercase fw-bold mb-1">Luas Halaman</h6>
                                                <span class="text-muted"><?= $data['luas_halaman']; ?> m2</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <h6 class="text-uppercase fw-bold mb-1">Luas Lapangan</h6>
                                                <span class="text-muted"><?= $data['luas_lapangan']; ?> m2</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <h6 class="text-uppercase fw-bold mb-1">Luas Lahan Kosong</h6>
                                                <span class="text-muted"><?= $data['luas_kosong']; ?> m2</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                    <?php } ?>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Status Kepemilikan Tanah</h6>
                                            <span class="text-muted"><?= $data['status_tanah']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Status Kepemilikan Gedung</h6>
                                            <span class="text-muted"><?= $data['status_gedung']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <?php if ($data > 0) { ?>
                                    <a href="<?= base_url('profil-sekolah/bangunan/edit/' . $data['id']) ?>" class="btn btn-warning ml-auto btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                <?php } else { ?>
                                    <a href="<?= base_url('profil-sekolah/bangunan/add') ?>" class="btn btn-primary ml-auto btn-sm">
                                        <i class="fa fa-plus"></i> Tambah
                                    </a>
                                <?php } ?>
                                <a href="<?= base_url('/profil-sekolah') ?>" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"><?= $title ?></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table>
                                <h2>
                                    <center><i>Lengkapi data bangunan anda . . .</i></center>
                                </h2>
                            </table>
                            <div class="d-flex align-items-center">
                                <a href="<?= base_url('profil-sekolah/bangunan/add') ?>" class="btn btn-primary ml-auto btn-sm">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                                <a href="<?= base_url('/profil-sekolah') ?>" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                            </div>
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