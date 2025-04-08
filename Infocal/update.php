<?php 
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono']; 

    $sql = "UPDATE empleados SET name='$name', lastname='$lastname', email='$email', direccion='$direccion', telefono='$telefono'
    WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
        echo "Error updating record: " . $conn->error;
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT id, name, lastname, email, direccion, telefono FROM empleados WHERE id=$id"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); 
}

$conn->close();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Actualizar Datos</h1>
    
    <form method="post" action="">
        <div class="mb-3">
            <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion']; ?>">
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Telefono</label>
            <input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono']; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>