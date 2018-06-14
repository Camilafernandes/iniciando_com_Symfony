Iniciando com Symfony 4

Clone o projeto

$ git clone https://github.com/Camilafernandes/iniciando_com_Symfony.git blogSf4

entre no diretório cd blogSf4

Rode o comando

$ composer install

Altere o arquivo .env com as suas configurações de banco de dados na linha

DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name

para

DATABASE_URL=mysql://meuusuario:minhasenha@127.0.0.1:3306/meubanco

Rode os comandos:

php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

E depois para rodar a aplicação

php bin/console server:run

E assim ela vai estar acessivel em

http://localhost:8000

License is MIT

