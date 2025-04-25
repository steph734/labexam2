<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Music</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin: 0.5rem 0;
        }
        .form-label {
            font-weight: 400;
            margin-bottom: 0.25rem;
        }
        .form-control {
            border: none;
            border-bottom: 1px solid #ced4da;
            border-radius: 0;
            background-color: transparent;
            box-shadow: none;
            padding: 0.5rem 0;
        }

        .header {
            padding: 0.5rem 1rem;
            border-bottom: 1px solid #e0e0e0;
            background-color: #fff;
        }
        .header-container {
            max-width: 1200px;
            height: 50px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
        }
        .form-control, .form-select {
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: #fff;
            box-shadow: none;
            padding: 0.5rem;
        }
        .btn-primary {
            background-color: #fff;
            border: 1px solid #1d1f21;
            color: #1d1f21;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-transform: capitalize;
        }
        .btn-primary:hover {
            background-color: #1d1f21;
            border-color: #1d1f21;
        }
        .btn-secondary {
            background-color: transparent;
            border: 1px solid #dc3545;
            color: #dc3545;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-transform: capitalize;
        }
        .btn-secondary:hover {
            color: #d41c2e;
           border-color: #d41c2e;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-container">
            <h1 class="header-title">Actor Music</h1>
        </div>
    </header>
    <div class="container">
        <h2 class="section-title">Edit Music</h2>
        <form action="{{ route('music.update', $music->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $music->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="artist" class="form-label">Artist</label>
                <input type="text" class="form-control" id="artist" name="artist" value="{{ old('artist', $music->artist) }}" required>
                @error('artist')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre', $music->genre) }}" required>
                @error('genre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('music.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>