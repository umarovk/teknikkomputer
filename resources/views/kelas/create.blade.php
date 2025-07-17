<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Tambah Kelas</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>
    <div class="container mt-5">
        <h2>Tambah Kelas</h2>
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
            action="{{ route('kelas.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="mb-3">
                <label
                    for="nama"
                    class="form-label"
                >Nama Kelas</label>
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
