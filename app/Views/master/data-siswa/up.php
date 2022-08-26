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
            <form class="formnaikkelas" action="/data-siswa/up" method="post">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4 mt-2">
                                <div class="form-group" id="nkelas">
                                    <select name="naikkelas" class="form-control">
                                        <option selected disabled><?= (old('naikkelas')) ? (old('naikkelas')) : '.::Pilih Kelas::' ?></option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                    <small class="form-text text-danger errorNaikkelas"></small>
                                </div>
                            </div>
                            <div class="col-md-2 mt-2">
                                <button type="submit" class="btn btn-primary mt-2 btn-sm btnnaikkelas"><i class="fa fa-arrow-up"></i> Naik Kelas</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="select_all" value="" /></th>
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
                                </thead>
                                <tfoot>
                                    <th style="display:none;"></th>
                                    <th style="display:none;"></th>
                                    <th style="display:none;"></th>
                                    <th style="display:none;"></th>
                                    <th width="19%">Kelas</th>
                                    <th style="display:none;"></th>
                                    <th style="display:none;"></th>
                                    <th style="display:none;"></th>
                                </tfoot>
                                </tr>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($datasiswa as $key => $r) : ?>
                                        <tr>
                                            <td><input type="checkbox" name="id[]" class="chk-box" value="<?= $r['id']; ?>"></td>
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
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <small class="form-text text-danger errorSiswa"></small>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>