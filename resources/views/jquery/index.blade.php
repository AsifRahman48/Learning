<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
<p class="click">If you click on me, I will disappear.</p>
<p id="me">Click me away!</p>
<p>Click me too!</p>
<button> Click Me</button>
</body>
<script>
    $(document).ready(function (){
        $('button').click(function (){
            $('p:odd').hide();
            /*$('#me').hide();*/
        });
    });
</script>

</html>
