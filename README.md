# DAHA DETAYLI BİLGİLER "UZEM REZERVASYON SİSTEMİ RAPOR" DOSYASINDA MEVCUTTUR

## Uzem Rezervasyon Sistemi

Bilecik Üniversitesi için yapılan rezervasyon sistemi

## Projeye neden ihtiyaç duyuluyor?

   Uzaktan eğitim sınavlarının dışında üniversite içerisinde birimlerde bölüm sınavları yapılmaktadır. Bu sınavlarda öğretim görevlilerinin daha önceden UZEM biriminden temin ettiği boş optik formlar kullanılmaktadır ve sayısı 100-200’leri bulan öğrencilerin optiklerinin tek tek okuması neredeyse imkansız bir hal almaktadır. Bu durumdan dolayı optik formlar UZEM birimine gönderilmekte ve birimde ki çalışanlar tarafından tarama, kontrol etme vb. işlemler gerçekleştirilmektedir. Ancak bir süre sonra optiklerin fazlalaşması karışıklığa neden olmakta ve iş akışını olumsuz yönde etkilemektedir.
Bundan dolayı karışıklığı engellemek için bu projenin geliştirilmesi amaçlanmıştır.
Projenin detaylı olarak amacı nedir?

   Yapılacak rezervasyon sistemi ile optiklerini değerlendirmek isteyen öğretim görevlilerini sayfaya yönlendirerek belirtilen uygun zamana randevu almaları, seçilen gün ve saatte optikleri UZEM birimine teslim etmeleri amaçlanmaktadır.
.

## Yapılan projede varsa ekstra amaçlar nelerdir?

1. Optikler değerlendirildikten sonra notlar excel tablosunda listelenmektedir. Hemen ardından birimde ki 
öğretim görevlisi tarafından ilgili kişiye sınav sonuçları mail ortamından gönderilmektedir.
Ancak yapılacak projede tasarlanan site üzerinden tek tıkla kullanıcıya bilgilendirme maili gönderilecek ve sonuçlar internet sayfası üzerinden anında temin edilebilecek.

2. Raporlama işlemi yapılarak hafta, ay, yıl bazında birimde ki durum kontrol edilebilecek.

3. Birim içerisinde yapılan optikleri teslim alma, optikleri okuma, optikleri teslim etme gibi işlemlerin kim tarafından, hangi tarihte yapıldığı sistemde tutulacak. Gerektiğinde bu işlemler kontrol edilebilecek.” 

## Kullanılan programlama dilleri / betik dilleri / kütüphaneler nelerdir?

1. PHP
2. Codeigniter
3. Bootstrap
4. Jquery
5. Ajax
6. Admin Lte 3.0


# AYARLAR

Projenin stabil çalışması için bazı ayarların sunucu bilgilerine göre
değiştirilmesi gerekir.

Base_url : application->config->config.php dosyasýnda base url sunucu
bilgisine göre değiştirilmelidir.

DataBase Bilgileri : application->config->database.php dosyasından sunucuya
uygun database ayarları yapılmalıdır.

Mail Ayarları : 

application->helpers->mailgonder_helper.php dosyasýnda mailAyar()
fonksiyonunda bulunan ayarlar değiştirilmelidir.Smtpport,user,password vb.

Yönetici İçin Gİriş Bilgileri
   username = admin@admin.com
   password = 1
   
Kullanıcı için Giriş Bilgileri
   username = kullanici@bilecik.edu.tr
   password = 1
   
Öğrenci İçin Giriş Bilgileri
   username = ogrenci@bilecik.edu.tr
   password = 1
