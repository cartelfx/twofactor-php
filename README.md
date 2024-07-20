# twofactor-php
merhabalar bu projede sitenize kullanıcılar için iki aşamalı doğrulama sistemi kurmak amaçlıdır ve tamamen örnektir kendinize göre değiştirip kullanabilirsiniz.

not: Google Authenticator uygulaması ile çalışmaktadır.
SQL dosyasını aktarmayı unutmayın.

adımlar;

PHP'nin zip Uzantısını yükleme: PHP'nin php.ini dosyasını düzenleyerek zip uzantısını etkinleştirin. php.ini dosyası yani C:\xampp\php\php.ini yolunda bulunan dosyayı düzenleyin ve şu satırı bulun ;extension=zip Bu satırın başındaki ; sembolünü kaldırın.

Git yükleme: Link [Burada](https://git-scm.com/downloads/) Git Yükleme işlemi sırasında, "Git Bash Here" ve "Git GUI Here" gibi seçeneklerini aktif edin ve "Use Git from the command line and also from 3rd-party software" seçeneğini seçin.


Composer Yükleme: Link [Burada](https://getcomposer.org/download/) linkden installer'i indirip kurun.


Sonuç;
Bilgisayarınızda ```Ayarlar``` uygulamasına girin ve ```Sistem``` özelliğini seçin ```Gelişmiş Sistem Ayarları```'nı seçin ve orada ```Ortam Değişkenleri``` bölümünü seçin orada bulunan Path değişkenine çift tıklayın ve girdiğinizde önünüze çıkan yerden Yeni Basın ve ```C:\Program Files\Git\Bin``` yazın ve Tamam basarak bu işlemi bitirin daha sonra son olarak ```C://xampp/htdocs/``` klasörüne gidin ve mevcut dizinde ```composer require sonata-project/google-authenticator``` komutunu kullanın ve ```localhost/register.php/``` adresine gidin ve son!
