# TP4DPBO2024C2

## Janji
Saya Jasmine Noor Fawzia [2200598] mengerjakan soal TP4 dalam Mata Kuliah DPBO untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan Aamiin

## Desain Program
**1. connection.php**

File ini berisi konfigurasi untuk koneksi database. Terdapat variabel-variabel seperti $DB_HOST, $DB_USER, $DB_PASS, dan $DB_NAME yang digunakan untuk menyimpan informasi koneksi ke database MySQL.

**2. models/DB.class.php**

Kelas yang bertanggung jawab untuk mengelola koneksi ke database dan eksekusi query. Beberapa metode yang ada di dalamnya antara lain:
- __construct(): Constructor kelas yang menginisialisasi variabel-variabel untuk koneksi database.
- open(): Metode untuk membuka koneksi ke database.
- execute(): Metode untuk mengeksekusi query ke database.
- getResult(): Metode untuk mendapatkan hasil eksekusi query.
- executeAffected(): Metode untuk mengeksekusi query yang memengaruhi baris-baris di database (seperti INSERT, UPDATE, DELETE).
- close(): Metode untuk menutup koneksi ke database.

**3. models/Template.class.php**

File ini berisi kelas Template yang digunakan untuk mengelola template. Beberapa metode yang ada di dalamnya antara lain:
- __construct(): Constructor kelas yang menginisialisasi nama file template.
- clear(): Metode untuk membersihkan template dari placeholder yang cocok dengan pola DATA_[A-Z|_|0-9]+.
- write(): Metode untuk menampilkan isi template yang telah dibersihkan.
- getContent(): Metode untuk mendapatkan isi template yang telah dibersihkan.
- replace(): Metode untuk mengganti placeholder dalam template dengan nilai yang diberikan. Placeholder diganti menggunakan ekspresi reguler.

**4. models/Member.class.php**

Kelas ini bertanggung jawab untuk mengelola data member. Ini termasuk operasi-operasi seperti mengambil data member yang telah digabungkan dengan informasi type member dan hotel terkait, mencari member berdasarkan ID, menambahkan, memperbarui, dan menghapus data member.

**5. models/Type.class.php**

Kelas ini bertanggung jawab untuk mengelola data type. Ini termasuk operasi-operasi seperti mengambil semua data type, mencari type berdasarkan ID, menambahkan, memperbarui, dan menghapus data type. Pada metode hapus data type ini, type tidak dapat dihapus jika data type berada di dalam data member.

**6. models/Hotel.class.php**

Kelas ini bertanggung jawab untuk mengelola data hotel. Ini termasuk operasi-operasi seperti mengambil semua data hotel, mencari type berdasarkan ID, menambahkan, memperbarui, dan menghapus data hotel. Pada metode hapus data hotel ini, type tidak dapat dihapus jika data hotel berada di dalam data member.

**7. views/Member.view.php**

Fungsi render digunakan untuk menampilkan daftar member dalam bentuk tabel. Proses pengambilan data member dilakukan dengan menggunakan instance dari kelas Member. Fungsi tambahMember digunakan untuk menampilkan form untuk tambah data member. Proses pengambilan data type dan hotel dilakukan dengan menggunakan instance dari kelas Type dan kelas Hotel. Fungsi ubahMember digunakan untuk menampilkan form untuk edit data member. Proses pengambilan data member dilakukan dengan menggunakan instance dari kelas Member yang juga include kelas Type dan kelas Hotel. Seluruhnya digabungkan dengan tag HTML untuk ditampilkan.

**8. views/Type.view.php**

Fungsi render digunakan untuk menampilkan daftar type dalam bentuk tabel. Proses pengambilan data type dilakukan dengan menggunakan instance dari kelas Type. Fungsi tambahType digunakan untuk menampilkan form untuk tambah data type. Fungsi ubahType digunakan untuk menampilkan form untuk edit data type. Proses pengambilan data type dilakukan dengan menggunakan instance dari kelas Type. Seluruhnya digabungkan dengan tag HTML untuk ditampilkan.

