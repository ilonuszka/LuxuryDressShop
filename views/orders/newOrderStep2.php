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
            grid-template-columns: 180px 204px;
            grid-template-rows: 20px 20px 20px 20px 20px 20px 20px 20px 20px 20px 0.3fr 20px;
            grid-column-gap: 20px;
            grid-row-gap: 10px;}
        .submit{display: flex;
            justify-content:center;
            grid-column-start: 1;
            grid-column-end: 3;}
        input {
            width: 198px;
            margin: 0;
            padding: 0;}
        select {
            width: 200px;
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
    <link type="image/png" sizes="96x96" rel="icon" href="favicon.png">
</head>
<body>
    <div class="container">
        <form method="POST" action="\submit">
            <span class="dataSet">
            <div>Suknelė</div><div><?php echo $order->getProductName()?></div>
            <input type="hidden" id="dress_name" name="dress_name" value="<?php echo $order->getProductName().' / '.$order->getProductPrice()?>">
            <div>Dydis</div><div><?php echo $order->getProductSize()?></div>
            <div>Kiekis</div><div><?php echo $order->getProductQuantity()?></div>
            <input type="hidden" id="size" name="size" value="<?php echo $order->getProductSize()?>">
            <div>kaina</div><div><?php echo $order->getProductPrice()?></div>
            <input type="hidden" id="stock" name="stock" value="<?php echo $order->getProductQuantity()?>">
            <div>Vardas</div><div><input type="text" id="fname" name="fname"><br><br></div>
            <div>Pavardė</div><div><input type="text" id="lname" name="lname"><br><br></div>
            <div>Telefono Nr</div><div><input type="text" id="phone" name="phone"><br><br></div>
            <div>Email</div><div><input type="text" id="email" name="email"><br><br></div>
            <div>Paštomatas</div>
            <div><select id="post_box" name="post_box" value="DPD - Didlaukio 1, Vilnius">
                <?php foreach ($this->shopDataRepository->getAvailablePostBoxes() as $value): ?>
                    <option value="<?php echo $value ?>"><?php echo $value ?></option>
                <?php endforeach ?>
            </select></div>
            <div>Atsiskaitymo būdas</div>
            <div><select id="payment_type" name="payment_type" value="Pavedimas">
                <?php foreach ($this->shopDataRepository->getAvailablePaymentTypes() as $value): ?>
                    <option value="<?php echo $value ?>"><?php echo $value ?></option>
                <?php endforeach ?>
            </select></div>
            <div></div>
            <div class="submit">
                    <input id="submit" type="submit" value="Tęsti"><br>
            </div>
            </span>
        </form>
        <div class="title">Pateikite pristatymo duomenis</div>
    </div>
</body>
</html>