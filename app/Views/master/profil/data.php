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
                    <div id="map" style='width: 100%; height: 250px;'></div>
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
                            <a href="#" target="blank" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-file-excel"></i> Export Excel</a>

                            <?php if ($data > 0) { ?>
                                <a href="<?= base_url('profil-sekolah/edit/' . $data['id']) ?>" class="btn btn-warning ml-auto btn-sm">
                                    <i class="fa fa-edit"></i> Update
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
            <!-- Leafletjs -->
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
            <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
            <script>
                var map = L.map('map').setView([<?= $data['latitude']; ?>, <?= $data['longitude']; ?>], 14);
                var tiles = L.tileLayer(
                    'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1
                    }).addTo(map);

                var curLocation = [<?= $data['latitude']; ?>, <?= $data['longitude']; ?>];

                var marker = L.marker(curLocation, {
                    draggable: 'true'
                });
                map.addLayer(marker);
            </script>
        <?php else : ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
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
</div>