**9. views.Hotel.view.php**

Fungsi render digunakan untuk menampilkan daftar hotel dalam bentuk tabel. Proses pengambilan data hotel dilakukan dengan menggunakan instance dari kelas Hotel. Fungsi tambahHotel digunakan untuk menampilkan form untuk tambah data hotel. Fungsi ubahHotel digunakan untuk menampilkan form untuk edit data hotel. Proses pengambilan data hotel dilakukan dengan menggunakan instance dari kelas Hotel. Seluruhnya digabungkan dengan tag HTML untuk ditampilkan.

member, type, dan hotel menggunakan template yang sama (skin.html) untuk menampilkan data tabel dan melakukan beberapa penyesuaian terhadap data yang ditampilkan pada template tersebut begitu pula dengan form add dan edit member, type, dan hotel menggunakan template yang sama (skinform.html).

**11. controllers.Member.controller.php**

Membuat fungsi konstruktor yang membangun objek model Member dengan parameter koneksi database yang diambil dari kelas connection. Method index() bertanggung jawab untuk menampilkan data yang relevan ke dalam view member. Ini melibatkan membuka koneksi ke database, mengambil data menggunakan model member, menutup koneksi, dan mengirim data ke view untuk ditampilkan. Method seperti addMember(), editMember(), deleteMember() bertanggung jawab untuk menangani operasi CRUD (Create, Read, Update, Delete) pada data. Mereka membuka koneksi, memanggil metode yang sesuai pada objek model, dan kemudian menutup koneksi setelah selesai. Method seperti form() dan formedit($id) bertanggung jawab untuk menyiapkan data yang diperlukan untuk menampilkan formulir tambah atau ubah. Mereka memuat data yang diperlukan dari model member dan kemudian meneruskannya ke view member.

**12. controllers.Type.controller.php**

Membuat fungsi konstruktor yang membangun objek model Type dengan parameter koneksi database yang diambil dari kelas connection. Method index() bertanggung jawab untuk menampilkan data yang relevan ke dalam view type. Ini melibatkan membuka koneksi ke database, mengambil data menggunakan model type, menutup koneksi, dan mengirim data ke view untuk ditampilkan. Method seperti addType(), editType(), deleteType() bertanggung jawab untuk menangani operasi CRUD (Create, Read, Update, Delete) pada data. Mereka membuka koneksi, memanggil metode yang sesuai pada objek model, dan kemudian menutup koneksi setelah selesai. Method seperti form() dan formedit($id) bertanggung jawab untuk menyiapkan data yang diperlukan untuk menampilkan formulir tambah atau ubah. Mereka memuat data yang diperlukan dari model type dan kemudian meneruskannya ke view type.

**13. controllers.Hotel.controller.php**

Membuat fungsi konstruktor yang membangun objek model Hotel dengan parameter koneksi database yang diambil dari kelas connection. Method index() bertanggung jawab untuk menampilkan data yang relevan ke dalam view hotel. Ini melibatkan membuka koneksi ke database, mengambil data menggunakan model hotel, menutup koneksi, dan mengirim data ke view untuk ditampilkan. Method seperti addHotel(), editHotel(), deleteHotel() bertanggung jawab untuk menangani operasi CRUD (Create, Read, Update, Delete) pada data. Mereka membuka koneksi, memanggil metode yang sesuai pada objek model, dan kemudian menutup koneksi setelah selesai. Method seperti form() dan formedit($id) bertanggung jawab untuk menyiapkan data yang diperlukan untuk menampilkan formulir tambah atau ubah. Mereka memuat data yang diperlukan dari model hotel dan kemudian meneruskannya ke view hotel.

**14.index.php**

Membuka controller member untuk mengakses data, serta kondisi ketika pengguna klik button yang ada untuk menampilkan form, add data, edit data, dan delete data serta menampilkan halaman utama.

