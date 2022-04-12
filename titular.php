<?php
require 'cpf.php';

class titular {
  private cpf $cpf;
  private string $nome;

  public function __construct(cpf $cpf, string $nome)  {
    
    if ($this->validaNome($nome) == -1){
      exit();    }
    $this->cpf= $cpf;
    echo "Parabens ".$this->exibeNome().", seu cadastro de titularidade esta completo".
                                            "e seu CPF é {$this->cpf->formataCpf()}".PHP_EOL;  }
      
  private function validaNome (string $nome): int {
    if (strlen($nome)<5){
      echo "o nome precisa ter ao menos 5 caracteres, tente novamente";
      return (-1);   
    }
    $this->nome = $nome;
    return 0;  }
  
  public function exibeCpf(): string {
    
    return $this->cpf->formataCpf();  }

  public function exibeNome(): string {
    return ucwords($this->nome);  }
    
}
//$luanCpf= new cpf (11133355565);
//$luan= new titular($luanCpf, 'lucas luan');