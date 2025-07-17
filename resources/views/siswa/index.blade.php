<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Daftar Siswa</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <style>
        .siswa-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 1rem;
        }

        @media (min-width: 576px) {
            .siswa-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 768px) {
            .siswa-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .siswa-card {
            border: 1px solid #dee2e6;
            border-radius: 1rem;
            padding: 1rem;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
            align-items: center;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.5s cubic-bezier(.4, 2, .3, 1);
            min-width: 0;
        }

        .siswa-card.show {
            opacity: 1;
            transform: translateY(0);
        }

        .siswa-foto {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 0.75rem;
            margin-bottom: 0.75rem;
            background: #f0f0f0;
        }

        .siswa-info {
            flex: 1;
            width: 100%;
            text-align: center;
        }

        .siswa-nama {
            font-weight: bold;
            word-break: break-word;
            white-space: normal;
        }
    </style>
</head>

<body>
    <div class="container mt-4 mb-4">
        <h2 class="mb-4 text-center">Daftar Siswa</h2>
        <div class="row justify-content-center">
            <div
                class="col-12"
                id="siswa-list"
            >
                <!-- Siswa cards will be rendered here by JS -->
            </div>
        </div>
    </div>
    <script>
        async function fetchSiswa() {
            const res = await fetch('/siswa/json');
            const data = await res.json();
            const list = document.getElementById('siswa-list');
            list.innerHTML = '';
            if (data.length === 0) {
                list.innerHTML = '<div class="alert alert-info text-center">Belum ada data siswa.</div>';
                return;
            }
            const grid = document.createElement('div');
            grid.className = 'siswa-grid';
            data.forEach((s, i) => {
                const card = document.createElement('div');
                card.className = 'siswa-card';
                card.innerHTML = `
            ${s.foto ? `<img src='/storage/${s.foto}' alt='Foto Siswa' class='siswa-foto'>` : `<div class='siswa-foto d-flex align-items-center justify-content-center text-muted'>-</div>`}
            <div class='siswa-info'>
                <div class='siswa-nama'>${s.nama}</div>
                <div class='text-secondary'>Kelas: ${s.kelas_nama ?? '-'}</div>
            </div>
        `;
                grid.appendChild(card);
                setTimeout(() => card.classList.add('show'), 100 + i * 80);
            });
            list.appendChild(grid);
        }

        fetchSiswa();

        document.addEventListener('DOMContentLoaded', () => {
            setInterval(fetchSiswa, 5000);
        });
    </script>
</body>

</html>
