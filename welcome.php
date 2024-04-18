<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitaj na stránke</title>
    <style>
        body { 
            background-color: #212121; 
            color: white; 
            font-family: Arial, sans-serif; 
            text-align: center; 
            padding-top: 50px; 
        }
        .logout-button { 
            padding: 10px 20px; 
            background-color: #f44336; 
            color: white; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-size: 16px; 
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* 5 stĺpcov */
            gap: 20px;
            padding: 20px;
            margin-top: 20px;
        }
        .product-item {
            background: #FFFFFF;
            border-radius: 5px;
            padding: 10px;
            color: black;
            text-decoration: none; /* Odstránenie štandardného štýlu odkazu */
        }
        .product-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
        .product-name, .product-price {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Vitaj na stránke</h1>
    <p>Si úspešne prihlásený.</p>
    <form action="logout.php" method="post">
        <button type="submit" class="logout-button">Odhlásiť sa</button>
    </form>

    <div class="product-grid">
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <a href="product.php?id=<?php echo $i; ?>" class="product-item">
                <img src="https://via.placeholder.com/150" alt="Product Image">
                <div class="product-name">Produkt <?php echo $i; ?></div>
                <div class="product-price">$<?php echo rand(10, 100); ?></div>
            </a>
        <?php endfor; ?>
    </div>

</body>
</html>
