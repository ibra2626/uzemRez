
<style>
    h4{
        color: #EEEEEE;
        text-align: right;
        margin-right: 10px;
    }
    h1{
        color: #EEEEEE;
        text-align: center;
    }
    .card{
    }
    .cardBody p{
        text-align: center;
    }
    .cardheader{
        background-color: #0f74a8;
    }
    #tablo{
        width: 100%;
        border-spacing: 0px;
        overflow-x:auto;
    }
    td,th{
        border-bottom: 1px solid black;
    }
    #tablo thead tr th{
        font-size:medium;
        text-align:center;
        padding-left: 3px;
    }
    #tablo tfoot tr th{
        background-color: #e2e3e5;
        font-size:medium;
        text-align:center;
        padding-left: 3px;
    }
    #tablo tbody td{
        height: 20px;
        font-size: medium;
        text-align: center;
    }
    #tablo tbody td :first-child{
        height: 10px;
        font-size: small;
        text-align: center;
    }
</style>
<div class="card">
        <div class="cardheader">
            <h1>UZEM REZERVASYON SİSTEMİ</h1>
        </div>
        <div class="cardBody">
            <p><?php echo $aciklama; ?></p>
            <table>

            </table>
            <table id="tablo" align="center">
                <thead>
                <tr>
                    <th>Randevu Tarihi</th>
                    <th>Birim</th>
                    <th>Bölüm</th>
                    <th>Optik Sayısı</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $startDate;?></td>
                        <td><?php echo $birim_ad;?></td>
                        <td><?php echo $bolum_ad;?></td>
                        <td><?php echo $optik_sayisi;?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="cardheader">
            <h4> Uzaktan Eğitim Merkezi</h4>
        </div>
    </div>