<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>

<h1> ~ Formulário de Estudo ~</h1>

<form method="post" action="">

    OS: <br><input type="number" name="os"> <br><br>
    Nome do cliente:<br> <input type="text" name="nome"><span class="error"> * Obrigatório</span><br><br>
    E-mail:<br> <input type="text" name="email"><br><br>
    Website:<br> <input type="text" name="site" ><br><br>
    <a><i><b>Exemplo de site:</b> https://site.com.br</i></a><br><br>
    CPF:<br> <input type="text" name="cpf"><span class="error"> * Obrigatório</span><br><br>
    Data de Nascimento:<br> <input type="date" name="date"><br><br>
    Descrição do defeito: <br> <textarea name="desc"  cols="30" rows="10"></textarea><br><br>
    Itens que acompanha o aparelho: <span class="error"> * Obrigatório</span><br><br>
    Bateria:  <input type="radio" name="bateria"value="Acompanha Bateria">Sim
              <input type="radio" name="bateria" value="Não acompanha Bateria">Não <br>
    Fonte:  <input type="radio" name="fonte" value="Acompanha fonte">Sim
            <input type="radio" name="fonte"value="Sem fonte">Não<br>
    Cabo de força: <input type="radio" name="cabodeforca" value="Acompanha cabo de força">Sim
                    <input type="radio" name="cabodeforca" value="Não acompanha cabo de força">Não<br><br>
    <b>Termos:</b> <p><a>
        ATENÇÃO PREZADO CLIENTE,  ABAIXO ALGUMAS INFORMAÇÕES IMPORTANTES A SEREM LIDAS:
        Aconselhamos aos nossos clientes a manterem informações importantes em 2 locais diferentes. A EMPRESA não se responsabiliza pela perda de informações.
        Ao trazer o equipamento para reparo na EMPRESA, o cliente confirma para todos os fins que o equipamento lhe pertence, assim se responsabilizando por toda e qualquer solicitação a nós feita como quebra de senha, backup de informações, etc.
        Em virtude de nosso profundo respeito por nossos clientes, avisamos que é IMPRESCINDÍVEL a utilização do equipamento logo após a sua entrega, testando tudo e nos comunicanco qualquer anomalia imediatamente.
        Após 45 dias, caso o equipamento não seja retirado, cobraremos uma taxa de aluguel de espaço de R$ 0,90 por dia ultrapassado.<br><br>
        Data: <input type="date" name="dia"><br><br>

        Aceitar termos:<span class="error"> * Obrigatório </span> <br><br><input type="checkbox" name="aceita" > Sim eu li e aceito os termos acima.
    </a>  <br><br>

    <button name="gravado" type="submit"> Gravar </button><br><br>

        <a>=============================================================================================================================================
        </a>

    <h1> Dados para Impressão:</h1>

    <?php

    if(isset($_POST['gravado'])) {
        //~ Tratativas de erro da LINHA 59 à LINHA 95 ~ //

        if (empty($_POST['nome']) || strlen($_POST['nome']) < 3 || strlen($_POST['nome']) > 100) {
            echo '<p class="error"> Nome incorreto ou não preechido</p>';
            die();
        }

        if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo '<p class="error"> Preenchimento incorreto de e-mail, tente novamente</p>';
            die();
        }
        if (!empty($_POST['site']) && !filter_var($_POST['site'], FILTER_VALIDATE_URL)) {
            echo '<p class="error"> Site preenchido incorretamente, tente novamente</p>';
            die();
        }

        if (empty($_POST['cpf']) || strlen($_POST['cpf']) < 11 || strlen($_POST['cpf']) > 11) {
            echo '<p class="error"> CPF não preechido, ou incorreto tente novamente.</p>';
            die();
        }
        $bateria = $_POST['bateria'];
        if ($bateria != "Acompanha Bateria" && $bateria != "Não acompanha Bateria"){
            echo '<b><p class="error"> Erro Interno tente novamente.</b>';
            die();

        }

        $fonte = $_POST['fonte'];
        if ($fonte != "Acompanha fonte" && $fonte != "Sem fonte"){
            echo '<b><p class="error"> Erro Interno tente novamente.</b>';
            die();

        }
        $cabodeforca = $_POST['cabodeforca'];
        if ($cabodeforca != "Acompanha cabo de força" && $fonte != "Não acompanha cabo de força"){
            echo '<b><p class="error"> Erro Interno tente novamente.</b>';
            die();

        }
        //NÃO ACEITE DO TERMO//
        if (!isset($_POST['aceita'])) {
            echo "<span class='error'><b>Cliente " . $_POST['nome'] . " não aceitou o termo! O aceite do termo é OBRIGATÓRIO</b></span>";
            die();
        }
        //NÃO ACEITE DO TERMO//

        if (isset($_POST['aceita'])) {
            echo "[Cliente" . " " . "<b>" . $_POST['nome'] . "</b>" . " " . "aceitou os termos]";
        }

        echo "<br><br>";
        echo "===================================";
        echo "<h1>EMPRESA</h1>";
        echo "===================================" . " <br>";
        echo "<b>Ordem de serviço Nº:</b> " . $_POST['os'] . "<br><br>";
        echo "<b>Nome do cliente: </b>" . $_POST['nome'] . "<br><br>";
        echo "<b>E-mail é: </b>" . $_POST['email'] . "<br><br>";
        echo "<b>Website é: </b>" . $_POST['site'] . "<br><br>";
        echo "<b>CPF: </b>" . $_POST['cpf'] . "<br><br>";
        echo "<b>Data de nascimento: </b>" . $_POST['date'] . "<br><br>";
        echo "<b>Descrição do defeito:</b> " . $_POST['desc'] . "<br><br>";
        echo "<b>Itens que acompanha o aparelho:</b> <br><br>";
        echo "[*]" . $bateria . "<br>";
        echo "[*]" . $cabodeforca . "<br>";
        echo "[*]" . $fonte . "<br><br>";
    }

    ?>
</form>
</body>
</html>
