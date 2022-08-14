<footer class="footer">
    <center>
        <div class="copyright ml-auto">
            <span>Copyright &copy; <?= date('Y'); ?> Copyright © 2022 e-sekolah versi 1.0</span>
        </div>
    </center>
</footer>
</div>
<!--   Core JS Files   -->
<script src="<?= base_url(); ?>/template/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/js/core/popper.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Chart JS -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/chart.js/chart.min.js"></script>
<!-- jQuery Sparkline -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<!-- Chart Circle -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/chart-circle/circles.min.js"></script>
<!-- Datatables -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Bootstrap Notify -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<!-- jQuery Vector Maps -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- Sweet Alert -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/js/plugin/sweetalert/sweetscript.js"></script>
<!-- Atlantis JS -->
<script src="<?= base_url(); ?>/template/assets/js/atlantis.min.js"></script>
<!-- Select 2 -->
<script src="<?= base_url(); ?>/vendor/select2/dist/js/select2.min.js"></script>
<!-- Select Picker -->
<script src="<?= base_url(); ?>/vendor/selectpicker/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        $('#select_all').on('click', function() {
            if (this.checked) {
                $('.chk-box').each(function() {
                    this.checked = true;
                });
            } else {
                $('.chk-box').each(function() {
                    this.checked = false;
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});

        $('#multi-filter-select').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action =
            '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>

<script>
    Circles.create({
        id: "circles-1",
        radius: 45,
        value: 60,
        maxValue: 100,
        width: 7,
        text: 5,
        colors: ["#f1f1f1", "#FF9E27"],
        duration: 400,
        wrpClass: "circles-wrp",
        textClass: "circles-text",
        styleWrapper: true,
        styleText: true,
    });

    Circles.create({
        id: "circles-2",
        radius: 45,
        value: 70,
        maxValue: 100,
        width: 7,
        text: 36,
        colors: ["#f1f1f1", "#2BB930"],
        duration: 400,
        wrpClass: "circles-wrp",
        textClass: "circles-text",
        styleWrapper: true,
        styleText: true,
    });

    Circles.create({
        id: "circles-3",
        radius: 45,
        value: 40,
        maxValue: 100,
        width: 7,
        text: 12,
        colors: ["#f1f1f1", "#F25961"],
        duration: 400,
        wrpClass: "circles-wrp",
        textClass: "circles-text",
        styleWrapper: true,
        styleText: true,
    });

    var totalIncomeChart = document
        .getElementById("totalIncomeChart")
        .getContext("2d");

    var mytotalIncomeChart = new Chart(totalIncomeChart, {
        type: "bar",
        data: {
            labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
            datasets: [{
                label: "Total Income",
                backgroundColor: "#ff9e27",
                borderColor: "rgb(23, 125, 255)",
                data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: false, //this will remove only the label
                    },
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                }, ],
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                }, ],
            },
        },
    });

    $("#lineChart").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
    });
</script>
<script>
    $('#displayNotif').on('click', function() {
        var placementFrom = 'top';
        var placementAlign = 'center'
        var state = 'success';
        var style = 'withicon';
        var content = {};

        content.message = 'Berhasil menambahkan data kecamatan';
        content.title = 'Notifikasi';
        content.icon = 'fa fa-bell';

        $.notify(content, {
            type: state,
            placement: {
                from: placementFrom,
                align: placementAlign
            },
            time: 100,
            delay: 0,
        });
    });
</script>
<script>
    // api data siswa - buku induk sma
    $('#tamat').on('change', (event) => {
        getSiswaTamat(event.target.value).then(nmsiswa => {
            $('#nisn').val(nmsiswa.nisn);
            $('#nama').val(nmsiswa.nama);
            $('#tlahir').val(nmsiswa.tempat_lahir);
            $('#tgllhr').val(nmsiswa.tgl_lahir);
            $('#jenkel').val(nmsiswa.jenis_kel);
            $('#agama').val(nmsiswa.agama);
            $('#alamat').val(nmsiswa.alamat);
            $('#kelas').val(nmsiswa.kelas);
            $('#jurusan').val(nmsiswa.jurusan);
            $('#nohp').val(nmsiswa.nohp);
            $('#thnmasuk').val(nmsiswa.tahun_msk);
        });
    });
    async function getSiswaTamat(id) {
        let response = await fetch('/api/data-siswa/' + id)
        let data = await response.json();
        return data;
    }
