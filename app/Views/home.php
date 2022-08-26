<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard <?= session()->get('nama_sekolah'); ?>
                </h2>
                <h5 class="text-white op-7 mb-2">Aplikasi E-Sekolah - ELektronik Manajemen Data Sekolah</h5>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <?php if (session()->get('level') == '29') { ?>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-school"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Sekolah Verifikasi</p>
                                    <h4 class="card-title"><?= $sekolahv; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-school"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Sekolah</p>
                                    <h4 class="card-title"><?= $sekolah; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Account</p>
                                    <h4 class="card-title"><?= $account; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-file"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Laporan Bulanan</p>
                                    <h4 class="card-title"><?= $labul; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-info card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Siswa</p>
                                <?php if (session()->get('level') == '29') { ?>
                                    <h4 class="card-title"><?= $siswatotal; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '3') { ?>
                                    <h4 class="card-title"><?= $siswasma; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '4') { ?>
                                    <h4 class="card-title"><?= $siswasmk; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '1') { ?>
                                    <h4 class="card-title"><?= $smasiswa; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '2') { ?>
                                    <h4 class="card-title"><?= $smksiswa; ?></h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-info card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Guru</p>
                                <?php if (session()->get('level') == '29') { ?>
                                    <h4 class="card-title"><?= $gurutotal; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '3') { ?>
                                    <h4 class="card-title"><?= $gurusma; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '4') { ?>
                                    <h4 class="card-title"><?= $gurusmk; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '1') { ?>
                                    <h4 class="card-title"><?= $smaguru; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '2') { ?>
                                    <h4 class="card-title"><?= $smkguru; ?></h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-info card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Pegawai</p>
                                <?php if (session()->get('level') == '29') { ?>
                                    <h4 class="card-title"><?= $pegawaitotal; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '3') { ?>
                                    <h4 class="card-title"><?= $pegawaisma; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '4') { ?>
                                    <h4 class="card-title"><?= $pegawaismk; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '1') { ?>
                                    <h4 class="card-title"><?= $smapegawai; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '2') { ?>
                                    <h4 class="card-title"><?= $smkpegawai; ?></h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-info card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Alumni</p>
                                <?php if (session()->get('level') == '29') { ?>
                                    <h4 class="card-title"><?= $alumnitotal; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '3') { ?>
                                    <h4 class="card-title"><?= $alumnisma; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '4') { ?>
                                    <h4 class="card-title"><?= $alumnismk; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '1') { ?>
                                    <h4 class="card-title"><?= $smaalumni; ?></h4>
                                <?php } ?>
                                <?php if (session()->get('level') == '2') { ?>
                                    <h4 class="card-title"><?= $smkalumni; ?></h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>