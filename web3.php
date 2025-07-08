<?php
// PHP Logic – Server-side conversion
function celsiusToFahrenheit($c) {
    return ($c * 9/5) + 32;
}
function fahrenheitToCelsius($f) {
    return ($f - 32) * 5/9;
}
$hasil_php = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $suhu = floatval($_POST['suhu']);
    $jenis = $_POST['jenis'];
    if ($jenis === 'c_to_f') {
        $hasil_php = number_format(celsiusToFahrenheit($suhu), 2) . " °F";
    } elseif ($jenis === 'f_to_c') {
        $hasil_php = number_format(fahrenheitToCelsius($suhu), 2) . " °C";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Konversi Suhu Sci-Fi</title>
  <style>
    /* RESET & BASE */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      background: linear-gradient(135deg, #0a0f1a, #000);
      font-family: 'Segoe UI', sans-serif;
      color: #c7f0ff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    /* ENTRANCE ANIMATION */
    .container {
      animation: fadeIn 1.2s ease-out forwards;
      opacity: 0;
      transform: translateY(30px);
    }

    @keyframes fadeIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* CARD STYLE */
    .card {
      background: rgba(0, 15, 35, 0.65);
      border: 1px solid rgba(0, 200, 255, 0.2);
      border-radius: 20px;
      padding: 40px;
      width: 90%;
      max-width: 600px;
      box-shadow: 0 0 30px rgba(0, 200, 255, 0.2);
      backdrop-filter: blur(15px);
    }

    h1 {
      text-align: center;
      color: #00ccff;
      margin-bottom: 30px;
      text-shadow: 0 0 10px #00ccff;
    }

    h2 {
      color: #8deeff;
      font-size: 20px;
      margin-top: 20px;
      margin-bottom: 10px;
      border-bottom: 1px solid #0088cc44;
      padding-bottom: 5px;
    }

    .input-group {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    input, select {
      flex: 1;
      padding: 10px 15px;
      background: #001a2d;
      color: #c7f0ff;
      border: 1px solid #00ccff88;
      border-radius: 10px;
      font-size: 16px;
      transition: 0.3s ease;
    }

    input:focus, select:focus {
      border-color: #00ccff;
      outline: none;
      box-shadow: 0 0 5px #00ccff;
    }

    button {
      padding: 10px 20px;
      background: #00ccff;
      color: #00131f;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 0 10px #00ccff99;
    }

    button:hover {
      background: #00aaff;
      box-shadow: 0 0 15px #00ccff;
      transform: scale(1.05);
    }

    .result {
      background: #002b3d;
      padding: 12px;
      border: 1px solid #00ffcc55;
      border-radius: 10px;
      color: #00ffcc;
      font-weight: bold;
      margin-top: 10px;
      text-align: center;
      box-shadow: 0 0 10px #00ffcc55;
    }

    hr {
      border: none;
      height: 1px;
      background: #007caa55;
      margin: 30px 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h1>🌌 Konversi Suhu</h1>

      <h2>JavaScript (Client-Side)</h2>
      <div class="input-group">
        <input type="number" id="celsiusInput" placeholder="Celsius">
        <button onclick="convertToFahrenheit()">→</button>
        <input type="text" id="fahrenheitOutput" placeholder="Hasil Fahrenheit" readonly>
      </div>

      <div class="input-group">
        <input type="number" id="fahrenheitInput" placeholder="Fahrenheit">
        <button onclick="convertToCelsius()">→</button>
        <input type="text" id="celsiusOutput" placeholder="Hasil Celsius" readonly>
      </div>

      <hr>

      <h2>PHP (Server-Side)</h2>
      <form method="POST">
        <div class="input-group">
          <input type="number" name="suhu" required placeholder="Masukkan suhu">
          <select name="jenis">
            <option value="c_to_f">Celsius → Fahrenheit</option>
            <option value="f_to_c">Fahrenheit → Celsius</option>
          </select>
        </div>
        <div class="input-group">
          <button type="submit">Konversi via PHP</button>
        </div>
      </form>

      <?php if (!empty($hasil_php)): ?>
        <div class="result">Hasil: <?= htmlspecialchars($hasil_php) ?></div>
      <?php endif; ?>
    </div>
  </div>

  <script>
    function convertToFahrenheit() {
      const c = parseFloat(document.getElementById('celsiusInput').value);
      const f = (c * 9 / 5) + 32;
      document.getElementById('fahrenheitOutput').value = isNaN(f) ? '' : f.toFixed(2);
    }

    function convertToCelsius() {
      const f = parseFloat(document.getElementById('fahrenheitInput').value);
      const c = (f - 32) * 5 / 9;
      document.getElementById('celsiusOutput').value = isNaN(c) ? '' : c.toFixed(2);
    }
  </script>
</body>
</html>
