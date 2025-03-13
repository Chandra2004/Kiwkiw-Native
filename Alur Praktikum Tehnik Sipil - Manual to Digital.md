---- TECH STACK ----
1. Back-End
-> Framework : Laravel
-> Database : MySQL
-> Authentication : Laravel Breeze
-> Realtime Communication : Laravel WebSockets
-> File Upload & Storage : Google Drive / Storage Lokal

2. Front-End
-> Framework : React.js
-> CSS Framework : Tailwind CSS
-> State Management : Redux

3. Deployment
-> Hosting : Laravel Forge
-> Web Server : Nginx
-> CI/CD : Github Actions

4. Fitur Realtime (Chat & Meet)
-> Chat Realtime : NodeJS
-> Video Call : NodeJS

---- LANGKAH PENGEMBANGAN ----
1. Perencanaan & Persiapan
-> Tentukan scope utama aplikasi (fitur minimal yang harus berjalan)
-> Rancang database (ERD) berdasarkan alur yang telah dibuat
-> Buat wireframe UI untuk setiap role pengguna

2. Setup Proyek
-> Buat repository Git (GitHub/GitLab/Bitbucket)
-> Setup Laravel + MySQL di lokal
-> Konfigurasi authentication (role-based dengan Laravel Breeze/Jetstream)
-> Setup Vue.js/React.js untuk frontend jika menggunakan pendekatan SPA

3. Pengembangan Backend
-> Buat Model, Migration, dan Seeder untuk :
--> User (SuperAdmin, Pembimbing, Asisten, Praktikan)
--> Praktikum
--> Kelompok
--> Penjadwalan
--> Pembayaran
--> Laporan & Penilaian
--> Asistensi

-> Implementasi fitur :
--> Registrasi & Login
--> Role-based Access Control (RBAC)
--> Verifikasi pembayaran
--> Penjadwalan & pembagian kelompok
--> Sistem asistensi bertahap
--> Pengumpulan laporan & penilaian

4. Pengembangan Frontend
-> Buat UI untuk setiap role dengan Tailwind
-> Implementasi dashboard masing-masing user
-> Integrasi API backend dengan frontend

5. Implementasi Realtime Fitur
-> Tambahkan chat realtime dengan Laravel WebSockets
-> Tambahkan fitur video call menggunakan NodeJS

6. Testing & Debugging
-> Uji coba fitur utama
-> Lakukan unit testing dan feature testing dengan Laravel PHPUnit

7. Deployment & Maintenance
-> Deploy backend ke VPS (menggunakan Laravel Forge atau manual setup Nginx)
-> Deploy frontend ke Netlify/Vercel jika menggunakan SPA atau ke server yang sama
-> Monitoring dengan tools seperti Sentry atau Laravel Telescope



---- PRAKTIKUM TEHNIK SIPIL ITATS | Manual to Digital ----

Role :
-> SuperAdmin -> Kepala Lab (KALAB) -> (untuk Kepala Lab) -> (Bisa mengatur semua)
-> Pembimbing -> Dosen Pembimbing (DOSPEM) -> (untuk dosen pembimbing para praktikan) -> (dosen pembimbing dipilihkan oleh SuperAdmin)
-> Asisten -> Asisten Lab (ASLAB) -> (mengatur praktikan dan penjadwalan karena mendefinisikan asisten lab) 
-> Praktikan -> (anggota yang mengikuti praktikum yang telah ditentukan oleh SuperAdmin dan Asisten)

Dashboard :
-> ada dashboard Khusus SuperAdmin
-> ada dashboard Khusus Pembimbing
-> ada dashboard Khusus Asisten
-> ada dashboard Khusus Praktikan

Alur Praktikum Tehnik Sipil :
1. Register :
--> Yang melakukan registrasi adalah praktikan (profile picture, nama, npm, telepon, email, password) - (tambahan lainnya)
--> SuperAdmin tidak perlu register karena memiliki hak akses super khusus (data diri SuperAdmin dan Asisten sama seperti data diri praktikan)
--> Pendaftaran ketika ingin menjadi Asisten maka didaftarkan melalui Dashboard SuperAdmin

2. Login :
--> Form Login untuk semua role

3. Pengumpulan Form Verifikasi :
--> praktikan melakukan verifikasi atas pembelian kelas praktikum dengan melakukan pengisian form & foto bukti kwitansi pembayaran
--> setelah praktikan mengupload verifikasi, praktikan menunggu ACC dari SuperAdmin atau Asisten
--> setelah menunggu ACC, praktikan dapat lanjut ke step berikutnya

