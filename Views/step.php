<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ArchiMaster Form</title>
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.2.0-beta1/dist/css/orange-helvetica.min.css" rel="stylesheet"
          integrity="sha384-A0Qk1uKfS1i83/YuU13i2nx5pk79PkIfNFOVzTcjCMPGKIDj9Lqx9lJmV7cdBVQZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.2.0-beta1/dist/css/boosted.min.css" rel="stylesheet"
          integrity="sha384-Cd3Hj1k1tH/gVOqE01/s9+htkC3xmv5nX5BiKJoYnxqtMDG9XvNGpckwDWY9j8XH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
            integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/boosted@5.2.0-beta1/dist/js/boosted.min.js"
            integrity="sha384-zTHWVhWVnlZKV3eupbMjd8kBvNab8h34r4SukzTQ8/KsNFCuW5PpIp3+TqAddKxY"
            crossorigin="anonymous"></script>
    <!-- Copyright © 2014 Monotype Imaging Inc. All rights reserved -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.2/dist/css/orangeHelvetica.min.css"
          integrity="sha384-6rPwIH6o8roADEALG0VtZOLfj0bDJ8KUOX7N+cjS+7NkwAaBQOZwRPOIiKWJa0aL" crossorigin="anonymous">
    <!-- Copyright © 2016 Orange SA. All rights reserved -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.2/dist/css/orangeIcons.min.css"
          integrity="sha384-XQ+QuxWl/eBTAPcvP8xjhUXg+GB+kArKZpnDyXUz1pLOe6yAfZzxkSygkYxNfKHT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.6.2/dist/css/boosted.min.css"
          integrity="sha384-gf+Y5XR9AaDz8jxrG8h6a3BYpN7fOpxA97a0i8QHgwnRKNOuahm7ZQfqzxaNW+aJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/boosted@4.6.2/dist/js/boosted.bundle.min.js"
            integrity="sha384-HkgWGiFvphHyETaofVWXX2SP64Dbtv237puflDWHKGBrQg9mSRWItJIt2JkJrPlL"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/focus-visible@5.0.2/dist/focus-visible.min.js"
            integrity="sha256-sz9/xSAM6mrw3l6hJWDgc7nEbzUeO5e8CXwYoECOEKI=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://code.jquery.com" crossorigin="anonymous">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<body>
