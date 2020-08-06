<!-- jQuery -->
<script src="<?php echo base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets'); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets'); ?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets'); ?>/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!--<script src="--><?php //echo base_url('assets'); ?><!--/plugins/jqvmap/jquery.vmap.min.js"></script>-->
<!--<script src="--><?php //echo base_url('assets'); ?><!--/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets'); ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets'); ?>/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets'); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets'); ?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url('assets'); ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!--DATA TABLE JS BAŞLANGIÇ-->
<script src="<?php echo base_url('assets'); ?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!--Kullanıcı Onaylama Switch JS-->
<script src="<?php echo base_url('assets'); ?>/plugins/switchery/switchery.min.js"></script>
<!--Admin Saat Seçim -->
<script src="<?php echo base_url('assets'); ?>/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!--TOAST DB TARİH SAAT KONTROL UYARI BALONU-->
<script src="<?php echo base_url('assets'); ?>/plugins/toastr/toastr.min.js"></script>



<script>
    $(function () {
        $('#yeniOptik_tbl').DataTable({
            "language": {
                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "İşleniyor...",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });

        // $('#tumOptikler').DataTable();
        $('#okunanOptik').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            "language": {
                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "İşleniyor...",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });
        $('#kullanici').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "language": {
                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "İşleniyor...",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });
        $('#bekleyen').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            "language": {
                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "İşleniyor...",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });
        $('#kullaniciTum').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            "language": {
                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "İşleniyor...",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });
        $('#deaktifKullanici').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": false,
            "language": {
                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "İşleniyor...",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });
        $('#islemdeki_optik').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": false,
            "language": {
                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "İşleniyor...",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });
        $('#randevu').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "language": {
                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "İşleniyor...",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });
        $('#tumOptikler').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "language": {
                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "İşleniyor...",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });
        $('#okunan').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "language": {
                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "İşleniyor...",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });
        $('#rapor').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "language": {
                "sDecimal":        ",",
                "sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
                "sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                "sInfoEmpty":      "Kayıt yok",
                "sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ".",
                "sLengthMenu":     "Sayfada _MENU_ kayıt göster",
                "sLoadingRecords": "Yükleniyor...",
                "sProcessing":     "İşleniyor...",
                "sSearch":         "Ara:",
                "sZeroRecords":    "Eşleşen kayıt bulunamadı",
                "oPaginate": {
                    "sFirst":    "İlk",
                    "sLast":     "Son",
                    "sNext":     "Sonraki",
                    "sPrevious": "Önceki"
                },
                "oAria": {
                    "sSortAscending":  ": artan sütun sıralamasını aktifleştir",
                    "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                },
                "select": {
                    "rows": {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            }
        });
    });
</script>
<!-- /// DATA TABLE JS BİTİŞ-->

<script>
    $(document).ready(function () {
        $('#kullanici_filter').addClass('float-right mr-5');
    });

    $(document).ready(function () {
        $('#tumOptikler_filter').addClass('float-right mr-5');
    });
    $(document).ready(function () {
        $('#randevu_filter').addClass('float-right');
    });
    $(document).ready(function () {
        $('#islemdeki_optik_filter').addClass('float-right');
    });
    $(document).ready(function () {
        $('#bekleyen_filter').addClass('float-right mr-3');
    });
    $(document).ready(function () {
        $('#okunan_filter').addClass('float-right mr-3');
    });
    $(document).ready(function () {
        $('#rapor_filter').addClass('float-right mr-3');
    });


</script>


<!-- KULLANICI AKTİF / DEAKTİF SWİTCH BUTON-->
<script>
    $(document).ready(function () {

        $(".js-switch").each(function () {
            new Switchery(this);
        })
        $("body").on("change",".js-switch",function () {
            var $completed = $(this).prop("checked");
            var $url = $(this).data("url");
            $.post($url,{completed : $completed},function(){
            });
        })
    })
</script>

<!--ADMİN TARİH / SAAT BELİRLEME-->
<script>
$('#reservation').daterangepicker({
    isInvalidDate: function(date) {
        return (date.day() == 0 || date.day() == 6);
    },
    "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Seç",
        "cancelLabel": "İptal",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Pz",
            "Pzt",
            "Sl",
            "Çrş",
            "Prş",
            "Cm",
            "Cmt"
        ],
        "monthNames": [
            "Ocak",
            "Şubat",
            "Mart",
            "Nisan",
            "Mayıs",
            "Haziran",
            "Temmuz",
            "Ağustos",
            "Eylül",
            "Ekim",
            "Kasım",
            "Aralık"
        ],
        "firstDay":1
    }
});
 </script>
