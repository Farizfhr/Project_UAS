<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Manajemen Siswa</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #333;
            }

            .container {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border-radius: 20px;
                padding: 3rem;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
                text-align: center;
                max-width: 500px;
                width: 90%;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .logo {
                background: linear-gradient(135deg, #667eea, #764ba2);
                width: 80px;
                height: 80px;
                border-radius: 50%;
                margin: 0 auto 2rem;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            }

            .logo svg {
                width: 40px;
                height: 40px;
                fill: white;
            }

            h1 {
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                background: linear-gradient(135deg, #667eea, #764ba2);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .subtitle {
                color: #666;
                font-size: 1.1rem;
                margin-bottom: 3rem;
                line-height: 1.6;
            }

            .auth-buttons {
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
            }

            .btn {
                padding: 1rem 2rem;
                border-radius: 50px;
                text-decoration: none;
                font-weight: 600;
                font-size: 1rem;
                transition: all 0.3s ease;
                border: none;
                cursor: pointer;
                min-width: 140px;
            }

            .btn-primary {
                background: linear-gradient(135deg, #667eea, #764ba2);
                color: white;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
            }

            .btn-secondary {
                background: transparent;
                color: #667eea;
                border: 2px solid #667eea;
            }

            .btn-secondary:hover {
                background: #667eea;
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            }

            .features {
                margin-top: 2.5rem;
                padding-top: 2.5rem;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
            }

            .features h3 {
                color: #333;
                margin-bottom: 1rem;
                font-size: 1.2rem;
            }

            .feature-list {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
                text-align: left;
            }

            .feature-item {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: #666;
                font-size: 0.9rem;
            }

            .feature-icon {
                width: 16px;
                height: 16px;
                fill: #667eea;
            }

            @media (max-width: 640px) {
                .container {
                    padding: 2rem;
                }

                h1 {
                    font-size: 2rem;
                }

                .auth-buttons {
                    flex-direction: column;
                    align-items: center;
                }

                .btn {
                    width: 100%;
                    max-width: 200px;
                }
            }

            .floating-shapes {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                z-index: -1;
            }

            .shape {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.1);
                animation: float 6s ease-in-out infinite;
            }

            .shape:nth-child(1) {
                width: 80px;
                height: 80px;
                top: 10%;
                left: 10%;
                animation-delay: 0s;
            }

            .shape:nth-child(2) {
                width: 60px;
                height: 60px;
                top: 20%;
                right: 10%;
                animation-delay: -2s;
            }

            .shape:nth-child(3) {
                width: 40px;
                height: 40px;
                bottom: 20%;
                left: 20%;
                animation-delay: -4s;
            }

            .shape:nth-child(4) {
                width: 100px;
                height: 100px;
                bottom: 10%;
                right: 20%;
                animation-delay: -1s;
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                33% { transform: translateY(-20px) rotate(120deg); }
                66% { transform: translateY(10px) rotate(240deg); }
            }
        </style>
    </head>
    <body>
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <div class="container">
            <div class="logo">
                <svg viewBox="0 0 24 24">
                    <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 7C14.64 7 14.31 7.14 14.05 7.36L12 9.36L9.95 7.36C9.69 7.14 9.36 7 9 7H3V9H8.64L10.95 11.36C11.31 11.72 11.69 12 12 12C12.31 12 12.69 11.72 13.05 11.36L15.36 9H21ZM12 13.5C11.2 13.5 10.5 14.2 10.5 15V22H13.5V15C13.5 14.2 12.8 13.5 12 13.5Z"/>
                </svg>
            </div>

            <h1>Manajemen Siswa</h1>
            <p class="subtitle">
                Sistem informasi terintegrasi untuk mengelola data siswa dengan mudah dan efisien
            </p>

            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Daftar</a>
            </div>

            <div class="features">
                <h3>Fitur Unggulan</h3>
                <div class="feature-list">
                    <div class="feature-item">
                        <svg class="feature-icon" viewBox="0 0 24 24">
                            <path d="M16 4C18.2 4 20 5.8 20 8S18.2 12 16 12S12 10.2 12 8S13.8 4 16 4M16 14C20.4 14 24 15.8 24 18V20H8V18C8 15.8 11.6 14 16 14M8.5 6C10.4 6 12 7.6 12 9.5S10.4 13 8.5 13S5 11.4 5 9.5S6.6 6 8.5 6M8.5 15C12.1 15 15 16.3 15 18V20H0V18C0 16.3 2.9 15 6.5 15H8.5Z"/>
                        </svg>
                        Data Siswa Lengkap
                    </div>
                    <div class="feature-item">
                        <svg class="feature-icon" viewBox="0 0 24 24">
                            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                        </svg>
                        Laporan Otomatis
                    </div>
                    <div class="feature-item">
                        <svg class="feature-icon" viewBox="0 0 24 24">
                            <path d="M12,2A3,3 0 0,1 15,5V11A3,3 0 0,1 12,14A3,3 0 0,1 9,11V5A3,3 0 0,1 12,2M19,11C19,14.53 16.39,17.44 13,17.93V21H11V17.93C7.61,17.44 5,14.53 5,11H7A5,5 0 0,0 12,16A5,5 0 0,0 17,11H19Z"/>
                        </svg>
                        Interface Mudah
                    </div>
                    <div class="feature-item">
                        <svg class="feature-icon" viewBox="0 0 24 24">
                            <path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z"/>
                        </svg>
                        Keamanan Terjamin
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