4. Pemilihan Modul :
--> praktikan memilih modul yang ingin diampu
--> menunggu ACC dari SuperAdmin atau Asisten
--> setelah menunggu ACC, praktikan dapat lanjut ke step berikutnya

5. Pemilihan Dosen Pembimbing & Asisten Lab :
--> Praktikan bisa request Dosen Pembimbing (Pembimbing) dan ASLAB (Asisten) mana yang mereka inginkan
--> SuperAdmin pun bisa mereject request dari praktikan dan memilihkannya secara tidak sepihak
--> setelah menunggu ACC dari SuperAdmin, praktikan dapat lanjut ke step berikutnya

6. Pendaftaran Kelompok :
--> Praktikan bisa memilih kelompok yang telah disediakan oleh Asisten setiap kelompok berisi 3-5 orang
--> jika Praktikan belum memiliki kelompok maka Asisten bisa memasukkannya ke kelompok yang belum penuh
--> jika praktikan sudah memasuki kelompok, praktikan mengajukan kelompoknya dan menunggu ACC dari Asisten
--> setelah menunggu ACC, praktikan dapat lanjut ke step berikutnya

7. Pembagian Modul :
--> Asisten akan membagikan modul buku fisik atau e-book

8. Data Diri :
--> praktikan diharuskan mengecek kembali data-data yang telah mereka dapatkan dari point ke 1 sampai 7

9. Penjadwalan Praktikum :
--> SuperAdmin membuatkan modul modul dan form pengujian dari praktikum yang ada didalam lab Tehnik Sipil
--> Asisten akan membuatkan pernjadwalan dari praktikum, asistensi ke ASLAB (Asisten), Kepala Lab (SuperAdmin), Dosen Pembimbing (Pembimbing) yang diampu oleh praktikan

10. Pelaksanaan Praktikum :
--> SuperAdmin atau Asisten Mengkoordinir yang akan melaksanakan praktikum
--> mengunakan sistem shift (misal dikarenakan kelompok banyak lab tidak muat) dan praktikum Tehnik Sipil memakan waktu berjam-jam hingga berhari-hari
--> Praktikan diharapkan absen terlebih dahulu sebelum mengikuti praktikum (opsional mengirimkan bukti foto datang ke lab)
--> setelah praktikan melakukan absensi maka akan diarahkan ke form untuk mengisi data dari pengujian
--> praktikan mengisi form dan mengirimkan foto hasil dari pengujian tersebut
--> setelah melakukan pengujian, praktikan mengirimkan form tersebut

11. Asistensi :
--> praktikan melakukan asistensi personal tidak kelompok dengan ASLAB (Asisten), Kepala Lab (SuperAdmin), Dosen Pembimbing (Pembimbing) yang telah dijadwalkan sebelumnya
--> praktikan boleh mereschedule jadwal asistensi kepada 3 pihak tersebut asalkan kedua belah pihak (Praktikan) dan (pengasistensi) setuju
--> dari ketika pihak tersebut tidak bisa lompat harus melalui alur asistensi Asisten -> SuperAdmin -> Pembimbing
--> ketika salah satu pihak tidak ACC maka tidak dapat lanjut ke step-step berikutnya
--> praktikan melakukan asistensi setiap bab tidak diperkenankan semua bab 1x asistensi harus bertahap
--> pada saat asistensi praktikan bisa mendapatkan status reivisi/approve yang artinya laporan dari bab tersebut belum sepenuhnya di ACC oleh ke-3 pihak tersebut
--> ketika sudah mendapatkan ACC dari semua pihak 
--> lanjut untuk melaksanakan bab bab selanjutnya yang telah ditentukan didalam modul yang dibuat oleh SuperAdmin dan dijadwalkan oleh Asisten

12. Penilaian Laporan :
--> praktikan melakukan penilaian laporan ketika bab dari modul terselesaikan semuanya
--> segi penilaian, penilaian kelompok, penilaian individu
--> (Penilaian SuperAdmin 40% x 15)
--> (Penilaian Pembimbing 60% x 80)
--> (total rata-rata)
--> jika SuperAdmin tidak men-ACC dari Laporan tersebut maka tidak diperbolehkan untuk melakukan penilaian kepada Pembimbing