<?php $url = base_url(); ?>
<div id="app" class="<?= $app ?>">

    <div class="container-fluid">
        <header class="mt-3">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="navbar-brand">

                        <h2 class="title">CRA Archimaster</h2>

                    </div>
                </div>
            </nav>
        </header>

        <div class="b-example-divider">

            <div class="list-group">
                <div class="container">
                    <div class="row">


                        <div class="col-4">
                            <h4>Assessment Steps</h4></div>
                        <div class="col-8">


                            <br><br>

                            <nav role="navigation" class="o-stepbar" aria-label="Checkout process">
                                <p class="float-left my-1 mr-2 font-weight-bold d-sm-none">Step</p>

                                <ol>
                                    <?php foreach ($steps['steps'] as $val): ?>
                                        <li class="stepbar-item active">
                                            <a class="stepbar-link"
                                               href="<?= $url ?>/<?= "assessment" ?>/<?= $app ?>/<?= $val['id'] ?>"
                                               title="step"
                                               aria-current="<?= $val['id'] ?>"><?= $val['step'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ol>
                            </nav>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-3">

                    <div class="list-group">
                        <?php foreach ($categories['categories'] as $val): ?>

                            <a class="list-group-item list-group-item-action" href="<?= $url ?>/<?= "assessment" ?>/<?= $app ?>/<?= $val['step'] ?>/<?= $val['id'] ?>">  <?= $val['id'] ?> <?= $val['category'] ?></a>


                        <?php endforeach; ?>
                        </div>


                </div>

                <div class="col-9">

                    <form ref="form">
                        <h4><?= $formBuilder[0][0]['step'] ?></h4>
                        <h4><?= $formBuilder[1][0][0]['category'] ?></h4>


                        <?php foreach ($formBuilder[1][1] as $qust): ?>

                            <h4> <?= $qust[0][0] ?> <?= $qust[0][1] ?></h4>
                        <div  id="element <?= $qust[0][0] ?>">
                            <?php if ($qust[0][2] == 'textarea' || $qust[0][2] == 'number') : ?>
                                <div class="input-group" id="<?= $qust[0][0] ?>">
                                    <textarea @keyup.enter="onInput" class="form-control" id="textarea <?= $qust[0][0] ?>"><?= $qust[1] ?></textarea>
                                </div>


                            <?php elseif ($qust[0][2] == 'radio-group'): ?>

                                <?php foreach ($qust[1] as $opt): ?>
                                    <div name="option" class="form-check" id=" <?= $qust[0][0] ?>">

                                        <?php if ($opt["selected"]) : ?>
                                            <input
                                                    id="radio <?= $opt[0]["id"] ?>"
                                                    name="<?= $qust[0][1] ?>"
                                                    @input="onInput"
                                                    class="form-check-input"
                                                    type="radio"
                                                    value="<?= $opt[0]["id"] ?>"
                                                    checked>
                                        <?php elseif (!$opt["selected"]) : ?>
                                            <input
                                                    id="radio <?= $opt[0]["id"] ?>"
                                                    name="<?= $qust[0][1] ?>"
                                                    @input="onInput"
                                                    class="form-check-input"
                                                    value="<?= $opt[0]["id"] ?>"
                                                    type="radio">
                                        <?php endif ?>
                                        <label class="form-check-label">
                                            <?= $opt[0]["_option"] ?>
                                        </label>

                                    </div>

                                <?php endforeach ?>

                            <?php endif ?>

                        <?php endforeach ?>

                            <div class="col-9"></div>
                            <div class="col-3">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button @click="saveFinal" id="final" type="button" class="btn btn-secondary">Submit final</button>
                                    <button @click="undo" id="undo" type="button" class="btn btn-secondary">Undo</button>
                                    <button @click="redo" id="redo" type="button" class="btn btn-secondary">Redo</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>


        </div>
    </div>

    <script>
        new Vue({
            el: "#app",
            data: {
                /*question:"",
                 check:"",
                 text:""*/
            },
            methods: {
                 onInput(e) {
                    let application = document.getElementsByTagName("div")[0].className
                    let option = e.target.value
                    let question= e.target.parentElement.id
                     let submitData={"application":application,"question":question,"option":'',"text":''}
                     let type = e.target.id
                     if( type.startsWith("textarea")){
                         submitData['text']= option
                         submitData['option']=null
                     }
                     else  {
                         {
                             submitData['text']= null
                             submitData['option']=option
                         }
                     }
                       fetch('/insert',{
                       method :'POST',
                            headers: {
                                "Accept": 'application/json',
                                "Content-type": "application/json; charset=UTF-8"
                            },
                       body : JSON.stringify(submitData)}).
                        then(res=>
                            console.log(res)
                        ).
                        catch(console.log);
                     console.log(application)

                 }
                /* undo(e){
                     let application = document.getElementsByTagName("div")[0].className
                     let submitData={"application":application}
                     fetch('/undo',{
                         method :'POST',
                         headers: {
                             "Accept": 'application/json',
                             "Content-type": "application/json; charset=UTF-8"
                         },
                         body : JSON.stringify(submitData)}).
                     then(res=>
                         console.log(res)
                     ).
                     catch(console.log);
                 }
                redo(e){
                    let application = document.getElementsByTagName("div")[0].className
                    let submitData={"application":application}
                    fetch('/redo',{
                        method :'POST',
                        headers: {
                            "Accept": 'application/json',
                            "Content-type": "application/json; charset=UTF-8"
                        },
                        body : JSON.stringify(submitData)}).
                    then(res=>
                        console.log(res)
                    ).
                    catch(console.log);
                    }
                saveFinal(e){
                    let application = document.getElementsByTagName("div")[0].className
                    let submitData={"application":application}
                    fetch('/saveFinal',{
                        method :'POST',
                        headers: {
                            "Accept": 'application/json',
                            "Content-type": "application/json; charset=UTF-8"
                        },
                        body : JSON.stringify(submitData)}).
                    then(res=>
                        console.log(res)
                    ).
                    catch(console.log);
                }*/


}
})
</script>

</body>
</html>


