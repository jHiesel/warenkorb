
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Warenkorb</title>
    <link rel="stylesheet" href="../Css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/bootstrap-grid.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/bootstrap-reboot.css" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row-3 shadow p-3 mb-5 bg-white rounded">
        <?php
        if ($leer):
            ?>
            <h1 class="h1">You don't have anything in your Basket</h1>
        <?php
        else:
            ?>
            <h3 class="coll-20 text-rigt h3">The sum of your Products Totals at: <?=$sum?>€</h3>
        <?php
        endif;
        ?>

        <form method="post" action="/">
            <input type="submit"
                    name="shop"
                    class="btn btn-outline-success mb-3"
                    value="Shop"
            >
        </form>
        <form method="post" action="/shop">
            <div class="col-30">
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
                                Menge
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                <?php
                $leer = [];
                if(isset($warenkorb)):
                    ?>
                    <?php foreach ($warenkorb as $book) :?>
                            <tr>
                                <td class="text-left">
                                    <?= $book->getTitle()?>
                                </td>
                                <td class="text-right">
                                    <?= round($book->getPrice(),2)?>€
                                </td>
                                <td class="text-center">
                                    <?= $values[$book->getId()]?>
                                </td>
                                <td class="col-2">
                                    <input type="submit"
                                            name="removeByUser"
                                            class="btn btn-dark"
                                            value="Löschen"
                                    >
                                    <select name="remove<?=$book->getId()?>" required="required" class="btn-outline-danger">
                                        <?php
                                        for ($i = 0; $i <= $values[$book->getId()]; $i ++):
                                            ?>
                                            <?php if($i>0):?>
                                            <option value="<?=$i?>"><?=$i?></option>
                                            <?php else:?>
                                            <option value="<?=0?>" hidden><?=0?></option>
                                            <?php endIf;?>
                                        <?php
                                        endfor;
                                        ?>
                                    </select>
                                </td>
                            </tr>

                    <?php
                endforeach;?>
                    <?php endif;?>
                </table>
            </div>
        </div>
    </form>
</div>
</body>
</html>

