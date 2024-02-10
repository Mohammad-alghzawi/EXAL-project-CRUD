<!DOCTYPE html>
<html>
<head>
    <title>first task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   
<div class="container">
    @yield('content')
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
    try {
        ClassicEditor
            .create(document.querySelector('#short_d_en'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#short_d_ar'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#long_d_en'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#long_d_ar'))
            .catch(error => {
                console.error(error);
            });
    } catch (error) {
        console.error('CKEditor initialization error:', error);
    }
</script>

</body>
</html>