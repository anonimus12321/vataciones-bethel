<!DOCTYPE html>
<html>
<head>
    <style>
        .selected {
            border: 5px solid blue;
        }

        .image-container {
            display: inline-block;
            text-align: center;
            margin-right: 20px;
        }
    </style>
</head>
<body>
<center>
        <h1>VOTA</h1>
    <div class="image-container">
        <img src="anandy.jpg" width="300" height="400" onclick="selectImage(this)">
        <p>Hanandy</p>
        <form method="post" action="">
        <input type="hidden" name="imageURL" value="Hanandy">
        <input type="submit" value="Hanandy">
       
    </form>
    </div>

    <div class="image-container">
        <img src="starly.jpg" width="300" height="400" onclick="selectImage(this)">
        <p>Starly</p>
        <form method="post" action="">
        <input type="hidden" name="imageURL2" value="starly">
        <input type="submit" value="Starly">
        
    </form>
    </div>

    <br><br>
   
    
    </center>
    <script>
        function selectImage(img) {
            // Removemos la clase 'selected' de todas las imágenes
            var images = document.getElementsByTagName('img');
            for (var i = 0; i < images.length; i++) {
                images[i].classList.remove('selected');
            }

            // Agregamos la clase 'selected' a la imagen seleccionada
            img.classList.add('selected');
        }

        function enviar() {
            var selectedImage = document.querySelector('.selected');
            if (selectedImage) {
                var imageURL = selectedImage.src;
                // Aquí puedes hacer algo con la URL de la imagen seleccionada, como enviarla a un servidor o procesarla de alguna manera.
                console.log("Imagen seleccionada:", imageURL);
            } else {
                console.log("No se ha seleccionado ninguna imagen.");
            }
        }
    </script>
<?php
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "votacion";

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    } else {
        echo "Conexión exitosa a la base de datos.";
        // Aquí puedes realizar operaciones con la base de datos
        // ...
    }

    // Verificar si se ha seleccionado una imagen
    if (isset($_POST['imageURL'])) {
        $imageURL = $_POST['imageURL'];

        // Escapar caracteres especiales para evitar inyección de SQL
        $imageURL = $conn->real_escape_string($imageURL);

        // Crear la consulta SQL para insertar la URL de la imagen en la base de datos
        $sql = "INSERT INTO imageness (voto1) VALUES (1)";

        if ($conn->query($sql) === TRUE) {
            echo "Imagen seleccionada guardada en la base de datos.";
        } else {
            echo "Error al guardar la imagen seleccionada en la base de datos: " . $conn->error;
        }

      
    }

    if (isset($_POST['imageURL2'])) {
        $imageURL2 = $_POST['imageURL2'];

        // Escapar caracteres especiales para evitar inyección de SQL
        $imageURL2 = $conn->real_escape_string($imageURL2);

        // Crear la consulta SQL para insertar la URL de la imagen en la base de datos
        $sql = "INSERT INTO imageness (voto2) VALUES (2)";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo "Imagen seleccionada guardada en la base de datos.";
        } else {
            echo "Error al guardar la imagen seleccionada en la base de datos: " . $conn->error;
        }
    }
         // Cerrar la conexión
         $conn->close();
         ?>

</body>
</html>

   

    

   
    

    
   


   
   
   

