<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div class="page-header">
                <h4 class="page-title text-white"><?= $title ?></h4>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card">
                <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                <div class="card-header">
                    <a href="<?= base_url('data-user/add') ?>" class="badge badge-primary btn-sm">
                        <i class="fa fa-plus-circle"></i>&nbsp;Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
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
                                                <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" width="50px" class="img rounded">
                                            <?php } else { ?>
                                                <img src="<?= base_url('/media/fotouser/' . $r['foto']) ?>" width="50px" class="img rounded">
                                            <?php } ?>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="#" class="btn btn-xs mr-2 <?= $r['status'] == 1 ? 'btn-success' : 'btn-danger' ?> " title="Klik untuk Mengaktifkan atau Menonaktifkan" data-toggle='modal' data-target='#activateModal<?= $r['id'] ?>'>
                                                    <?= $r['status'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>'; ?>
                                                </a>
                                                <a href="<?= base_url('data-user/edit/' . $r['id']) ?>" title="Edit" class="btn btn-warning btn-xs mr-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-xs" title="Delete" data-toggle='modal' data-target='#activateModalDelete<?= $r['id'] ?>'>
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
</div>
<!-- Modal -->
<?php foreach ($datauser as $r) { ?>
    <form action="<?= base_url('data-user/' . $r['id']); ?>" method="post">
        <?= csrf_field(); ?>
        <div class="modal fade" id="activateModalDelete<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <?= $r['status'] == 1 ? 'Pilih "Ya" untuk me-nonaktifkan user <span class="text-danger">' . $r['nama'] . '</span>'  : 'Pilih "Ya" untuk meng-aktifkan user' ?>
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