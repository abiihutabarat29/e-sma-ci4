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
                <form action="<?= base_url('profil-sekolah/save') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
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
                                <input type="text" name="nss" class="form-control" autocomplete="off" placeholder="NSS" value="<?= old('nss'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('nss'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group <?= ($validation->hasError('nds')) ? 'has-error' : ''; ?>">
                                <input type="text" name="nds" class="form-control" autocomplete="off" placeholder="NDS" value="<?= old('nds'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('nds'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= ($validation->hasError('nosiop')) ? 'has-error' : ''; ?>">
                                <input type="text" name="nosiop" class="form-control" autocomplete="off" placeholder="Nomor SIOP" value="<?= old('nosiop'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('nosiop'); ?></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group <?= ($validation->hasError('akreditas')) ? 'has-error' : ''; ?>">
                                <label>Akreditas</label>
                                <select name="akreditas" class="form-control">
                                    <option selected disabled><?= (old('akreditas')) ? old('akreditas') : ".::Pilih Akreditas::." ?></option>
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
                                <input type="text" name="thnberdiri" class="form-control" autocomplete="off" placeholder="Tahun Berdiri" value="<?= old('thnberdiri'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('thnberdiri'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= ($validation->hasError('nosk')) ? 'has-error' : ''; ?>">
                                <input type="text" name="nosk" class="form-control" autocomplete="off" placeholder="Nomor SK Pendirian" value="<?= old('nosk'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('nosk'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= ($validation->hasError('tglsk')) ? 'has-error' : ''; ?>">
                                <label>Tanggal SK</label>
                                <input type="date" name="tglsk" class="form-control" autocomplete="off" value="<?= old('tglsk'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('tglsk'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= ($validation->hasError('kdpos')) ? 'has-error' : ''; ?>">
                                <input type="text" name="kdpos" class="form-control" autocomplete="off" placeholder="Kode Pos" value="<?= old('kdpos'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kdpos'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= ($validation->hasError('standar')) ? 'has-error' : ''; ?>">
                                <label>Standar Sekolah Bertaraf</label>
                                <select name="standar" class="form-control">
                                    <option selected disabled><?= (old('standar')) ? old('standar') : ".::Pilih Standar::." ?></option>
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
                                    <option selected disabled><?= (old('waktub')) ? old('waktub') : ".::Pilih Waktu Belajar::." ?></option>
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
                                    <option selected disabled><?= (old('status')) ? old('status') : ".::Pilih Status::." ?></option>
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
                                    <option selected disabled><?= (old('kabupaten')) ? old('kabupaten') : ".::Pilih Kabupaten::." ?></option>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kabupaten'); ?></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group <?= ($validation->hasError('kecamatan')) ? 'has-error' : ''; ?>">
                                <label>Kecamatan</label>
                                <select class="form-control" name="kecamatan" id="kecamatan">
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kecamatan'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('alamat')) ? 'has-error' : ''; ?>">
                                <textarea type="text" name="alamat" class="form-control" autocomplete="off" placeholder="Alamat Lengkap Sekolah"><?= old('alamat'); ?></textarea>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('alamat'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('telp')) ? 'has-error' : ''; ?>">
                                <input type="text" name="telp" class="form-control" autocomplete="off" placeholder="Telepon/HP" value="<?= old('telp'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('telp'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('kepsek')) ? 'has-error' : ''; ?>">
                                <input type="text" name="kepsek" class="form-control" autocomplete="off" placeholder="Nama Kepala Sekolah" value="<?= old('kepsek'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kepsek'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('email')) ? 'has-error' : ''; ?>">
                                <input type="text" name="email" class="form-control" placeholder="Email (example@gmail.com)" autocomplete="off" value="<?= old('email'); ?>">
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
                                <input type="text" name="web" class="form-control" autocomplete="off" placeholder="Alamat Web (https://example.ac.id)" value="<?= old('web'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('web'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <<?= ($validation->hasError('namayys')) ? 'has-error' : ''; ?>">
                                <input type="text" name="namayys" class="form-control" autocomplete="off" placeholder="Nama Yayasan Perguruan" value="<?= old('namayys'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('namayys'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('alamatyys')) ? 'has-error' : ''; ?>">
                                <textarea type="text" name="alamatyys" class="form-control" autocomplete="off" placeholder="Alamat Yayasan"><?= old('alamatyys'); ?></textarea>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('alamatyys'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <img class="img-thumbnail rounded img-preview" src="<?= base_url('media/profil/blank.png'); ?>" width="220px" alt="Foto">
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
                                <img class="img-thumbnail rounded img-preview-kep" src="<?= base_url('media/kepsek/blank.png'); ?>" width="150px" alt="Foto">
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group form-group-default">
                                    <label>Pilih Foto</label>
                                    <input type="file" name="fotoks" class="form-control-file" id="foto-kep" onchange="previewImg2();" accept=".png, .jpg, .jpeg">
                                    <small class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <h4>Pilih Lokasi Sekolah<span class="text-danger">*</span></h4>
                        <div id="map" style='width: 100%; height: 300px;'></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('lg')) ? 'has-error' : ''; ?>">
                                <h4>Longitude<span class="text-danger">*</span></h4>
                                <input type="text" name="lg" class="form-control" id="longitude" placeholder="Longitude (Google Maps)" value="<?= old('lg'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('lg'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= ($validation->hasError('lt')) ? 'has-error' : ''; ?>">
                                <h4>Latitude<span class="text-danger">*</span></h4>
                                <input type="text" name="lt" class="form-control" id="latitude" placeholder="Latitude (Google Maps)" value="<?= old('lt'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('lt'); ?></small>
                            </div>
                        </div>
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
<!-- Leafletjs-->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script>
    var map = L.map('map').setView([3.1728602225005167, 99.4195668109296], 10);

    var tiles = L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

    // Get Coordinat Location
    var latInput1 = document.querySelector("[name=latitude]");
    var latInput2 = document.querySelector("[name=longitude]");

    var curLocation = [3.1728602225005167, 99.4195668109296];

    map.attributionControl.setPrefix(false);

    var marker = L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $("#latitude").val(position.lat);
        $("#longitude").val(position.lng).keyup();
    });
    map.addLayer(marker);

    map.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        latInput1.value = lat;
        latInput2.value = lng;
    });
</script>