**15. type.php**

Membuka controller type untuk mengakses data, serta kondisi ketika pengguna klik button yang ada untuk menampilkan form, add data, edit data, dan delete data serta menampilkan halaman utama.

**16. hotel.php**

Membuka controller hotel untuk mengakses data, serta kondisi ketika pengguna klik button yang ada untuk menampilkan form, add data, edit data, dan delete data serta menampilkan halaman utama.

**17. templates/skin.html**

Ini adalah halaman utama aplikasi web untuk menampilkan tabel. Terdapat navigasi di bagian atas halaman (navbar) yang memungkinkan pengguna untuk menavigasi ke berbagai bagian aplikasi. Serta terdapat action untuk add, edit, dan delete data.

**18. templates/skinform.html**

Halaman ini digunakan untuk menambah atau mengedit data. Terdapat formulir di halaman ini yang memungkinkan pengguna untuk memasukkan informasi data. Terdapat button "submit" yang akan mengirimkan data formulir ke database.

## Penjelasan Alur
1. Pengguna akan memulai dengan membuka halaman utama aplikasi.
2. File index.php akan menampilkan navigasi (navbar) di bagian atas halaman, memungkinkan pengguna untuk menavigasi ke halaman member (halaman utama), halaman type, dan halaman hotel. Di bawahnya terdapat data member dalam bentuk tabel. Terdapat action untuk add, edit, dan delete data.
4. Jika pengguna klik add new, maka akan menampilkan halaman form di mana pengguna dapat memasukkan data member baru yang nantinya akan masuk ke dalam database dan akan ditampilkan jika sudah submit.
5. Jika pengguna klik edit, maka akan menampilkan halaman form di mana pengguna dapat mengubah data member yang nantinya akan masuk ke dalam database dan akan ditampilkan hasil edit jika sudah submit.
6. Jika pengguna klik delete, maka akan muncul konfirmasi delete lalu data member akan terhapus dan database pun akan berubah.
7. Jika pengguna klik navbar Type ataupun Hotel, maka akan muncul seperti index.php dan proses crudnya pun sama seperti itu, yang berbeda ketika akan hapus data namun data tersebut sedang digunakan di dalam data member maka data di type atau hotel tersebut tidak dapat dihapus.

## Dokumentasi saat Program Dijalankan
1. tabel member
![member](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/310567ad-6deb-47eb-b313-6b4c02693947)

2. tabel type member
![type memb](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/034e6c2d-94e7-4bb6-bb3b-d022c4e5df19)

3. tabel hotel
![hotel](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/5ea1b4bd-fa38-41e5-9ab9-bcb2369c0ac5)

4. add
![add member](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/6b7f5402-2283-4640-b596-d3d44ba0ef92)
![date](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/5b56f656-9d55-4087-9602-2d0d3aa64ad1)
![dropdown type](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/600384af-c8dc-416b-bc3a-8ef72dffa1ac)
![dropdown hotel](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/b1ef5fb8-9b71-44d7-8e83-4a49e5e139bd)
![add type](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/7761c9e9-73f7-469e-bd50-390cfc619e87)
![add hotel](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/040f987d-98fb-488f-8218-91ba200ab0a6)
![success add](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/48ebf937-2885-4d2f-8416-b923886a89c8)

5. edit 
![edit member](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/5ce22580-3c65-4f5c-8427-18b3c018e513)
![edit type](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/6da0aba9-161b-4a08-b78d-8b0020738b34)
![edit hotel](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/e6204d51-58f1-4197-954d-c9b552b40c5b)
![success edit](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/85a80123-8f92-4cd5-8e1d-b192dca12aa1)

6. delete
![delete confirm](https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/b645787d-b671-4010-8acf-8b5afac532e3)

7. Video preview
https://github.com/jasminefwz/TP4DPBO2024C2/assets/147362810/44b4da93-2d3a-4d35-bb7f-cec3bef75298
