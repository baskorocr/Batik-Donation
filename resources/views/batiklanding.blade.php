<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dharma Batik Week Competition</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body, html {
    height: 100%;
    font-family: 'Arial', sans-serif;
}

.container {
    background-image: url({{ asset('storage/cover_image/bg.jpg') }}); /* Ganti dengan URL gambar batik */
    background-size: cover;
    background-position: center;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.content {
    background: rgba(255, 255, 255, 0.8);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 2.5rem;
    color: #8B0000; /* Warna merah marun khas batik */
    margin-bottom: 15px;
}

p {
    font-size: 1.5rem;
    color: #333;
}

@media (max-width: 768px) {
    h1 {
        font-size: 2rem;
    }

    p {
        font-size: 1.2rem;
    }
}

@media (max-width: 480px) {
    h1 {
        font-size: 1.5rem;
    }

    p {
        font-size: 1rem;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>Thanks, for participant!</h1>
            <p>For your donation, we will distribute it to the Bakti Dharma Polimetal Foundation.</p>
            <p>See you next event :)</p>
        </div>
    </div>
</body>
</html>