<script>
$('#reservationBolumBazli').daterangepicker({
    isInvalidDate: function(date) {
        return (date.day() == 0 || date.day() == 6);
    },
    "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Seç",
        "cancelLabel": "İptal",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Pz",
            "Pzt",
            "Sl",
            "Çrş",
            "Prş",
            "Cm",
            "Cmt"
        ],
        "monthNames": [
            "Ocak",
            "Şubat",
            "Mart",
            "Nisan",
            "Mayıs",
            "Haziran",
            "Temmuz",
            "Ağustos",
            "Eylül",
            "Ekim",
            "Kasım",
            "Aralık"
        ],
        "firstDay":1
    }
});
 </script>

<!--SAAT EKLEME-->
<script>
    $('#timepicker').datetimepicker({
        format: 'HH:mm',
        enabledHours: [9,10,11,12,14,15,16,17],
        stepping: 30,
        value:''
    });
    $('#timepicker2').datetimepicker({
        format: 'HH:mm',
        enabledHours: [9,10,11,12,14,15,16,17],
        stepping: 30
    })
    $('#timepickerSing').datetimepicker({
        format: 'HH:mm',
        enabledHours: [9,10,11,12,14,15,16,17],
        stepping: 30
    })
    $('#timepickerSing2').datetimepicker({
        format: 'HH:mm',
        enabledHours: [9,10,11,12,14,15,16,17],
        stepping: 30
    })

</script>
<!--TARİH SAAT EKLENEMEDİ UYARISI-->
<script>
    $(document).ready(function() {
        var dbkontrol="<?php echo @$_SESSION['dbkontrol']; ?>";
        if (dbkontrol){
            toastr.error(dbkontrol)
        }
    });
</script>
<script>
    $(document).ready(function() {
        var successAdd="<?php echo @$_SESSION['successAdd']; ?>";
        if (successAdd){
            toastr.success(successAdd)
        }
    });
</script>



