<?php
require_once "src/connection.php";
session_start();
// Agregar nueva tarea
if (isset($_POST['add'])) {
    $task = $_POST['task'];
    $sql = "INSERT INTO tareas (descripcion, completada) VALUES ('$task', 0)";
    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
// Marcar tarea como completada o pendiente
if (isset($_POST['task_id'])) {
    $id = $_POST['task_id'];
    $completed = isset($_POST['completed']) ? 1 : 0;
    $sql = "UPDATE tareas SET completada = $completed WHERE id = $id";
    $conexion->query($sql);
    header("Location: index.php");
    exit();
}
// Eliminar tarea
if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM tareas WHERE id = $id";
    $conexion->query($sql);
    header("Location: index.php");
    exit();
}
// Filtros
$filter = "todos";
if (isset($_POST['sort_all'])) $filter = "todos";
if (isset($_POST['sort_pending'])) $filter = "pendientes";
if (isset($_POST['sort_completed'])) $filter = "completadas";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD todo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>CRUD TODO</h1>

    <br>
    <div class="menu">
        <form method="post">
            <input type="text" name="task" placeholder="Nueva tarea" required>
            <button type="submit" name="add">Agregar</button>
        </form>
    </div>
    
    <div class="sort" style="align-items: center;">
        <form method="post">
            <button type="submit" name="sort_all">Todos</button>
            <button type="submit" name="sort_pending">Pendientes</button>
            <button type="submit" name="sort_completed">Completadas</button>
        </form>
    </div>
    <br>
    <?php
    echo "<div id='filter-title'>Mostrando: " . ucfirst($filter) . "</div>";
    ?>
    <div class="tasks">
        
        <?php // Obtener tareas según el filtro
        $sql = "SELECT * FROM tareas";
        //checa filtros
        if ($filter == "pendientes") $sql .= " WHERE completada = 0";
        if ($filter == "completadas") $sql .= " WHERE completada = 1";
        $result = $conexion->query($sql);
        if ($result->num_rows > 0) { //crea las tareas
            while($row = $result->fetch_assoc()) {
                echo "<div class='individual-task'>";
                echo "<form method='post' style='display:inline;'>";
                echo "<input type='hidden' name='task_id' value='" . $row["id"] . "'>";
                echo "<input type='checkbox' name='completed' value='1' " . ($row["completada"] ? "checked" : "") . " onchange='this.form.submit()'>"; //checkbox, submit si cambia
                echo "<span>" . $row["descripcion"] . "</span> "; //descripcion de tarea
                echo " <small class='created-at'>(" . date('d/m/Y H:i', strtotime($row["creada_en"])) . ")</small>";  //tiempo
                echo "</form>";
                echo "<form method='post' style='display:inline;margin-left:10px;'>";
                echo "<input type='hidden' name='delete_id' value='" . $row["id"] . "'>";
                echo "<button type='submit' name='delete' value='1'>Eliminar</button>"; //boton eliminar
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "No hay tareas.";
        }
        ?>
    </div>
</body>
</html>