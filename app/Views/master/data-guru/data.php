<?php if (session()->get('status') == 1) : ?>
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
                        <a href="<?= base_url('data-guru/add') ?>" class="badge badge-primary btn-sm">
                            <i class="fa fa-plus-circle"></i>&nbsp;Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Status</th>
                                            <th>Foto</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($dataguru as $key => $r) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $r['nik']; ?></td>
                                                <td><?= $r['nama']; ?></td>
                                                <td><?= $r['tempat_lahir']; ?></td>
                                                <td><?= format_indo($r['tgl_lahir']); ?></td>
                                                <td><?= $r['status']; ?></td>
                                                <td><img src="<?= base_url('/media/fotoguru/' . $r['foto']) ?>" width="50px" class="img rounded">
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="<?= base_url('data-guru/edit/' . $r['id_guru']) ?>" title="Edit" class="btn btn-warning btn-xs mr-2">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-xs" title="Delete" data-toggle='modal' data-target='#activateModal<?= $r['id_guru'] ?>'>
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
    <?php foreach ($dataguru as $r) { ?>
        <form action="<?= base_url('data-guru/' . $r['id_guru']); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="modal fade" id="activateModal<?= $r['id_guru'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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