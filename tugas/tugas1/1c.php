<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Tugas 1c</title>
  
  <style type="text/css">
   .container {
        display: flex;
    }
    .kotak {
        width: 100px;
        height: 100px;
        background-color: salmon;
        position: relative;
        border: 1px solid #000000;
    }
    .toktok{
        position: absolute;
        font-family: arial;
        font-weight: 500;
        font-size: 30px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
  </style>   
  
</head>
<body>
    <div class="container">
        <div class="kotak">
            <div class="toktok">1</div>
        </div>
    </div>
    
    <div class="container">
        <div class="kotak">
            <div class="toktok">2</div>
        </div>
        <div class="kotak">
            <div class="toktok">2</div>
        </div>
    </div>
    <div class="container">
        <div class="kotak">
            <div class="toktok">3</div>
        </div>
        <div class="kotak">
            <div class="toktok">3</div>
        </div>
        <div class="kotak">
            <div class="toktok">3</div>
        </div>
    </div>
</body>
</html>