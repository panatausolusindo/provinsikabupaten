# Provinsi Kabupaten Indonesia

Ini menggunakan data dari https://github.com/guzfirdaus/Wilayah-Administrasi-Indonesia.
Plugin ini tidak melakukan proses update otomatis terhadap data yang dimasukkan ke dalam
database, maupun melakukan proses insert-nya. Silahkan lakukan sendiri dengan melakukan
insert ke database yang dibutuhkan.

Agar mempermudah proses upate di masa datang, maka tidak ada bagian apapun dari struktur
database yang dirubah.

Untuk kemudahan data yang telah diambil, sebagai inisiasi ditempatkan pada folder 
`updates/wilayah_indonesia.sql`, menggunakan format untuk MySQL/MariaDB.

## Menggunakan DropDown

Tinggal tambahkan static dropdown yang dibutuhkan ke bagian load options pada fields yang
membutuhkannya.