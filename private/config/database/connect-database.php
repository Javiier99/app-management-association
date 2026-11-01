<?php


    require dirname(__DIR__, 3) . '/vendor/autoload.php';
    // require __DIR__ . '../../../../vendor/autoload.php';
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2) . '/secrets');
    $dotenv->load();

    $host = $_ENV['DB_HOST'];
    $dbname = $_ENV['DB_NAME']; // Nombre de la BBD que le hemos puesto
    $usuario = $_ENV['DB_USERS']; // Usuario de la BBD, por defecto siempre es root
    $password = $_ENV['DB_PASSWORD']; // Contraseña de la BBD, por defecto siempre es en blanco
    $chartet = 'utf8'; // Idioma

    $dns = "mysql:host=$host;dbname=$dbname"; // La conección a la BBD

    try{
        // Creamos la instancia de conexión PDO
        $pdo = new PDO($dns, $usuario, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Muestra los errores
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Devolverá los datos como un array asociativo
        ]);
    } catch (PDOException $e){
        die("Error al conectar la base de datos" . $e->getMessage());
    }


?>


