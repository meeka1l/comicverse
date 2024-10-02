<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css"> <!-- Link your CSS file here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .navbar {
            background-color: #f2f2f2;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            text-decoration: none;
            color: #333;
            margin: 0 15px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="navbar-left">
        <a href="/">Home</a>
    </div>
    <div class="navbar-right">
        <form action="/logout" method="POST" style="display:inline;">
            @csrf
            <button type="submit" style="background:none; border:none; color:#333; cursor:pointer;">Logout</button>
        </form>
    </div>
</div>

<h1>Your Cart</h1>

<?php if ($cartItems->isEmpty()): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item->book->title) ?></td>
                    <td><?= htmlspecialchars($item->book->author) ?></td>
                    <td>$<?= number_format($item->book->price, 2) ?></td>
                    <td><?= htmlspecialchars($item->quantity) ?></td>
                    <td>$<?= number_format($item->book->price * $item->quantity, 2) ?></td>
                    <td>
                        <form action="/cart/<?= $item->id ?>" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-right">
        <h4>Total: $<?= number_format($cartItems->sum(function($item) {
            return $item->book->price * $item->quantity;
        }), 2) ?></h4>
    </div>
<?php endif; ?>

</body>
</html>
