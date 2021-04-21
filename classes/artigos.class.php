<?php

class Artigos {
   // Atributo para conexão com o banco de dados   
   private $pdo = null;
   // Atributo estático para instância da própria classe    
   private static $artigos= null;

   private function __construct($conexao) {
      $this->pdo = $conexao;
   }
   
   public static function getInstance($conexao) {
      if (!isset(self::$artigos)):
         self::$artigos = new Artigos($conexao);
      endif;
      return self::$artigos;
   }

   public function insert($rTitulo,$rDescricao,$rCategoriaID,$rArquivo,$rNomeArquivo) {
      try {
         $rSql = "INSERT INTO base_artigo(titulo,descricao,categoria_id,arquivo,data_cad,nome_original) "
                 . "VALUES (:titulo,:descricao,:categoria_id,:arquivo,:data_cad,:nome_original);";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':titulo', $rTitulo);
         //$stm->bindValue(':pequena_descricao', $rPequenaDescricao);
         $stm->bindValue(':descricao', $rDescricao);
         $stm->bindValue(':categoria_id', $rCategoriaID);
         $stm->bindValue(':arquivo', $rArquivo);
         $stm->bindValue(':data_cad', date("d-m-y"));
         $stm->bindValue(':nome_original', $rNomeArquivo);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . LOGIN . '] - INSERIU ARTIGO');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage().']');  
      }
   }
   public function update($rTitulo,  $rDescricao, $rCategoriaID, $rID) {
      try {
         $sql = "UPDATE base_artigo SET titulo=:titulo,  descricao=:descricao, categoria_id=:categoria_id WHERE id = :id;";
         $stm = $this->pdo->prepare($sql);
         $stm->bindValue(':titulo', $rTitulo);
//         $stm->bindValue(':pequena_descricao', $rPequenaDescricao);
         $stm->bindValue(':descricao', $rDescricao);
         $stm->bindValue(':categoria_id', $rCategoriaID);
         $stm->bindValue(':id', $rID);
         $stm->execute();         
         if ($stm) {
            Logger('Usuario:[' . LOGIN . '] - ALTEROU ARTIGO - ID:[' . $rID . ']');
         }
         return $stm;
      } catch (PDOException $erro) {
      Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - MENSAGEM:[' . $erro->getMessage().']');
      
      }
   }
   public function delete($rId) {
      if (!empty($rId)):
         try {
            $sql = "DELETE FROM base_artigo WHERE id=:id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':id', $rId);
            $stm->execute();
            if ($stm) {
               Logger('USUARIO:[' . LOGIN . '] - EXCLUIU ARTIGO - ID:[' . $rId . ']');
            }
            return $stm;
         } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage().']'); 
         }
      endif;
   }
   public function somaClick($rId) {
      if (!empty($rId)):
         try {
            $sql = "UPDATE base_artigo SET clicks=clicks+1 WHERE id=:id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':id', $rId);
            $stm->execute();
            if ($stm) {
               Logger('USUARIO:[' . LOGIN . '] - CLICARAM NO  ARTIGO - ID:[' . $rId . ']');
            }
            return $stm;
         } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage().']'); 
         }
      endif;
   }
   public function select($rWhere='') {
      try {
         $sql = "SELECT * FROM base_artigo ".$rWhere;
         $stm = $this->pdo->prepare($sql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage().']');  
      }
   }
   public function selectUM($rWhere) {
      try {
         $sql = "SELECT * FROM base_artigo " . $rWhere;
         $stm = $this->pdo->prepare($sql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . LOGIN . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
   public function contaArtigos($rCondicao) {
       try {
            $sql = "SELECT count(id) AS total FROM base_artigo " . $rCondicao;
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage().']');  
      }
   }
   public function montaSelect($rNome = 'categoria_id', $rSelecionado = null) {
      try {
         $objCategorias = Categorias::getInstance(Conexao::getInstance());
         $dados = $objCategorias ->select();
         $select = '';
         $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Escolha uma categoria..."  style="width: 100%;">'
                 . '<option value="">&nbsp;</option>';
         foreach ($dados as $linhaDB) {
            if (!empty($rSelecionado) && $rSelecionado === $linhaDB->id) {$sAdd = 'selected';} else {$sAdd = '';}
            $select.='<option value="' . $linhaDB->id . '"' . $sAdd . '>' . $linhaDB->nome. '</option>';
         }
         $select.= '</select>';
         return $select;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . LOGIN . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
}

?>