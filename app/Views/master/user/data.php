<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"><?= $title ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= base_url('home') ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
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
                    <a href="<?= base_url('data-user/add') ?>" class="btn btn-primary btn-round ml-auto btn-sm">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NPSN</th>
                                <th>Nama Sekolah</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Foto</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($datauser as $key => $r) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $r['npsn']; ?></td>
                                    <td><?= $r['nama_sekolah']; ?></td>
                                    <td><?= $r['nik']; ?></td>
                                    <td><?= $r['nama']; ?></td>
                                    <td><?= $r['username']; ?></td>
                                    <td>
                                        <?php if ($r['foto'] == null) { ?>
                                            <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" width="50px">
                                        <?php } else { ?>
                                            <img src="<?= base_url('/media/fotouser/' . $r['foto']) ?>" width="50px">
                                        <?php } ?>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="#" class="btn btn-link  btn-lg <?= $r['status'] == 1 ? 'btn-success' : 'btn-danger' ?> " title="Klik untuk Mengaktifkan atau Menonaktifkan" data-toggle='modal' data-target='#activateModal<?= $r['id'] ?>'>
                                                <?= $r['status'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>'; ?>
                                            </a>
                                            <a href="data-user/edit/<?= $r['id']; ?>" class="btn btn-link btn-primary btn-lg">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="data-user/delete/<?= $r['id']; ?>" class="btn btn-link btn-danger btn-lg">
                                                <i class="fa fa-trash"></i>
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
<!-- Modal aktif users -->
<?php foreach ($datauser as $r) { ?>
    <form action="<?= base_url('data-user/activated/' . $r['id']) ?>" method="post">
        <div class="modal fade" id="activateModal<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Status User</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= $r['status'] == 1 ? 'Pilih "Ya" untuk me-nonaktifkan user' : 'Pilih "Ya" untuk meng-aktifkan User' ?>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="status" value="<?= $r['status'] ?>">
                        <button class="btn btn-default btn-sm" type="button" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary btn-sm">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } ?>