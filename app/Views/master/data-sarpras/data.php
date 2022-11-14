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
                        <a href="<?= base_url('data-sarpras/add') ?>" class="badge badge-primary btn-sm">
                            <i class="fa fa-plus-circle"></i>&nbsp;Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Prasarana</th>
                                        <th>Baik</th>
                                        <th>Rusak Ringan</th>
                                        <th>Rusak Berat</th>
                                        <th>Keterangan</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($datasarpras as $key => $r) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $r['prasarana']; ?></td>
                                            <td><?= $r['baik']; ?></td>
                                            <td><?= $r['rusak_ringan']; ?></td>
                                            <td><?= $r['rusak_berat']; ?></td>
                                            <td><?= $r['keterangan']; ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('data-sarpras/edit/' . $r['id']) ?>" title="Edit" class="btn btn-warning btn-xs mr-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-xs" title="Delete" data-toggle='modal' data-target='#activateModal<?= $r['id'] ?>'>
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
    <?php foreach ($datasarpras as $r) { ?>
        <form action="<?= base_url('data-sarpras/' . $r['id']); ?>" method="post">
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
                            Apa kamu yakin ingin menghapus data <span class="text-danger"><?= $r['prasarana'] ?></span> ini secara permanen ???
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