13. Setelah Praktikum :
--> setelah praktikum modul yang diampu sudah selesai, praktikan menunggu kembali praktikum modul lainnya yang nantinya disiapkan kembali oleh SuperAdmin dan Asisten
--> kembali ke langkah nomor 3 (ini untuk Praktikan yang sudah melakukan register)

noted :
--> ada mahasiswa yang mengulang praktikum karena nilainya kurang (mengulang sesuai semester praktikum yang diampu)

fitur :
--> chat realtime
--> video call (meet) seperti google meet
--> Form Builder (form dibuat oleh SuperAdmin / Asisten)


---- Praktikum Tehnik Sipil ----

--> Praktikum Ilmu Ukur Tanah (Semester 1)  
--> Praktikum Teknologi Beton (Semester 1)  
--> Praktikum Kimia I (Semester 1)

--> Praktikum Kimia II (Semester 2)

--> Praktikum Mekanika Tanah I (Semester 3)
--> Praktikum Fisika (Semester 3)  

--> Praktikum Mekanika Tanah II (Semester 4)

--> Praktikum Hidroloka (Semester 5)

--> Praktikum Bahan Jalan (Semester 6)  

---- RINGKASAN SEMESTER DAN PENGUJIAN ----

| No | Praktikum                | Semester | Jenis Pengujian                        |
|----|--------------------------|----------|----------------------------------------|
| 1  | Ilmu Ukur Tanah          | 1        | Ujian Praktik, Tertulis, Laporan       |
| 2  | Teknologi Beton          | 1        | Ujian Praktik, Tertulis, Laporan       |
| 3  | Kimia I                  | 1        | Ujian Praktik, Tertulis, Laporan       |
| 4  | Kimia II                 | 2        | Ujian Praktik, Tertulis, Laporan       |
| 5  | Mekanika Tanah I         | 3        | Ujian Praktik, Tertulis, Laporan       |
| 6  | Fisika                   | 3        | Ujian Praktik, Tertulis, Laporan       |
| 7  | Mekanika Tanah II        | 4        | Ujian Praktik, Tertulis, Laporan       |
| 8  | Hidrolika                | 5        | Ujian Praktik, Tertulis, Laporan       |
| 9  | Bahan Jalan              | 6        | Ujian Praktik, Tertulis, Laporan       |


// Use DBML to define your database structure
// Docs: https://dbml.dbdiagram.io/docs


// Enum
Enum user_role {
  SuperAdmin
  Pembimbing
  Asisten
  Praktikan
}

Enum user_gender {
  Male
  Female
}

Enum semester_praktikum {
  "1"
  "2"
  "3"
  "4"
  "5"
  "6"
}

Enum payment_status {
  Pending
  Approved
  Rejected
}

Enum asisten_status {
  Pending
  Approved
  Revised
}

Enum superadmin_status {
  Pending
  Approved
  Revised
}

Enum pembimbing_status {
  Pending
  Approved
  Revised
}

Enum report_status {
  Pending
  Approved
  Revised
}

