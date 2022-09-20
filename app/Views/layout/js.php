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
    (function($) {
        "use strict"
        //Proloader
        $(window).on('load', function() {
            $('#preloader-active').delay(450).fadeOut('slow');
            $('body').delay(450).css({
                'overflow': 'visible'
            });
        });
    })(jQuery);
</script>
<script>
    $(document).ready(function() {
        //select all
        $('#select_all').click(function() {
            if ($(this).is(':checked')) {
                $('.chk-box').prop('checked', true);
            } else {
                $('.chk-box').prop('checked', false);
            }
        });
        //naik kelas
        $('.formnaikkelas').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnnaikkelas').attr('disable', 'disabled');
                    $('.btnnaikkelas').html('<i class="fa fa-spin fa-spinner"></i> <i>sedang diproses . . .</i>');
                },
                complete: function() {
                    setTimeout(() => {
                        $('.btnnaikkelas').removeAttr('disable');
                        $('.btnnaikkelas').html('<i class="fa fa-arrow-up"></i> Naik Kelas');
                    }, 1500);
                },
                success: function(response) {
                    setTimeout(() => {
                        if (response.error) {
                            if (response.error.naikkelas) {
                                $('.nkelas').addClass('has-error');
                                $('.errorNaikkelas').html(response.error.naikkelas);
                            } else {
                                $('.nkelas').removeClass('has-error');
                                $('.errorNaikkelas').html('');
                            }
                            if (response.error.id) {
                                $('.errorSiswa').html(response.error.id);
                            } else {
                                $('.errorSiswa').html('');
                            }
                        }
                    }, 1500);
                    setTimeout(() => {
                        if (response.sukses) {
                            swal({
                                text: response.sukses,
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-success",
                                    },
                                },
                            });
                            setTimeout(() => {
                                window.location.href = ("<?= base_url('data-siswa/naik-kelas') ?>");
                            }, 2000);
                        }
                    }, 2000);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
            return false;
        })
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
                            '<br><select class="form-control"><option value="" selected disabled>::.Filter Kelas::.</option></select>'
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
            $('#nama_sekolah').val(nmsiswa.nama_sekolah);
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
            $('#nama_sekolah').val(nmsiswa.nama_sekolah);
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
    $(".js-example-language").select2({
        theme: "bootstrap-5",
    });
</script>
<script>
    var btnGenerate = document.getElementById('generate');
    var btnSelesai = document.getElementById('selesai');

    const cekdata = () => {
        $('#generate').html('<i class="fa fa-spin fa-spinner"></i><i>sedang mengecek data . . .</i>');
    }
    const start = () => {
        setTimeout(() => {
            $('#generate').html('<i class="fa fa-spin fa-spinner"></i><i>sedang mengenerate . . .</i>');
        }, 4000);
    }
    const end = () => {
        btnGenerate.style.display = 'none';
        btnSelesai.style.display = 'inline';
        $('#selesai').html('<i class="fa fa-check"></i><i>selesai . . .</i>');
    }
    const back = () => {
        btnGenerate.style.display = 'inline';
        btnSelesai.style.display = 'none';
        $('#generate').html('Generate');
    }

    // const generate = () => {
    //     $(document).ready(function() {
    //         var url = "<?= base_url('generate/export') ?>";
    //         $.get(url);
    //     });
    // }

    const generate = () => {
        const Url = "<?= base_url('generate/export') ?>";
        $.ajax({
            url: Url,
            method: GET,
            success: function() {
                // start();
                // setTimeout(function() {
                //     end();
                //     generate();
                // }, 3000);
            },
            error: function() {
                // swal({
                //     text: error,
                //     icon: "error",
                //     buttons: {
                //         confirm: {
                //             className: "btn btn-success",
                //         },
                //     },
                // });
            }
        })
    }

    function proses() {
        cekdata();
        start();
        setTimeout(function() {
            end();
            generate();
        }, 8000);
        setTimeout(function() {
            back();
        }, 15000);
    }
</script>
<script type="text/javascript">
    window.onload = function() {
        jam();
    }

    function jam() {
        var e = document.getElementById('jam'),
            d = new Date(),
            h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = h + ':' + m + ':' + s;

        setTimeout('jam()', 1000);
    }

    function set(e) {
        e = e < 10 ? '0' + e : e;
        return e;
    }
</script>