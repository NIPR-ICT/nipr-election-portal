<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-danger-subtle">
    <div class="container text-center mt-5">
        <div class="card shadow-sm border-danger">
            <div class="card-body">
                <h1 class="text-danger">Payment Failed</h1>
                <p class="lead">Unfortunately, the payment did not go through. Please try again.</p>
                {{-- <a href="/retry" class="btn btn-danger">Try Again</a> --}}
                <p class="mt-3"><a href="/" class="btn btn-link">Go to Homepage</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>