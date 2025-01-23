<?php

require_once('./modelo/ClientePF.php');
require_once('./modelo/ClientePJ.php');

require_once('./util/Conexao.php');
require_once("dao/ClienteDAO.php");

/* $con = Conexao::getCon();
print_r($con); */

echo "\n ----CADASTRO DE CLIENTES----\n";
echo "1- Cadastrar Cliente PF\n";
echo "2- Cadastrar Cliente PJ\n";
echo "3- Listar Clientes\n";
echo "4- Buscar Clientes\n";
echo "5- Excluir Cliente";
echo "0- Sair\n";

$opcao = readline("Escolha uma opção: ");

switch($opcao){

    case 1:
        $cliente = new ClientePF();
        $cliente->setNome(readline("Informe o nome: "));
        $cliente->setNomeSocial(readline("Informe o nome social: "));
        $cliente->setCpf(readline("Informe o CPF: "));
        $cliente->setEmail(readline("Informe o email: "));

        $clienteDAO = new ClienteDAO();
        $clienteDAO->inserirCliente($cliente); 

        echo "Cliente PF cadastrado com sucesso!! \n \n";

    break;

    case 2:

        $cliente = new ClientePJ();
        $cliente->setRazaoSocial(readline("Informe a razão social: "));
        $cliente->setNomeSocial(readline("Informe o nome social: "));
        $cliente->setCnpj(readline("Informe o CNPJ: "));
        $cliente->setEmail(readline("Informe o email: "));

        $clienteDAO = new ClienteDAO();
        $clienteDAO->inserirCliente($cliente); 

        echo "Cliente PF cadastrado com sucesso!! \n \n";

    break; 

    case 3:

        $clienteDAO = new ClienteDAO();
        $clientes = $clienteDAO->listarClientes(); 

        foreach($clientes as $c) {
            if($c instanceof Cliente){
                printf("%d- %s | %s | %s | %s | %s \n", $c->getId(), $c->getTipo(), $c->getNomeSocial(), $c->getIdentificacao(), $c->getNroDoc(), $c->getEmail());
            }
        }

    break;

    case 4:

    break; 

    case 5:

    break;

    case 0:

    break; 

}
