<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Comments{

    /**
    * Identificador único do produto
    * @var integer
    */
    public int $id;

    /**
    * nome do responsável
    * @var string
    */
    public string $nome;

    /**
    * Mensagem do responsável
    * @var string
    */
    public string $mensagem;

    /**
     * Id do produto que foi feito o comentário
     * @var integer
     */
    public int $id_produto;


    /**
    * Data de publicação do comentário
    * @var string
    */
    public string $data;

    /**
     * Método responsável por cadastrar um novo comentário
     */
    public function register(): bool
    {
        //DEFINIR A DATA
        $this->data = date('Y-m-d H:i:s');

        //INSERIR O DEPOIMENTO NO BANCO DE DADOS
        $this->id = (new Database('comentarios'))->insert([
            'nome' => $this->nome,
            'mensagem' => $this->mensagem,
            'data' => $this->data,
            'id_produto' => $this->id_produto
        ]);

        //RETORNAR SUCESSO
        return true;
    }


    /**
     * Método responsável por buscar um comentário com base em seu ID
     * @param integer $id
     * @return Comments
     */
    public static function getComment(int $id){
        return (new Database('comentarios'))->select('id_produto = '.$id)
            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * Método responsável por obter os comentários dos produtos do banco de dados
     * @param string|null $where
     * @param string|null $order
     * @param string|null $limit
     * @return array
     */
    public static function getComments(string $where = null, string $order = null, string $limit = null){
        return (new Database('comentarios'))->select($where,$order,$limit)
            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }




}