</script>
<script>
    // api data siswa - buku induk smk
    $('#tamatsmk').on('change', (event) => {
        getSiswaTamat(event.target.value).then(nmsiswa => {
            $('#nisn').val(nmsiswa.nisn);
            $('#nama').val(nmsiswa.nama);
            $('#tlahir').val(nmsiswa.tempat_lahir);
            $('#tgllhr').val(nmsiswa.tgl_lahir);
            $('#jenkel').val(nmsiswa.jenis_kel);
            $('#agama').val(nmsiswa.agama);
            $('#alamat').val(nmsiswa.alamat);
            $('#kelas').val(nmsiswa.kelas);
            $('#paketk').val(nmsiswa.pkeahlian);
            $('#nohp').val(nmsiswa.nohp);
            $('#thnmasuk').val(nmsiswa.tahun_msk);
        });
    });
    async function getSiswaTamat(id) {
        let response = await fetch('/api/data-siswa/' + id)
        let data = await response.json();
        return data;
    }
</script>
<script>
    // api data siswa - data siswa keluar sma
    $('#siswa').on('change', (event) => {
        getSiswa(event.target.value).then(nmsiswa => {
            $('#nisn').val(nmsiswa.nisn);
            $('#nama').val(nmsiswa.nama);
            $('#jenkel').val(nmsiswa.jenis_kel);
            $('#kelas').val(nmsiswa.kelas);
            $('#jurusan').val(nmsiswa.jurusan);
        });
    });
    async function getSiswa(id) {
        let response = await fetch('/api/data-siswa/' + id)
        let data = await response.json();
        return data;
    }
</script>
<script>
    // api data siswa - data siswa keluar smk
    $('#siswasmk').on('change', (event) => {
        getSiswa(event.target.value).then(nmsiswa => {
            $('#nisn').val(nmsiswa.nisn);
            $('#nama').val(nmsiswa.nama);
            $('#jenkel').val(nmsiswa.jenis_kel);
            $('#kelas').val(nmsiswa.kelas);
            $('#paketk').val(nmsiswa.pkeahlian);
        });
    });
    async function getSiswa(id) {
        let response = await fetch('/api/data-siswa/' + id)
        let data = await response.json();
        return data;
    }
</script>
<script>
    // api data sekolah
    $('#sekolah').on('change', (event) => {
        getSekolah(event.target.value).then(nmsekolah => {
            $('#npsn').val(nmsekolah.npsn);
            $('#jenjang').val(nmsekolah.jenjang);
            $('#nmsekolah').val(nmsekolah.sekolah);
        });
    });
    async function getSekolah(id) {
        let response = await fetch('/api/data-sekolah/' + id)
        let data = await response.json();
        return data;
    }
</script>
<script>
    //api data kabupaten
    function dataKabupaten() {
        $('#kabupaten').select2({
            minimumInputLength: 0,
            allowClear: true,
            theme: "bootstrap-5",
            placeholder: '.::Pilih Kabupaten::.',
            ajax: {
                dataType: 'json',
                url: "<?= base_url('profil-sekolah/kabupaten') ?>",
                delay: 150,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    }
                }
            }
        });
        $(document).ready(function() {
            $("#kabupaten").change(function() {
                var url = "<?= base_url('profil-sekolah/kecamatan'); ?>/" + $(this).val();
                $('#kecamatan').load(url);
                $('#kecamatan').select2({
                    theme: "bootstrap-5"
                });
                return false;
            })
        });
        // $('#kabupaten').change(function(e) {
        //     $.ajax({
        //         type: post,
        //         url: "<?= base_url('profil-sekolah/kecamatan') ?>",
        //         data: {
        //             kabupaten: $(this).val()
        //         },
        //         dataType: 'json',
        //         success: function(response) {
        //             if (response.data) {
        //                 $('#kecamatan').html(response.data);
        //                 $('#kecamatan').select2();
        //             }
        //         },
        //         error: function(xhr, thrownError) {
        //             alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        //         }
        //     })
        // });
    }
    $(document).ready(function() {
        dataKabupaten();
    });
</script>
<script>
    //api data kecamatan
    function dataKecamatan() {
        $('#kecamatan').select2({
            minimumInputLength: 0,
            allowClear: true,
            theme: "bootstrap-5",
            placeholder: '.::Pilih Kecamatan::.',
            ajax: {
                dataType: 'json',
                url: "<?= base_url('profil-sekolah/kecamatan') ?>",
                delay: 150,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    }
                }
            }
        });
    }
    $(document).ready(function() {
        dataKecamatan();
    });
</script>
<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const img = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            img.src = e.target.result;
        }
    }

    function previewImg2() {
        const foto = document.querySelector('#foto-kep');
        const img = document.querySelector('.img-preview-kep');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            img.src = e.target.result;
        }
    }
</script>
<script>
    var map = L.map('map').setView([3.1728602225005167, 99.4195668109296], 14);

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
<script>
    $(".js-example-language").select2({
        theme: "bootstrap-5",
    });
</script>
</body>

</html>