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
        .filter-form {
            margin: 20px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
            display: inline-block;
            color: white;
        }
        select, input[type="text"], input[type="range"], output {
            width: 80%;
            padding: 10px;
            margin: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
        }
        input[type="submit"], .logout-button {
            padding: 10px 20px;
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .product-item {
            background: #FFFFFF;
            border-radius: 5px;
            padding: 10px;
            color: black;
            text-decoration: none;
            height: 300px;
        }
        .product-item img {
            width: 100%;
            max-height: 220px;
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
    <!-- Logout Form -->
    <form action="logout.php" method="post">
        <button type="submit" class="logout-button">Odhlásiť sa</button>
    </form>

    <div class="filter-form">
        <form method="get">
            <input type="text" name="name" placeholder="Search by name" value="<?php echo $_GET['name'] ?? ''; ?>">
            <input type="range" name="max_price" min="0" max="100" value="<?php echo $_GET['max_price'] ?? 100; ?>" oninput="this.nextElementSibling.value = this.value + ' €'">
            <output><?php echo ($_GET['max_price'] ?? 100) . ' €'; ?></output>
            <select name="latka">
                <option value="">Any Material</option>
                <option value="vlna" <?php echo (isset($_GET['latka']) && $_GET['latka'] === 'vlna') ? 'selected' : ''; ?>>Vlna (Wool)</option>
                <option value="polyester" <?php echo (isset($_GET['latka']) && $_GET['latka'] === 'polyester') ? 'selected' : ''; ?>>Polyester</option>
            </select>
            <select name="sort">
                <option value="name_asc">Name A-Z</option>
                <option value="name_desc">Name Z-A</option>
                <option value="price_asc">Price Low to High</option>
                <option value="price_desc">Price High to Low</option>
                <option value="id_asc">ID Ascending</option>
                <option value="id_desc">ID Descending</option>
            </select>
            <input type="submit" value="Filter">
        </form>
    </div>

    <div class="product-grid">
        <?php
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "jajcay";

        // Connect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch and filter data
        $name = $_GET['name'] ?? '';
        $max_price = $_GET['max_price'] ?? 100;
        $latka = $_GET['latka'] ?? '';
        $sort = $_GET['sort'] ?? 'id_asc';

        // Determine sort order based on input
        switch ($sort) {
            case 'name_asc':
                $orderBy = "ORDER BY nazov ASC";
                break;
            case 'name_desc':
                $orderBy = "ORDER BY nazov DESC";
                break;
            case 'price_asc':
                $orderBy = "ORDER BY cena ASC";
                break;
            case 'price_desc':
                $orderBy = "ORDER BY cena DESC";
                break;
            case 'id_asc':
                $orderBy = "ORDER BY id ASC";
                break;
            case 'id_desc':
                $orderBy = "ORDER BY id DESC";
                break;
            default:
                $orderBy = "ORDER BY id ASC"; // Fallback to default
        }

        // Build SQL query
        $sql = "SELECT id, nazov, cena, obrazok FROM products WHERE cena <= $max_price" .
               ($name ? " AND nazov LIKE '%" . $conn->real_escape_string($name) . "%'" : "") .
               ($latka ? " AND latka = '" . $conn->real_escape_string($latka) . "'" : "") .
               " " . $orderBy;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="product-item">';
                echo '<img src="' . htmlspecialchars($row['obrazok']) . '" alt="Product Image">';
                echo '<div class="product-name">' . htmlspecialchars($row['nazov']) . '</div>';
                echo '<div class="product-price">$' . htmlspecialchars($row['cena']) . '</div>';
                echo '</div>';
            }
        } else {
            echo "No results found";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
