<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Tambah Siswa</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>
    <div class="container mt-5">
        <h2>Tambah Siswa</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form
            action="{{ route('siswa.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="mb-3">
                <label
                    for="nama"
                    class="form-label"
                >Nama Siswa</label>
                <input
                    type="text"
                    class="form-control"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    required
                >
            </div>
            <div class="mb-3">
                <label
                    for="kelas_id"
                    class="form-label"
                >Kelas</label>
                <select
                    class="form-select"
                    id="kelas_id"
                    name="kelas_id"
                    required
                >
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                        <option
                            value="{{ $k->id }}"
                            {{ old('kelas_id') == $k->id ? 'selected' : '' }}
                        >{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label
                    for="foto"
                    class="form-label"
                >Foto (opsional)</label>
                <input
                    type="file"
                    class="form-control"
                    id="foto"
                    name="foto"
                    accept="image/*"
                >
            </div>
            <button
                type="submit"
                class="btn btn-primary"
            >Simpan</button>
        </form>
    </div>
</body>

</html>
