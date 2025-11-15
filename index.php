<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo audimed.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Audimed - Beranda</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f0f7ff;
            color: #333;
            line-height: 1.6;
        }

        .navbar {
        background-color: #338485;
        }

        .navbar .nav-link {
            color: white !important;
            font-weight: 500;
        }

        .navbar .nav-link:hover {
            color: #ffdd57 !important;
        }

        .navbar .nav-link.active {
            color: #ffd700;
        }
        
        .container {
            margin: 0 auto;
            margin-top: 40px;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }
        
        .nav-buttons {
            display: flex;
            gap: 15px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease; /* efek halus */
        }
        
        .btn-login {
            background-color: transparent;
            color: #338485;
            border: 2px solid #338485;
        }
        
        .btn-consult {
            background-color: #338485;
            color: white;
        }
        
        .btn-login:hover {
            background-color: #338485;
            color: white;
            transform: translateY(-2px); /* sedikit naik */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* beri bayangan */
        }
        
        .btn-consult:hover {
            background-color: #629496;
            color: white;
            transform: translateY(-2px); /* sedikit naik */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* beri bayangan */
        }
        
        .hero {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin: 50px 0;
            gap: 40px;
        }
        
        .hero-content {
            flex: 1;
            min-width: 300px;
        }
        
        .hero-content h1 {
            font-size: 42px;
            color: #338485;
            margin-bottom: 20px;
            line-height: 1.3;
        }
        
        .hero-content p {
            font-size: 20px;
            margin-bottom: 30px;
            color: #555;
        }
        
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
            }
            
            .nav-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid fs-5">
            <a class="navbar-brand" href="index.html">
                <img src="assets/logo.png" alt="logo audimed" width="140" height="auto" class="d-inline-block align-text-top">
            </a>

            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="before kuesioner.html">Konsultasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="hero">
            <div class="hero-content">
                <h1>Selamat datang di Audimed</h1>
                <p><strong>Konsultasi cepat dengan dokter THT, solusi tepat untuk telinga sehat.</strong></p>
                <p>Audimed, platform konsultasi kesehatan telinga akurat dan terpercaya. Dapatkan informasi terpercaya konsultasi mudah, solusi tepat dan kapan saja dalam menjaga kesehatan pendengaran Anda.</p>
                
                <div class="nav-buttons" style="justify-content: left; ">
                    <button class="btn btn-login" style="font-size: 20px;" onclick="window.location.href='masuk.html'">Masuk</button>
                    <button class="btn btn-consult" style="font-size: 20px;" onclick="window.location.href='before kuesioner.html'">Konsultasi</button>
                </div>
            </div>
            
            
            <div class="hero-image">
                    <img src="assets/dr meliyana.png" alt="dr. Meliyana Nabila" width="430" height="auto" class="d-inline-block align-text-top">
            </div>
        </div>
    </div>
</body>
</html>