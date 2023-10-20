<?php
session_start();

// Verificar se o usuário está logado
if (isset($_GET['logged_in'])) {
    $user_logged_in = $_GET['logged_in'];

    if ($user_logged_in === 'true') {
        echo '<script>alert("O usuário está logado.");</script>';
        // Redirecionar para a página principal após exibir a mensagem
        exit();
    } else {
        echo '<script>alert("É necessário fazer login antes de marcar a consulta.");</script>';
        exit();
    }

}

// Classe para manipular a conexão com o banco de dados
class Database
{
    private $host = "localhost";
    private $db_name = "hospital1";
    private $username = "root";
    private $password = "P@ssw0rd";
    private $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }

        return $this->conn;
    }
}

// Classe para manipular as consultas
class Consulta
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function marcarConsulta($pnome, $unome, $email, $tel, $city, $idade, $bi, $hora, $tipo_consulta, $genero)
    {
        // Preparar a consulta SQL
        $query = "INSERT INTO tabela_consulta (pnome, unome, email, tel, city, idade, bi, hora, tipo_consulta, genero) 
                  VALUES (:pnome, :unome, :email, :tel, :city, :idade, :bi, :hora, :tipo_consulta, :genero)";

        // Preparar o statement
        $stmt = $this->conn->prepare($query);

        // Vincular os parâmetros
        $stmt->bindParam(":pnome", $pnome);
        $stmt->bindParam(":unome", $unome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":tel", $tel);
        $stmt->bindParam(":city", $city);
        $stmt->bindParam(":idade", $idade);
        $stmt->bindParam(":bi", $bi);
        $stmt->bindParam(":hora", $hora);
        $stmt->bindParam(":tipo_consulta", $tipo_consulta);
        $stmt->bindParam(":genero", $genero);

        // Executar a consulta
        if ($stmt->execute()) {
            echo '<script>alert("Consulta marcada com sucesso!");</script>';
         
        } else {
            echo '<script>alert("Erro ao marcar consulta!");</script>';
        }
    }
}

// Criar uma instância da classe Database
$database = new Database();
$db = $database->getConnection();

// Criar uma instância da classe Consulta
$consulta = new Consulta($db);

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pnome = $_POST["pnome"];
    $unome = $_POST["unome"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $city = $_POST["city"];
    $idade = $_POST["idade"];
    $bi = $_POST["bi"];
    $hora = $_POST["hora"];
    $tipo_consulta = $_POST["tipo_consulta"];
    $genero = $_POST["gender"];

    // Chamar o método para marcar a consulta
    $consulta->marcarConsulta($pnome, $unome, $email, $tel, $city, $idade, $bi, $hora, $tipo_consulta, $genero);
}
?>
