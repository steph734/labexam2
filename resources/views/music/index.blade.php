<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Gallery</title>
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
        .create-music-btn {
    padding: 0.5rem 1rem; 
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 4px;
    text-decoration: none;
    color: #000;
    font-size: 1rem; 
    transition: background-color 0.2s ease;
}
        .create-music-btn:hover {
            color: #fff;
            background-color: #161a1e; 
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
        .card-container {
            display: flex;
            flex-direction: column;
            gap: 0.5rem; 
        }
        .card {
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            background-color: #fff;
            box-shadow: none;
        }
        .card-body {
            padding: 0.75rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-title {
        font-family: 'Inter', sans-serif; 
        font-size: 1.25rem;
        font-weight: 600; 
        color: #1a1a1a; 
        margin-bottom: 0.5rem; 
    }

    .card-text {
        font-family: 'Inter', sans-serif; 
        font-size: 0.875rem;
        font-weight: 400; 
        color: #666; 
        margin-bottom: 0.25rem; 
        line-height: 1.4; 
    }
        .dropdown-toggle {
            padding: 0.25rem 0.5rem;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 0.875rem;
            text-decoration: none;
            color: #000;
        }
        .dropdown-toggle::after {
            margin-left: 0.25rem;
        }
        .dropdown-menu {
            border-radius: 4px;
            border: 1px solid #ced4da;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .dropdown-item {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-container">
            <h1 class="header-title">Music Gallery</h1>
        </div>
    </header>

    <div class="container">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <a href="{{ route('music.create') }}" class="create-music-btn">Create music</a>
        <br>
        <h2 class="section-title">Music</h2>
       
        <div class="card-container">
            @forelse (\App\Models\Music::all() as $music)
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">{{ $music->name }}</h5>
                            <p class="card-text">{{ $music->artist }}</p>
                            <p class="card-text">{{ $music->genre }}</p>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('music.edit', $music->id) }}">Edit</a></li>
                                <li>
                                    <form action="{{ route('music.destroy', $music->id) }}" method="POST" style="display:inline;">
                                        
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this music?')">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <p>No music entries found.</p>
            @endforelse
        </div>
    </div>

    <!-- Bootstrap JS for dropdown functionality -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>