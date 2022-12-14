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
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">
                                Sekolah Terdaftar
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NPSN</th>
                                        <th>Jenjang</th>
                                        <th>Sekolah</th>
                                        <th>Kabupaten</th>
                                        <th>Status</th>
                                        <th>Status Registrasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($sekolah as $key => $r) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $r['npsn']; ?></td>
                                            <td><?= $r['jenjang']; ?></td>
                                            <td><?= $r['sekolah']; ?></td>
                                            <td><?= $r['kabupaten']; ?></td>
                                            <td><?= $r['status_sekolah']; ?></td>
                                            <?php if (!empty($profil) && is_array($profil)) : ?>
                                                <?php foreach ($profil as $key => $v) { ?>
                                                    <td>
                                                        <?php if ($r['npsn'] == $v['npsn']) { ?>
                                                            <center>
                                                                <span class="badge badge-success"><i class="fas fa-check-circle"></i> terdaftar</span>
                                                            </center>
                                                        <?php } else { ?>
                                                            <center>
                                                                <span class="badge badge-danger"><i class="fas fa-times-circle"></i> belum daftar</span>
                                                            </center>
                                                        <?php } ?>
                                                    </td>
                                                <?php } ?>
                                            <?php else : ?>
                                                <td>
                                                    <center>
                                                        <span class="badge badge-danger"><i class="fas fa-times-circle"></i> belum daftar</span>
                                                    </center>
                                                </td>
                                            <?php endif ?>
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