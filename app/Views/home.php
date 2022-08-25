<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard <?= session()->get('nama_sekolah'); ?></h2>
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
                                    <h4 class="card-title"><?= $sekolah; ?></h4>
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
                                <?php } else { ?>
                                    <h4 class="card-title"><?= $siswa; ?></h4>
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
                                <?php } else { ?>
                                    <h4 class="card-title"><?= $guru; ?></h4>
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
                                <?php } else { ?>
                                    <h4 class="card-title"><?= $pegawai; ?></h4>
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
                                <?php } else { ?>
                                    <h4 class="card-title"><?= $alumni; ?></h4>
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