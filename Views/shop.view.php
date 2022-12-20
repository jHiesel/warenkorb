<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <link href="../Css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-10">
            <table class="table">
                <tr>
                    <th>
                        Title
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Stock
                    </th>
                    <th>

                    </th>
                </tr>
                <?php foreach ($allBooks as $book) :?>
                    <tr>
                        <td>
                            <?= $book->getTitle()?>
                        </td>
                        <td>
                            <?= $book->getPrice()?>
                        </td>
                        <td>
                            <?= $book->getStock()?>
                        </td>
                        <td>

                        </td>
                    </tr>
                <?php endforeach;?>
            </table>

        </div>
    </div>
</div>

</body>
</html>
