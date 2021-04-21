<?php

class Usuarios {

    // Atributo para conexão com o banco de dados   
    private $pdo = null;
    // Atributo estático para instância da própria classe    
    private static $usuario = null;

    private function __construct($conexao) {
        $this->pdo = $conexao;
    }

    public static function getInstance($conexao) {
        if (!isset(self::$usuario)):
            self::$usuario = new Usuarios($conexao);
        endif;
        return self::$usuario;
    }

    public function insert($rNome, $rSenha, $rIncluir, $rAlterar, $rExcluir, $rLogin, $rEmail) {
        try {
            $rSql = "INSERT INTO usuarios (nome,senha,incluir,alterar,excluir,login,email) 
                           VALUE (:nome,:senha,:incluir,:alterar,:excluir,:login,:email);";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':nome', $rNome);
            $stm->bindValue(':senha', md5($rSenha));
            //$stm->bindValue(':user_padrao', $rUserPadrao);
            $stm->bindValue(':incluir', $rIncluir);
            $stm->bindValue(':alterar', $rAlterar);
            $stm->bindValue(':excluir', $rExcluir);
            $stm->bindValue(':login', $rLogin);
            $stm->bindValue(':email', strtolower($rEmail));
            //$stm->bindValue(':user_admin', $rUserAdmin);

            $stm->execute();
            if ($stm) {
                Logger('Usuario:[' . LOGIN . '] - INSERIU USUÁRIO');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function update($rNome, $rIncluir, $rAlterar, $rExcluir, $rLogin, $rEmail, $rId) {
        try {
            $sql = "UPDATE usuarios  SET 
                        nome=:nome,
                        incluir=:incluir,
                        alterar= :alterar,
                        excluir=:excluir,
                        login=:login,
                        email=:email
                  WHERE id= :id;";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':nome', $rNome);
            $stm->bindValue(':incluir', $rIncluir);
            $stm->bindValue(':alterar', $rAlterar);
            $stm->bindValue(':excluir', $rExcluir);
            $stm->bindValue(':login', $rLogin);
            $stm->bindValue(':email', strtolower($rEmail));
            $stm->bindValue(':id', $rId);
            $stm->execute();
            return $stm;
            if ($stm) {
                Logger('Usuario:[' . LOGIN . '] - ALTEROU USUÁRIO ID:[' . $rId . ']');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function alterarSenha($rId, $rSenha) {
        try {
            $sql = "UPDATE usuarios SET senha=:senha WHERE id= :id;";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':senha', md5($rSenha));
            $stm->bindValue(':id', $rId);
            $stm->execute();
            
            if ($stm) {
                Logger('Usuario:[' . LOGIN . '] - ALTEROU SENHA DO USUÁRIO ID:[' . $rId . ']');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function delete($rId) {
        if (!empty($rId)):
            try {
                $sql = "DELETE FROM usuarios WHERE id=:id";
                $stm = $this->pdo->prepare($sql);
                $stm->bindValue(':id', $rId);
                $stm->execute();
                if ($stm) {
                    Logger('Usuario:[' . LOGIN . '] - EXCLUIU USUÁRIO ID:[' . $rId . '] - ' . $rId);
                }
                return $stm;
            } catch (PDOException $erro) {
                Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
            }
        endif;
    }

    public function select() {
        try {
            $sql = "SELECT * FROM usuarios ";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function selectUM($rWhere) {
        try {
            $sql = "SELECT * FROM usuarios " . $rWhere;
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function montaSelect($rNome = 'bairro_id', $rSelecionado = null) {
        try {
            $objBairros = Bairro::getInstance(Conexao::getInstance());
            $dados = $objBairros->select();
            $select = '';
            $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Escolha um bairro ...">'
                    . '<option value="">&nbsp;</option>';
            foreach ($dados as $linhaDB) {
                if (!empty($rSelecionado) && $rSelecionado === $linhaDB->id) {
                    $sAdd = 'selected';
                } else {
                    $sAdd = '';
                }
                $select .= '<option value="' . $linhaDB->id . '"' . $sAdd . '>' . $linhaDB->nome . '</option>';
            }
            $select .= '</select>';
            return $select;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . LOGIN . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

}

?>