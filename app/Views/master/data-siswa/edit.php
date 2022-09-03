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
                <a href="<?= base_url('data-siswa') ?>"><?= $titlebar ?></a>
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
                    <form action="<?= base_url('data-siswa/update/' . $data['id']); ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('nisn')) ? 'has-error' : ''; ?>">
                                        <input name="nisn" type="text" class="form-control" autocomplete="off" placeholder="NISN" value="<?= (old('nisn')) ? old('nisn') : $data['nisn']; ?>" autofocus>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('nisn'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('nmsiswa')) ? 'has-error' : ''; ?>">
                                        <input name="nmsiswa" type="text" class="form-control" autocomplete="off" placeholder="Nama Siswa" value="<?= (old('nmsiswa')) ? old('nmsiswa') : $data['nama']; ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('nmsiswa'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('tlahir')) ? 'has-error' : ''; ?>">
                                        <textarea name="tlahir" type="text" class="form-control" autocomplete="off" placeholder="Tempat Lahir"><?= (old('tlahir')) ? old('tlahir') : $data['tempat_lahir']; ?></textarea>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('tlahir'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('tgllhr')) ? 'has-error' : ''; ?>">
                                        <label>Tanggal Lahir</label>
                                        <input name="tgllhr" type="date" class="form-control" autocomplete="off" value="<?= (old('tgllhr')) ? old('tgllhr') : $data['tgl_lahir']; ?>">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('tgllhr'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-check <?= ($validation->hasError('jenkel')) ? 'has-error' : ''; ?>">
                                        <label>Jenis Kelamin</label><br />
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
                                <div class="col-md-2 pr-0">
                                    <div class="form-group  <?= ($validation->hasError('umur')) ? 'has-error' : ''; ?>">
                                        <label>Umur</label>
                                        <select name="umur" class="form-control">
                                            <option><?= (old('umur')) ? old('umur') : $data['umur']; ?></option>
                                            <!-- <option value="13">13</option> -->
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                        </select>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('umur'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('agama')) ? 'has-error' : ''; ?>">
                                        <label>Agama</label>
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
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('alamat')) ? 'has-error' : ''; ?>">
                                        <textarea type="text" name="alamat" class="form-control" autocomplete="off" placeholder="Alamat"><?= (old('alamat')) ? old('alamat') : $data['alamat']; ?></textarea>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('alamat'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('kelas')) ? 'has-error' : ''; ?>">
                                        <label>Kelas</label>
                                        <select name="kelas" class="form-control">
                                            <option><?= (old('kelas')) ? old('kelas') : $data['kelas']; ?></option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('kelas'); ?></small>
                                    </div>
                                </div>
                                <?php if (session()->get('level') == '1') { ?>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('jurusan')) ? 'has-error' : ''; ?>">
                                            <label>Jurusan</label>
                                            <select name="jurusan" class="form-control">
                                                <option><?= (old('jurusan')) ? old('jurusan') : $data['jurusan']; ?></option>
                                                <option value="IPA">IPA</option>
                                                <option value="IPS">IPS</option>
                                                <option value="Bahasa">Bahasa</option>
                                            </select>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('jurusan'); ?></small>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (session()->get('level') == '2') { ?>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('paketk')) ? 'has-error' : ''; ?>">
                                            <select name="paketk" class="form-control">
                                                <option><?= (old('paketk')) ? old('paketk') : $data['pkeahlian']; ?></option>
                                                <option value="TKRO">Teknik Kendaraan Ringan Otomotif</option>
                                                <option value="TBSM">Teknik dan Bisnis Sepeda Motor</option>
                                                <option value="OTP">Otomatisasi dan TataKelola Perkantoran</option>
                                                <option value="TKJ">OTeknik Komputer dan Jaringan</option>
                                            </select>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('paketk'); ?></small>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('status')) ? 'has-error' : ''; ?>">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option><?= (old('status')) ? old('status') : $data['status']; ?></option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Non-Aktif">Non-Aktif</option>
                                        </select>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('status'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nohp" class="form-control" autocomplete="off" placeholder="Nomor Handphone" value="<?= (old('nohp')) ? old('nohp') : $data['nohp']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('thnmasuk')) ? 'has-error' : ''; ?>">
                                        <select name="thnmasuk" class="form-control" style="width: 100%">
                                            <option><?= (old('thnmasuk')) ? old('thnmasuk') : $data['tahun_msk']; ?></option>
                                            <?php foreach ($tahun as $r) : ?>
                                                <option value="<?= $r['tahun_akademik'] ?>"><?= $r['tahun_akademik'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('thnmasuk'); ?></small>
                                    </div>
                                </div>
                                <?php if (session()->get('level') == '2') { ?>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('pip')) ? 'has-error' : ''; ?>">
                                            <select name="pip" class="form-control">
                                                <option><?= (old('pip')) ? old('pip') : $data['program_pip']; ?></option>
                                                <option value="KPS">KPS</option>
                                                <option value="KIP">KIP</option>
                                                <option value="PKH">PKH</option>
                                            </select>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('pip'); ?></small>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-md-6">
                                    <div class="form-group <?= ($validation->hasError('stsvaksin')) ? 'has-error' : ''; ?>">
                                        <label>Status Vaksinasi</label>
                                        <select name="stsvaksin" class="form-control">
                                            <option><?= (old('stsvaksin')) ? old('stsvaksin') : $data['sts_vaksin']; ?></option>
                                            <option value="Belum">Belum</option>
                                            <option value="Dosis I">Dosis I</option>
                                            <option value="Dosis II">Dosis II</option>
                                        </select>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('stsvaksin'); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                            <a href="<?= base_url('/data-siswa') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
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
                        <a href="<?= base_url('data-siswa') ?>" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
</div>