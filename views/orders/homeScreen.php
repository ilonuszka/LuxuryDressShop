<!doctype html>
<html>
<head>
    <title>Luxury Dress shop pateikti užsakymai</title>
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
            grid-template-columns: 70px 70px 70px 25px 25px 60px 195px 110px 1fr;
            grid-template-rows: 18px;
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
            grid-column-end: 10;}
        input {
            width: 86px;
            margin: 0;
            padding: 0;}
        #submit, #csv{
            width:120px;
            height:20px}
        #edit{
            width:40px;
            height:20px}
        #delete{
            width:40px;
            height:20px}
        #form-edit{
            padding:0;
            margin:0;
            display: inline;}
        #form-delete,#form-edit,#form-csv{
            padding:0;
            margin:0;
            display: inline;}
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
        <form method="POST" action="\order">
            <span class="dataSet">
                <div>Vardas</div>
                <div>Pavardė</div>
                <div>Pavadinimas</div>
                <div>Dydis</div>
                <div>Kiekis</div>
                <div>Kaina</div>
                <div>Paštomatas</div>
                <div>Mokėjimo būdas</div>
                <div>Veiksmai<form></form></div>
                <?php foreach ($orders as $key => $order): ?>
                    <div><?php echo $order['ClientFName']?></div>
                    <div><?php echo $order['ClientLName']?></div>
                    <div><?php echo $order['ProductName']?></div>
                    <div><?php echo $order['ProductSize']?></div>
                    <div><?php echo $order['ProductQuantity']?></div>
                    <div><?php echo $order['ProductPrice']?></div>
                    <div><?php echo $order['DeliveryPostBox']?></div>
                    <div><?php echo $order['PaymentType']?></div>
                    <div>
                        <form method="GET" id="form-edit" action="\edit">
                            <input type="hidden" id="id" name="id" value="<?php echo $key?>">
                            <input id="edit" type="submit" value="Keisti">
                        </form>
                        <form method="POST" id="form-delete" action="\delete">
                            <input type="hidden" id="id" name="id" value="<?php echo $key?>">
                            <input id="delete" type="submit" value="Trinti">
                        </form>
                    </div>
                <?php endforeach?>
                <div class="submit">
                    <div >
                        <input id="submit" type="submit" value="Naujas užsakymas">
                    </div>&nbsp;
                    <form method="GET" id="form-csv" action="\download">
                        <input type="hidden" id="file" name="file" value="orders.csv">
                        <input id="csv" type="submit" value="Eksportuoti CSV">
                    </form>
                </div>
            </span>
        </form>
        <div class="title">Luxury Shop užsakymai</div>
    </div>
</body>
</html>