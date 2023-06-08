<?php
session_start();
$title = "Materi";
include 'layout/header-user.php';

if ($_SESSION["email"]){
    $bangun_ruang = [
        [
            'nama' => 'Kubus',
            'img' => 'assets/img/materi/kubus.png',
            'luas' => '6 X (S X S)',
            'volume' => 'S X S X S',
            'keterangan' => 'S = Sisi',
        ],
        [
            'nama' => 'Balok',
            'img' => 'assets/img/materi/balok.png',
            'luas' => '2 x (p.l + p.t + l.t )',
            'volume' => 'p x l x t',
            'keterangan' => 'p = panjang, l = Lebar, t = Tinggi',
        ],
        [
            'nama' => 'Prisma',
            'img' => 'assets/img/materi/prisma.png',
            'luas' => 't x (Kel.alas )+(2 x La)',
            'volume' => 'La x t ',
            'keterangan' => 'La = Luas Alas, t = Tinggi',
        ],
        [
            'nama' => 'Tabung',
            'img' => 'assets/img/materi/tabung.png',
            'luas' => 'Luas = 2 x π x r x (r+t)',
            'volume' => 'π x r^2 x t',
            'keterangan' => 'π = phi (22/7 atau 3,14), r  = Jari-jari alas lingkaran, t = Tinggi',
        ],
        [
            'nama' => 'Limas',
            'img' => 'assets/img/materi/limas.png',
            'luas' => 'Luas =  LA + LSisi Tegak',
            'volume' => '1/3 x La x t ',
            'keterangan' => 'La = luas alas, t = tinggi',
        ],
        [
            'nama' => 'Kerucut',
            'img' => 'assets/img/materi/kerucut.png',
            'luas' => 'selimut = π x r xs, permukaan = π x r x s + π x r x r',
            'volume' => '1/3 x La x t ',
            'keterangan' => 'La = luas alas, t = tinggi',
        ],
    ];

    $bangun_datar = [
        [
            'nama' => 'Persegi',
            'img' => 'assets/img/materi/persegi.png',
            'luas' => 's x s',
            'keliling' => '4 x s',
            'keterangan' => 's = Panjang sisi',
        ],
        [
            'nama' => 'Persegi Panjang',
            'img' => 'assets/img/materi/persegi_panjang.png',
            'luas' => 'p x l',
            'keliling' => '2 x ( p + l)',
            'keterangan' => 'P = Panjang, l = lebar',
        ],
        [
            'nama' => 'Segitiga',
            'img' => 'assets/img/materi/segitiga.png',
            'luas' => '1/2 x a x t',
            'keliling' => 'sisi a  + sisi b + sisi c ',
            'keterangan' => 'a = panjang sisi alas, t  = tinggi',
        ],
        [
            'nama' => 'Lingkaran',
            'img' => 'assets/img/materi/lingkaran.png',
            'luas' => 'π x r^2',
            'keliling' => '2 x π x r ',
            'keterangan' => 'r = jari-jari,π = 22/7 atau 3,14',
        ],
        [
            'nama' => 'Trapesium',
            'img' => 'assets/img/materi/trapesium.jpg',
            'luas' => '1/2 X ( s1 + s2) x t ',
            'keliling' => 's1 + s2 + s3 + s4',
            'keterangan' => 'S1 & s2 = sisi sejajar, t = Tinggi',
        ],
        [
            'nama' => 'Jajar Genjang',
            'img' => 'assets/img/materi/jajar_genjang.png',
            'luas' => 'a x t',
            'keliling' => 'a + b + c + d',
            'keterangan' => 'a = alas, t = tinggi',
        ],
        [
            'nama' => 'Belah Ketupat',
            'img' => 'assets/img/materi/belah_ketupat.png',
            'luas' => '1/2 x d1 x d2',
            'keliling' => 'a + b + c + d',
            'keterangan' => 'd1 = diagonal 1, d2 = diagonal 2',
        ],
    ];

?>

<audio loop autoplay>
				<source src="assets/audio/kids.mp3" type="audio/mpeg">
				<source src="assets/audio/kids.ogg" type="audio/ogg">
			</audio>
            
<div class="container mb-2" style="display: flex; justify-content: center;">
    <div class="card materi">
        <h3 class="mb-5 text-center" style="color: #189f87">BANGUN DATAR</h3>
        <?php
        foreach ($bangun_datar as $datar) {
        ?>
        <div style="display: flex; flex-wrap:wrap; ">
            <div style="width: 15rem; width: 12rem; margin-right: 2rem;">
                <img style="width: 100%;" src="<?php echo $datar['img'] ?>" alt="" srcset="">
            </div>
            <div>
                <!-- <a href="#">Baca selengkapnya..</a> -->
                <h5><?php echo $datar['nama'] ?></h5>
                <div style="margin-top: 1.5rem;">
                <p>Luas : <?php echo $datar['luas'] ?></p>
                <p>Keliling : <?php echo $datar['keliling'] ?></p>
                <p>Keterangan : <?php echo $datar['keterangan'] ?></p>
                </div>
            </div>
        </div>
        <hr>
        <?php
        }
        ?>
        
    </div>
</div>

<div class="container mb-5" style="display: flex; justify-content: center;">
    <div class="card materi">
        <h3 class="mb-5 text-center" style="color: #189f87">BANGUN RUANG</h3>
        <?php
        foreach ($bangun_ruang as $ruang) {
        ?>
        <div style="display: flex; flex-wrap:wrap; ">
            <div style="width: 15rem; width: 12rem; margin-right: 2rem;">
                <img style="width: 100%;" src="<?php echo $ruang['img'] ?>" alt="" srcset="">
            </div>
            <div>
                <!-- <a href="#">Baca selengkapnya..</a> -->
                <h5><?php echo $ruang['nama'] ?></h5>
                <div style="margin-top: 1.5rem;">
                <p>Luas : <?php echo $ruang['luas'] ?></p>
                <p>Valume : <?php echo $ruang['volume'] ?></p>
                <p>Keterangan : <?php echo $ruang['keterangan'] ?></p>
                </div>
            </div>
        </div>
        <hr>
        <?php
        }
        ?>
        
    </div>
</div>

<?php
} else {
    header("Location: login-user.php");
    exit();
}
include 'layout/footer-user.php';
?>

