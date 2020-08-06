<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genel Rapor</title>
    <style type="text/css">
        body {
            font: 12pt Georgia, "Times New Roman", Times, serif;
            line-height: 1.3;
            width: 100%;
            font-family:"DejaVu Sans",Sans-Serif;
        }

        div.header {
            display: block;
            text-align: center;
            position: running(header);
        }

        div.footer {
            display: block;
            text-align: center;
            position: running(footer);
        }

        @page {
            @top-center {
                content: element(header);
            }
        }
        @page {
            @bottom-center {
                content: element(footer);
            }
        }
        .icerik{
            width: 100%;
        }
        #tablo{
            width: 99%;
            border-spacing: 0px;
            overflow-x:auto;
        }
        td,th{
            border-bottom: 1px solid black;
        }
        #tablo thead tr th{
            background-color: #e2e3e5;
            font-size:xx-small;
            text-align:center;
            padding-left: 3px;
        }
        #tablo tfoot tr th{
            background-color: #e2e3e5;
            font-size:xx-small;
            text-align:center;
            padding-left: 3px;
        }
        #tablo tbody td{
            height: 20px;
            font-size: xx-small;
            text-align: center;
        }
        #tablo tbody td :first-child{
            height: 10px;
            font-size: xx-small;
            text-align: center;
        }
        h2 {
            font-family: "DejaVu Sans", Sans-Serif;
            font-size: medium;
            font-weight: lighter;
        }
        tfoot tr td {
            border-bottom: 0px;
        }
    </style>
</head>
<body>
<div align="center">
    <div class="icerik">
        <div>
            <h2>T.C.</h2>
            <h2>BİLECİK ŞEYH EDEBALİ ÜNİVERSİTESİ</h2>
            <h2>Uzaktan Eğitim Merkezi Randevu Sistemi</h2>
            <?php if(@$bolumAd){?>
                <h2><?php echo @$bolumAd[0]->bolum_ad; ?> <br>Bölüm Bazlı Rapor </h2>
            <?php } ?>
        </div>
        <table id="tablo" align="center">
            <thead>
            <tr>
                <th>Öğretim Görevlisi</th>
                <th>Birim</th>
                <th>Bölüm</th>
                <th>Optik Sayısı</th>
                <th>Başlangıç Tarihi</th>
                <th>İşlem Bitiş/Teslim Tarihi</th>
                <th>İşlem Durumu</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($rapor as $rows) { ?>
                <tr>
                    <td><?php echo $rows->user_ad." ".$rows->user_soyad ?></td>
                    <td><?php echo $rows->birim_ad; ?></td>
                    <td><?php echo $rows->bolum_ad; ?></td>
                    <td><?php echo $rows->optik_sayisi; ?></td>
                    <td><?php echo $rows->startDate; ?></td>
                    <td><?php echo $rows->finishDate; ?></td>
                    <td><?php echo $rows->durumBilgisi; ?></td>
                </tr>
            <?php }?>
            </tbody>
            <tfoot>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th style="text-align: right">Bekleyen Optik : </th>
                <th style="text-align: left;font-weight: normal"><?php echo $bekleyenOptik[0]->optik_sayisi; ?></th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th style="text-align: right">İşlemleri Tamamlanan Optik : </th>
                <th style="text-align: left;font-weight: normal"><?php echo $okunanOptik[0]->optik_sayisi; ?></th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th style="text-align: right">Toplam Optik : </th>
                <th style="text-align: left;font-weight: normal"><?php echo $toplamOptik[0]->optik_sayisi; ?></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

</body>
</html>