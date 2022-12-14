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
                    <form class="formnaikkelas" action="<?= base_url('data-siswa/up') ?>" method="post">
                        <?= csrf_field(); ?>
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
                    </form>
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