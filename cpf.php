<?php

class cpf {
  private int $cpf;
  
  public function __construct(int $cpf)
  {
    if (count (str_split((strval($cpf)))) != 11){
      echo "CPFs devem possuir 11 digitos, sua tentativa foi $cpf".PHP_EOL;
      exit();
    }
    $this->cpf = $cpf;
  }
  public function formataCpf(): string {
    $strCpf = strval($this->cpf);
    $cpfMask= "%s%s%s.%s%s%s.%s%s%s-%s%s";
    return vsprintf($cpfMask, str_split($strCpf));  }
}
//$luan = new cpf(112366558964);
//echo $luan->formataCpf();
