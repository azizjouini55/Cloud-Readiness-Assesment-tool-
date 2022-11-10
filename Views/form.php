
<form ref="form" v-on:change="formOnChange">
<h4><?php echo $formBuilder[0][0]['step'] ?></h4>
<h4><?php echo $formBuilder[1][0][0]['category'] ?></h4>


<?php foreach ($formBuilder[1][1] as $qust): ?>

    <h4><?= $qust[0][1] ?></h4>
    <?php if ($qust[0][2] == 'textarea'|| $qust[0][2] =='number') : ?>
        <textarea v-model=""text  ><?=$qust[1]?></textarea>
    <?php elseif ($qust[0][2] == 'radio-group'): ?>


        <?php foreach ($qust[1] as $opt): ?>
            <div class="form-check">

            <?php if ($opt["selected"]) : ?>
            <input class="form-check-input" type="radio"   checked>
            <?php elseif (!$opt["selected"]) : ?>
                <input class="form-check-input" type="radio"  >
            <?php endif ?>
                <label class="form-check-label" >
                    <?= $opt[0]["_option"] ?>
                </label>

            </div>
        <?php endforeach ?>




    <?php endif ?>
<?php endforeach ?>
</form>

</div>
</div>

</div>
<script>
    new Vue({
        el: "#app_basic",
        methods: {
            FormOnChange : function(){
               alert('changed')
            }
        }
        data() {
            return
            text: 'default'
            radio: 'default'
        },
    })
</script>
</body>
</html>