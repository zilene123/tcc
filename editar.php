<?php
include_once('config.php');

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $Nome = $_POST['Nome'];
    $Telefone = $_POST['Telefone'];
    $Servico = $_POST['Servico'];
    $Dia = $_POST['Dia'];
    $Horario = $_POST['Horario'];

    $query = "UPDATE cliente SET Nome='$Nome', Telefone='$Telefone', Servico='$Servico', Dia='$Dia', Horario='$Horario' WHERE id=$id";
    mysqli_query($conexao, $query);

    // Redirecionamento após a edição do agendamento
    header("Location: most.php");
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conexao, "SELECT * FROM cliente WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Cabeçalho do HTML -->
</head>
<body>
    <h2>Editar Agendamento</h2>
    <form action="editar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="Nome" value="<?php echo $row['Nome']; ?>">
        <input type="text" name="Telefone" value="<?php echo $row['Telefone']; ?>">
        <select name="Servico">
            <option value="Barbeiro" <?php if($row['Servico'] == 'Barbeiro') echo 'selected'; ?>>Barbeiro</option>
            <option value="Cabelereiro" <?php if($row['Servico'] == 'Cabelereiro') echo 'selected'; ?>>Cabelereiro</option>
            <option value="Manicure" <?php if($row['Servico'] == 'Manicure') echo 'selected'; ?>>Manicure</option>
            <option value="Spa" <?php if($row['Servico'] == 'Spa') echo 'selected'; ?>>Spa</option>
        </select>
        <input type="date" name="Dia" value="<?php echo $row['Dia']; ?>">
        <input type="time" name="Horario" value="<?php echo $row['Horario']; ?>">
        <input type="submit" name="submit" value="Salvar">
    </form>
</body>
</html>
