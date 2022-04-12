<?php
require 'titular.php';

class conta{
  private $titular;
  private $numero;
  private $saldo;
  private static $contadorContas= 0;
  
  //private function __destruct(){
  //  self::$contadorContas--;  }

  public function __construct(titular $titular){

    $this->titular = $titular;
    $saldo = 0;
    self::$contadorContas++;
    echo "sua conta foi criada com sucesso".PHP_EOL;  }

  public function contagemContas(): void{
    echo "O Numero atual de contas é {$this->contadorContas} contas";  }

  public function saca($valorSaque): void{
    if ($valorSaque<0){
      echo "Sua tentativa de saque foi $valorSaque, mas o valor do saque deve ser positivo.";  
      return;
    }
    if ($valorSaque>$this->saldo){
      echo "seu saldo é insuficiente, seu saldo é {$this->saldo}";
      return;
    }
    $this->saldo -= $valorSaque;
    echo "saque realizado com sucesso, retire as cédulas no local indicado, 
            seu saldo atual é {$this->saldo}";  }

  public function deposita($valorDeposito ): void{
    if ($valorDeposito<0){
      echo "Sua tentativa de saque foi $valorDeposito, mas o valor do deposito deve ser positivo.";
      return;
    }
    $this->saldo += $valorDeposito;
    echo "Deposito realizado com sucesso, seu saldo atual é {$this->saldo}";  }

  public function tranfere($valorTransf, $cpfDestino): void{
    if ($valorTransf<0) {
      echo "O valor a transferir foi $valorTransf, mas o valor da transferência deve ser positivo.";
      return;
    }
    if ($valorTransf<$this->saldo){
      echo "Você não possiu saldo suficiente para essa transação, seu saldo é {$this->saldo}";
      return;
    }
    $this->saldo -= $valorTransf;
    $cpfDestino->saldo += $valorTransf;  }

  }
  $luanCpf= new cpf (23658965455);
  $luan= new titular($luanCpf, 'lucas luan');
  $luanConta= new conta($luan);