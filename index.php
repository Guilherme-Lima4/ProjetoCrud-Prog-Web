<!DOCTYPE html>
<html lang="pt">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro mensagem</title>
</head>



<body style="background-color:#DCDCDC">



    <form method="post" action="crud.php?acao=inserir" name="dados" onSubmit="return enviardados();">


        <style>
            table.center {
                margin-top: 220px;
            }
        </style>

        <table class="center" width="650" height="300" border="0px" align="center">

            
            

            <tr>
                <td width="118">
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome completo:</font>
                </td>
                <td width="460">
                    <input name="nome" type="text" class="formbutton" id="nome" size="52" maxlength="150">
                </td>
            </tr>



            <tr>
                <td>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Data:</font>
                </td>
                <td>
                    <font size="2">
                        <input name="data" type="date" id="data" class="formbutton">
                    </font>
                </td>
            </tr>



            <tr>
                <td>
                    <font size="2" face="Verdana, Arial, Helvetica, sans-serif">E-mail:</font>
                </td>
                <td>
                    <font size="2">
                        <input name="email" type="text" id="email" size="52" maxlength="150" class="formbutton">
                    </font>
                </td>
            </tr>



            <tr>
                <td>
                    <font face="Verdana, Arial, Helvetica, sans-serif">
                        <font size="2">Mensagem<strong>:</strong></font>
                    </font>
                </td>
                <td rowspan="2">
                    <font size="2">
                        <textarea name="tx_mensagem" cols="50" rows="8" class="formbutton" id="mensagem" input></textarea>
                    </font>
                </td>
            </tr>
            <tr>
                <td height="85">
                    <p><strong>
                            <font face="Verdana, Arial, Helvetica, sans-serif">
                                <font size="1">
                                </font>
                            </font>
                        </strong></p>
                </td>
            </tr>
            <tr>
                <td height="22"></td>
                <td>
                <input name="Reset" type="reset" class="formobjects" value="Limpar campos"> 
                <input name="Submit" type="submit" class="formobjects" value="Cadastrar">
                <button class="waves-effect waves-light btn" type="submit" name="action"
                        formaction="crud.php?acao=selecionar">Ver mensagens
                </button>
                    <!--<input name="Submit" type="submit" class="formobjects" value="Cadastrar">-->
                    <!-- <input name="Reset" type="reset" class="formobjects" value="Limpar campos">
                    <button class="waves-effect waves-light btn" type="submit" name="action"
                        formaction="select_variavel_a.php">ler
                    </button>

                    <button class="waves-effect waves-light btn" type="submit" name="action"
                        formaction="insert.php">cadastrar
                    </button>
                    <button class="waves-effect waves-light btn" type="submit" name="action"
                        formaction="deletar.php">delete
                    </button> -->
                    <!--<button type='submit' formaction='pegar.php'>Consultar</button>-->
                </td>
            </tr>
        </table>
    </form>
</body>



</html>