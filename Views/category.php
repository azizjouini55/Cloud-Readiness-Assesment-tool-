<div class="container">
    <div class="row">

        <div class="col-3">
            <ul class="list-group">
                <?php foreach ($categories['categories'] as $val):?>
                    <li class="list-group-item">

                        <a href="http://localhost/<?= $app ?>/<?= $val['step']?>/<?= $val['id']?>">  <?= $val['category'] ?></a>


                    </li>
                <?php endforeach ;?>

            </ul>


        </div>

        <div class="col-9">





