<?php
require 'src\titular.php';
require 'src\trait.php';

class conta{
  use msgs;
  private $titular;
  private $numero;
  private $saldo;
  private static $contadorContas= 0;
  
  public function __destruct(){
    self::$contadorContas--;  }

  public function __construct(int $numeroCpf, string $nome){
    $this->titular = new titular($numeroCpf, $nome);
    $saldo = 0;
    self::$contadorContas++;
    msgs::exibeMsg("{$this->titular->exibeNome()}, sua conta foi criada com sucesso, seu cpf é ". 
                                                                 "{$this->titular->exibeCpf()}."); }

  public static function contagemContas(): void{
    $contador= self::$contadorContas;
    msgs::exibeMsg("O Numero atual é de $contador contas");  }

  public function saca(float $valorSaque): void{
    $valorSaqueCorrigido= $this->valoreReais($valorSaque);
    if ($valorSaque<0){
      msgs::exibeMsg("Sua tentativa de saque foi $valorSaqueCorrigido, mas o valor do saque ".
                                                                              "deve ser positivo.");  
      return;
    }
    if ($valorSaque>$this->saldo){
      msgs::exibeMsg("seu saldo é insuficiente para sacar $valorSaqueCorrigido, "
                                                  ."Seu saldo atual é R$ {$this->corrigeSaldo()}");
      return;
    }
    $this->saldo -= $valorSaque;
    msgs::exibeMsg("Saque de $valorSaqueCorrigido realizado com sucesso retire as cédulas no local ". 
                                             "indicado, Seu saldo atual é R$ {$this->corrigeSaldo()}");  }

  public function deposita($valorDeposito ): void{
    $valorDepReal= $this->valoreReais($valorDeposito);
    if ($valorDeposito<0){
      msgs::exibeMsg("Sua tentativa de saque foi $valorDepReal, mas o valor do deposito deve ser". 
                                                                                    "positivo.");
      return;
    }
    $this->saldo += $valorDeposito;
    msgs::exibeMsg("Deposito de $valorDepReal realizado com sucesso, ".
                                    "Seu saldo atual é R$ {$this->corrigeSaldo()}");  }

  public function transfere($valorTransf, $contaDestino): void{
    $valorTransfReal= $this->valoreReais($valorTransf);
    if ($valorTransf<0) {
      msgs::exibeMsg("O valor a transferir foi $valorTransfReal, mas o valor da transferência ". 
                                                                              "deve ser positivo.");
      return;
    }
    if ($valorTransf>$this->saldo){
      msgs::exibeMsg("Você não possiu saldo suficiente para sacar $valorTransfReal, "
                                                   ."Seu saldo atual é R$ {$this->corrigeSaldo()}");
      return;    }
    $this->saldo -= $valorTransf;
    $contaDestino->saldo += $valorTransf;
    msgs::exibeMsg("Transferência de $valorTransfReal realizado com sucesso, ".
                                                  "Seu saldo atual é R$ {$this->corrigeSaldo()}");  }

  public function exibeSaldo(): void{
    msgs::exibeMsg("{$this->titular->exibeNome()} Seu saldo é de R$ {$this->corrigeSaldo()}");  }
  
  public function corrigeSaldo(): string{
    $saldoCorrigido= number_format($this->saldo, 2, ",", ".");
    return $saldoCorrigido; }

  public function valoreReais($valor): string{
    $valorReal = number_format($valor, 2, ",", ".");
    return "R$ $valorReal";  }

  public function exibeCpf(){
    return $this->titular->exibeCpf();  }
  
}

