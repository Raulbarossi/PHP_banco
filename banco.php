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