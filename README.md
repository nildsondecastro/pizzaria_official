### SISTEMA BASE CONFIGURADO COM LOGIN

Sistema Base para projetos configurado em português, com AdminLTE e funcionalides de registro e login de usuários

(ainda não está em Docker)

## Detalhes desenvolvidos e configurados até o momento:

- [x] Template AdminLTE3 adicionado
- [x] Cadastro de usuário
- [x] Login
- [x] Logout
- [x] Mensagens de erro em pt_BR
- [x] Log separado por dias
- [x] Verificação de Email (sempre é necessário configurar o .env)
- [x] Configuraçao para o Docker

## Detalhes Interessantes de se adicionar

- [ ] Link para recuperação de senha
- [ ] Configurar a mensagem enviada para verificar o email

## Comandos Utilizados

- laravel new projeto 
(na pasta mãe, depois entrou-se na pasta projeto para os comandos seguintes)

- cp .env.example .env (necessário configurar)

- composer install

- npm install

- npm run dev

- php artisan key:generate

- composer require jeroennoten/laravel-adminlte

- composer require laravel/ui

- php artisan ui vue --auth 

- php artisan adminlte:install

- php artisan adminlte:install --only=auth_views 

- npm install

- php artisan migrate

- php artisan db:seed

## Adicionando pt_BR

[Link do tutorial](https://github.com/lucascudo/laravel-pt-BR-localization)

- composer require lucascudo/laravel-pt-br-localization --dev

- php artisan vendor:publish --tag=laravel-pt-br-localization

## Adicionando servidor de e-mail

[Link do tutorial](https://laravel.com/docs/7.x/verification)

Criar o servidor (caso seja gmail precisa permitir apps menos seguros)
(caso seja office.365 também é necessário verificar a configuração)

Configurar o .env

- php artisan cache:clear

- php artisan config:clear

- php artisan config:cache

# Observações sobre o config

Alterações no config/adminlte.php não estão sendo refletidas automaticamente nas views, é necessário limpar o cache e config a cada alteração.

- php artisan cache:clear

- php artisan config:clear

- php artisan config:cache

# Comandos com Docker

"git clone do projeto"

Antes de subir o docker verificar a porta do webserver em docker-compose.yml

- `docker-compose up -d` (Cria o container do docker)


- `docker-compose run --rm composer install` (Instala a dependecia do php via composer)

- `cp .env.example .env` (Copia e cria o arquivo de configuracao do laravel)
- `docker-compose run --rm artisan key:generate` (Gera a chave do sistema)

O arquivo .env deve ser configurado nesse momento para que o comando migrate funcione

- `docker-compose run --rm npm install` (Instala as dependencias do frontEnd)
- `docker-compose run --rm npm run dev` (Compilacao das libs do frontEnd)

Tem que criar a base agora
- `docker-compose run --rm artisan migrate --seed` (Cria as tabelas do banco de dados)


- `docker-compose run --rm composer require jeroennoten/laravel-adminlte` (Instala o adminlte)
- `docker-compose run --rm composer require laravel/ui` (Instala a lib UI de frontEnd do laravel)

- docker-compose run --rm artisan ui vue --auth (Muda o login do laravel para a lib UI) //não executar em caso de git clone
- docker-compose run --rm artisan adminlte:install (Configura o tema adminlte) //não executar em caso de git clone

- `docker-compose run --rm artisan storage:link` (Cria o link nas pastas das remessas)

- `docker-compose run --rm app chmod -R 775 bootstrap storage` (Mudo a permisao)
- `docker-compose run --rm app chown -R www-data.www-data bootstrap storage` (Coloco o nginx para se dono da pasta)

- `docker-compose run --rm artisan adminlte:install --only=main_views` (para trazer as views pro resource)//

## Instalar plugin

- `php artisan adminlte:plugins install --plugin=chartJs`

- `docker-compose run --rm artisan adminlte:plugins install --plugin=chartJs`

## PWA

- `composer require silviolleite/laravelpwa --prefer-dist`(https://github.com/silviolleite/laravel-pwa)

- `php artisan vendor:publish --provider="LaravelPWA\Providers\LaravelPWAServiceProvider"`(publicar)