<script>
    $('#raporCek').click(function() {
        $("#liste tr").remove();
        $('#modals div').remove();

        $.post('<?php echo base_url('Raporlamalar/raporToplamOptik') ?>', {'tarih': $('#reservation').val()}, function (data) {
            var rows = JSON.parse(data);
            $('#ToplamOptik').text(rows[0]["optik_sayisi"]);
        });
        $.post('<?php echo base_url('Raporlamalar/raporBekleyenOptik') ?>', {'tarih': $('#reservation').val()}, function (data) {
            var rows = JSON.parse(data);
            $('#BekleyenOptik').text(rows[0]["optik_sayisi"]);
        });
        $.post('<?php echo base_url('Raporlamalar/rapor_YapilanIslem') ?>', {'tarih': $('#reservation').val()}, function (data) {
            var yapilanIslem = JSON.parse(data);
            for (var i = 0; i < yapilanIslem.length; i++) {
                var sayac = i;

                (function() {
                    var optikID = yapilanIslem[sayac]["optikID"];
                    var user_ad = yapilanIslem[sayac]["user_ad"];
                    var user_soyad = yapilanIslem[sayac]["user_soyad"];
                    var startDate = yapilanIslem[sayac]["startDate"];
                    var bolum_ad = yapilanIslem[sayac]["bolum_ad"];
                    var birim_ad = yapilanIslem[sayac]["birim_ad"];
                    var okumaTarih = yapilanIslem[sayac]["okundu_Tarih"];
                    var teslimEtmeTarih = yapilanIslem[sayac]["finishDate"];
                    var teslimAlmaTarih = yapilanIslem[sayac]["teslimAlma_Tarih"];
                    var optikSayisi = yapilanIslem[sayac]["optik_sayisi"];

                    $('#liste').append('<tr class="clickable-row" data-toggle="modal" data-target="#modal' + optikID + '" style="cursor:pointer" >' +
                                        '<td>' + startDate + '</td>' +
                                        '<td>' + user_ad + " " + user_soyad + '</td>' +
                                        '<td>' + birim_ad + '</td>' +
                                        '<td>' + bolum_ad + '</td>' +
                                        '</tr>');
                                    $('#modals').append(
                                        '<div class="modal fade" id="modal' + optikID + '">' +
                                        '<div class="modal-dialog">' +
                                        '<div class="modal-content">' +
                                        '<div class="modal-header">' +
                                        '<h4 class="modal-title text-center font-weight-light">Optik Detay ve İşlem Bilgileri</h4>' +
                                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                                        '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                        '</div>' +
                                        '<div class="modal-body">' +
                                        '<div class="row justify-content-around">' +
                                        '<div class="col-md-6"><div class="card card-primary"><div class="card-header">' +
                                        '<h3 class="card-title">Optik Detayları</h3>' +
                                        '</div>' +
                                        '<div class="card-body">' +
                                        '<i class="font-italic font-weight-bolder">Randevu Tarihi : </i></p>' + startDate + '</p><hr>' +
                                        '<i class="font-italic font-weight-bolder">Öğretim Görevlisi : </i><p>' + user_ad + " " + user_soyad + '</p><hr>' +
                                        '<i class="font-italic font-weight-bolder">Birim : </i><p>' + birim_ad + '</p><hr>' +
                                        '<i class="font-italic font-weight-bolder">Bölüm : </i><p>' + bolum_ad + '</p><hr>' +
                                        '<i class="font-italic font-weight-bolder">Optik Sayisi : </i><p>' + optikSayisi + '</p><hr>' +
                                        '</div></div></div>' +
                                        '<div class="col-md-6"><div class="card card-info"><div class="card-header">' +
                                        '<h3 class="card-title">Optik İşlemleri</h3>' +
                                        '</div>' +
                                        '<div class="card-body" id="cardbody'+ optikID+'">'+
                                        '</div></div></div>' +
                                        '</div></div>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>'
                                    );
                                    $.post('<?php echo base_url('Raporlamalar/teslimAlan') ?>', {'optikID': optikID }, function (gelenVeriTeslimAlan) {
                                        var teslimAlan = JSON.parse(gelenVeriTeslimAlan);
                                        if (teslimAlan.length == 0){
                                            $('#cardbody'+optikID).append(
                                                '<i class="font-italic font-weight-bolder text-primary">Optik Geliş Tarihi:</i><p> İşlem Yok </p><hr>'+
                                                '<i class="font-italic font-weight-bolder text-primary">Teslim Alan:</i><p> İşlem Yok </p><hr>'
                                            )
                                        }
                                        else
                                        {
                                            var teslimAlanAd = teslimAlan[0]["user_ad"];
                                            var teslimAlanSoyad = teslimAlan[0]["user_soyad"];
                                            $('#cardbody'+optikID).append(
                                                '<i class="font-italic font-weight-bolder text-primary">Optik Geliş Tarihi:</i><p>' + teslimAlmaTarih + '</p><hr>'+
                                                '<i class="font-italic font-weight-bolder text-primary">Teslim Alan:</i><p>' + teslimAlanAd +" "+teslimAlanSoyad +'</p><hr>'
                                            )
                                        }
                                        $.post('<?php echo base_url('Raporlamalar/okumaYapan') ?>', {'optikID': optikID }, function (gelenVeriOkuyan) {
                                           var okuyan = JSON.parse(gelenVeriOkuyan);
                                            if (okuyan.length == 0){
                                                $('#cardbody'+optikID).append(
                                                    '<i class="font-italic font-weight-bolder text-info">Okunma Tarihi:</i><p> İşlem Yok </p><hr>'+
                                                    '<i class="font-italic font-weight-bolder text-info">Okuyan:</i><p> İşlem Yok </p><hr>'
                                                )
                                            }
                                            else
                                            {
                                                var okuyanAd = okuyan[0]["user_ad"];
                                                var okuyanSoyad = okuyan[0]["user_soyad"];
                                                $('#cardbody'+optikID).append(
                                                '<i class="font-italic font-weight-bolder text-info">Okunma Tarihi</i><p>' +okumaTarih+'</p><hr>'+
                                                '<i class="font-italic font-weight-bolder text-info">Okuyan:</i><p>' +okuyanAd+" " + okuyanSoyad + '</p><hr>'
                                                )
                                            }

                                        });


                                        });
                                        $.post('<?php echo base_url('Raporlamalar/teslimEden') ?>', {'optikID': optikID }, function (gelenVeriTeslimEden) {
                                            var teslimEden = JSON.parse(gelenVeriTeslimEden);
                                            if (teslimEden.length == 0){
                                                $('#cardbody'+optikID).append(
                                                    '<i class="font-italic font-weight-bolder text-success">Optik İade Tarihi:</i><p> İşlem Yok </p><hr>'+
                                                    '<i class="font-italic font-weight-bolder text-success">Teslim Eden:</i><p> İşlem Yok </p><hr>'
                                                )
                                            }
                                            else
                                            {
                                                var teslimEdenAd = teslimEden[0]["user_ad"];
                                                var teslimEdenSoyad = teslimEden[0]["user_soyad"];
                                                $('#cardbody'+optikID).append(
                                                    '<i class="font-italic font-weight-bolder text-success">Optik İade Tarihi:</i><p>' + teslimEtmeTarih + '</p><hr>'+
                                                    '<i class="font-italic font-weight-bolder text-success">Teslim Eden:</i><p>' + teslimEdenAd +" "+teslimEdenSoyad +'</p><hr>'
                                                )
                                            }
                                        });

                                })();
            }
        });
    });
