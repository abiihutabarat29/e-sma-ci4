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
            <form action="<?= base_url('data-siswa/naik-kelas/' . $datasiwa['id']); ?>" method="post">
                <div class="card-body">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4 mt-2">
                                <div class="form-group<?= ($validation->hasError('naikkelas')) ? 'has-error' : ''; ?>">
                                    <select name="naikkelas" class="form-control">
                                        <option selected disabled><?= (old('naikkelas')) ? (old('naikkelas')) : '.::Pilih Kelas::' ?></option>
                                        <option>X</option>
                                        <option>XI</option>
                                        <option>XII</option>
                                    </select>
                                </div>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('naikkelas'); ?></small>
                            </div>
                            <div class="col-md-2 mt-2">
                                <button type="submit" class="btn btn-primary mt-2 btn-sm" name="nkelas"><i class="fa fa-arrow-up"></i> Naik Kelas</button>
                            </div>

                            <!-- <form method="post">
                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <select name="kls" class="form-control">
                                        <option selected disabled><?= (old('kls')) ? (old('kls')) : '.::Pilih Kelas::' ?></option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 mt-2">
                                <button type="submit" class="btn btn-primary mt-2 btn-sm" name="filterkls"><i class="fa fa-search"></i> Filter Kelas</button>
                            </div>
                        </form> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="select_all" value="" /></th>
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
                                            <td><input type="checkbox" name="nisn[]" class="chk-box" value="<?= $r['nisn']; ?>"></td>
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
                </div>
            </form>
        </div>
    </div>
</div>