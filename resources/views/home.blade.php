<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Pembekalan TKJ 2025</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    >
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
            min-height: 100vh;
        }

        .main-container {
            max-width: 420px;
            margin: 0 auto;
            margin-top: 10vh;
            background: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
            padding: 2.5rem 1.5rem 2rem 1.5rem;
        }

        .main-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1.2rem;
        }

        .main-logo i {
            font-size: 3.2rem;
            color: #2563eb;
        }

        .main-title {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 0.5rem;
            color: #1e293b;
        }

        .main-subtitle {
            font-size: 1.1rem;
            text-align: center;
            color: #64748b;
            margin-bottom: 1.5rem;
        }

        .main-btn {
            width: 100%;
            padding: 1.2rem;
            font-size: 1.1rem;
            margin-bottom: 1.1rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.7rem;
            font-weight: 500;
        }

        .main-btn i {
            font-size: 1.3rem;
        }

        @media (max-width: 480px) {
            .main-container {
                padding: 1.2rem 0.5rem 1.2rem 0.5rem;
            }

            .main-title {
                font-size: 1.3rem;
            }
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="main-logo">
            <i class="fa-solid fa-graduation-cap"></i>
        </div>
        <div class="main-title">Pembekalan TKJ 2025</div>
        <div class="main-subtitle">Umar Abdur Rahman &amp; Team</div>
        <a
            href="/siswa/create"
            class="btn btn-primary main-btn"
        >
            <i class="fa-solid fa-user-plus"></i> Daftar Hadir
        </a>
        <a
            href="/siswa"
            class="btn btn-outline-primary main-btn"
        >
            <i class="fa-solid fa-users"></i> View Siswa
        </a>
    </div>
</body>

</html>
