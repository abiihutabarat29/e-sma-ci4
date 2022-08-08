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
                    <a href="<?= base_url('data-sekolah/add') ?>" class="btn btn-primary btn-round ml-auto btn-sm">
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
                                <th>Jenjang</th>
                                <th>Sekolah</th>
                                <th>Kabupaten</th>
                                <th>Status</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($datasekolah as $key => $r) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $r['npsn']; ?></td>
                                    <td><?= $r['jenjang']; ?></td>
                                    <td><?= $r['sekolah']; ?></td>
                                    <td><?= $r['kabupaten']; ?></td>
                                    <td><?= $r['status_sekolah']; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="/data-sekolah/edit/<?= $r['id']; ?>" class="btn btn-link btn-primary btn-lg">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="/data-sekolah/<?= $r['id']; ?>" method="post">
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