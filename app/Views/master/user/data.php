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