<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image and Text</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Upload Image and Text</h1>
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                        @if(isset($imageText) && $imageText->filename)
                            <img src="{{ Storage::url($imageText->filename) }}" alt="Current Image" class="mt-2 img-thumbnail" width="150">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="heading">Heading:</label>
                        <input type="text" name="heading" id="heading" class="form-control" value="{{ old('heading', $imageText->heading ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="sub_head">Sub Heading:</label>
                        <input type="text" name="sub_head" id="sub_head" class="form-control" value="{{ old('sub_head', $imageText->sub_head ?? '') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Upload</button>
                </form>
                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
