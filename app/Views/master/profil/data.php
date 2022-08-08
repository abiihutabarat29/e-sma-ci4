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
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Foto Kepala Sekolah</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <img class="img-thumbnail rounded img-preview-kep" src="<?= base_url('media/kepsek/' . $data['foto']); ?>" width="100%" alt="Foto">
                        </div>
                    </div>
                </div>
                <!-- Street Map -->
                <!-- <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Lokasi</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div id="map" style='width: 1190px; height: 500px;'></div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="form-group form-group-default">
                        </div>
                    </div>
                </div>
            </div> -->
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
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>
                                        <p>Nama Sekolah</p>
                                    </td>
                                    <td><span>: <?= $data['nama_sekolah']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Status</p>
                                    </td>
                                    <td><span>:<?= $data['status']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Alamat</p>
                                    </td>
                                    <td><span>:<?= $data['alamat']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Kabupaten</p>
                                    </td>
                                    <td><span>:<?= $data['kabupaten']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Kecamatan</p>
                                    </td>
                                    <td><span>:<?= $data['kecamatan']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Telepon/HP</p>
                                    </td>
                                    <td><span>:<?= $data['telepon']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Email</p>
                                    </td>
                                    <td><span>:<?= $data['email']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Kode Pos</p>
                                    </td>
                                    <td><span>:<?= $data['kodepos']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Website Sekolah</p>
                                    </td>
                                    <td><span>:<?= $data['website']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Tahun Berdiri</p>
                                    </td>
                                    <td><span>:<?= $data['thnberdiri']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Nomor SK Pendirian</p>
                                    </td>
                                    <td><span>:<?= $data['nosk']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Tanggal SK</p>
                                    </td>
                                    <td><span>:<?= $data['tglsk']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Nomor SIOP</p>
                                    </td>
                                    <td><span>:<?= $data['nosiop']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>NPSN</p>
                                    </td>
                                    <td><span>:<?= $data['npsn']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>NSS</p>
                                    </td>
                                    <td><span>:<?= $data['nss']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>NDS</p>
                                    </td>
                                    <td><span>:<?= $data['nds']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Jenjang Akreditasi / Tahun</p>
                                    </td>
                                    <td><span>:<?= $data['akreditas']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Standar Sekolah Bertaraf</p>
                                    </td>
                                    <td><span>:<?= $data['standar']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Nama Kepala Sekolah</p>
                                    </td>
                                    <td><span>:<?= $data['nama_kepsek']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Jenjang</p>
                                    </td>
                                    <td><span>:<?= $data['jenjang']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Nama Yayasan Perguruan / Pendidikan</p>
                                    </td>
                                    <td><span>: <?php if ($data['namayys'] == null) {
                                                    echo "<i>empty</i>";
                                                } else { ?>
                                                <?= $data['namayys']; ?>
                                            <?php } ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Alamat Yayasan</p>
                                    </td>
                                    <td><span>:
                                            <?php if ($data['alamatyys'] == null) {
                                                echo "<i>empty</i>";
                                            } else { ?>
                                                <?= $data['alamatyys']; ?>
                                            <?php } ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Waktu Belajar</p>
                                    </td>
                                    <td><span>:<?= $data['waktub']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Longitude</p>
                                    </td>
                                    <td><span>:<?= $data['longitude']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Latitude</p>
                                    </td>
                                    <td><span>:<?= $data['latitude']; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
        <?php endif ?>
    </div>
</div>
</div>