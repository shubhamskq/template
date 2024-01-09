<!DOCTYPE html>
<html>
<head>
    <title>Hide/Show Example</title>
    <script>
        function toggleDiv() {
            var div = document.getElementById('myDiv');
            if (div.style.display === 'none') {
                div.style.display = 'block';
            } else {
                div.style.display = 'none';
            }
        }
    </script>
</head>
<body>

<button onclick="toggleDiv()">Toggle Div</button>

<div id="myDiv" style="display: none;">
    <?php
    // PHP code within the hidden div
    echo "This is a PHP-generated content inside the hidden div.";
    ?>
</div>

</body>
</html>
