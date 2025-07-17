<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Data Siswa</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>
    <div class="container mt-4 mb-4">
        <h2 class="mb-4 text-center">Data Siswa</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswas as $i => $siswa)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td style="max-width: 180px; word-break: break-word;">{{ $siswa->nama }}</td>
                            <td>{{ $siswa->kelas->nama ?? '-' }}</td>
                            <td>
                                @if ($siswa->foto)
                                    <img
                                        src="{{ asset('storage/' . $siswa->foto) }}"
                                        alt="Foto"
                                        width="48"
                                        height="48"
                                        style="object-fit:cover; border-radius:8px;"
                                    >
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <form
                                    action="{{ route('siswa.destroy', $siswa->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin hapus siswa ini?')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                    >Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td
                                colspan="5"
                                class="text-center"
                            >Belum ada data siswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
