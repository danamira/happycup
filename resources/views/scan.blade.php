<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan New Billie Cups</title>
    <link rel="stylesheet" href="/css/scan.css">
    <script src="/js/jquery.js"></script>
</head>
<body>
    <div class="container" id="app">
        <img src="/assets/billie.png" alt="">
        <div id="intro_message">
            <h3>Click on start to begin scanning</h3>
            <button id="scan" @click="startScanning()">Begin scanning</button>
        </div>
        <div id="guide">
            <h3>Ready to scan...</h3>
        </div>

    </div>
    <script src="/js/scan.js"></script>
  </body>
</html>