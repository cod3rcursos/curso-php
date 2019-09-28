<div class="titulo">PDO: Alterar</div>

<?php
require_once "conexao_pdo.php";

$sql = "UPDATE cadastro
SET nome = ?, nascimento = ?, email = ?,
site = ?, filhos = ?, salario = ?
WHERE id = ?";

$conexao = novaConexao();
$stmt = $conexao->prepare($sql);

$resultado = $stmt->execute([
    'Gui',
    '1980-12-12',
    'gui@gui.com.br',
    'http://gui.co',
    1,
    12000,
    22
]);

if($resultado) {
    echo "Sucesso :)";
} else {
    print_r($stmt->errorInfo());
}