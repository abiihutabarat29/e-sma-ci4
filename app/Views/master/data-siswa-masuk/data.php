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
                                                    <a href="#" class="btn btn-link btn-lg btn-danger" title="Hapus Data" data-toggle='modal' data-target='#activateModal<?= $r['id'] ?>'>
                                                        <i class="fas fa-trash"></i>
                                                    </a>
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
    <!-- Modal -->
    <?php foreach ($datasiswam as $r) { ?>
        <form action="<?= base_url('data-siswa-masuk/' . $r['id']); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="modal fade" id="activateModal<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apa kamu yakin ingin menghapus data <span class="text-danger"><?= $r['nama'] ?></span> ini secara permanen ???
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-default btn-sm" type="button" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary btn-sm">Ya</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php } ?>
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