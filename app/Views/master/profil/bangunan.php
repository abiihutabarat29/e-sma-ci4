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
        <div class="col-md-12">
            <div class="card">
                <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?= $title ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($data) && is_array($data)) : ?>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>
                                        <p>Luas Tanah Keseluruhan</p>
                                    </td>
                                    <td><span>: <?= $data['luas_tanah']; ?></span> m2</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Luas Bangunan</p>
                                    </td>
                                    <td><span>: <?= $data['luas_bangunan']; ?></span> m2</td>
                                </tr>
                                <?php if (session()->get('level') == '2') { ?>
                                    <tr>
                                        <td>
                                            <p>Luas Halaman</p>
                                        </td>
                                        <td><span>: <?= $data['luas_halaman']; ?></span> m2</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Luas Lapangan Olahraga</p>
                                        </td>
                                        <td><span>: <?= $data['luas_lapangan']; ?></span> m2</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Luas Lahan Kosong</p>
                                        </td>
                                        <td><span>: <?= $data['luas_kosong']; ?></span> m2</td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <p>Luas Tanah Untuk Rencana Pembangunan</p>
                                    </td>
                                    <td><span>: <?= $data['luas_rpembangunan']; ?></span> m2</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Status Kepemilikan Tanah</p>
                                    </td>
                                    <td><span>: <?= $data['status_tanah']; ?></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Status Kepemilikan Gedung</p>
                                    </td>
                                    <td><span>: <?= $data['status_gedung']; ?></span></td>
                                </tr>
                                <?php if (session()->get('level') == '1') { ?>
                                    <tr>
                                        <td>
                                            <p>Jumlah Kelas/Rombel X MIPA</p>
                                        </td>
                                        <td><span>: <?= $data['jkelasx_mipa']; ?></span> Kelas</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Jumlah Kelas/Rombel X IIS</p>
                                        </td>
                                        <td><span>: <?= $data['jkelasx_iis']; ?></span> Kelas</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Jumlah Kelas/Rombel X BHS</p>
                                        </td>
                                        <td><span>: <?= $data['jkelasx_bhs']; ?></span> Kelas</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Jumlah Kelas/Rombel XI MIPA</p>
                                        </td>
                                        <td><span>: <?= $data['jkelasxi_mipa']; ?></span> Kelas</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Jumlah Kelas/Rombel XI IIS</p>
                                        </td>
                                        <td><span>: <?= $data['jkelasxi_iis']; ?></span> Kelas</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Jumlah Kelas/Rombel XI BHS</p>
                                        </td>
                                        <td><span>: <?= $data['jkelasxi_bhs']; ?></span> Kelas</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Jumlah Kelas/Rombel XII MIPA</p>
                                        </td>
                                        <td><span>: <?= $data['jkelasxii_mipa']; ?></span> Kelas</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Jumlah Kelas/Rombel XII IIS</p>
                                        </td>
                                        <td><span>: <?= $data['jkelasxii_iis']; ?></span> Kelas</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Jumlah Kelas/Rombel XII BHS</p>
                                        </td>
                                        <td><span>: <?= $data['jkelasxii_bhs']; ?></span> Kelas</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="d-flex align-items-center">
                            <a href="#" target="blank" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-file-excel"></i> Export Excel</a>

                            <?php if ($data > 0) { ?>
                                <a href="<?= base_url('profil-sekolah/bangunan/edit/' . $data['id']) ?>" class="btn btn-warning ml-auto btn-sm">
                                    <i class="fa fa-edit"></i> Update
                                </a>
                            <?php } else { ?>
                                <a href="<?= base_url('profil-sekolah/bangunan/add') ?>" class="btn btn-primary ml-auto btn-sm">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            <?php } ?>
                            <a href="<?= base_url('/profil-sekolah') ?>" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                        </div>
                    <?php else : ?>
                        <table>
                            <h2>
                                <center><i>Lengkapi data bangunan sekolah anda . . .</i></center>
                        </table>
                        </h2>
                        </table>
                        <div class="d-flex align-items-center">
                            <a href="<?= base_url('profil-sekolah/bangunan/add') ?>" class="btn btn-primary ml-auto btn-sm">
                                <i class="fa fa-plus"></i> Tambah
                            </a>
                            <a href="<?= base_url('/profil-sekolah') ?>" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>