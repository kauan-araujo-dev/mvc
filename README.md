# MVC Framework

Sistema MVC desenvolvido em PHP, focado em simplicidade, organização e facilidade. O projeto implementa conceitos modernos de desenvolvimento como Controllers, Services, Repositories, Router, Request, Database, Configuração via `.env` e autoload com Composer.

## Características

* Arquitetura MVC
* Sistema de rotas
* Controllers
* Models
* Views
* Services
* Repositories
* Request
* Configuração via `.env`
* Conexão com banco de dados
* Composer Autoload

## Instalação

O framework está disponível pelo composer.

Instale utilizando:

```bash
composer create-project kauan/mvc nome-do-projeto
```

Ou, caso esteja utilizando a versão de desenvolvimento:

```bash
composer create-project kauan/mvc nome-do-projeto dev-main
```

## Estrutura do Projeto

```text
project/
│
├── app/
|   ├── config/
│   ├── controllers/
|   ├── core/
│   ├── models/
│   ├── repositories/
|   ├── routes/
│   ├── services/
│   └── views/
│
├── database/
│
├── public/
|   ├── assests/
│
├── vendor/
│
├── .env
├── .env.example
├── composer.json
└── .htacess
```

### Controllers

Responsáveis por receber as requisições e coordenar a execução da regra de negócio.

Exemplo:

```php
class UserController
{
    public function index()
    {
        return "Lista de usuários";
    }
}
```

---

### Services

Camada responsável pelas regras de negócio da aplicação.

Exemplo:

```php
class UserService
{
    public function create(array $user)
    {
        // regra de negócio
    }
}
```

---

### Repositories

Responsáveis pelo acesso aos dados.

Exemplo:

```php
class UserRepository
{
    public function findById(int $id)
    {
        // consulta ao banco
    }
}
```

---

### Models

Representam as entidades da aplicação.

Exemplo:

```php
class User
{
    public int $id;
    public string $name;
}
```

---

### Views

Responsáveis pela renderização das páginas.

```php
return view('home/index.php');
```

---

## Sistema de Rotas

As rotas são registradas em:

```text
routes/routes.php
```

Exemplo:

```php
Router::get("/", HomeController::class, "index");
```

## Banco de Dados

As configurações são carregadas automaticamente através do arquivo `.env`.

Exemplo:

```env
DB_HOST=localhost
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=
```

A conexão pode ser utilizada através da classe Database.

Exemplo:

```php
$db = Database::getConnection();
```

## Variáveis de Ambiente

O projeto utiliza arquivos `.env` para armazenar configurações sensíveis.

Crie um arquivo:

```text
.env
```

Utilizando como base:

```text
.env.example
```

Exemplo:

```env
APP_NAME=MVC Framework
APP_ENV=local

DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=app
DB_USERNAME=root
DB_PASSWORD=
```

## Requisitos

* PHP 8.2+
* Composer
* MySQL ou MariaDB

## Packagist

Pacote disponível em:

**kauan/mvc**


