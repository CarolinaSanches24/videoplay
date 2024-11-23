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
