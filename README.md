Acesso ao sever httpd:
- Criar a pasta public dentro do httpd
- Porta configurada 80 e 443
- Na pasta Nginx pode ser configurado os tamplates para projetos no arquivo default.template.conf
  
Acesso ao Banco de dados:
- Pasta do banco é criada de forma dinâminca na pasta database/db
- Porta para acesso 3306
- No arquivo .env estão as configurações do banco de dados

Comandos para executar o docker compose:

Subindo o docker
# docker compose up -d
ou 
# docker compose -f "docker-compose.yml" up -d

Parando o docker
# docker compose down

Conectar ao banco de dados mysql pela container
# docker exec -it mysql bash

comando de logon do mysql
# mysql -uroot -p

Ver os Databases
# show databases;

Selecionar uma base de dados
# use mysql;

Ver usuários do banco
# SELECT user, host, plugin FROM mysql.user;
