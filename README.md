# Bree WhatsApp API
Package ini digunakan untuk mengintegrasikan Laravel dengan Bree WhatsApp dalam mengirim pesan ke WhatsApp Klien.

## Install Package
```sh
composer require atozpw/bree-whatsapp
```

## Integrasi Ke Laravel
Tambahkan service provider ke config/app.php
```php
    'providers' => [
    	....

    	Atozpw\BreeWhatsapp\ApiServiceProvider::class,
    ]
```

## Publish Config Package Laravel
Jalankan command artisan berikut ```php artisan vendor:publish --provider="Atozpw\BreeWhatsapp\ApiServiceProvider"``` untuk publish secara otomatis, atau menggunakan cara manual seperti berikut ini:

1. Buat file **bree-whatsapp.php** di folder **config** secara manual
2. Tambahkan kode berikut ini:
```php
    <?php

    return [
        'bree_whatsapp_host' => env('BREE_WHATSAPP_HOST', ''),
    ];
```

## Setting Environment 
Tambahkan kode berikut di file .env untuk konfigurasi host Bree WhatsApp
```
BREE_WHATSAPP_HOST=isi_dengan_host_bree_whatsapp
```

## Implementasi
Contoh pengimplementasian pada controller
```php
    <?php

    use Atozpw\BreeWhatsapp\Api;
    
    class WhatsappController extends Controller
    {
        public function sendMessage() {
            $bree = new Api;
            $number = 'nomor whatsapp';
            $message = 'text';
            $bree->sendText($number, $message);
        }

        public function sendMedia() {
            $bree = new Api;
            $number = 'nomor whatsapp';
            $caption = 'text';
            $file = 'berupa file gambar *jpg/png';
            $bree->sendMedia($number, $caption, $file);
        }
    }
```