// Table
Table users {
  id integer [primary key]
  id_user integer [primary key, not null, unique]

  full_name varchar(255) [not null]
  npm varchar(255) [not null]
  email varchar(255) [not null]
  phone varchar(255) [not null]
  password varchar(255) [not null]
  gender user_gender [not null]
  role user_role
  profile_picture blob

  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table praktikums {
  id integer [primary key]
  id_praktikum integer [primary key, not null, unique]
  
  name_praktikum varchar(255) [not null]
  semester semester_praktikum [not null]

  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table payments {
  id integer [primary key]
  id_payment integer [primary key, not null, unique]
  
  user_id integer [not null]
  praktikum_id integer [not null]
  payment_proof bloob [not null]
  status payment_status
  verified_by varchar(255)

  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table module_praktikums {
  id integer [primary key]
  id_module_praktikum integer [primary key, not null, unique]

  praktikum_id integer
  name varchar(255) [not null]
  description text [not null]
  file_path varchar(255)

  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table teams {
  id integer [primary key]
  id_team integer [primary key, not null, unique]

  praktikum_id integer
  name varchar(255) [not null]
  max_members integer

  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table team_members {
  id integer [primary key]

  team_id integer
  user_id integer
}

Table praktikum_schedules {
  id integer [primary key]
  id_schedule integer [primary key, not null, unique]

  praktikum_id integer
  asisten_id integer
  pembimbing_id integer
  user_id integer
  date_schedule date
  time_start_schedule time
  time_end_schedule time
  
  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table asistensi {
  id integer [primary key]
  id_asistensi integer [primary key, not null, unique]

  praktikum_id integer
  praktikan_id integer

  asisten asisten_status
  superadmin superadmin_status
  pembimbing pembimbing_status
  
  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table report_praktikums {
  id integer [primary key]
  id_report integer [primary key, not null, unique]

  praktikum_id integer
  praktikan_id integer
  file_path varchar
  report report_status
  
  created_at timestamp [default: `now()`]
  updated_at timestamp
}


Table scores {
  id integer [primary key]
  id_score integer [primary key, not null, unique]

  praktikum_id integer
  praktikan_id integer
  score_superadmin float // 40%
  score_pembimbing float // 60%
  score_total float // rata-rata
  score_predicate varchar // konversi ke huruf
  
  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table chats {
  id integer [primary key]
  id_chat integer [primary key, not null, unique]

  sender_id integer [not null]
  receiver_id integer [not null]
  message text [not null]
  attachment varchar(255)
  is_read boolean [default: false]

  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table video_calls {
  id integer [primary key]
  id_video_call integer [primary key, not null, unique]

  caller_id integer [not null]
  receiver_id integer [not null]
  status enum('ongoing', 'ended', 'missed') [default: 'ongoing']
  call_duration integer [default: 0] // Durasi dalam detik

  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table forms {
  id integer [primary key]
  id_form integer [primary key, not null, unique]

  created_by integer [not null] // SuperAdmin atau Asisten
  title varchar(255) [not null]
  description text
  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table form_fields {
  id integer [primary key]
  id_field integer [primary key, not null, unique]

  form_id integer [not null]
  label varchar(255) [not null]
  type enum('text', 'number', 'date', 'file', 'radio', 'checkbox', 'textarea', 'select') [not null]
  options text // JSON atau CSV untuk pilihan (jika radio/checkbox/select)
  is_required boolean [default: true]

  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table form_responses {
  id integer [primary key]
  id_response integer [primary key, not null, unique]

  form_id integer [not null]
  user_id integer [not null] // User yang mengisi form
  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Table form_answers {
  id integer [primary key]
  id_answer integer [primary key, not null, unique]

  response_id integer [not null]
  field_id integer [not null]
  answer text [not null] // Bisa teks atau path file jika upload

  created_at timestamp [default: `now()`]
  updated_at timestamp
}

Ref: "payments"."user_id" < "users"."id_user"
Ref: "payments"."verified_by" < "users"."id_user"
Ref: "payments"."praktikum_id" < "praktikums"."id_praktikum"

Ref: "module_praktikums"."praktikum_id" < "praktikums"."id_praktikum"

Ref: "teams"."praktikum_id" < "praktikums"."id_praktikum"

Ref: "team_members"."team_id" < "teams"."id_team"
Ref: "team_members"."user_id" < "users"."id_user"

Ref: "praktikum_schedules"."praktikum_id" < "praktikums"."id_praktikum"
Ref: "praktikum_schedules"."user_id" < "users"."id_user"
Ref: "praktikum_schedules"."pembimbing_id" < "users"."id_user"

Ref: "asistensi"."praktikum_id" < "praktikums"."id_praktikum"
Ref: "asistensi"."praktikan_id" < "users"."id_user"

Ref: "report_praktikums"."praktikum_id" < "praktikums"."id_praktikum"
Ref: "report_praktikums"."praktikan_id" < "users"."id_user"

Ref: "scores"."praktikum_id" < "praktikums"."id_praktikum"
Ref: "scores"."praktikan_id" < "users"."id_user"

Ref: "chats"."sender_id" < "users"."id_user"
Ref: "chats"."receiver_id" < "users"."id_user"

Ref: "video_calls"."caller_id" < "users"."id_user"
Ref: "video_calls"."receiver_id" < "users"."id_user"

Ref: "forms"."created_by" < "users"."id_user"

Ref: "form_fields"."form_id" < "forms"."id_form"

Ref: "form_responses"."form_id" < "forms"."id_form"
Ref: "form_responses"."user_id" < "users"."id_user"

Ref: "form_answers"."response_id" < "form_responses"."id_response"
Ref: "form_answers"."field_id" < "form_fields"."id_field"