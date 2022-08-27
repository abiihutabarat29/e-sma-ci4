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
                </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Sekolah</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>File</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($sekolah as $key => $r) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <!-- data sekolah -->
                                        <td><?= $r['sekolah']; ?></td>
                                        <!-- data laporan bulanan -->
                                        <td><?= $r['bulan']; ?></td>
                                        <td><?= $r['tahun']; ?></td>
                                        <td> <?php if ($r['file_labul'] == '') { ?>
                                                <center>
                                                    <span class="badge badge-danger"><i class="fas fa-times-circle"></i> file tida tersedia</span>
                                                </center>
                                            <?php } else { ?>
                                                <center>
                                                    <a href="<?= base_url() ?>/media/arsip/<?= $r['file_labul']; ?>" target="blank"><button class="btn btn-primary btn-xs"><i class="fa fa-download"></i> Download</button>
                                                </center>
                                            <?php } ?>
                                        </td>
                                        <td> <?php if ($r['file_labul'] == '') { ?>
                                                <center>
                                                    <span class="badge badge-danger"><i class="fas fa-times-circle"></i> belum selesai</span>
                                                </center>
                                            <?php } else { ?>
                                                <center>
                                                    <span class="badge badge-success"><i class="fas fa-check-circle"></i> selesai</span>
                                                </center>
                                            <?php } ?>
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