<?php
require 'src/conta.php';

$lucasConta= new conta(23658965455,'lucas silva');
$lucasConta->deposita(1555.47);
$lucasConta->saca(300.50);
$lucasConta->saca(-300.50);
$lucasConta->exibeSaldo();
$nivanConta= new conta(35645231530, 'nivaldo junior');
$nivanConta->deposita(1500);
$nivanConta->transfere(500, $lucasConta);
$nivanConta->exibeSaldo();
$lucasConta->exibeSaldo();
conta::contagemContas();

/*          RESULTADOS / LX = LINHA X
L4  - Lucas Silva, sua conta foi criada com sucesso, seu cpf é 236.589.654-55.
L5  - Deposito de R$ 1.555,47 realizado com sucesso, Seu saldo atual é R$ 1.555,47
L6  - Saque de R$ 300,50 realizado com sucesso retire as cédulas no local indicado, Seu saldo atual é R$ 1.254,97
L7  - Sua tentativa de saque foi R$ -300,50, mas o valor do saque deve ser positivo.
L8  - Lucas Silva Seu saldo é de R$ 1.254,97
L9  - Nivaldo Junior, sua conta foi criada com sucesso, seu cpf é 356.452.315-30.
L10 - Deposito de R$ 1.500,00 realizado com sucesso, Seu saldo atual é R$ 1.500,00
L11 - Transferência de R$ 500,00 realizado com sucesso, Seu saldo atual é R$ 1.000,00
L12 - Nivaldo Junior Seu saldo é de R$ 1.000,00
L13 - Lucas Silva Seu saldo é de R$ 1.754,97
L14 - O Numero atual é de 2 contas    */