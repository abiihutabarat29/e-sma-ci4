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
                    <a href="<?= base_url('data-siswa/add') ?>" class="btn btn-primary btn-round ml-auto btn-sm">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4 mt-2">
                                <select name="kls" class="form-control">
                                    <option>.::Pilih Kelas::.</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-2">
                                <button type="submit" class="btn btn-primary ml-lg-1 btn-sm" name="filterkls"><i class="fa fa-search"></i> Filter Kelas</button>
                            </div>
                        </div>
                    </div>
                </form>
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
                                    <th>Status</th>
                                    <th>Tahun Masuk</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($datasiswa as $key => $r) : ?>
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
                                        <td><?= $r['status']; ?></td>
                                        <td><?= $r['tahun_msk']; ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="/data-siswa/edit/<?= $r['id']; ?>" class="btn btn-link btn-primary btn-lg">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="/data-siswa/<?= $r['id']; ?>" method="post">
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
                <hr>
                <a href="#" target="blank" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-file-excel"></i> Export Data Keadaan dan Agama</a>
                <a href="#" target="blank" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-file-excel"></i> Export Data Umur Siswa</a>
            </div>
        </div>
    </div>
</div>