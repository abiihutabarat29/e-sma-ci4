<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"><?= $titlebar ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= base_url('home') ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('profil-sekolah') ?>"><?= $titlebar ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?= $title ?></a>
            </li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><?= $titlebar ?></div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('profil-sekolah/update/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= session()->get('nama_sekolah'); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= session()->get('npsn'); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group  <?= ($validation->hasError('nss')) ? 'has-error' : ''; ?>">
                                <input type="text" name="nss" class="form-control" autocomplete="off" placeholder="NSS" value="<?= (old('nss')) ? old('nss') : $data['nss']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('nss'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group <?= ($validation->hasError('nds')) ? 'has-error' : ''; ?>">
                                <input type="text" name="nds" class="form-control" autocomplete="off" placeholder="NDS" value="<?= (old('nds')) ? old('nds') : $data['nds']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('nds'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= ($validation->hasError('nosiop')) ? 'has-error' : ''; ?>">
                                <input type="text" name="nosiop" class="form-control" autocomplete="off" placeholder="Nomor SIOP" value="<?= (old('nosiop')) ? old('nosiop') : $data['nosiop']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('nosiop'); ?></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group <?= ($validation->hasError('akreditas')) ? 'has-error' : ''; ?>">
                                <label>Akreditas</label>
                                <select name="akreditas" class="form-control">
                                    <option><?= (old('akreditas')) ? old('akreditas') : $data['akreditas']; ?></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('akreditas'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= ($validation->hasError('thnberdiri')) ? 'has-error' : ''; ?>">
                                <input type="text" name="thnberdiri" class="form-control" autocomplete="off" placeholder="Tahun Berdiri" value="<?= (old('thnberdiri')) ? old('thnberdiri') : $data['thnberdiri']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('thnberdiri'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= ($validation->hasError('nosk')) ? 'has-error' : ''; ?>">
                                <input type="text" name="nosk" class="form-control" autocomplete="off" placeholder="Nomor SK Pendirian" value="<?= (old('nosk')) ? old('nosk') : $data['nosk']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('nosk'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= ($validation->hasError('tglsk')) ? 'has-error' : ''; ?>">
                                <label>Tanggal SK</label>
                                <input type="date" name="tglsk" class="form-control" autocomplete="off" value="<?= (old('tglsk')) ? old('tglsk') : $data['tglsk']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('tglsk'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= ($validation->hasError('kdpos')) ? 'has-error' : ''; ?>">
                                <input type="text" name="kdpos" class="form-control" autocomplete="off" placeholder="Kode Pos" value="<?= (old('kdpos')) ? old('kdpos') : $data['kodepos']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kdpos'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= ($validation->hasError('standar')) ? 'has-error' : ''; ?>">
                                <label>Standar Sekolah Bertaraf</label>
                                <select name="standar" class="form-control">
                                    <option><?= (old('standar')) ? old('standar') : $data['standar']; ?></option>
                                    <option value="SSN">SSN</option>
                                    <option value="SBI">SBI</option>
                                    <option value="SPM">SPM</option>
                                    <option value="SNS">SNS</option>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('standar'); ?></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group <?= ($validation->hasError('waktub')) ? 'has-error' : ''; ?>">
                                <label>Waktu Belajar</label>
                                <select name="waktub" class="form-control">
                                    <option><?= (old('waktub')) ? old('waktub') : $data['waktub']; ?></option>
                                    <option value="Pagi">Pagi</option>
                                    <option value="Siang">Siang</option>
                                    <option value="Sore">Sore</option>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('waktub'); ?></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group <?= ($validation->hasError('status')) ? 'has-error' : ''; ?>">
                                <label>Status Sekolah</label>
                                <select name="status" class="form-control">
                                    <option><?= (old('status')) ? old('status') : $data['status']; ?></option>
                                    <option value="Negeri">Negeri</option>
                                    <option value="Swasta">Swasta</option>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('status'); ?></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group <?= ($validation->hasError('kabupaten')) ? 'has-error' : ''; ?>">
                                <label>Kabupaten</label>
                                <select class="form-control" name="kabupaten" id="kabupaten">
                                    <option><?= $data['kabupaten']; ?></option>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kabupaten'); ?></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group <?= ($validation->hasError('kecamatan')) ? 'has-error' : ''; ?>">
                                <label>Kecamatan</label>
                                <select class="form-control" name="kecamatan" id="kecamatan">
                                    <option><?= $data['kecamatan']; ?></option>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kecamatan'); ?></small>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group <?= ($validation->hasError('kabupaten')) ? 'has-error' : ''; ?>">
                                <label>Kabupaten</label>
                                <select class="form-control" name="kabupaten">
                                    <option><?= (old('kabupaten')) ? old('kabupaten') : $data['kabupaten']; ?></option>
                                    <?php foreach ($kabupaten as $r) : ?>
                                        <option value="<?= $r['kabupaten'] ?>"><?= $r['kabupaten'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kabupaten'); ?></small>
                            </div>
                        </div> -->
                        <!-- <div class="col-sm-6">
                            <div class="form-group <?= ($validation->hasError('kecamatan')) ? 'has-error' : ''; ?>">
                                <label>Kecamatan</label>
                                <select class="form-control" name="kecamatan">
                                    <option><?= (old('kecamatan')) ? old('kecamatan') : $data['kecamatan']; ?></option>
                                    <?php foreach ($kecamatan as $r) : ?>
                                        <option value="<?= $r['kecamatan'] ?>"><?= $r['kecamatan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kecamatan'); ?></small>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('alamat')) ? 'has-error' : ''; ?>">
                                <textarea type="text" name="alamat" class="form-control" autocomplete="off" placeholder="Alamat Lengkap Sekolah"><?= (old('alamat')) ? old('alamat') : $data['alamat']; ?></textarea>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('alamat'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('telp')) ? 'has-error' : ''; ?>">
                                <input type="text" name="telp" class="form-control" autocomplete="off" placeholder="Telepon/HP" value="<?= (old('telp')) ? old('telp') : $data['telepon']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('telp'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('kepsek')) ? 'has-error' : ''; ?>">
                                <input type="text" name="kepsek" class="form-control" autocomplete="off" placeholder="Nama Kepala Sekolah" value="<?= (old('kepsek')) ? old('kepsek') : $data['nama_kepsek']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kepsek'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('email')) ? 'has-error' : ''; ?>">
                                <input type="text" name="email" class="form-control" placeholder="Email (example@gmail.com)" autocomplete="off" value="<?= (old('email')) ? old('email') : $data['email']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('email'); ?></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= session()->get('jenjang'); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('web')) ? 'has-error' : ''; ?>">
                                <input type="text" name="web" class="form-control" autocomplete="off" placeholder="Alamat Web (https://example.ac.id)" value="<?= (old('web')) ? old('web') : $data['website']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('web'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <<?= ($validation->hasError('namayys')) ? 'has-error' : ''; ?>">
                                <input type="text" name="namayys" class="form-control" autocomplete="off" placeholder="Nama Yayasan Perguruan" value="<?= (old('namayys')) ? old('namayys') : $data['namayys']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('namayys'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('alamatyys')) ? 'has-error' : ''; ?>">
                                <textarea type="text" name="alamatyys" class="form-control" autocomplete="off" placeholder="Alamat Yayasan"><?= (old('alamatyys')) ? old('alamatyys') : $data['alamatyys']; ?></textarea>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('alamatyys'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('lg')) ? 'has-error' : ''; ?>">
                                <input type="text" name="lg" class="form-control" autocomplete="off" placeholder="Longitude (Google Maps)" value="<?= (old('lg')) ? old('lg') : $data['longitude']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('lg'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('lt')) ? 'has-error' : ''; ?>">
                                <input type="text" name="lt" class="form-control" autocomplete="off" placeholder="Latitude (Google Maps)" value="<?= (old('lt')) ? old('lt') : $data['latitude']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('lt'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <img class="img-thumbnail rounded img-preview" src="<?= base_url('media/profil/' . $data['profil']); ?>" width="220px" alt="Foto">
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group form-group-default">
                                    <label>Pilih Foto</label>
                                    <input type="file" name="foto" class="form-control-file" id="foto" onchange="previewImg();" accept=".png, .jpg, .jpeg">
                                    <small class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <img class="img-thumbnail rounded img-preview-kep" src="<?= base_url('media/kepsek/' . $data['foto']); ?>" width="150px" alt="Foto">
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group form-group-default">
                                    <label>Pilih Foto</label>
                                    <input type="file" name="fotoks" class="form-control-file" id="foto-kep" onchange="previewImg2();" accept=".png, .jpg, .jpeg">
                                    <small class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <!-- Street Map -->
                        <!-- <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Lokasi</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div id="map" style='width: 1190px; height: 500px;'></div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-group form-group-default">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?= base_url('/profil-sekolah') ?>" class="btn btn-default  btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>