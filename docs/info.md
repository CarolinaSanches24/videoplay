##### Front - controller

O Front Controller é um padrão de design amplamente usado no desenvolvimento web para gerenciar solicitações de forma centralizada. Ele age como um ponto único de entrada para todas as requisições HTTP, geralmente através de um único arquivo que recebe e processa as solicitações antes de passá-las para a lógica apropriada.

Como funciona o Front Controller:
Interceptação de Requisições: Toda requisição passa pelo front controller, normalmente um arquivo como index.php em aplicações PHP.
Encaminhamento: Ele analisa a URL e os parâmetros para decidir qual controlador ou ação deve ser executada.

Gerenciamento Centralizado: Ele aplica regras de roteamento, autenticação, autorização, tratamento de erros e outras lógicas comuns em um único lugar.

Vantagens:
Manutenção mais fácil: Qualquer alteração na lógica de roteamento ou segurança pode ser feita em um único ponto.
Reutilização de Código: Reduz duplicação de código ao aplicar funcionalidades comuns, como validações e log de requisições.
Escalabilidade: Facilita a adição de novas rotas ou funcionalidades sem alterar a estrutura geral.

Exemplo básico em PHP:
```php
<?php
// index.php - Front Controller

// Carrega arquivos necessários (autoload, configurações, etc.)
require 'vendor/autoload.php';

// Analisa a URL para determinar a rota
$route = $_SERVER['REQUEST_URI'];

// Simples roteamento (exemplo)
if ($route === '/home') {
    require 'controllers/HomeController.php';
    (new HomeController())->index();
} elseif ($route === '/about') {
    require 'controllers/AboutController.php';
    (new AboutController())->index();
} else {
    http_response_code(404);
    echo "Página não encontrada.";
}
```
Em frameworks populares:
Laravel: Usa um front controller (public/index.php) para gerenciar toda a lógica de roteamento e middleware.
Symfony: Também utiliza public/index.php como ponto de entrada central.
Esse padrão é especialmente útil para grandes aplicações, onde ter um ponto central de controle facilita a organização e o crescimento da aplicação.

´´´php
var_dump($_SERVER);
´´´

Variável superglobal $_SERVER, que é um array associativo com dados sobre o servidor e o ambiente de execução.  Ele contém informações como:

Cabeçalhos HTTP: Informações sobre a requisição do cliente.
Dados do servidor: Como o nome do servidor, IP e porta.
Caminho de scripts: Onde o PHP está sendo executado.
Método da requisição: GET, POST, etc.

- REQUEST_URI: Caminho da URL acessada.
- HTTP_HOST: Nome do servidor ou domínio.
- SERVER_NAME: Nome do servidor.
- SERVER_PORT: Número da porta do servidor.
- REMOTE_ADDR: Endereço IP do cliente
- HTTP_USER_AGENT: Informações sobre o navegador do cliente
- PHP_SELF: Caminho do arquivo PHP atual.
- SCRIPT_NAME: Caminho do arquivo PHP atual.

