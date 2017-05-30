<!DOCTYPE html>
<html>
<head>
    <title>Adding New Product</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="css/my-css.css">


</head>
<body>
<div class="container">
    <div class="row text-center">
        <div class="col-xs-10 col-xs-offset-1">
            <h1 class="cairo-font">Add new product</h1>
            <hr> <br><br><br><br>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-xs-10 col-xs-offset-1">


            <form action="<?php echo e(route('products.add')); ?>" method="post">
               <div class="form-group row">

                      <div class="col-10 col-xs-5">
                       <label for="example-text-input" class="col-2 col-form-label">product title</label>
                        <input class="form-control" type="text" value="" name="title" id="title" required>
                      </div>

                      <div class="col-10 col-xs-5">
                       <label for="example-text-input" class="col-2 col-form-label">product price</label>
                        <input class="form-control " type="number" value="" name="price" id="price" required>
                      </div>
                </div>

                <div class="form-group row">

                      <div class="col-xs-5">
                       <label for="image-path" class="col-2 col-form-label">image path using editor
                      </label>
                        <input class="form-control" type="text" value="" name="imagePath" id="imagePath" required>
                      </div>
                </div>

                <div class="form-group">
                    <label for="input">description</label>
                    <textarea class="form-control" name="content" id="description" rows="10" ></textarea>
                </div>


                <?php echo e(csrf_field()); ?>


                <select class="custom-select btn-lg" name="sectionId" required dir="rtl" >
                     <optgroup label="choose category">

                      </optgroup>
                      <?php if(isset($category)): ?>
                      <option value="9999999">other category</option>
                      <?php foreach($category as $c): ?>

                        <option value="<?php echo e($c->id); ?>"> <?php echo e($c->name); ?> </option>
                      <?php endforeach; ?>

                      <?php endif; ?>

                </select>


                <label for="input">choose a category </label>

                <br><br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">store</button>
            </form>
        </div>
    </div>
</div>

<br>

<script src="<?php echo e(URL::to('src/js/vendor/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
<script>
    var editor_config = {
        path_absolute : "<?php echo e(URL::to('/')); ?>/",
        selector: "textarea",
        language: "ar",



        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern emoticons"
        ],
        toolbar: "insertfile undo redo emoticons  | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | ltr rtl",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }
            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);





</script>
</body>
</html>
