<?php


// Puxando os atributos e métodos da classe PDO aprendido anteriormente:

class sql extends PDO
{
    // Criando a variável de conexão
    private $conn;

    // Método construtor
    public function __construct()
    {
        // Quando for criado um novo Objeto SQL, ele ja irá conectar automaticamente no Banco:
        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "root");
    }

    // Bind dos parâmetros 
    private function setParams($statement, $parameters = array())
    {
        foreach ($parameters as $key => $value) {

            $statement->bindParam( $key, $value);
        }
    }

    private function setParam($statement, $key, $value)
    {

        $statement->bindParam($key, $value);
    }


    // Comando a ser executado no Banco de Dados
    public function queryBanco($rawQuery, $params = array())
    {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    public function select($rawQuery, $params = array()): array
    {

        $stmt = $this->queryBanco($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
