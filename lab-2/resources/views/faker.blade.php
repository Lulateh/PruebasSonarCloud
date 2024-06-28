<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Datos Falsos</title>
      @vite('resources/css/app.css')

    <!-- Incluye Faker.js desde un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/faker@5.5.3/dist/faker.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-900 m-12">

    <form action="submit.php" method="post">
        <label for="name">Nombre:</label>
        <input type="text" id="name" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Tu nombre" name="name" required value=""><br><br>

        <label for="title">Título:</label>
        <input type="text" id="title" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Título del post" name="title"><br><br>

        <label for="body">Cuerpo:</label>
        <textarea id="body" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Contenido del post" name="body"></textarea><br><br>

        <label for="author">Autor:</label>
        <input type="text" id="author" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Autor del post" name="author"><br><br>

        <label for="date">Fecha:</label>
        <input type="date" id="date" class="w-full p-2 border border-gray-300 rounded-lg" name="date"><br><br>

        <input type="submit" value="Enviar">
    </form>

    <!-- Incluye el script con la función de generación de datos -->
    <script>
        function fillFormWithFakeData() {
            // Generar datos falsos
            const name = faker.name.findName();
            const title = faker.lorem.sentence();
            const body = faker.lorem.paragraphs(3);
            const author = faker.name.findName();
            const date = faker.date.past().toISOString().split('T')[0]; // Formato YYYY-MM-DD

            // Rellenar los campos de input con los datos falsos
            document.getElementById('name').value = name;
            document.getElementById('title').value = title;
            document.getElementById('body').value = body;
            document.getElementById('author').value = author;
            document.getElementById('date').value = date;
        }

        // Llama a la función cuando la página se haya cargado
        window.onload = function() {
            fillFormWithFakeData();
        };
    </script>

</body>
</html>
