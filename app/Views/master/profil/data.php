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
                    <a href="#"><?= $titlebar ?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <?php if (!empty($data) && is_array($data)) : ?>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-header" style="background-image: url('<?= base_url('media/profil/bg.jpg'); ?>')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img src="<?= base_url('media/kepsek/' . $data['foto']); ?>" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-profile text-center">
                                <div class="name"><?= $data['nama_kepsek']; ?></div>
                                <div class="desc">Kepala Sekolah</div>
                                <div class="view-profile">
                                    <a href="#" class="btn btn-primary btn-block"><?= $data['nama_sekolah']; ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row user-stats text-center">
                                <div class="col">
                                    <div class="number"><?= $siswa ?></div>
                                    <div class="title">Siswa</div>
                                </div>
                                <div class="col">
                                    <div class="number"><?= $guru ?></div>
                                    <div class="title">Guru</div>
                                </div>
                                <div class="col">
                                    <div class="number"><?= $pegawai ?></div>
                                    <div class="title">Pegawai</div>
                                </div>
                                <div class="col">
                                    <div class="number"><?= $alumni ?></div>
                                    <div class="title">Alumni</div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <!-- Street Map -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Lokasi Sekolah</h4>
                            </div>
                        </div>
                        <iframe src="<?= $data['gmap']; ?>" width="381" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                            <h6 class="text-uppercase fw-bold mb-1">Nama Sekolah</h6>
                                            <span class="text-muted"><?= $data['nama_sekolah']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Status</h6>
                                            <span class="text-muted"><?= $data['status']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Akreditas</h6>
                                            <span class="text-muted"><?= $data['akreditas']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Alamat</h6>
                                            <span class="text-muted"><?= $data['alamat']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Kabupaten</h6>
                                            <span class="text-muted"><?= $data['kabupaten']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Kecamatan</h6>
                                            <span class="text-muted"><?= $data['kecamatan']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Telepon/Nomor HP</h6>
                                            <span class="text-muted"><?= $data['telepon']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Email</h6>
                                            <span class="text-muted"><?= $data['email']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Kode Pos</h6>
                                            <span class="text-muted"><?= $data['kodepos']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Website</h6>
                                            <span class="text-muted"><?= $data['website']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Tahun Berdiri</h6>
                                            <span class="text-muted"><?= $data['thnberdiri']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Website</h6>
                                            <span class="text-muted"><?= $data['website']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Tahun Berdiri</h6>
                                            <span class="text-muted"><?= $data['thnberdiri']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <?php if ($data > 0) { ?>
                                    <a href="<?= base_url('profil-sekolah/edit/' . $data['id']) ?>" class="btn btn-warning ml-auto btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                <?php } else { ?>
                                    <a href="<?= base_url('profil-sekolah/add') ?>" class="btn btn-primary ml-auto btn-sm">
                                        <i class="fa fa-plus"></i> Tambah
                                    </a>
                                <?php } ?>
                                <a href="<?= base_url('profil-sekolah/bangunan') ?>" class="btn btn-primary ml-lg-1 btn-sm">
                                    <i class="fa fa-info-circle"></i> Detail Bangunan
                                </a>
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
                                    <center><i>Lengkapi profil sekolah anda . . .</i></center>
                                </h2>
                            </table>
                            <div class="d-flex align-items-center">
                                <a href="<?= base_url('profil-sekolah/add') ?>" class="btn btn-primary ml-auto btn-sm">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
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