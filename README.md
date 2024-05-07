# TP4DPBO2024C2

Saya Rifanny Lysara Annastasya [2200163] mengerjakan TP4 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek (DPBO) untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

### Desain Program

### 1. Struktur Kode:
- **Kelas Abstrak BaseController**: Ini adalah kelas abstrak yang berisi metode-metode yang akan diimplementasikan oleh kelas kontroler turunannya (seperti MemberController, OrderController, dan ProductController). Ini membantu dalam menerapkan polimorfisme.
- **Kelas Controller (MemberController, OrderController, dan ProductController)**: Ini adalah kelas-kelas yang mengimplementasikan logika aplikasi terkait dengan entitas tertentu (anggota, pesanan, produk). Setiap kelas ini mewarisi BaseController dan mengimplementasikan metode-metode yang diperlukan seperti menambahkan, menghapus, mengedit, dan menampilkan data terkait entitas tersebut.

### 2. Model:
- **DB Class**: Ini adalah kelas yang bertanggung jawab untuk koneksi ke database. Dalam kasus ini, menggunakan mysqli untuk berinteraksi dengan database MySQL.
- **Product Class**: Kelas ini mewakili entitas Produk dalam aplikasi. Ini memiliki metode untuk menambah, menghapus, mengedit, dan mengambil produk dari database.

### 3. View:
- **Template Class**: Kelas ini digunakan untuk mengelola tampilan. Ini membaca template HTML dari file, melakukan manipulasi (seperti penggantian tag tertentu dengan data dinamis), dan menulis tampilan yang dihasilkan.
- **MemberView, OrderView, dan ProductView**: Kelas-kelas ini bertanggung jawab untuk merender tampilan terkait dengan entitas tertentu (anggota, pesanan, produk). Mereka menggunakan kelas Template untuk memuat template HTML dan mengganti tag tertentu dengan data yang relevan sebelum menampilkan tampilan yang dihasilkan.

### 4. Kontroler:
- **MemberController, OrderController, dan ProductController**: Ini adalah kelas-kelas yang bertanggung jawab untuk menerima input dari pengguna, memprosesnya menggunakan metode yang sesuai di Model, dan mengirimkan output ke View. Mereka mengatur alur aplikasi dan berinteraksi dengan model dan view sesuai kebutuhan.

### 5. File Utama (index.php):
- Di sini, objek controller (seperti $members, $orders, $products) diinstansiasi dan metode-metode yang sesuai dipanggil berdasarkan input pengguna (seperti menambahkan, menghapus, mengedit, atau menampilkan data).

### Penjelasan Alur

1. **Definisi Kelas Abstrak `BaseController`**:
   - Kelas abstrak `BaseController` didefinisikan dengan beberapa metode abstrak yang mewakili operasi dasar yang mungkin dilakukan pada entitas, seperti menambah, menghapus, atau mengedit data.

2. **Implementasi Kelas Kontroler Spesifik**:
   - Kelas `MemberController`, `OrderController`, dan `ProductController` mengimplementasikan metode abstrak dari `BaseController` sesuai dengan kebutuhan masing-masing entitas.
   - Setiap kelas kontroler mengelola operasi terkait dengan entitas yang sesuai: member, order, atau product.

3. **Pemuatan Kelas Kontroler dan Instansiasi Objek**:
   - Setelah mendefinisikan kelas kontroler, kelas-kelas tersebut dimuat menggunakan pernyataan `include_once`.
   - Objek dari setiap kelas kontroler (misalnya, `$members`, `$orders`, dan `$products`) diinstansiasi.

4. **Penanganan Permintaan HTTP**:
   - Permintaan HTTP (GET atau POST) ditangani oleh serangkaian kondisional untuk menentukan tindakan yang tepat yang harus dilakukan berdasarkan parameter yang diberikan di URL atau dari formulir.
   - Jika parameter `add`, `delete`, atau `edit` ada di URL, kontroler yang sesuai dipanggil untuk menangani tindakan tersebut.
   - Jika formulir dikirim, data diproses dan metode yang sesuai dipanggil pada kontroler.

5. **Operasi CRUD**:
   - Setiap kontroler memanggil metode yang sesuai pada model yang relevan (seperti `add()`, `delete()`, `edit()`, dll.) untuk melakukan operasi Create, Read, Update, atau Delete (CRUD) pada data sesuai dengan permintaan pengguna.
   - Operasi CRUD ini mungkin melibatkan interaksi dengan model untuk menyimpan, mengambil, atau menghapus data dari database.

6. **Tampilan**:
   - Setelah operasi CRUD berhasil dilakukan, tampilan yang sesuai dipanggil.
   - Tampilan dapat berupa tampilan daftar entitas, formulir untuk menambah atau mengedit entitas, atau pesan sukses atau gagal tergantung pada hasil operasi yang dilakukan.

### Dokumentasi

https://github.com/rifannylyst/TP4DPBO2024C2/assets/147616851/2a294d79-27ea-41f2-8573-229a992da957


