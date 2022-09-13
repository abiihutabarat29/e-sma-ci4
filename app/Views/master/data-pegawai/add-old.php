<?php if (session()->get('status') == 1) : ?>
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
                    <a href="<?= base_url('data-pegawai') ?>"><?= $titlebar ?></a>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title ?></div>
                    </div>
                    <form action="<?= base_url('data-pegawai/save') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('nip')) ? 'has-error' : ''; ?>">
                                        <label>NIP<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nip" name="nip" autocomplete="off" value="<?= old('nip'); ?>" autofocus>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('nip'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('nik')) ? 'has-error' : ''; ?>">
                                        <label>NIK<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nik" name="nik" autocomplete="off" value="<?= old('nik'); ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('nik'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('nuptk')) ? 'has-error' : ''; ?>">
                                        <label>NUPTK<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nuptk" name="nuptk" autocomplete="off" value="<?= old('nuptk'); ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('nuptk'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('nmpegawai')) ? 'has-error' : ''; ?>">
                                        <label>Nama<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nmpegawai" name="nmpegawai" autocomplete="off" value="<?= old('nmpegawai'); ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('nmpegawai'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('tlahir')) ? 'has-error' : ''; ?>">
                                        <label>Tempat Lahir<span class="text-danger">*</span></label>
                                        <textarea id="tlahir" name="tlahir" type="text" class="form-control" autocomplete="off"><?= old('tlahir'); ?></textarea>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('tlahir'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('tgllhr')) ? 'has-error' : ''; ?>">
                                        <label>Tanggal Lahir<span class="text-danger">*</span></label>
                                        <input name="tgllhr" type="date" class="form-control" autocomplete="off" value="<?= old('tgllhr'); ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('tgllhr'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-check <?= ($validation->hasError('jenkel')) ? 'has-error' : ''; ?>">
                                        <label>Jenis Kelamin<span class="text-danger">*</span></label></br>
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="jenkel" value="L" <?= old('jenkel') == 'L' ? 'checked' : ''; ?>>
                                            <span class="form-radio-sign">Laki-laki</span>
                                        </label>
                                        <label class="form-radio-label ml-3">
                                            <input class="form-radio-input" type="radio" name="jenkel" value="P" <?= old('jenkel') == 'P' ? 'checked' : ''; ?>>
                                            <span class="form-radio-sign">Perempuan</span>
                                        </label><br>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('jenkel'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="gol" class="js-example-language" style="width: 100%">
                                            <label>Golongan<span class="text-danger">*</span></label>
                                            <option selected disabled><?= (old('gol')) ? old('gol') : ".::Pilih Golongan::." ?></option>
                                            <?php foreach ($golongan as $r) : ?>
                                                <option value="<?= $r['golongan'] ?>"><?= $r['golongan'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('tingkat')) ? 'has-error' : ''; ?>">
                                        <label>Pendidikan/Ijazah Tertinggi<span class="text-danger">*</span></label>
                                        <select name="tingkat" class="form-control">
                                            <option selected disabled><?= (old('tingkat')) ? old('tingkat') : ".::Pilih Tingkat::." ?></option>
                                            <option value="SLTA">SLTA</option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                        </select>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('tingkat'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('agama')) ? 'has-error' : ''; ?>">
                                        <label>Agama<span class="text-danger">*</span></label>
                                        <select name="agama" class="form-control">
                                            <option selected disabled><?= (old('agama')) ? old('agama') : ".::Pilih Agama::." ?></option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Kristen Katholik">Kristen Katholik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                        </select>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('agama'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('jurusan')) ? 'has-error' : ''; ?>">
                                        <label>Jurusan<span class="text-danger">*</span></label>
                                        <input type=" text" name="jurusan" class="form-control" autocomplete="off" value="<?= old('jurusan'); ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('jurusan'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('status')) ? 'has-error' : ''; ?>">
                                        <label>Status<span class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option selected disabled><?= (old('status')) ? old('status') : ".::Pilih Status::." ?></option>
                                            <option value="PNS">PNS</option>
                                            <option value="CPNS">CPNS</option>
                                            <option value="Non PNS">Non PNS</option>
                                            <option value="Honda">Honda</option>
                                            <option value="GTY">GTY</option>
                                            <option value="GTT">GTT</option>
                                            <option value="GTTY">GTTY</option>
                                            <option value="PPPK">PPPK</option>
                                        </select>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('status'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('thnijazah')) ? 'has-error' : ''; ?>">
                                        <label>Tahun Ijazah<span class="text-danger">*</span></label>
                                        <input type="text" name="thnijazah" class="form-control" autocomplete="off" placeholder="example : 2020" value="<?= old('thnijazah'); ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('thnijazah'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('tmtpegawai')) ? 'has-error' : ''; ?>">
                                        <label>TMT Pegawai<span class="text-danger">*</span></label>
                                        <input type="date" name="tmtpegawai" class="form-control" autocomplete="off" value="<?= old('tmtpegawai'); ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('tmtpegawai'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group">
                                        <label>Diklat</label>
                                        <input type="text" name="diklat" class="form-control" autocomplete="off" value="<?= old('diklat'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('tmtsekolah')) ? 'has-error' : ''; ?>">
                                        <label>TMT Sekolah<span class="text-danger">*</span></label>
                                        <input type="date" name="tmtsekolah" class="form-control" autocomplete="off" value="<?= old('tmtsekolah'); ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('tmtsekolah'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat Diklat</label>
                                        <textarea type="text" name="tdiklat" class="form-control" autocomplete="off"><?= old('tdiklat'); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group">
                                        <label>Lama Diklat</label>
                                        <input type="text" name="lmdiklat" class="form-control" autocomplete="off" placeholder="Lama (Jam)" value="<?= old('lmdiklat'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tahun Diklat</label>
                                        <input type="text" name="thndiklat" class="form-control" autocomplete="off" placeholder="example : 2020" value="<?= old('thndiklat'); ?>">
                                    </div>
                                </div>
                                <?php if (session()->get('level') == '2') { ?>
                                    <div class="col-md-6 pr-0">
                                        <label>Masa Kerja<span class="text-danger">*</span></label>
                                        <div class="form-group <?= ($validation->hasError('mktahun')) ? 'has-error' : ''; ?>">
                                            <input type="text" name="mktahun" class="form-control" autocomplete="off" placeholder="Jumlah Tahun Masa Kerja" value="<?= old('mktahun'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('mktahun'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group <?= ($validation->hasError('mkbulan')) ? 'has-error' : ''; ?>">
                                            <input type="text" name="mkbulan" class="form-control" autocomplete="off" placeholder="Jumlah Bulan Masa Kerja" value="<?= old('mkbulan'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('mkbulan'); ?></small>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('stsvaksin')) ? 'has-error' : ''; ?>">
                                        <label>Status Vaksin<span class="text-danger">*</span></label>
                                        <select name="stsvaksin" class="form-control" onchange=" if (this.selectedIndex==2 || this.selectedIndex==3){ document.getElementById('view').style.display='inline' }else { document.getElementById('view').style.display='none' };">
                                            <option selected disabled><?= (old('stsvaksin')) ? old('stsvaksin') : ".::Pilih Status Vaksin::." ?></option>
                                            <option value="Belum">Belum</option>
                                            <option value="Dosis I">Dosis I</option>
                                            <option value="Dosis II">Dosis II</option>
                                        </select>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('stsvaksin'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="<?= base_url('media/fotopegawai/blank.png'); ?>" width="200px" class="img-thumbnail rounded img-preview">
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
                                <span class="col-md-6 pr-0" id="view" style="display:none;">
                                    <div class="col-md-12 pr-0">
                                        <div class="form-group">
                                            <label>Tanggal Vaksinasi</label>
                                            <input type="date" name="tglvaksin" class="form-control" autocomplete="off" value="<?= old('tglvaksin'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 pr-0">
                                        <div class="form-group">
                                            <label>Lokasi Vaksin/label>
                                                <input type="text" name="lokvaksin" class="form-control" autocomplete="off" value="<?= old('lokvaksin'); ?>">
                                        </div>
                                    </div>
                                </span>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('kehadiran')) ? 'has-error' : ''; ?>">
                                        <label>Kehadiran</label>
                                        <input type="text" name="kehadiran" class="form-control" autocomplete="off" placeholder="% Kehadiran" value="<?= old('kehadiran'); ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('kehadiran'); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                            <a href="<?= base_url('/data-pegawai') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
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