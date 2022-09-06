<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar <?= session()->get('status') == 1 ? 'avatar-online' : 'avatar-offline' ?>">
                    <?php if (session()->get('foto') == null) { ?>
                        <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" alt="image profile" class="avatar-img rounded-circle">
                    <?php } else { ?>
                        <img src="<?= base_url('/media/fotouser/' . session()->get('foto')) ?>" alt="image profile" class="avatar-img rounded-circle">
                    <?php } ?>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?= session()->get('nama'); ?>
                            <span class="user-level">
                                <?php if (session()->get('level') == '29') {
                                    echo "superadmin";
                                } elseif (session()->get('level') == '1') {
                                    echo "Admin SMA";
                                } elseif (session()->get('level') == '2') {
                                    echo "Admin SMK";
                                } elseif (session()->get('level') == '3') {
                                    echo "Kasih SMA";
                                } elseif (session()->get('level') == '4') {
                                    echo "Kasih SMK";
                                }
                                ?>
                            </span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="<?= base_url('my-profil') ?>">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <!-- Service uri -->
                <?php $request = \Config\Services::request(); ?>
                <!-- =========== -->
                <li class="nav-item <?= ($request->uri->getSegment(1) == 'home') ? 'active' : ""; ?>">
                    <a href="<?= base_url('/home') ?>">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <?php if (session()->get('level') == '29') { ?>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'data-user' or
                                            $request->uri->getSegment(1) == 'data-sekolah' or
                                            $request->uri->getSegment(1) == 'data-kabupaten' or
                                            $request->uri->getSegment(1) == 'data-kecamatan' or
                                            $request->uri->getSegment(1) == 'data-mapel' or
                                            $request->uri->getSegment(1) == 'data-sarana' or
                                            $request->uri->getSegment(1) == 'data-inventaris-barang' or
                                            $request->uri->getSegment(1) == 'data-golongan'
                                        ) ? 'active' : ""; ?>">
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Master Data</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?= base_url('data-user') ?>">
                                        <span class="sub-item">Data User</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-sekolah') ?>">
                                        <span class="sub-item">Data Sekolah</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-kabupaten') ?>">
                                        <span class="sub-item">Data Kabupaten</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-kecamatan') ?>">
                                        <span class="sub-item">Data Kecamatan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-mapel') ?>">
                                        <span class="sub-item">Data Mata Pelajaran</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-sarana') ?>">
                                        <span class="sub-item">Data Sarana</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-inventaris-barang') ?>">
                                        <span class="sub-item">Data Inventaris</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-golongan') ?>">
                                        <span class="sub-item">Data Golongan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-tahun-akademik') ?>">
                                        <span class="sub-item">Data Tahun Akademik</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php } ?>
                <?php if (session()->get('level') == '1' || session()->get('level') == '2' && session()->get('status') == '1') { ?>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'profil-sekolah') ? 'active' : ""; ?>">
                        <a href="<?= base_url('profil-sekolah') ?>">
                            <i class="fas fa-school"></i>
                            <p>Profil Sekolah</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'data-guru') ? 'active' : ""; ?>">
                        <a href="<?= base_url('data-guru') ?>">
                            <i class="fas fa-user-tie"></i>
                            <p>Data Guru</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'data-pegawai') ? 'active' : ""; ?>">
                        <a href="<?= base_url('data-pegawai') ?>">
                            <i class="fas fa-user-tie"></i>
                            <p>Data Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'data-siswa' or $request->uri->getSegment(1) == 'naik-kelas' or $request->uri->getSegment(1) == 'data-siswa-masuk' or $request->uri->getSegment(1) == 'data-siswa-keluar') ? 'active' : ""; ?>">
                        <a data-toggle="collapse" href="#formsN">
                            <i class="fas fa-users"></i>
                            <p>Data Siswa</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="formsN">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?= base_url('data-siswa') ?>">
                                        <span class="sub-item">Data Siswa</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-siswa/naik-kelas') ?>">
                                        <span class="sub-item">Naik Kelas</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-siswa-masuk') ?>">
                                        <span class="sub-item">Masuk</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-siswa-keluar') ?>">
                                        <span class="sub-item">Keluar</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'data-kebutuhan') ? 'active' : ""; ?>">
                        <a href="<?= base_url('data-kebutuhan') ?>">
                            <i class="fas fa-user-plus"></i>
                            <p>Data Kebutuhan Guru</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'buku-induk') ? 'active' : ""; ?>">
                        <a href="<?= base_url('buku-induk') ?>">
                            <i class="fas fa-book-open"></i>
                            <p>Buku Induk Siswa</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'data-sarpras') ? 'active' : ""; ?>">
                        <a href="<?= base_url('data-sarpras') ?>">
                            <i class="fas fa-file-alt"></i>
                            <p>Sarpras</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'data-inventaris') ? 'active' : ""; ?>">
                        <a href="<?= base_url('data-inventaris') ?>">
                            <i class="fas fa-briefcase"></i>
                            <p>Inventaris</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'generate' or $request->uri->getSegment(1) == 'data-arsip') ? 'active' : ""; ?>">
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Laporan Bulanan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?= base_url('generate') ?>">
                                        <span class="sub-item">Generate Laporan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-arsip') ?>">
                                        <span class="sub-item">Arsip Laporan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php } ?>
                <?php if (session()->get('level') == '3' || session()->get('level') == '4' && session()->get('status') == '1') { ?>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'sekolah') ? 'active' : ""; ?>">
                        <a href="<?= base_url('sekolah') ?>">
                            <i class="fas fa-school"></i>
                            <p>Sekolah</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'laporan-bulanan') ? 'active' : ""; ?>">
                        <a href="<?= base_url('laporan-bulanan') ?>">
                            <i class="fas fa-file"></i>
                            <p>Laporan Bulanan</p>
                        </a>
                    </li>
                <?php } ?>
                <hr>
                <li class="nav-item">
                    <a href="/auth/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
<div class="main-panel">
    <div class="content">
        <!-- Mulai isi content -->