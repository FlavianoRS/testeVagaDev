<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;
use SmartSolucoes\Libs\Helper;

class Compromisso extends Model
{

    public function allCompromissos()
    {
      $where = '';
      $sql = "
        SELECT u.* 
        FROM compromissos u 
        WHERE 1=1 $where
      ";
      $query = $this->PDO()->prepare($sql);
      $query->execute();
      return $query->fetchAll(); 
    }

}
