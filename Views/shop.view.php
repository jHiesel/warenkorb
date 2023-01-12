<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <link rel="stylesheet" href="../Css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/bootstrap-grid.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/bootstrap-reboot.css" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <form method="post" action="/">
        <div class="row-2 shadow p-3 mb-5 bg-white rounded">
            <div class="col-2">
                <input type="submit"
                       name="warenkorb"
                       class="btn btn-outline-success mb-3"
                       value="Warenkorb"
                >
            </div>
            <div class="col-30 mx-auto">
                <table class="table col-20 text-center">
                    <thead class="table-dark ">
                    <tr>
                        <th>
                            Title
                        </th>
                        <th class="text-right">
                            Price
                        </th>
                        <th>
                            Stock
                        </th>
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <?php foreach ($allBooks as $book) : ?>
                        <tr>
                            <td class="text-left">
                                <?= $book->getTitle() ?>
                            </td>
                            <td class="text-right">
                                <?= round($book->getPrice(), 2) ?>€
                            </td>
                            <td class="text-center">

                                <?php
                                if ($book->getStock() > 0):
                                    echo($book->getStock() . "/")
                                    ?>
                                    <select name="add<?= $book->getId() ?>" class="btn-outline-success">
                                        <?php
                                        for ($i = 0; $i <= $book->getStock(); $i++):
                                            ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php
                                        endfor;
                                        ?>
                                    </select>
                                <?php else: ?>
                                    <p>Out of Stock</p>
                                <?php endif; ?>
                            </td>
                            <td class="col-2">
                                <input type="submit"
                                       name="hinzu"
                                       class="btn btn-dark"
                                       value="Hinzufügen"
                                >
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </form>
</div>

</body>
</html>