</script>
<script>
    $('#raporCekBolumBazli').click(function() {
        if($('#bolumGetir').val() == null){
            alert('Lütfen Bölüm Seçiniz.');
        }
        else{
            $("#listeBolumBazli tr").remove();
            $('#modalsBolumBazli div').remove();

            $.post('<?php echo base_url('Raporlamalar/raporToplamOptik') ?>', {'tarih': $('#reservationBolumBazli').val(),'bolumGetir' : $('#bolumGetir').val()}, function (data) {
                var rows = JSON.parse(data);
                $('#ToplamOptikBolum').text(rows[0]["optik_sayisi"]);
            });
            $.post('<?php echo base_url('Raporlamalar/raporBekleyenOptik') ?>', {'tarih': $('#reservationBolumBazli').val(),'bolumGetir' : $('#bolumGetir').val()}, function (data) {
                var rows = JSON.parse(data);
                $('#BekleyenOptikBolum').text(rows[0]["optik_sayisi"]);
            });
            $.post('<?php echo base_url('Raporlamalar/rapor_YapilanIslem') ?>', {'tarih': $('#reservationBolumBazli').val(),'bolumGetir' : $('#bolumGetir').val()}, function (data) {
                var yapilanIslem = JSON.parse(data);
                for (var i = 0; i < yapilanIslem.length; i++) {
                    var sayac = i;

                    (function() {
                        var optikID = yapilanIslem[sayac]["optikID"];
                        var user_ad = yapilanIslem[sayac]["user_ad"];
                        var user_soyad = yapilanIslem[sayac]["user_soyad"];
                        var startDate = yapilanIslem[sayac]["startDate"];
                        var bolum_ad = yapilanIslem[sayac]["bolum_ad"];
                        var birim_ad = yapilanIslem[sayac]["birim_ad"];
                        var okumaTarih = yapilanIslem[sayac]["okundu_Tarih"];
                        var teslimEtmeTarih = yapilanIslem[sayac]["finishDate"];
                        var teslimAlmaTarih = yapilanIslem[sayac]["teslimAlma_Tarih"];
                        var optikSayisi = yapilanIslem[sayac]["optik_sayisi"];

                        $('#listeBolumBazli').append('<tr class="clickable-row" data-toggle="modal" data-target="#modalBolumBazli' + optikID + '" style="cursor:pointer" >' +
                            '<td>' + startDate + '</td>' +
                            '<td>' + user_ad + " " + user_soyad + '</td>' +
                            '<td>' + birim_ad + '</td>' +
                            '<td>' + bolum_ad + '</td>' +
                            '</tr>');
                        $('#modalsBolumBazli').append(
                            '<div class="modal fade" id="modalBolumBazli' + optikID + '">' +
                            '<div class="modal-dialog">' +
                            '<div class="modal-content">' +
                            '<div class="modal-header">' +
                            '<h4 class="modal-title text-center font-weight-light">Optik Detay ve İşlem Bilgileri</h4>' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            '</button>' +
                            '</div>' +
                            '<div class="modal-body">' +
                            '<div class="row justify-content-around">' +
                            '<div class="col-md-6"><div class="card card-primary"><div class="card-header">' +
                            '<h3 class="card-title">Optik Detayları</h3>' +
                            '</div>' +
                            '<div class="card-body">' +
                            '<i class="font-italic font-weight-bolder">Randevu Tarihi : </i></p>' + startDate + '</p><hr>' +
                            '<i class="font-italic font-weight-bolder">Öğretim Görevlisi : </i><p>' + user_ad + " " + user_soyad + '</p><hr>' +
                            '<i class="font-italic font-weight-bolder">Birim : </i><p>' + birim_ad + '</p><hr>' +
                            '<i class="font-italic font-weight-bolder">Bölüm : </i><p>' + bolum_ad + '</p><hr>' +
                            '<i class="font-italic font-weight-bolder">Optik Sayisi : </i><p>' + optikSayisi + '</p><hr>' +
                            '</div></div></div>' +
                            '<div class="col-md-6"><div class="card card-info"><div class="card-header">' +
                            '<h3 class="card-title">Optik İşlemleri</h3>' +
                            '</div>' +
                            '<div class="card-body" id="cardbodyBolum'+ optikID+'">'+
                            '</div></div></div>' +
                            '</div></div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        );
                        $.post('<?php echo base_url('Raporlamalar/teslimAlan') ?>', {'optikID': optikID }, function (gelenVeriTeslimAlan) {
                            var teslimAlan = JSON.parse(gelenVeriTeslimAlan);
                            if (teslimAlan.length == 0){
                                $('#cardbodyBolum'+optikID).append(
                                    '<i class="font-italic font-weight-bolder text-primary">Optik Geliş Tarihi:</i><p> İşlem Yok </p><hr>'+
                                    '<i class="font-italic font-weight-bolder text-primary">Teslim Alan:</i><p> İşlem Yok </p><hr>'
                                )
                            }
                            else
                            {
                                var teslimAlanAd = teslimAlan[0]["user_ad"];
                                var teslimAlanSoyad = teslimAlan[0]["user_soyad"];
                                $('#cardbodyBolum'+optikID).append(
                                    '<i class="font-italic font-weight-bolder text-primary">Optik Geliş Tarihi:</i><p>' + teslimAlmaTarih + '</p><hr>'+
                                    '<i class="font-italic font-weight-bolder text-primary">Teslim Alan:</i><p>' + teslimAlanAd +" "+teslimAlanSoyad +'</p><hr>'
                                )
                            }
                            $.post('<?php echo base_url('Raporlamalar/okumaYapan') ?>', {'optikID': optikID }, function (gelenVeriOkuyan) {
                                var okuyan = JSON.parse(gelenVeriOkuyan);
                                if (okuyan.length == 0){
                                    $('#cardbodyBolum'+optikID).append(
                                        '<i class="font-italic font-weight-bolder text-info">Okunma Tarihi:</i><p> İşlem Yok </p><hr>'+
                                        '<i class="font-italic font-weight-bolder text-info">Okuyan:</i><p> İşlem Yok </p><hr>'
                                    )
                                }
                                else
                                {
                                    var okuyanAd = okuyan[0]["user_ad"];
                                    var okuyanSoyad = okuyan[0]["user_soyad"];
                                    $('#cardbodyBolum'+optikID).append(
                                        '<i class="font-italic font-weight-bolder text-info">Okunma Tarihi</i><p>' +okumaTarih+'</p><hr>'+
                                        '<i class="font-italic font-weight-bolder text-info">Okuyan:</i><p>' +okuyanAd+" " + okuyanSoyad + '</p><hr>'
                                    )
                                }

                            });


                        });
                        $.post('<?php echo base_url('Raporlamalar/teslimEden') ?>', {'optikID': optikID }, function (gelenVeriTeslimEden) {
                            var teslimEden = JSON.parse(gelenVeriTeslimEden);
                            if (teslimEden.length == 0){
                                $('#cardbodyBolum'+optikID).append(
                                    '<i class="font-italic font-weight-bolder text-success">Optik İade Tarihi:</i><p> İşlem Yok </p><hr>'+
                                    '<i class="font-italic font-weight-bolder text-success">Teslim Eden:</i><p> İşlem Yok </p><hr>'
                                )
                            }
                            else
                            {
                                var teslimEdenAd = teslimEden[0]["user_ad"];
                                var teslimEdenSoyad = teslimEden[0]["user_soyad"];
                                $('#cardbodyBolum'+optikID).append(
                                    '<i class="font-italic font-weight-bolder text-success">Optik İade Tarihi:</i><p>' + teslimEtmeTarih + '</p><hr>'+
                                    '<i class="font-italic font-weight-bolder text-success">Teslim Eden:</i><p>' + teslimEdenAd +" "+teslimEdenSoyad +'</p><hr>'
                                )
                            }
                        });

                    })();
                }
            });
        }
    });
</script>
<!--
Bu script kodunda bolumSilBirimSec id’li açılır menü değiştiğinde seçilen birimin id’sini almaktadır.
Ve bu değeri bolumGoster fonksiyonuna post etmektedir.
Daha sonra gelen diziyi for döngüsü ile gezerek verileri tek tek bolumSil id’sine sahip açılır menüye yazmaktadır.

-->
<script>
    $('#bolumSilBirimSec').change(function () {
        $("#bolumSil option").remove();
        var birim_id = $( "select#bolumSilBirimSec option:checked" ).val();
        $.post('<?php echo base_url('Ayarlar_admin/bolumGoster') ?>', {'birim_id': birim_id}, function (data) {
            var rows = JSON.parse(data);
            for (var i = 0;i<rows.length;i++){
                $('#bolumSil').append('<option value="'+rows[i]['bolum_id']+'">'+rows[i]['bolum_ad']+'</option>')
            }
        });
    });
</script>
<script>
    $('#BirimSec').change(function () {
        $("#bolumGetir option").remove();
        var birim_id = $( "select#BirimSec option:checked" ).val();
        $.post('<?php echo base_url('Raporlamalar/bolumGoster') ?>', {'birim_id': birim_id}, function (data) {
            var rows = JSON.parse(data);
            for (var i = 0;i<rows.length;i++){
                $('#bolumGetir').append('<option value="'+rows[i]['bolum_id']+'">'+rows[i]['bolum_ad']+'</option>')
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        var dbkontrol="<?php echo @$_SESSION['eklendi']; ?>";
        if (dbkontrol){
            toastr.success(dbkontrol)
        }
    });
</script>
<script>
    $(document).ready(function() {
        var dbkontrol="<?php echo @$_SESSION['silindi']; ?>";
        if (dbkontrol){
            toastr.success(dbkontrol)
        }
    });
</script>
<script>
    $(document).ready(function() {
        var dbkontrol="<?php echo @$_SESSION['hata']; ?>";
        if (dbkontrol){
            toastr.error(dbkontrol)
        }
    });
</script>


<script>
    $('#rol').change(function () {
        var gelenRol = $('#rol').val();
        if(gelenRol == 3){
            $('#birimUnvan').attr('hidden',false);
        }
        else{
            $('#birimUnvan').attr('hidden',true);
        }
    });
</script>
<script>
    $(document).ready(function() {
        var dbkontrol="<?php echo @$_SESSION['rolyok']; ?>";
        if (dbkontrol){
            toastr.error(dbkontrol)
        }
    });
</script>
<script>
    $(document).ready(function() {
        var dbkontrol="<?php echo @$_SESSION['manuelKayit']; ?>";
        if (dbkontrol){
            toastr.error(dbkontrol)
        }
    });

</script>
<script>
    $(document).ready(function() {
        var dbkontrol="<?php echo @$_SESSION['basarisizKayit']; ?>";
        if (dbkontrol){
            toastr.error(dbkontrol)
        }
    });
</script>
<script>
    $(document).ready(function() {
        var dbkontrol="<?php echo @$_SESSION['basariliKayit']; ?>";
        if (dbkontrol){
            toastr.success(dbkontrol)
        }
    });
</script>
<script>
    $('#importBirim').on('submit', function(event){
        $('#loading').modal('show');
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url(); ?>Ayarlar_admin/import_birim",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                $('#loadd').remove();
                $('#check').removeAttr('hidden');
                $('#yaziLoading').text(data);
                $('#onaylaButton').removeAttr('hidden');
                $('#loading').css('pointer-events','auto');
            }
        })
    });
    $('#loading').click(function () {
        window.location.reload(true);
    });

    $('#importBolum').on('submit', function(event){
        $('#loading').modal('show');
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url(); ?>Ayarlar_admin/import_bolum",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                $('#loadd').remove();
                $('#check').removeAttr('hidden');
                $('#yaziLoading').text(data);
                $('#onaylaButton').removeAttr('hidden');
                $('#loading').css('pointer-events','auto');

            }
        })
    });
    $('#importUnvan').on('submit', function(event){
        $('#loading').modal('show');
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url(); ?>Ayarlar_admin/import_unvan",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                $('#loadd').remove();
                $('#check').removeAttr('hidden');
                $('#yaziLoading').text(data);
                $('#onaylaButton').removeAttr('hidden');
                $('#loading').css('pointer-events','auto');
            }
        })
    });
</script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets'); ?>/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="--><?php //echo base_url('assets'); ?><!--/dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="--><?php //echo base_url('assets'); ?><!--/dist/js/demo.js"></script>-->