<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Produtos{

    /**
    * Identificador único do produto
    * @var integer
    */
    public int $id;

    /**
    * Título do produto
    * @var string
    */
    public string $titulo;

    /**
    * Descrição do produto (pode conter html)
    * @var string
    */
    public string $descricao;

    /**
     * Caminho da imagem
     * @var string
     */
    public string $imagem;

    /**
    * Define se o produto está ativo
    * @var string(s/n)
    */
    public string $ativo;

    /**
    * Data de publicação do produto
    * @var string
    */
    public string $data;

  /**
   * Método responsável por cadastrar o produto no banco
   * @return boolean
   */
  public function cadastrar(){
    //DEFINIR A DATA
    $this->data = date('Y-m-d H:i:s');

    //INSERIR A VAGA NO BANCO
    $obDatabase = new Database('produtos');
    $this->id = $obDatabase->insert([
                                      'titulo'    => $this->titulo,
                                      'descricao' => $this->descricao,
                                      'imagem'    => $this->imagem,
                                      'ativo'     => $this->ativo,
                                      'data'      => $this->data
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }


  /**
   * Método responsável por obter as produtos do banco de dados
   * @param string|null $where
   * @param string|null $order
   * @param string|null $limit
   * @return array
   */
  public static function getProdutos(string $where = null, string $order = null, string $limit = null){
    return (new Database('produtos'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar um produto com base em seu ID
   * @param integer $id
   * @return Produtos
   */
  public static function getProduto(int $id){
    return (new Database('produtos'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}