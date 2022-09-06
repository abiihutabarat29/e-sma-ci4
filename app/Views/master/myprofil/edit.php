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
                <a href="<?= base_url('data-user') ?>"><?= $titlebar ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?= $title ?></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <?php if (!empty($data) && is_array($data)) : ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title ?></div>
                    </div>
                    <form action="<?= base_url('my-profil/update/' . $data['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <div class="card-body">
                            <div class="row">
                                <?php if (session()->get('level') == '1' || session()->get('level') == '2') { ?>
                                    <div class="col-md-12 pr-0">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="npsn" name="npsn" value="<?= $data['nama_sekolah']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="npsn" name="npsn" value="<?= $data['npsn']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="jenjang" name="jenjang" value="<?= $data['jenjang']; ?>" readonly>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('nik')) ? 'has-error' : ''; ?>">
                                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" autocomplete="off" value="<?= (old('nik')) ? old('nik') : $data['nik']; ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('nik'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('nama')) ? 'has-error' : ''; ?>">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" autocomplete="off" value="<?= (old('nama')) ? old('nama') : $data['nama']; ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('nama'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('nohp')) ? 'has-error' : ''; ?>">
                                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Nomor Handphone" autocomplete="off" value="<?= (old('nohp')) ? old('nohp') : $data['nohp']; ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('nohp'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('email')) ? 'has-error' : ''; ?>">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" value="<?= (old('email')) ? old('email') : $data['email']; ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('email'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('password')) ? 'has-error' : ''; ?>">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" value="<?= old('password'); ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('password'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $data['username']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('repassword')) ? 'has-error' : ''; ?>">
                                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Retype password" autocomplete="off" value="<?= old('repassword'); ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('repassword'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="<?= base_url('media/fotouser/' . $data['foto']) ?>" alt="image profile" class="img-thumbnail rounded img-preview">
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group form-group-default <?= ($validation->hasError('foto')) ? 'has-error' : ''; ?>">
                                                <label>Pilih Foto</label>
                                                <input type="file" name="foto" class="form-control-file" id="foto" onchange="previewImg();" accept=".png, .jpg, .jpeg">
                                                <small class="form-text text-danger">
                                                    <?= $validation->getError('foto'); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <!-- <input type="hidden" name="_method" value="PUT"> -->
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                            <a href="<?= base_url('my-profil') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        <?php else : ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title ?></div>
                    </div>
                    <div class="card-body">
                        <h2>
                            <center><i>Maaf, data ini tidak dapat ditampilkan . . .</i></center>
                        </h2>
                        <a href="<?= base_url('my-profil') ?>" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
</div>