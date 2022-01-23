<h1 align="center">Fórum de Bugs</h1>
> Desafio proposto pelo Instituto Flexpeak.<br>
> Aplicação construída com Laravel e Vuejs.<br>

## Pré Requisitos
- php >= 7.2
- composer >= 1.8
- npm >= 6.9
- node >= 12.5

## Build

```sh
$ git clone https://github.com/DaviNoronha/flexpeak-dev.git
$ cd flexpeak-dev
$ cp .env.example .env
$ composer install
$ npm install
$ npm run dev
$ php artisan key:generate
$ php artisan storage:link
$ php artisan migrate
$ php artisan db:seed
```

## Aplicação Web
- Um fórum onde pessoas podem reportar bugs a uma empresa.
- Dentro dele administradores tratar os bugs e criar usuários moderadores para auxiliá-los.
- Usuários moderadores podem tratar apenas de bugs do seu tipo.

## Autor
**Davi Noronha Gato** 

* Github: [@DaviNoronha](https://github.com/DaviNoronha)
