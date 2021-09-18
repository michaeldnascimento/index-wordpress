<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Products{

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
     * Caminho da imagem
     * @var string
     */
    public string $imagem;

    /**
    * Data de publicação do produto
    * @var string
    */
    public string $data;

  /**
   * Método responsável por cadastrar o produto no banco
   * @return boolean
   */
  public function register(): bool
  {
    //DEFINIR A DATA
    $this->data = date('Y-m-d H:i:s');

    //INSERIR PRODUTO NO BANCO
    $obDatabase = new Database('produtos');
    $this->id = $obDatabase->insert([
                                      'titulo'    => $this->titulo,
                                      'imagem'    => $this->imagem,
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
  public static function getProducts(string $where = null, string $order = null, string $limit = null){
    return (new Database('produtos'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar um produto com base em seu ID
   * @param integer $id
   * @return Products
   */
  public static function getProduct(int $id){
    return (new Database('produtos'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

    /**
     * Método responsável por atualizar o produto no banco
     * @return boolean
     */
    public function update(){
        return (new Database('produtos'))->update('id = '.$this->id,[
            'titulo'    => $this->titulo,
            'imagem'    => $this->imagem,
            'data'      => $this->data
        ]);
    }

    /**
     * Método responsável por excluir a vaga do banco
     * @return boolean
     */
    public function delete(){
        return (new Database('produtos'))->delete('id = '.$this->id);
    }

}