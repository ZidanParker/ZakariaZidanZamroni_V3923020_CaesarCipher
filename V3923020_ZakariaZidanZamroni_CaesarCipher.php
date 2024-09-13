<?php  
// Fungsi cipher untuk enkripsi dan dekripsi
function cipher($char, $key){
    if (ctype_alpha($char)) {
        $nilai = ord(ctype_upper($char) ? 'A' : 'a');
        $ch = ord($char);
        $mod = fmod($ch + $key - $nilai, 26);
        return chr($mod + $nilai);
    } else {
        return $char;
    }
} 

// Fungsi enkripsi
function enkripsi($input, $key){
    $output = "";
    $chars = str_split($input);
    foreach($chars as $char){
        $output .= cipher($char, $key);
    }
    return $output;
}

// Fungsi dekripsi
function dekripsi($input, $key){
    return enkripsi($input, 26 - $key);
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V3923020</title>
    <style>
    /* Gaya Umum */
    body {
        background-color: #1c1c1c; /* Warna gelap untuk latar belakang */
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #d4af37; /* Warna emas untuk teks */
    }

    /* Container */
    .container {
        background-color: #2e2e2e; /* Warna abu-abu gelap untuk container */
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6); /* Bayangan lebih gelap */
        width: 100%;
        max-width: 450px;
    }

    /* Judul */
    h1 {
        color: #d4af37; /* Warna emas untuk judul */
        font-size: 1.8em;
        margin-bottom: 15px;
        text-align: center;
    }

    /* Kolom Input */
    input[type="text"], input[type="number"], textarea {
        width: calc(100% - 20px);
        padding: 8px;
        margin: 8px 0;
        border: 1px solid #4d4d4d; /* Border abu-abu gelap */
        border-radius: 8px;
        font-size: 1em;
        background-color: #3c3c3c; /* Warna abu-abu lebih terang untuk input */
        color: #d4af37; /* Warna emas untuk teks di input */
    }

    /* Textarea */
    textarea {
        height: 80px;
        resize: none;
    }

    /* Tombol */
    .btn {
        background-color: #d4af37; /* Warna emas untuk tombol */
        color: #1c1c1c; /* Teks hitam untuk kontras dengan tombol emas */
        border: none;
        padding: 8px 16px;
        font-size: 1em;
        cursor: pointer;
        border-radius: 8px;
        margin: 8px;
    }

    .btn:hover {
        background-color: #b08d28; /* Warna emas lebih gelap saat dihover */
    }

    /* Footer */
    .footer {
        margin-top: 15px;
        font-size: 0.9em;
        color: #888; /* Warna abu-abu terang untuk teks footer */
        text-align: center;
    }

    .footer span {
        color: #d4af37; /* Emas untuk teks di footer */
        font-weight: bold;
    }
</style>

</head>
<body>
    <div class="container">
        <h1>Enkripsi & Dekripsi</h1>
        <form action="" method="post">
            <input type="text" name="plain" placeholder="Masukkan kalimat" required />
            <input type="number" name="key" placeholder="Masukkan kunci (0-25)" required />
            <br />
            <button type="submit" name="enkripsi" class="btn">Enkripsi</button>
            <button type="submit" name="dekripsi" class="btn">Dekripsi</button>
            <br />
            <textarea readonly placeholder="Hasil">
                <?php  
                    if (isset($_POST["enkripsi"])) { 
                        echo enkripsi($_POST["plain"], $_POST["key"]);
                    } else if (isset($_POST["dekripsi"])) {
                        echo dekripsi($_POST["plain"], $_POST["key"]);
                    }
                ?>
            </textarea>
        </form>
        <div class="footer">
            <span>Zidan Masih Pemula</span>
        </div>
    </div>
</body>
</html>