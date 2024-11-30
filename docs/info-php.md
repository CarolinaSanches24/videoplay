#### Varíaveis superglobais 

- **$_FILES** que contém um array dos arquivos enviados via upload em um formulário utilizando o verbo/método POST;
- **$_COOKIE** que contém um array associativo com todos os cookies enviados na requisição;
- **$_SESSION** que nos permite acessar e definir informações na sessão;
- **$_REQUEST** que possui todos os valores de $_GET, $_POST e $_COOKIE;
- **$_ENV** que contém todas as variáveis de ambiente passadas para o processo do PHP;
- **$_SERVER** que possui informações do servidor Web, como os cabeçalhos da requisição, o caminho acessado, etc. Todas as chaves desse array são criadas pelo servidor web, então elas podem variar de servidor para servidor.

#### Header
Com a função header podemos enviar qualquer tipo de cabeçalho HTTP para o cliente de nossa aplicação.
Ao enviar um cabeçalho chamado Location para o navegador, o mesmo entende que deverá redirecionar o usuário para a URL contida no valor deste cabeçalho


### Criando validação de url inválida 

**filter_var($url, FILTER_VALIDATE_URL)**:

Verifica se o valor de $url é uma URL válida.
**str_starts_with($url, 'http://') || str_starts_with($url, 'https://'):**

Certifica-se de que a URL começa com http:// ou https://.
Disponível a partir do PHP 8.0. Caso use uma versão mais antiga, substitua por strpos($url, 'http://') === 0 ou strpos($url, 'https://') === 0.
Redirecionamento com error=invalid_url:

##### Diferenças entre  filter_var e filter_input:

A função filter_input filtra os dados recebidos da requisição, enquanto filter_var filtra o valor de qualquer variável que tenhamos no código.

Com filter_input podemos filtrar os dados provenientes das requisições HTTP. Podemos filtrar os valores recebidos em $_GET, $_POST, $_COOKIE, $_SERVER ou $_ENV… Já a filter_var serve para filtrarmos variáveis comuns em nosso código.

```php
declare (strict_types=1);
´´´
A declaração declare(strict_types=1); no PHP ativa o modo de tipagem estrita para o arquivo onde ela está presente. Isso significa que o PHP não fará conversões automáticas de tipos em parâmetros e valores de retorno de funções. Em vez disso, ele exigirá que os tipos correspondam exatamente ao que foi definido.
