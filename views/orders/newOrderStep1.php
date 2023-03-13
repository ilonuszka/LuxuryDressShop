<!doctype html>
<html>
<head>
    <title>Luxury Dress</title>
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
            grid-template-columns: 80px 140px;
            grid-template-rows: 2fr 2fr 2fr 0.3fr 2fr;
            grid-column-gap: 20px;
            grid-row-gap: 10px;}
        .monthPicker{
            display: flex;
            justify-content:space-between;
            grid-column-start: 1;
            grid-column-end: 5;}
        #month{width:140px;}
        .submit{display: flex;
            justify-content:center;
            grid-column-start: 1;
            grid-column-end: 3;}
        input {
            width: 86px;
            margin: 0;
            padding: 0;}
        #submit{
            width:60px;
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
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="\delivery">
            <span class="dataSet">
            <div>Pavadinimas</div>
            <select id="dress_name" name="dress_name">
                <?php foreach ($this->shopDataRepository->getAvailableDresses() as $value): ?>
                    <option value="<?php echo $value ?>"><?php echo $value ?></option>
                <?php endforeach ?>
            </select>
            <div>Dydis</div>
            <select id="size" name="size" value='M'>
                <?php foreach ($this->shopDataRepository->getAvailableSizes() as $value): ?>
                    <option value="<?php echo $value ?>"><?php echo $value ?></option>
                <?php endforeach ?>
            </select>
            <div>Kiekis</div>
            <select id="stock" name="stock">
                <option value="1">1</option>
            </select>
            <div></div>
            <div class="submit">
                    <input id="submit" type="submit" value="Tęsti"><br>
            </div>
            </span>
        </form>
        <div class="title">Išsirinkite suknelę</div>
    </div>
</body>
</html>