<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="titulo">Inserir Registro #02</div>

<?php 
if(count($_POST) > 0) {
    $dados = $_POST;
    $erros = [];

    // Validação do nome
    if(trim($dados['nome']) === "") {
        $erros['nome'] = 'Nome é obrigatório';
    }

    // Validação da data de nascimento
    if(isset($dados['nascimento'])) {
        $data = DateTime::createFromFormat('d/m/Y', $dados['nascimento']);
        if(!$data) {
            $erros['nascimento'] = 'Data deve estar no padrão dd/mm/aaaa';
        }
    }

    // Validação do email
    if(!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $erros['email'] = 'Email inválido';
    }

    // Validação do site
    if (!filter_var($dados['site'], FILTER_VALIDATE_URL)) {
        $erros['site'] = 'Site inválido';
    }

    // Validação da quantidade de filhos
    $filhosConfig = ["options" => ["min_range" => 0, "max_range" => 20]];
    if (!filter_var($dados['filhos'], FILTER_VALIDATE_INT, $filhosConfig) && $dados['filhos'] != 0) {
        $erros['filhos'] = 'Quantidade de filhos inválida (0-20).';
    }

    // Validação do salário
    $salario = str_replace(',', '.', $dados['salario']);
    if (!filter_var($salario, FILTER_VALIDATE_FLOAT)) {
        $erros['salario'] = 'Salário inválido';
    }

    // Inserção no banco de dados se não houver erros
    if(!count($erros)) {
        require_once "conexao.php";

        $sql = "INSERT INTO cadastro 
        (nome, nascimento, email, site, filhos, salario)
        VALUES (?, ?, ?, ?, ?, ?)";

        $conexao = novaConexao();
        $stmt = $conexao->prepare($sql);

        if (!$stmt) {
            echo "Erro ao preparar a declaração: " . $conexao->error;
            exit;
        }

        $params = [
            $dados['nome'],
            $data ? $data->format('Y-m-d') : null,
            $dados['email'],
            $dados['site'],
            $dados['filhos'],
            $salario,
        ];

        if (!$stmt->bind_param("ssssds", ...$params)) {
            echo "Erro ao ligar parâmetros: " . $stmt->error;
            exit;
        }

        if(!$stmt->execute()) {
            echo "Erro ao executar: " . $stmt->error;
            exit;
        } else {
            unset($dados);
        }
    }
}
?>

<?php 
$erros = isset($erros) ? $erros : [];
foreach($erros as $erro): ?>
    <div class="alert alert-danger" role="alert">
        <?= $erro ?>
    </div>
<?php endforeach ?>

<form action="#" method="post" autocomplete="off">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="nome">Nome</label>
            <input type="text" 
                class="form-control <?= isset($erros['nome']) ? 'is-invalid' : ''?>"
                id="nome" name="nome" placeholder="Nome"
                value="<?= isset($dados['nome']) ? $dados['nome'] : '' ?>">
            <div class="invalid-feedback">
                <?= isset($erros['nome']) ? $erros['nome'] : '' ?>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="nascimento">Nascimento</label>
            <input type="text"
                class="form-control <?= isset($erros['nascimento']) ? 'is-invalid' : ''?>"
                id="nascimento" name="nascimento"
                placeholder="Nascimento"
                value="<?= isset($dados['nascimento']) ? $dados['nascimento'] : '' ?>">
            <div class="invalid-feedback">
                <?= isset($erros['nascimento']) ? $erros['nascimento'] : '' ?>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">E-mail</label>
            <input type="text"
                class="form-control <?= isset($erros['email']) ? 'is-invalid' : ''?>"
                id="email" name="email" placeholder="E-mail"
                value="<?= isset($dados['email']) ? $dados['email'] : '' ?>">
            <div class="invalid-feedback">
                <?= isset($erros['email']) ? $erros['email'] : '' ?>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="site">Site</label>
            <input type="text"
                class="form-control <?= isset($erros['site']) ? 'is-invalid' : ''?>"
                id="site" name="site" placeholder="Site"
                value="<?= isset($dados['site']) ? $dados['site'] : '' ?>">
            <div class="invalid-feedback">
                <?= isset($erros['site']) ? $erros['site'] : '' ?>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="filhos">Qtde de Filhos</label>
            <input type="number" 
                class="form-control <?= isset($erros['filhos']) ? 'is-invalid' : ''?>"
                id="filhos" name="filhos"
                placeholder="Qtde de Filhos"
                value="<?= isset($dados['filhos']) ? $dados['filhos'] : '' ?>">
            <div class="invalid-feedback">
                <?= isset($erros['filhos']) ? $erros['filhos'] : '' ?>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="salario">Salário</label>
            <input type="text"
                class="form-control <?= isset($erros['salario']) ? 'is-invalid' : ''?>"
                id="salario" name="salario"
                placeholder="Salário"
                value="<?= isset($dados['salario']) ? $dados['salario'] : '' ?>">
            <div class="invalid-feedback">
                <?= isset($erros['salario']) ? $erros['salario'] : '' ?>
            </div>
        </div>
    </div>
    <button class="btn btn-primary btn-lg">Enviar</button>
</form>
