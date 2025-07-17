<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Daftar Kelas</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <style>
        .kelas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 1rem;
        }

        @media (min-width: 576px) {
            .kelas-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 768px) {
            .kelas-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .kelas-card {
            border: 1px solid #dee2e6;
            border-radius: 1rem;
            padding: 1.2rem 1rem 1rem 1rem;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.5s cubic-bezier(.4, 2, .3, 1);
            position: relative;
            min-width: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .kelas-card.show {
            opacity: 1;
            transform: translateY(0);
        }

        .kelas-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            border-color: #b6d4fe;
        }

        .kelas-delete-btn {
            position: absolute;
            top: 8px;
            right: 8px;
            z-index: 2;
            padding: 0.2rem 0.5rem;
            font-size: 1.1rem;
            border-radius: 50%;
            line-height: 1;
        }

        .kelas-nama {
            font-weight: bold;
            font-size: 1.1rem;
            word-break: break-word;
            white-space: normal;
            text-align: center;
            margin-top: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="container mt-4 mb-4">
        <h2 class="mb-4 text-center">Daftar Kelas</h2>
        <div class="mb-3 text-center">
            <a
                href="{{ route('kelas.create') }}"
                class="btn btn-primary"
            >+ Create Kelas</a>
        </div>
        <div class="row justify-content-center">
            <div
                class="col-12"
                id="kelas-list"
            >
                <!-- Kelas cards will be rendered here by JS -->
            </div>
        </div>
    </div>
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >
    <script>
        async function fetchKelas() {
            const res = await fetch('/kelas/json');
            const data = await res.json();
            const list = document.getElementById('kelas-list');
            list.innerHTML = '';
            if (data.length === 0) {
                list.innerHTML = '<div class="alert alert-info text-center">Belum ada data kelas.</div>';
                return;
            }
            const grid = document.createElement('div');
            grid.className = 'kelas-grid';
            data.forEach((k, i) => {
                const card = document.createElement('div');
                card.className = 'kelas-card';
                card.innerHTML = `
                    <button class='btn btn-danger btn-sm kelas-delete-btn' data-id='${k.id}' title='Hapus'>&times;</button>
                    <div class='kelas-nama'>${k.nama}</div>
                `;
                grid.appendChild(card);
                setTimeout(() => card.classList.add('show'), 100 + i * 80);
            });
            list.appendChild(grid);
            // Tambah event listener delete
            list.querySelectorAll('.kelas-delete-btn').forEach(btn => {
                btn.addEventListener('click', async function(e) {
                    e.stopPropagation();
                    if (!confirm('Yakin hapus kelas ini?')) return;
                    const id = this.getAttribute('data-id');
                    const res = await fetch(`/kelas/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')
                                ?.content || '',
                        },
                    });
                    if (res.ok) fetchKelas();
                });
            });
        }

        fetchKelas();

        // Optional: polling for new data every 5s
        document.addEventListener('DOMContentLoaded', () => {
            setInterval(fetchKelas, 5000);
        });
    </script>
</body>

</html>
