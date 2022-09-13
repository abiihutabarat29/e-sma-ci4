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
                    <a href="<?= base_url('data-guru') ?>"><?= $titlebar ?></a>
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
                        <div class="card-body">
                            <ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
                                <li class="nav-item submenu">
                                    <a class="nav-link active" id="pills-identitas-tab" data-toggle="pill" href="#pills-identitas" role="tab" aria-controls="pills-identitas" aria-selected="false">Identitas</a>
                                </li>
                                <li class="nav-item submenu">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pendidikan & Pekerjaan</a>
                                </li>
                                <li class="nav-item submenu">
                                    <a class="nav-link" id="pills-diklat-tab" data-toggle="pill" href="#pills-diklat" role="tab" aria-controls="pills-diklat" aria-selected="false">Diklat</a>
                                </li>
                                <li class="nav-item submenu">
                                    <a class="nav-link" id="pills-kontak-tab" data-toggle="pill" href="#pills-kontak" role="tab" aria-controls="pills-kontak" aria-selected="false">Kontak</a>
                                </li>
                                <li class="nav-item submenu">
                                    <a class="nav-link" id="pills-vaksin-tab" data-toggle="pill" href="#pills-vaksin" role="tab" aria-controls="pills-vaksin" aria-selected="false">Vaksinasi</a>
                                </li>
                                <li class="nav-item submenu">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Foto</a>
                                </li>
                            </ul>
                            <form action="<?= base_url('data-guru/update/' . $data['id_guru']); ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id" value="<?= $data['id_guru']; ?>">
                                <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-identitas" role="tabpanel" aria-labelledby="pills-identitas-tab">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('nip')) ? 'has-error' : ''; ?>">
                                                        <label>NIP<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" autocomplete="off" value="<?= (old('nip')) ? old('nip') : $data['nip']; ?>" autofocus>
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('nip'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group <?= ($validation->hasError('nik')) ? 'has-error' : ''; ?>">
                                                        <label>NIK<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" autocomplete="off" value="<?= (old('nik')) ? old('nik') : $data['nik']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('nik'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('nuptk')) ? 'has-error' : ''; ?>">
                                                        <label>NUPTK<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="nuptk" name="nuptk" placeholder="NUPTK" autocomplete="off" value="<?= (old('nuptk')) ? old('nuptk') : $data['nuptk']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('nuptk'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group <?= ($validation->hasError('nrg')) ? 'has-error' : ''; ?>">
                                                        <label>NRG<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="nrg" name="nrg" placeholder="NRG" autocomplete="off" value="<?= (old('nrg')) ? old('nrg') : $data['nrg']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('nrg'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('nmguru')) ? 'has-error' : ''; ?>">
                                                        <label>Nama<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="nmguru" name="nmguru" placeholder="Nama Guru" autocomplete="off" value="<?= (old('nmguru')) ? old('nmguru') : $data['nama']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('nmguru'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group <?= ($validation->hasError('agama')) ? 'has-error' : ''; ?>">
                                                        <label>Agama<span class="text-danger">*</span></label>
                                                        <select name="agama" class="form-control">
                                                            <option><?= (old('agama')) ? old('agama') : $data['agama']; ?></option>
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
                                                    <div class="form-group <?= ($validation->hasError('alamat')) ? 'has-error' : ''; ?>">
                                                        <label>Alamat<span class="text-danger">*</span></label>
                                                        <textarea id="alamat" name="alamat" type="text" class="form-control" autocomplete="off"><?= (old('alamat')) ? old('alamat') : $data['alamat']; ?></textarea>
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('alamat'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group <?= ($validation->hasError('tlahir')) ? 'has-error' : ''; ?>">
                                                        <label>Tempat Lahir<span class="text-danger">*</span></label>
                                                        <textarea id="tlahir" name="tlahir" type="text" class="form-control" autocomplete="off"><?= (old('tlahir')) ? old('tlahir') : $data['tempat_lahir']; ?></textarea>
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('tlahir'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('tgllhr')) ? 'has-error' : ''; ?>">
                                                        <label>Tanggal Lahir<span class="text-danger">*</span></label>
                                                        <input name="tgllhr" type="date" class="form-control" autocomplete="off" value="<?= (old('tgllhr')) ? old('tgllhr') : $data['tgl_lahir']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('tgllhr'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-check <?= ($validation->hasError('jenkel')) ? 'has-error' : ''; ?>">
                                                        <label>Jenis Kelamin<span class="text-danger">*</span></label></br>
                                                        <label class="form-radio-label">
                                                            <input class="form-radio-input" type="radio" name="jenkel" value="L" <?= $data['jenis_kel'] == 'L' ? 'checked' : ''; ?>>
                                                            <span class="form-radio-sign">Laki-laki</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="jenkel" value="P" <?= $data['jenis_kel'] == 'P' ? 'checked' : ''; ?>>
                                                            <span class="form-radio-sign">Perempuan</span>
                                                        </label><br>
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('jenkel'); ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('tingkat')) ? 'has-error' : ''; ?>">
                                                        <label>Pendidikan/Ijazah Tertinggi<span class="text-danger">*</span></label>
                                                        <select name="tingkat" class="form-control">
                                                            <option><?= (old('tingkat')) ? old('tingkat') : $data['tingkat']; ?></option>
                                                            <option value="D3">D3</option>
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                        </select>
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('tingkat'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group">
                                                        <label>Golongan</label>
                                                        <select name="gol" class="js-example-language" style="width: 100%">
                                                            <option><?= (old('gol')) ? old('gol') : $data['golruang'] ?></option>
                                                            <?php foreach ($golongan as $r) : ?>
                                                                <option value="<?= $r['golongan'] ?>"><?= $r['golongan'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('jurusan')) ? 'has-error' : ''; ?>">
                                                        <label>Jurusan<span class="text-danger">*</span></label>
                                                        <input type=" text" name="jurusan" class="form-control" autocomplete="off" placeholder="Jurusan" value="<?= (old('jurusan')) ? old('jurusan') : $data['jurusan']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('jurusan'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('status')) ? 'has-error' : ''; ?>">
                                                        <label>Status Kepegawaian<span class="text-danger">*</span></label>
                                                        <select name="status" class="form-control">
                                                            <option><?= (old('status')) ? old('status') : $data['status']; ?></option>
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
                                                        <input type="text" name="thnijazah" class="form-control" autocomplete="off" placeholder="Tahun Ijazah" value="<?= (old('thnijazah')) ? old('thnijazah') : $data['thnijazah']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('thnijazah'); ?></small>
                                                    </div>
                                                </div>
                                                <?php if (session()->get('level') == '2') { ?>
                                                    <div class="col-md-6 pr-0">
                                                        <label>Masa Kerja<span class="text-danger">*</span></label>
                                                        <div class="form-group <?= ($validation->hasError('mktahun')) ? 'has-error' : ''; ?>">
                                                            <input type="text" name="mktahun" class="form-control" autocomplete="off" placeholder="Jumlah Tahun Masa Kerja" value="<?= (old('mktahun')) ? old('mktahun') : $data['mk_thn']; ?>">
                                                            <small class="form-text text-danger">
                                                                <?= $validation->getError('mktahun'); ?></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group <?= ($validation->hasError('mkbulan')) ? 'has-error' : ''; ?>">
                                                            <input type="text" name="mkbulan" class="form-control" autocomplete="off" placeholder="Jumlah Bulan Masa Kerja" value="<?= (old('mkbulan')) ? old('mkbulan') : $data['mk_bln']; ?>">
                                                            <small class="form-text text-danger">
                                                                <?= $validation->getError('mkbulan'); ?></small>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('stsserti')) ? 'has-error' : ''; ?>">
                                                        <label>Status Sertifikasi<span class="text-danger">*</span></label>
                                                        <select name="stsserti" class="form-control" onchange=" if (this.selectedIndex==1){ document.getElementById('tahun').style.display='inline' }else { document.getElementById('tahun').style.display='none' };">
                                                            <option><?= (old('stsserti')) ? old('stsserti') : $data['sts_serti']; ?></option>
                                                            <option value="Sudah">Sudah</option>
                                                            <option value="Belum">Belum</option>
                                                        </select>
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('stsserti'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('mapel')) ? 'has-error' : ''; ?>">
                                                        <label>Mata Pelajaran<span class="text-danger">*</span></label>
                                                        <select name="mapel" id="mapel" class="js-example-language" style="width: 100%">
                                                            <option><?= (old('mapel')) ? old('mapel') : $data['mapel']; ?></option>
                                                            <?php foreach ($mapel as $r) : ?>
                                                                <option value="<?= $r['mapel'] ?>"><?= $r['mapel'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('mapel'); ?></small>
                                                    </div>
                                                </div>
                                                <div id="tahun">
                                                    <div class="col-md-12 pr-0">
                                                        <div class="form-group">
                                                            <label>Tahun Sertifikasi</label>
                                                            <input type="text" name="thns" class="form-control" autocomplete="off" value="<?= (old('thns')) ? old('thns') : $data['thnsertifikasi']; ?>">
                                                        </div>
                                                    </div>
                                                    <?php if (session()->get('level') == '2') { ?>
                                                        <div class="col-md-12 pr-0">
                                                            <div class="form-group">
                                                                <label>Mata Pelajaran<span class="text-danger">*</span></label>
                                                                <select name="mapelserti" class="js-example-language" style="width: 100%">
                                                                    <option><?= (old('mapelserti')) ? old('mapelserti') : $data['mapel_serti']; ?></option>
                                                                    <?php foreach ($mapel as $r) : ?>
                                                                        <option value="<?= $r['mapel'] ?>"><?= $r['mapel'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <small class="form-text text-danger">
                                                                    <?= $validation->getError('mapelserti'); ?></small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 pr-0">
                                                            <div class="form-group">
                                                                <label>Tugas Tambahan</label>
                                                                <textarea name="tgstambah" type="text" class="form-control" autocomplete="off" placeholder="Tugas Tambah"><?= (old('tgstambah')) ? old('tgstambah') : $data['tgs_tambah']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('tmtguru')) ? 'has-error' : ''; ?>">
                                                        <label>TMT Guru<span class="text-danger">*</span></label>
                                                        <input type="date" name="tmtguru" class="form-control" autocomplete="off" value="<?= (old('tmtguru')) ? old('tmtguru') : $data['tmtguru']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('tmtguru'); ?></small>
                                                    </div>
                                                </div>
                                                <?php if (session()->get('level') == '2') { ?>
                                                    <div class="col-md-6 pr-0">
                                                        <label>Penyetaraan / Inpassing<span class="text-danger">*</span></label>
                                                        <div class="form-group <?= ($validation->hasError('jabatan')) ? 'has-error' : ''; ?>">
                                                            <select name="jabatan" class="form-control">
                                                                <option><?= (old('jabatan')) ? old('jabatan') : $data['jabatan']; ?></option>
                                                                <option value="Guru Dewasa">Guru Dewasa</option>
                                                                <option value="Guru Madya">Guru Madya</option>
                                                            </select>
                                                            <small class="form-text text-danger">
                                                                <?= $validation->getError('jabatan'); ?></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group <?= ($validation->hasError('nosk')) ? 'has-error' : ''; ?>">
                                                            <label>Nomor SK<span class="text-danger">*</span></label>
                                                            <input type="text" name="nosk" class="form-control" autocomplete="off" placeholder="Nomor SK" value="<?= (old('nosk')) ? old('nosk') : $data['no_sk']; ?>">
                                                            <small class="form-text text-danger">
                                                                <?= $validation->getError('nosk'); ?></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group  <?= ($validation->hasError('tglsk')) ? 'has-error' : ''; ?>">
                                                            <label>Tanggal SK<span class="text-danger">*</span></label>
                                                            <input type="date" name="tglsk" class="form-control" autocomplete="off" value="<?= (old('tglsk')) ? old('tglsk') : $data['tgl_sk']; ?>">
                                                            <small class="form-text text-danger">
                                                                <?= $validation->getError('tglsk'); ?></small>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('tmtsekolah')) ? 'has-error' : ''; ?>">
                                                        <label>TMT Sekolah<span class="text-danger">*</span></label>
                                                        <input type="date" name="tmtsekolah" class="form-control" autocomplete="off" value="<?= (old('tmtsekolah')) ? old('tmtsekolah') : $data['tmtsekolah']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('tmtsekolah'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('jumlahjam')) ? 'has-error' : ''; ?>">
                                                        <label>Jumlah Jam/Minggu<span class="text-danger">*</span></label>
                                                        <input type="text" name="jumlahjam" class="form-control" autocomplete="off" value="<?= (old('jumlahjam')) ? old('jumlahjam') : $data['jumlah_jam']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('jumlahjam'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('kehadiran')) ? 'has-error' : ''; ?>">
                                                        <label>Kehadiran</label>
                                                        <input type="text" name="kehadiran" class="form-control" autocomplete="off" placeholder="% Kehadiran" value="<?= (old('kehadiran')) ? old('kehadiran') : $data['kehadiran']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('kehadiran'); ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-diklat" role="tabpanel" aria-labelledby="pills-diklat-tab">
                                        <div class="card-body">
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group">
                                                    <label>Nama Diklat</label>
                                                    <input type="text" name="diklat" class="form-control" autocomplete="off" placeholder="Nama Diklat" value="<?= (old('diklat')) ? old('diklat') : $data['nmdiklat']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group">
                                                    <label>Tempat Diklat</label>
                                                    <textarea type="text" name="tdiklat" class="form-control" autocomplete="off" placeholder="Tempat Diklat"><?= (old('tdiklat')) ? old('tdiklat') : $data['tdiklat']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group">
                                                    <label>Tahun Diklat</label>
                                                    <input type="text" name="thndiklat" class="form-control" autocomplete="off" placeholder="Tahun Diklat" value="<?= (old('thndiklat')) ? old('thndiklat') : $data['thndiklat']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group">
                                                    <label>Lama Diklat</label>
                                                    <input type="text" name="lmdiklat" class="form-control" autocomplete="off" placeholder="Lama Diklat (Jam)" value="<?= (old('lmdiklat')) ? old('lmdiklat') : $data['lmdiklat']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-kontak" role="tabpanel" aria-labelledby="pills-kontak-tab">
                                        <div class="card-body">
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('nohp')) ? 'has-error' : ''; ?>">
                                                    <label>Nomor Handphone Aktif<span class="text-danger">*</span></label>
                                                    <input type="text" name="nohp" class="form-control" autocomplete="off" value="<?= (old('nohp')) ? old('nohp') : $data['nohp']; ?>">
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('nohp'); ?></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('email')) ? 'has-error' : ''; ?>">
                                                    <label>Email Aktif<span class="text-danger">*</span></label>
                                                    <input type="text" name="email" class="form-control" placeholder="example@gmail.com" autocomplete="off" value="<?= (old('email')) ? old('email') : $data['email']; ?>">
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('email'); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-vaksin" role="tabpanel" aria-labelledby="pills-vaksin-tab">
                                        <div class="card-body">
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group <?= ($validation->hasError('stsvaksin')) ? 'has-error' : ''; ?>">
                                                    <label>Status Vaksin<span class="text-danger">*</span></label>
                                                    <select name="stsvaksin" class="form-control" onchange=" if (this.selectedIndex==2 || this.selectedIndex==3){ document.getElementById('view').style.display='inline' }else { document.getElementById('view').style.display='none' };">
                                                        <option><?= (old('stsvaksin')) ? old('stsvaksin') : $data['sts_vaksin']; ?></option>
                                                        <option value="Belum">Belum</option>
                                                        <option value="Dosis I">Dosis I</option>
                                                        <option value="Dosis II">Dosis II</option>
                                                    </select>
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('stsvaksin'); ?></small>
                                                </div>
                                            </div>
                                            <div id="view">
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group">
                                                        <label>Tanggal Vaksinasi</label>
                                                        <input type="date" name="tglvaksin" class="form-control" autocomplete="off" value="<?= (old('tglvaksin')) ? old('tglvaksin') : $data['tgl_vaksin']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group">
                                                        <label>Lokasi Vaksin</label>
                                                        <input type="text" name="lokvaksin" class="form-control" placeholder="Lokasi Vaksinasi" autocomplete="off" value="<?= (old('lok_vaksin')) ? old('lok_vaksin') : $data['lok_vaksin']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <div class="card-body">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="<?= base_url('media/fotoguru/' . $data['foto']); ?>" width="200px" class="img-thumbnail rounded img-preview">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label>Pilih Foto</label>
                                                        <div class="form-group form-group-default <?= ($validation->hasError('foto')) ? 'has-error' : ''; ?>">
                                                            <input type="file" name="foto" class="form-control-file" id="foto" onchange="previewImg();" accept=".png, .jpg, .jpeg">
                                                            <small class="form-text text-danger">
                                                                <?= $validation->getError('foto'); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-action">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                                            <a href="<?= base_url('/data-guru') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                            <a href="<?= base_url('data-guru') ?>" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            <?php endif ?>
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