<?php

#chamando o arquivo de conexao com o banco de dados
include_once "conexao.php";

#pegando o valor da acao via URL
$acao = $_GET['acao'];

#cpomparando se o valor pego da URL é do tipo GET
if (isset($_GET['id'])) {
    #criando uma variavel para armazenar o valor obtido do GET
    $id = $_GET['id'];
}


switch ($acao) {
    case 'inserir':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $data = $_POST['data'];
        $mensagem = $_POST['tx_mensagem'];

        $sql = "INSERT INTO users (user_name, user_email, user_data, user_mensagem) VALUES ('$nome', '$email', 
    '$data', '$mensagem')";

        if (!mysqli_query($conn, $sql)) {
            die("Erro ao inserir as informações do formulário na tabela users: " . mysqli_error($conn));
        } else {
            echo "<script language='javascript' type='text/javascript'>
        alert('Dados cadastrados com sucesso!')
        window.location.href='crud.php?acao=selecionar'</script>";
        }
        break;

    case 'montar':
        $id = $_GET['id'];
        $sql = 'select * FROM users WHERE user_id =' . $id;
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

        // montando formulario
        echo "<form method='post' name='dados' action='crud.php?acao=atualizar' onSubmit='return 
    enviardados();'>";
        echo "<table width='588' border='0' align='center' >";

        while ($registro = mysqli_fetch_array($resultado)) {
            echo "    <tr> ";
            echo "      <td width='118'><font size='1' face='Verdana, Arial, Helvetica,
        sans-serif'>Código: </font></td> ";
            echo "       <td width='460'>";
            echo "        <input name='id' type='text' class='formbutton' id='id' size='5'
        maxlength='10' value=" . $id . " readonly> ";
            echo "      </td> ";
            echo "    </tr>";

            echo " <tr>";
            echo "<td><font face='Verdana, Arial, Helvetica, sans-serif'><font
        size='1'>Nome<strong>:</strong></font></font></td>";
            echo " <td rowspan='2'><font size='2'>";
            echo "<style>textarea{resize:nome;}</style>";
            echo "<textarea name='nome' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['user_name']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo " <tr>";
            echo "<td><font face='Verdana, Arial, Helvetica, sans-serif'><font
        size='1'>Data<strong>:</strong></font></font></td>";
            echo " <td rowspan='2'><font size='2'>";
            echo "<style>textarea{resize:data;}</style>";
            echo "<textarea name='data' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['user_data']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo " <tr>";
            echo "<td><font face='Verdana, Arial, Helvetica, sans-serif'><font
        size='1'>Email<strong>:</strong></font></font></td>";
            echo " <td rowspan='2'><font size='2'>";
            echo "<style>textarea{resize:email;}</style>";
            echo "<textarea name='email' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['user_email']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo " <tr>";
            echo "<td><font face='Verdana, Arial, Helvetica, sans-serif'><font
        size='1'>Mensagem<strong>:</strong></font></font></td>";
            echo " <td rowspan='2'><font size='2'>";
            echo "<style>textarea{resize:mensagem;}</style>";
            echo "<textarea name='mensagem' cols='50' rows='3' class='formbutton'>" . htmlspecialchars($registro['user_mensagem']) . "</textarea>";
            echo "</font></td>";
            echo "</tr>";
            echo "<tr>";

            echo "<tr>";
            echo " <td height='22'></td>";
            echo " <td>";
            echo "<input name='Submit' type='submit'  class='formobjects' value='Atualizar'> ";
            echo " <button type='submit' formaction='crud.php?acao=selecionar'>Selecionar</button>   ";
            echo " <input name='Reset' type='reset' class='formobjects' value='Limpar campos'>";
            echo "  </td>";
            echo "  </tr>";

            echo "</table>";
            echo "</form>   ";
        }
        mysqli_close($conn);
        break;

    case 'atualizar':
        $codigo = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $data = $_POST['data'];
        $mensagem = $_POST['mensagem'];

        $sql = "UPDATE users SET user_name = '" . $nome . "', user_email = '" . $email . "', user_data = 
        '" . $data . "', user_mensagem = '" . $mensagem . "' WHERE user_id = '" . $codigo . "'";

        if (!mysqli_query($conn, $sql)) {
            die('</br> Erro no comando SQL UPDATE: ' . mysqli_error($conn));
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizados com sucesso!')
            window.location.href='crud.php?acao=selecionar'</script>";
        }
        break;

    case 'deletar':
        $sql = "DELETE FROM users WHERE user_id = '" . $id . "'";
        if (!mysqli_query($conn, $sql)) {
            die('Error: ' . mysqli_error($conn));
        } else {
            echo "<script language='javascript' type='text/javascript'>
                alert('Dados excluidos com sucesso!')
                window.location.href='crud.php?acao=selecionar'</script>";
        }
        mysqli_close($conn);
        header("Location:crud.php?acao=selecionar");
        break;
        break;

    case 'selecionar':
        date_default_timezone_Set('America/Sao_Paulo');
        header("Content-type: text/html; charset=utf-8");
        include_once "conexao.php";

        echo "<meta charset='UTF-8'>";
        echo "<style>
            table.center {
                margin-top: 180px;
                border-radius: 10px;
                border-style: groove;
                width:70%;
            }
            table {
                border-collapse:collapse;
            }
            th {
                background-color: #87CEEB;
                border: 1px;
                font: 15px Arial, sans-serif;
                border-style: groove;
                text-align: center;
            }
            tr {
                border: 1px;
                border-radius: 10px;
                border-style: groove;
                text-align: center;
                font: 15px Arial, sans-serif;
            }
            td {
                border: 0px;
                border-radius: 10px;
                border-style: groove;
                text-align: center;
                font: 15px Arial, sans-serif;
            }
        
    </style>";
        echo "<center><table class= center border= 0px>";
        echo "<tr>";
        echo "<th>CODIGO</th>";
        echo "<th>NOME</th>";
        echo "<th>EMAIL</th>";
        echo "<th>DATA CADASTRO</th>";
        echo "<th>MENSAGEM</th>";
        echo "<th>AÇÕES</th>";
        echo "</th>";

        $sql = "SELECT * FROM users";
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

        echo "<CENTER>Registros cadastrados na base de dados.<br/></CENTER> ";
        echo "</br>";

        while ($registro = mysqli_fetch_array($resultado)) {

            $id = $registro['user_id'];
            $nome = $registro['user_name'];
            $email = $registro['user_email'];
            $data = $registro['user_data'];
            $mensagem = $registro['user_mensagem'];

            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $nome . "</td>";
            echo "<td>" . $email . "</td>";
            echo "<td>" . date("d/m/Y", strtotime($data)) . "</td>";
            echo "<td>" . $mensagem . "</td>";
            echo "<td><a href='crud.php?acao=deletar&id=$id'><img src='deleteee_crud.png' height='50' width='50' alt='Deletar' title='Deletar registro'></
        a><a href='crud.php?acao=montar&id=$id'><img src='editt_crud.png' height='50' width='50' alt='Atualizar' title='Atualizar registro'></
        a><a href='index.php'><img src='insertt_crud.png' alt='Inserir' title='Inserir registro'></
        a>";

            echo "</tr>";
        }
        mysqli_close($conn);
        break;

    default:
        header("Location:crud.php?acao=selecionar");
        break;
}
