<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM member WHERE email='$email'";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['email'] = $row['email'];
        header("Location: profil.php");
        exit();
    } else {
        $error = "Email atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
    <title> | Z.KI GYM</title>
</head>

<body>
    <nav>
        <a href="halamanawal.php">
            <button class="mx-auto m-1 btn-sm btn btn-warning text-white">HOME</button>
        </a>
    </nav>

    <header class="section__container header__container">
        <div class="header__content">
            <span class="bg__blur"></span>
            <span class="bg__blur header__blur"></span>
            <h4>BEST GYM IN Yogyakarta</h4>
            <h1><span>MAKE</span> YOUR BODY SHAPE</h1>
            <p>
                Raih potensi Anda dan mulailah perjalanan menuju diri yang lebih kuat,
                lebih bugar, dan lebih percaya diri. Daftarlah untuk 'Bentuk Tubuh Anda' sekarang
                dan saksikan transformasi luar biasa yang dapat dicapai oleh tubuh Anda!</p>
        </div>
        <div class="header__image">
            <img src="assets/images/header.png" alt="header" />
        </div>
    </header>

    <section class="section__container explore__container">
        <div class="explore__header">
            <h2 class="section__header">EXPLORE OUR PROGRAM</h2>
            <div class="explore__nav">
                <span><i class="ri-arrow-left-line"></i></span>
                <span><i class="ri-arrow-right-line"></i></span>
            </div>
        </div>
        <div class="explore__grid">
            <div class="explore__card">
                <span><i class="ri-boxing-fill"></i></span>
                <h4>Strength</h4>
                <p>
                    Embrace the essence of strength as we delve into its various
                    dimensions physical, mental, and emotional.
                </p>
                <a href="#">Join Now <i class="ri-arrow-right-line"></i></a>
            </div>
            <div class="explore__card">
                <span><i class="ri-heart-pulse-fill"></i></span>
                <h4>Physical</h4>
                <p>
                    It encompasses a range of activities that improve health, strength,
                    flexibility, and overall well-being.
                </p>
                <a href="#">Join Now <i class="ri-arrow-right-line"></i></a>
            </div>
            <div class="explore__card">
                <span><i class="ri-run-line"></i></span>
                <h4>Fat Lose</h4>
                <p>
                    Through a combination of workout routines and expert guidance, we'll
                    empower you to reach your goals.
                </p>
                <a href="#">Join Now <i class="ri-arrow-right-line"></i></a>
            </div>
            <div class="explore__card">
                <span><i class="ri-shopping-basket-fill"></i></span>
                <h4>Weight Gain</h4>
                <p>
                    Designed for individuals, our program offers an effective approach
                    to gaining weight in a sustainable manner.
                </p>
                <a href="#">Join Now <i class="ri-arrow-right-line"></i></a>
            </div>
        </div>
    </section>

    <section class="section__container class__container">
        <div class="class__image">
            <span class="bg__blur"></span>
            <img src="assets/images/class-1.jpg" alt="class" class="class__img-1" />
            <img src="assets/images/class-2.jpg" alt="class" class="class__img-2" />
        </div>
        <div class="class__content">
            <h2 class="section__header">KELAS YANG AKAN ANDA DAPATKAN</h2>
            <p>
                Dipimpin oleh tim instruktur ahli dan motivasional kami, "Kelas yang Akan Anda Dapatkan di Sini" adalah
                sesi berenergi tinggi yang berfokus pada hasil, menggabungkan campuran sempurna antara kardio, latihan
                kekuatan, dan latihan fungsional. Setiap kelas dirancang dengan cermat untuk membuat Anda tetap terlibat
                dan tertantang, memastikan Anda tidak pernah mengalami stagnasi dalam upaya kebugaran Anda.
            </p>
        </div>
    </section>

    <section class="section__container join__container">
        <h2 class="section__header">KENAPA HARUS BERGABUNG ?</h2>
        <p class="section__subheader">
            Basis keanggotaan kami yang beragam menciptakan suasana yang ramah dan mendukung, di mana Anda dapat
            berteman dan tetap termotivasi.
        </p>
        <div class="join__image">
            <img src="assets/images/join.jpg" alt="Join" />
            <div class="join__grid">
                <div class="join__card">
                    <span><i class="ri-user-star-fill"></i></span>
                    <div class="join__card__content">
                        <h4>Personal Trainer</h4>
                        <p>Unlock your potential with our expert Personal Trainers.</p>
                    </div>
                </div>
                <div class="join__card">
                    <span><i class="ri-vidicon-fill"></i></span>
                    <div class="join__card__content">
                        <h4>Practice Sessions</h4>
                        <p>Elevate your GYM with practice sessions.</p>
                    </div>
                </div>
                <div class="join__card">
                    <span><i class="ri-building-line"></i></span>
                    <div class="join__card__content">
                        <h4>Good Management</h4>
                        <p>Supportive management, for your GYM success.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section__container price__container">
        <h2 class="section__header">RENCANA KITA</h2>
        <p class="section__subheader">
            Rencana harga kami dilengkapi dengan berbagai tingkat keanggotaan, masing-masing dirancang untuk memenuhi
            preferensi dan tujuan kebugaran yang berbeda.
        </p>
        <div class="price__grid">
            <div class="price__card">
                <div class="price__card__content">
                    <h4>Rencana Harian</h4>
                    <h3>Rp. 50.000</h3>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Smart workout plan
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        At home workouts
                    </p>
                </div>
                <nav>
                    <a href="form_pembelian.php">
                        <button class="btn price__btn">Join Now</button>
                    </a>
                </nav>
            </div>
            <div class="price__card">
                <div class="price__card__content">
                    <h4>Rencana Mingguan</h4>
                    <h3>Rp. 300.000</h3>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        PRO Gyms
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Smart workout plan
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        At home workouts
                    </p>
                </div>
                <nav>
                    <a href="form_pembelian.php">
                        <button class="btn price__btn">Join Now</button>
                    </a>
                </nav>
            </div>
            <div class="price__card">
                <div class="price__card__content">
                    <h4>Rencana Bulanan</h4>
                    <h3>Rp. 9.000.000</h3>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        ELITE Gyms & Classes
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        PRO Gyms
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Smart workout plan
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        At home workouts
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Personal Training
                    </p>
                </div>
                <nav>
                    <a href="form_pembelian.php">
                        <button class="btn price__btn">Join Now</button>
                    </a>
                </nav>
            </div>
        </div>
    </section>

    <section class="review">
        <div class="section__container review__container">
            <span><i class="ri-double-quotes-r"></i></span>
            <div class="review__content">
                <h4>MEMBER REVIEW</h4>
                <p>
                    Yang benar-benar membedakan gym ini adalah tim pelatih ahli mereka. Para pelatihnya berpengetahuan
                    luas, mudah didekati, dan benar-benar berkomitmen untuk membantu anggota mencapai tujuan kebugaran
                    mereka. Mereka meluangkan waktu untuk memahami kebutuhan individu dan membuat rencana latihan yang
                    dipersonalisasi, memastikan hasil maksimal dan keselamatan.
                </p>
                <div class="review__rating">
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-half-fill"></i></span>
                </div>
                <div class="review__footer">
                    <div class="review__member">
                        <img src="assets/images/zzz.jpg" alt="member" />
                        <div class="review__member__details">
                            <h4>Rio Rusdi</h4>
                            <p>Barber</p>
                        </div>
                    </div>
                    <div class="review__nav">
                        <span><i class="ri-arrow-left-line"></i></span>
                        <span><i class="ri-arrow-right-line"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="section__container footer__container">
        <span class="bg__blur"></span>
        <span class="bg__blur footer__blur"></span>
        <div class="footer__col">
            <p>
                "Rasa sakit yang kamu rasakan hari ini akan menjadi kekuatan yang kamu rasakan besok."
            </p>
            <p>
                "Jangan batasi tantanganmu. Tantanglah batasanmu."
            </p>
            <div class="footer__socials">
                <a href="#"><i class="ri-facebook-fill"></i></a>
                <a href="#"><i class="ri-instagram-line"></i></a>
                <a href="#"><i class="ri-twitter-fill"></i></a>
            </div>
        </div>
        <div class="footer__col">
            <h4>Company</h4>
            <a href="#">Business</a>
            <a href="#">Franchise</a>
            <a href="#">Partnership</a>
            <a href="#">Network</a>
        </div>
        <div class="footer__col">
            <h4>About Us</h4>
            <a href="#">Blogs</a>
            <a href="#">Security</a>
            <a href="#">Careers</a>
        </div>
        <div class="footer__col">
            <h4>Contact</h4>
            <a href="#">Contact Us</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">BMI Calculator</a>
        </div>
    </footer>
    <div class="footer__bar">
        Copyright © 2023 Z.KI GYM. All rights reserved.
    </div>
</body>

</html>