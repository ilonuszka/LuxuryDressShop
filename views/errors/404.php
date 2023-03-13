<!doctype html>
<html>
<head>
    <title>Klaida!</title>
    <style>
        div {
            margin: 0px 0px 0px 0px;
            line-height: 20px;}
        body{
            display:flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(223,251,255,1) 81%, rgba(190,237,246,1) 95%);
            overflow: hidden;
            background-image: url("\\views\\images\\background.jpg");
            background-size: cover;}
        form{padding: 50px 20px 20px 20px;}
        .dataSet{
            display:grid; 
            grid-template-columns: 50px 50px 50px 50px 50px 50px;
            grid-template-rows: 2fr 0.5fr 2fr 2fr 2fr 2fr 0.5fr 2fr;
            grid-column-gap: 20px;
            grid-row-gap: 10px;}
        .monthPicker{
            display: flex;
            justify-content:space-between;
            grid-column-start: 1;
            grid-column-end: 7;}
        #month{width:140px;}
        .submit{display: flex;
            justify-content:center;
            grid-column-start: 1;
            grid-column-end: 7;}
        input {
            width: 86px;
            margin: 0;
            padding: 0;}
        #submit{
            width:160px;
            height:20px}
        .container{background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 9px 2px rgba(0,0,0,0.32);
            position: relative;}
        .title{position:absolute;
            width:100%;
            height:30px;
            background-color: darkblue; 
            top: 0px; 
            left: 0px;
            border-radius: 8px 8px 0 0;
            color: white;
            line-height: 30px;
            font-weight: 900;
            text-align: center;}
        .error{line-height: 30px;
            font-weight: 900;
            font-size: 1vw;
            text-align: center;
            margin-bottom:20px;}
    </style>
</head>
<body>
    <div class="container">
        <form method="GET" action="\">
            <div class="error">404 Puslapis tokiu adresu nerastas!</div>
            <div class="submit">
                    <input id="submit" type="submit" value="Grįžti į pagrindinį puslapį"><br>
                </div>
            </span>
        </form>
        <div class="title">Klaida!</div>
    </div>
</body>
</html>