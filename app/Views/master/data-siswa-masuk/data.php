<?php if (session()->get('status') == 1) : ?>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title"><?= $title ?></h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="<?= base_url('home') ?>">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">
                            <td><?= $title ?></td>
                        </h4>
                        <a href="<?= base_url('data-siswa-masuk/add') ?>" class="btn btn-primary btn-round ml-auto btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <?php if (session()->get('level') == '1') { ?>
                                            <th>Jurusan</th>
                                        <?php } ?>
                                        <?php if (session()->get('level') == '2') { ?>
                                            <th>Paket keahlian</th>
                                        <?php } ?>
                                        <th>Asal Sekolah</th>
                                        <th>Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($datasiswam as $key => $r) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $r['nisn']; ?></td>
                                            <td><?= $r['nama']; ?></td>
                                            <td><?= $r['kelas']; ?></td>
                                            <?php if (session()->get('level') == '1') { ?>
                                                <td><?= $r['jurusan']; ?></td>
                                            <?php } ?>
                                            <?php if (session()->get('level') == '2') { ?>
                                                <td><?= $r['pkeahlian']; ?></td>
                                            <?php } ?>
                                            <td><?= $r['asal_sekolah']; ?></td>
                                            <td>
                                                <center>
                                                    <span class="badge badge-success"><?= $r['mutasi']; ?></span>
                                                </center>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <form action="/data-siswa-masuk/<?= $r['id']; ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-link btn-danger btn-lg"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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