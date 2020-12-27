
## Cara Instalasi project
1. git clone project pada root yg sudah terinstal laravel, disarankan menggunakan HTTPS
2. ubah .env.example menjadi .env
3. generate laravel key dengan menggunakan command "php artisan key:generate"
4. ubah nama database sesuai yang dibuat pada phpmyadmin
5. jalankan migrate dan seed dengan menggunakan command "php artisan migrate:fresh --seed"
6. lalu jalankan "php artisan serve" apabila menggunakn xampp
## Catatan Toko Kastem

1. satuan untuk berat di raja ongkir adalah gram
2. ada beberapa daerah yang tidak bisa dikalkulasikan oleh kurir "POS", jadi pada saat user memilih daerah tersebut akan berakibat "undefined offset 0"

## Daftar Akun
1. Admin
    - email : admin@tokokastem.com
    - password : xyz123
2. Reguler User
   - email : reguser@gmail.com
   - password : xyz123

## Link Flowchart    
https://drive.google.com/drive/folders/1DxEue8fuHJujA4f0yTgf1Bzj-sq5OBfM?usp=sharing
