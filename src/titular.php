<?php
require 'src\cpf.php';

class titular {
  private cpf $cpf;
  private string $nome;

  public function __construct(int $cpf, string $nome) {
    $this->cpf= new cpf($cpf);
    if ($this->validaNome($nome) == true and $this->cpf->pegaCpf() != 0){
      return;   }

    return;  }
      
  private function validaNome (string $nome): int {
    if (strlen($nome)<5 or !strpos($nome, " ")){
      echo ucwords($nome).", o nome precisa ter ao todo 5 caracteres e no mínimo um sobrenome, ".
                                                "tente novamente {$this->exibeCpf()}.".PHP_EOL;
      return false;   
    }
    $this->nome = $nome;
    return true;  }
  
  public function exibeCpf(): string {
    return $this->cpf->formataCpf();  }

  public function exibeNome(): string {
    return ucwords($this->nome);  }
    
}

//$nivan= new titular(220233566545, 'nivaldo junior');
// Resposta: CPFs devem possuir 11 digitos, sua tentativa foi 366542656222
//$leo= new titular(55533362422, 'leosilva');
// Resposta: O nome precisa ter ao todo 5 caracteres e no mínimo um sobrenome, tente novamente
//$luan= new titular(11133355522, 'lucas luan');
// Resposta: Parabens Lucas Luan, seu cadastro de titularidade esta completoe seu CPF é 111.333.555-65