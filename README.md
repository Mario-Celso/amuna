# Amuna Api Test

Api desenvolvida com Lumen e mysql para o banco de dados, segue abaixo uma explicação de como rodar o projeto e algumas informações adcionais.

### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:

    Composer
    MySql
    PHP >= 7.3
    OpenSSL PHP Extension
    PDO PHP Extension
    Mbstring PHP Extension
    Git

Além disto é bom ter um editor para trabalhar com o código como [VSCode](https://code.visualstudio.com/)

### 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

- [Php](https://www.php.net/manual/pt_BR/intro-whatis.php)
- [Lumen](https://lumen.laravel.com/docs/8.x)
- [MySql](https://www.mysql.com/)
- [Git](https://git-scm.com/)
- [Insomnia](https://insomnia.rest/download)
- [PhpStorm](https://www.jetbrains.com/pt-br/phpstorm/)

### API Routes
| HTTP Method	| Path | Action | Scope | Desciption  |
| ----- | ----- | ----- | ---- |------------- |
| GET      | /tools | index | tools:list | Get all tools
| GET      | /tools?tag={tag} | index | tools:listByTag | Filter all tools by tag
| GET      | /tools/{id} | show | tools:read |  Fetch an tool by id
| POST     | /tools | store | tools:create | Create an tool
| PUT      | /tools/{id} | update | tools:write | Update an tool by id
| DELETE      | /tools/{id} | destroy | tools:delete | Delete an tool by id

### 🎲 Rodando a API

```bash
# Clone este repositório
$ git clone <https://github.com/Mario-Celso/amuna>

# Acesse a pasta do projeto no terminal/cmd
$ cd amuna

# Instale as dependências
$ composer install

# Execute a aplicação em modo de desenvolvimento
$ php artisan migrate

# Execute a aplicação em modo de desenvolvimento
$ php -S localhost:3000 -t public

# O servidor inciará na porta:3000 - acesse <http://localhost:3000>
