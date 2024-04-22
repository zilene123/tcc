<?php
// Inclua o arquivo de configuração do banco de dados
include_once('config.php');

// Consulta SQL para selecionar todos os clientes
$query = "SELECT * FROM cliente";

// Executa a consulta
$result = mysqli_query($conexao, $query);
// Verifica se a consulta retornou resultados
if(mysqli_num_rows($result) > 0) {
    echo "<style>
            .h2{
                background-color: #008000;
            }
            .table-container {
                overflow-x: auto;
            }
            .styled-table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                border: 1px solid #ddd;
                border-radius: 10px; 
                overflow: hidden; 
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }
            .styled-table th,
            .styled-table td {
                padding: 12px 15px;
                text-align: left;
            }
            .styled-table th {
                background-color: #008000; 
                color: #fff; 
            }
            .styled-table tbody tr:nth-of-type(even) {
                background-color: #3CB371; 
            }
            .styled-table tbody tr:hover {
                background-color: #2E8B57; 
            }
            .styled-table tbody tr:last-of-type {
                border-bottom: none; 
            }
            .edit-btn,
            .delete-btn,
            .return-btn {
                padding: 6px 10px;
                margin-right: 5px;
                text-decoration: none;
                border-radius: 4px;
            }
            .edit-btn {
                background-color: #2E8B57; 
                color: #fff; 
            }
            .edit-btn:hover {
                background-color: #2E8B57;
            }
            .delete-btn {
                background-color: #dc3545; 
                color: #fff; 
            }
            .delete-btn:hover {
                background-color: #c82333; 
            }
            .return-btn {
                background-color:#2E8B57; 
                color: #fff; 
            }
            .return-btn:hover {
                background-color:#8FBC8F; 
            }
        </style>";
        echo "<h2 style='background-color: #228B22; padding: 10px; color: #fff;'>Agendamentos</h2>";

    echo "<div class='table-container'>";
    // Iniciar a tabela
    echo "<table class='styled-table'>";
    echo "<thead><tr><th>Nome</th><th>Serviço</th><th>Dia</th><th>Horário</th><th>Ações</th></tr></thead>";
    echo "<tbody>";
    // Loop através dos resultados e exibe cada agendamento
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['Nome']."</td>";
        echo "<td>".$row['Servico']."</td>";
        echo "<td>".date('d/m/Y', strtotime($row['Dia']))."</td>";
        echo "<td>".$row['Horario']."</td>";
        echo "<td><a class='edit-btn' href='editar.php?id=".$row['id']."'>Editar</a><a class='delete-btn' href='excluir.php?id=".$row['id']."'>Cancelar</a></td>";
        echo "</tr>";
    }
    // Fechar a tabela
    echo "</tbody>";
    echo "</table>";
    
    echo "<a class='return-btn' href='index.php'>Voltar para o início</a>";
    echo "<a class='return-btn' href='agend.php'>Voltar para agendar um novo horário</a>";
    echo "</div>";
} else {
    echo "<p>Nenhum agendamento encontrado.</p>";
}
// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
