

## Sobre o projeto

Objetivo do projeto permitir o relacionamento entre Usuarios com Organizações.

- Laravel 8.0
- PHP 7.4
- MySQL
- JavaScript

## Requisitos

- [Docker](https://docs.docker.com/engine/install/ubuntu/) 
- [Composer](https://getcomposer.org/doc/00-intro.md)

## Por onde começar
- Com os requisitos mínimos acima, previamente instalado.
- Comece clonando este repositório
- navegue até a pasta criada e renomeio o arquivo .env.example para .env e execute os comandos abaixo
- 1 - `composer install`
- 2 - `php artisan key:generate`
- 3 - `docker-compose build app`
- 4 - `docker-compose up -d`
- 5 - `docker-compose exec app php artisan migrate:install`

- A aplicação estará disponível em http://localhost:8000

## API

- [Documentação da API](https://documenter.getpostman.com/view/3032173/UyrBjc5E).

