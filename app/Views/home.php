<div class="panel-header bg-primary-gradient bubble-shadow">
    <div class="page-inner py-5">
        <div class="row align-items-center justify-content-center text-center">
            <div>
                <img src="<?= base_url("template/assets/login/images/logo-sekolah.svg") ?>" class="mb-0" alt="" width="70px">
                <h2 class="text-white pb-2 fw-bold mb-0"><?= session()->get('nama_sekolah'); ?>
                </h2>
                <h5 class="text-white op-7 mb-0">Aplikasi E-Sekolah - ELektronik Manajemen Data Sekolah</h5>
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
    <?php if (session()->get('level') == '3') { ?>
        <figure class="highcharts-figure">
            <div id="container-siswa"></div>
        </figure>
        <hr>
        <figure class="highcharts-figure">
            <div id="container-guru"></div>
        </figure>
        <hr>
        <figure class="highcharts-figure">
            <div id="container-pegawai"></div>
        </figure>
        <hr>
        <figure class="highcharts-figure">
            <div id="container-alumni"></div>
        </figure>
    <?php } ?>
    <?php if (session()->get('level') == '5') { ?>
        <figure class="highcharts-figure">
            <div id="container-siswa-sumut"></div>
        </figure>
        <hr>
        <figure class="highcharts-figure">
            <div id="container-guru-sumut"></div>
        </figure>
        <hr>
        <figure class="highcharts-figure">
            <div id="container-pegawai-sumut"></div>
        </figure>
        <hr>
        <figure class="highcharts-figure">
            <div id="container-alumni-sumut"></div>
        </figure>
    <?php } ?>
</div>
</div>
<!-- Highcharts -->
<link rel="stylesheet" href="<?= base_url(); ?>/template/assets/highcharts/highcharts.css" />
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- Script data sekolah -->
<script type="text/javascript">
    Highcharts.chart('container-siswa', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Siswa Cabdis Kisaran Provinsi Sumut'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Sekolah'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                useHTML: true,
                text: ''
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            <?php
            foreach ($sekolahdata as $key => $s) {
                //query
                $db = \Config\Database::connect();
                $siswa = $db->table('mod_siswa')->where('id_sekolah =', $s['id'])->countAllResults();
                $sekolah = $s['sekolah'];
            ?> {
                    name: '<?php echo $sekolah ?>',
                    data: [<?php echo $siswa ?>],
                },
            <?php } ?>
        ]
    });
    Highcharts.chart('container-guru', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Guru Cabdis Kisaran Provinsi Sumut'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Sekolah'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                useHTML: true,
                text: ''
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            <?php
            foreach ($sekolahdata as $key => $s) {
                //query
                $db = \Config\Database::connect();
                $guru = $db->table('mod_guru')->where('id_sekolah =', $s['id'])->countAllResults();
                $sekolah = $s['sekolah'];
            ?> {
                    name: '<?php echo $sekolah ?>',
                    data: [<?php echo $guru ?>],
                },
            <?php } ?>
        ]
    });
    Highcharts.chart('container-pegawai', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Pegawai Cabdis Kisaran Provinsi Sumut'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Sekolah'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                useHTML: true,
                text: ''
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            <?php
            foreach ($sekolahdata as $key => $s) {
                //query
                $db = \Config\Database::connect();
                $pegawai = $db->table('mod_pegawai')->where('id_sekolah =', $s['id'])->countAllResults();
                $sekolah = $s['sekolah'];
            ?> {
                    name: '<?php echo $sekolah ?>',
                    data: [<?php echo $pegawai ?>],
                },
            <?php } ?>
        ]
    });
    Highcharts.chart('container-alumni', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Alumni Cabdis Kisaran Provinsi Sumut'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Sekolah'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                useHTML: true,
                text: ''
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            <?php
            foreach ($sekolahdata as $key => $s) {
                //query
                $db = \Config\Database::connect();
                $alumni = $db->table('mod_buku_induk')->where('id_sekolah =', $s['id'])->countAllResults();
                $sekolah = $s['sekolah'];
            ?> {
                    name: '<?php echo $sekolah ?>',
                    data: [<?php echo $alumni ?>],
                },
            <?php } ?>
        ]
    });
</script>
<script type="text/javascript">
    Highcharts.chart('container-siswa-sumut', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Siswa Provinsi Sumatera Utara'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Sekolah'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                useHTML: true,
                text: ''
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            <?php
            foreach ($sekolahdata as $key => $s) {
                //query
                $db = \Config\Database::connect();
                $siswa = $db->table('mod_siswa')->where('id_sekolah =', $s['id'])->countAllResults();
                $sekolah = $s['sekolah'];
            ?> {
                    name: '<?php echo $sekolah ?>',
                    data: [<?php echo $siswa ?>],
                },
            <?php } ?>
        ]
    });
    Highcharts.chart('container-guru-sumut', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Guru Provinsi Sumatera Utara'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Sekolah'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                useHTML: true,
                text: ''
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            <?php
            foreach ($sekolahdata as $key => $s) {
                //query
                $db = \Config\Database::connect();
                $guru = $db->table('mod_guru')->where('id_sekolah =', $s['id'])->countAllResults();
                $sekolah = $s['sekolah'];
            ?> {
                    name: '<?php echo $sekolah ?>',
                    data: [<?php echo $guru ?>],
                },
            <?php } ?>
        ]
    });
    Highcharts.chart('container-pegawai-sumut', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Pegawai Provinsi Sumatera Utara'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Sekolah'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                useHTML: true,
                text: ''
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            <?php
            foreach ($sekolahdata as $key => $s) {
                //query
                $db = \Config\Database::connect();
                $pegawai = $db->table('mod_pegawai')->where('id_sekolah =', $s['id'])->countAllResults();
                $sekolah = $s['sekolah'];
            ?> {
                    name: '<?php echo $sekolah ?>',
                    data: [<?php echo $pegawai ?>],
                },
            <?php } ?>
        ]
    });
    Highcharts.chart('container-alumni-sumut', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Alumni Provinsi Sumatera Utara'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Sekolah'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                useHTML: true,
                text: ''
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            <?php
            foreach ($sekolahdata as $key => $s) {
                //query
                $db = \Config\Database::connect();
                $alumni = $db->table('mod_buku_induk')->where('id_sekolah =', $s['id'])->countAllResults();
                $sekolah = $s['sekolah'];
            ?> {
                    name: '<?php echo $sekolah ?>',
                    data: [<?php echo $alumni ?>],
                },
            <?php } ?>
        ]
    });
</script>