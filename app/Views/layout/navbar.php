<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <?php if (session()->get('foto') == null) { ?>
                            <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" alt="image profile" class="avatar-img rounded-circle">
                        <?php } else { ?>
                            <img src="<?= base_url('/media/fotouser/' . session()->get('foto')) ?>" alt="image profile" class="avatar-img rounded-circle">
                        <?php } ?>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">
                                    <?php if (session()->get('foto') == null) { ?>
                                        <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" alt="image profile" class="avatar-img rounded-circle">
                                    <?php } else { ?>
                                        <img src="<?= base_url('/media/fotouser/' . session()->get('foto')) ?>" alt="image profile" class="avatar-img rounded-circle">
                                    <?php } ?>
                                </div>
                                <div class="u-text">
                                    <h4><?= session()->get('nama'); ?></h4>
                                    <p class="text-muted">
                                        <?= session()->get('email'); ?>
                                    </p>
                                    <p class="text-muted">
                                        <?php if (session()->get('level') == '29') {
                                            echo "superadmin";
                                        } elseif (session()->get('level') == '1') {
                                            echo "Admin SMA";
                                        } elseif (session()->get('level') == '2') {
                                            echo "Admin SMA";
                                        } elseif (session()->get('level') == '3') {
                                            echo "Kasih SMA";
                                        } elseif (session()->get('level') == '4') {
                                            echo "Kasih SMK";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('my-profil') ?>">My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/auth/logout">Logout</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
</div>
<!-- End Navbar -->