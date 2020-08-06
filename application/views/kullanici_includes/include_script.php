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
<!--date time picker-->
<script src="<?php echo base_url('assets'); ?>/plugins/popper/popper.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/datetimepicker/jquery.datetimepicker.full.min.js"></script>

<script src="<?php echo base_url('assets'); ?>/dist/js/adminlte.js"></script>


<script>
    $(function () {
        $('#okunduTablo').DataTable({
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
        $('#bekleyenTablo').DataTable({
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
    });
</script>
<!-- /// DATA TABLE JS BİTİŞ-->
<script>
        $('#picker').datetimepicker({
            timepicker: false,
            datepicker: true,
            format: 'Y-m-d',
        });
</script>
<!--SONRAKİ ÖNCEKİ BUTONU-->
<script>
    // kelimelerin hepsini gizleyelim
    $('.randevu').hide();

    // ilk kelimey "goster" isimli sınıf ekleyelim ve gösterelim
    $('.randevu:first-child').addClass('goster').show();
    $('#geri').addClass('disabled');
    $("#geri").attr("disabled", true);
    // sonraki butonuna basıldığı zaman
    $('#ileri').click(function() {


        // ekranda gösterilen kelimenin sırasını alalım
        activeIndex = $('.randevu.goster').index();

        if(activeIndex !== 1){
            $('#geri').removeClass('disabled');
            $("#geri").attr("disabled", false);
        }

        // ekranda gösterilen kelimeyi gizleyelim
        $('.randevu').eq(activeIndex)
            .removeClass('goster').hide();

        // bir sonraki kelimeyi gösterelim

        $('.randevu').eq(activeIndex + 1)
            .addClass('goster').show();

        lastIndex = $('.randevu:last').index();

        if (activeIndex === lastIndex-1){
            $('#ileri').addClass('disabled');
            $("#ileri").attr("disabled", true);
        }

    });
    // sonraki butonuna basıldığı zaman
    $('#geri').click(function() {

        // ekranda gösterilen kelimenin sırasını alalım
        activeIndex = $('.randevu.goster').index();

        lastIndex = $('.randevu:last').index();
        firstIndex = $('.randevu:first').index();
        if (activeIndex !== lastIndex+1){
            $('#ileri').removeClass('disabled');
            $("#ileri").attr("disabled", false);
        }

        // ekranda gösterilen kelimeyi gizleyelim
        $('.randevu').eq(activeIndex)
            .removeClass('goster').hide();

        // bir sonraki kelimeyi gösterelim
        $('.randevu').eq(activeIndex - 1)
            .addClass('goster').show();
        if(activeIndex === firstIndex+1){
            $('#geri').addClass('disabled');
            $("#geri").attr("disabled", true);
        }
    });
</script>
<!--OPTİK SAYISI,BOLUM VE BİRİM SEÇİLİP EKLE BUTONUNA BASILDIĞINDA GERÇEKLEŞECEK EVENTLAR-->
<script>
    var randevuIndex = 0;
    var dbVeriArr = [];
    var randevuArrID = 1000;
    $('#kaydetRandevu').hide();
    $('#multipleRandevu').hide();

    $('#optikEkle').click(function (){

        var dropdownBirim = document.getElementById('birim');
        var dropdownBolum = document.getElementById('bolum');
        var tarih = document.getElementById('setTarih').innerHTML;
        var saat = document.getElementById('setSaat').innerHTML;
        var valsBirim = dropdownBirim.options[dropdownBirim.selectedIndex];
        var valsBolum = dropdownBolum.options[dropdownBolum.selectedIndex];
        if(tarih == '' && saat == ''){
            toastr.error('Lütfen saat seçiniz!');
        }
        else {
            if($('#optikSayisi').val() == '' || valsBirim.text == 'Birim Seçiniz' || valsBolum.text == 'Bölüm Seçiniz'){
                toastr.warning('Tüm alanları doldurduğunuzdan emin olun!');
            }
            else {
                dbVeriArr.push(randevuArrID+','+valsBirim.value+','+valsBolum.value+','+$('#optikSayisi').val()+','+ tarih +','+ saat);
                $('#randevuRow').removeClass('justify-content-center');
                $('#randevuRow').addClass('justify-content-arround');
                $('#multipleRandevu').removeClass('invisible');
                $('#multipleRandevu').show(500);
                $('#kaydetRandevu').show(500);
                $('#liste').append('<tr id='+ randevuIndex + '>' +
                    '<td>' + valsBirim.text + '</td>' +
                    '<td>' + valsBolum.text+ '</td>' +
                    '<td>' +$('#optikSayisi').val()+'</td>'+
                    '<td><label><a  onclick="silFunc('+randevuIndex+','+randevuArrID+')" id="'+ randevuIndex +'" class="btn btn-danger text-white btn-xs shadow-xs rounded-pill" role="button">Sil</a></label></td></tr>');
                document.forms[0].reset();
                randevuArrID++;
                randevuIndex++;
            }
        }
        });

</script>
<!--RANDEVU MULTİPLE SATIR SİLME-->
<script>
    function silFunc(randevuIndex,randevuArrID) {

        // var indexInVeri=dbVeriArr[randevuIndex];
        // var cevap = indexInVeri.indexOf(randevuArrID);
        // if (cevap != -1){
        //
        // }
        var temp = document.getElementById('liste').getElementsByTagName('tr');
        var findIndex = -1;
        for(var i=0;i<temp.length;i++)
        {
            if(randevuIndex == temp[i].id){
                $('#'+temp[i].id).remove();
                    dbVeriArr.forEach(function (item) {
                        if (item.indexOf(randevuArrID) == -1){
                            findIndex++;
                        }
                        else if(item.indexOf(randevuArrID) != -1){
                            findIndex++;
                            dbVeriArr.splice(findIndex,1);
                        }
                    });
                }

            }
        }
</script>
<!--Randevu SAAT/TARİH tablosunda Herhangi bir saate tıklandığında arkaplan vb. attr. değişmesi-->
<script>
    var oncekisaat = null;
    function saatSec(tarihSaat,saat,tarih) {
        var set_tarihSaat=tarihSaat;
        if(oncekisaat === null){
            document.getElementById(set_tarihSaat).classList.remove('btn-outline-success');
            document.getElementById(set_tarihSaat).classList.add('btn-success');
            var setDivTarih = document.getElementById('setTarih');
            var setDivSaat = document.getElementById('setSaat');
            setDivTarih.innerHTML = tarih;
            setDivSaat.innerHTML = saat;

            oncekisaat = set_tarihSaat;
        }
        else{
            document.getElementById(oncekisaat).classList.remove('btn-success');
            document.getElementById(oncekisaat).classList.add('btn-outline-success');
            document.getElementById(set_tarihSaat).classList.remove('btn-outline-success');
            document.getElementById(set_tarihSaat).classList.add('btn-success');
            var setDivTarih = document.getElementById('setTarih');
            var setDivSaat = document.getElementById('setSaat');
            setDivTarih.innerHTML = tarih;
            setDivSaat.innerHTML = saat;
            oncekisaat=set_tarihSaat;
        }

    }
</script>
<script>
    $('#birim').change(function () {
        $("#bolum option").remove();
        var birim_id = $( "select#birim option:checked" ).val();
        $.post('<?php echo base_url('user/RandevuIslemleri/bolumGoster') ?>', {'birim_id': birim_id}, function (data) {
            var rows = JSON.parse(data);
            for (var i = 0;i<rows.length;i++){
                $('#bolum').append('<option value="'+rows[i]['bolum_id']+'">'+rows[i]['bolum_ad']+'</option>')
            }
        });
    });
</script>
<script>
    $('#kaydetRandevu').click(function(){
        $('#modalLoading').modal('show');
        $("#kaydetRandevu").prop("disabled",true);
        if(dbVeriArr != ''){
            $.post('<?php echo base_url('user/RandevuIslemleri/randevuOlustur') ?>', {'dizi[]': dbVeriArr }, function(data){

                    $('#spinner').remove();
                    $('#RandevuLoadingPar').remove();
                    $('#RandevuOlustu').removeAttr('hidden');
                    $('#onayla').removeAttr('hidden');
                    $('#check').removeAttr('hidden');
                    $('#modalLoading').css('pointer-events','auto');
                    $('#modalLoading').click(function () {
                    window.location.reload(true);
                    });
            });

        }
        else{
            toastr.error('Lütfen optik detaylarını giriniz!');
            $("#kaydetRandevu").prop("disabled",false);

        }
    });

</script>
<!-- AdminLTE App -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="--><?php //echo base_url('assets'); ?><!--/dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="--><?php //echo base_url('assets'); ?><!--/dist/js/demo.js"></script>-->