<?php
// PRODUCT CATALOGUE
$products = [
    [
        "id" => 1,
        "name" => "iPhone 15",
        "price" => 80000,
        "category" => ["Electronics", "Mobile", "5G"],
        "stock" => 5
    ],
    [
        "id" => 2,
        "name" => "Samsung TV",
        "price" => 45000,
        "category" => ["Electronics", "TV", "Smart"],
        "stock" => 3
    ],
    [
        "id" => 3,
        "name" => "Laptop",
        "price" => 60000,
        "category" => ["Electronics", "Computer"],
        "stock" => 2
    ],
    [
        "id" => 4,
        "name" => "Boat Headphones",
        "price" => 2500,
        "category" => ["Audio", "Wireless"],
        "stock" => 10
    ],
    [
        "id" => 5,
        "name" => "Nike Shoes",
        "price" => 5000,
        "category" => ["Fashion", "Footwear"],
        "stock" => 7
    ],
    [
        "id" => 6,
        "name" => "Apple Watch",
        "price" => 30000,
        "category" => ["Electronics", "Watch"],
        "stock" => 4
    ],
    [
        "id" => 7,
        "name" => "Gaming Mouse",
        "price" => 1500,
        "category" => ["Gaming", "Accessories"],
        "stock" => 6
    ],
    [
        "id" => 8,
        "name" => "Power Bank",
        "price" => 2000,
        "category" => ["Electronics", "Battery"],
        "stock" => 8
    ],
    [
        "id" => 9,
        "name" => "Bluetooth Speaker",
        "price" => 3500,
        "category" => ["Audio", "Speaker"],
        "stock" => 0
    ],
    [
        "id" => 10,
        "name" => "Canon Camera",
        "price" => 70000,
        "category" => ["Photography", "Camera"],
        "stock" => 1
    ]
];

// CART ARRAY
$cart = [];

// ADD ITEMS TO CART
array_push($cart,
    [
        "product_id" => 1,
        "name" => "iPhone 15",
        "price" => 80000,
        "quantity" => 1,
        "category" => "Electronics"
    ],
    [
        "product_id" => 4,
        "name" => "Boat Headphones",
        "price" => 2500,
        "quantity" => 2,
        "category" => "Audio"
    ],
    [
        "product_id" => 7,
        "name" => "Gaming Mouse",
        "price" => 1500,
        "quantity" => 3,
        "category" => "Gaming"
    ]
);

// SHOW ONLY IN-STOCK PRODUCTS
$inStockProducts = array_filter($products, function($p){
    return $p['stock'] > 0;
});

// CALCULATE SUBTOTAL
$subtotal = 0;

foreach($cart as $item){
    $subtotal += $item['price'] * $item['quantity'];
}

// APPLY 10% DISCOUNT IF TOTAL > 1000
if($subtotal > 1000){
    $cart = array_map(function($item){
        $item['price'] = $item['price'] * 0.90;
        return $item;
    }, $cart);
}

// RECALCULATE TOTAL AFTER DISCOUNT
$itemTotals = [];

foreach($cart as $item){
    $itemTotals[] = $item['price'] * $item['quantity'];
}

$subtotal = array_sum($itemTotals);

// GST
$gst = $subtotal * 0.18;

// DELIVERY CHARGE
$delivery = ($subtotal > 499) ? 0 : 50;

// GRAND TOTAL
$grandTotal = $subtotal + $gst + $delivery;

// BONUS: GROUP ITEMS BY CATEGORY
$grouped = [];

foreach($cart as $item){
    $grouped[$item['category']][] = $item;
}

// WHILE LOOP CHECKOUT
$count = 1;

while($count <= 1){
    $checkoutMessage = "Checkout Completed Successfully";
    $count++;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart System</title>

    <style>
        body{
            font-family: Arial;
            background: #f4f4f4;
            margin: 20px;
        }

        h1{
            text-align: center;
            color: #333;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-bottom: 30px;
        }

        th, td{
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th{
            background: #007bff;
            color: white;
        }

        tr:hover{
            background: #f1f1f1;
        }

        .cart-box{
            width: 350px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        .cart-box h2{
            margin-top: 0;
        }

        .bill p{
            font-size: 18px;
        }

        .success{
            background: green;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            margin-top: 20px;
        }

        .add{
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>

<h1>Shopping Cart System</h1>

<h2>Product Catalogue</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category Tags</th>
        <th>Stock</th>
        <th>Action</th>
    </tr>

    <?php foreach($inStockProducts as $product){ ?>

    <tr>
        <td><?php echo $product['id']; ?></td>
        <td><?php echo $product['name']; ?></td>
        <td>₹<?php echo number_format($product['price']); ?></td>

        <td>
            <?php echo implode(" | ", $product['category']); ?>
        </td>

        <td><?php echo $product['stock']; ?></td>

        <td class="add">Add to Cart</td>
    </tr>

    <?php } ?>
</table>

<h2>Cart Summary</h2>

<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>

    <?php foreach($cart as $item){ ?>

    <tr>
        <td><?php echo $item['name']; ?></td>

        <td>
            ₹<?php echo number_format($item['price']); ?>
        </td>

        <td><?php echo $item['quantity']; ?></td>

        <td>
            ₹<?php echo number_format($item['price'] * $item['quantity']); ?>
        </td>
    </tr>

    <?php } ?>
</table>

<div class="cart-box">
    <h2>Bill Breakdown</h2>

    <div class="bill">
        <p><b>Subtotal:</b> ₹<?php echo number_format($subtotal,2); ?></p>

        <p><b>GST (18%):</b> ₹<?php echo number_format($gst,2); ?></p>

        <p><b>Delivery:</b> ₹<?php echo number_format($delivery,2); ?></p>

        <hr>

        <p>
            <b>Grand Total:</b>
            ₹<?php echo number_format($grandTotal,2); ?>
        </p>
    </div>
</div>

<br>

<h2>Grouped Cart Items By Category</h2>

<?php
foreach($grouped as $category => $items){
    echo "<h3>$category</h3>";

    foreach($items as $item){
        echo $item['name'] . " (Qty: " . $item['quantity'] . ")<br>";
    }

    echo "<br>";
}
?>

<div class="success">
    <?php echo $checkoutMessage; ?>
</div>

</body>
</html>