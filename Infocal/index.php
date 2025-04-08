<?php
include 'db.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <h1 class="text-center mt-4">REGISTRO DE USUARIOS</h1>

    <a href="create.php" class="btn btn-primary mb-3"><i class="bi bi-person-plus"></i> NUEVO USUARIO</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRES</th>
                <th scope="col">APELLIDOS</th>
                <th scope="col">CORREO</th>
                <th scope="col">DIRECCION</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sql = "SELECT id, name, lastname, email, direccion, telefono FROM empleados";
            $result = $conn->query($sql);

            
            if ($result->num_rows > 0) {
                
                $users = $result->fetch_all(MYSQLI_ASSOC);

                
                foreach ($users as $row) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row['id']; ?>" 
                            class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></i></a>

                            <a href="delete.php?id=<?php echo $row['id']; ?>" 
                            class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro? Se eliminara la información de este usuario');"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4" class="text-center">No hay usuarios registrados.</td>
                </tr>
                <?php
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>