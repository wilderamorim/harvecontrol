
# Setup Docker HarveControl com PHP 8.2

### Passo a passo
Clone Repositório
```sh
git clone -b main https://github.com/wilderamorim/harvecontrol harvecontrol
```
```sh
cd harvecontrol
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_USER=dev
APP_ENV=local
APP_PORT=80
APP_URL=http://localhost

DB_HOST=database
DB_NAME=harvecontrol
DB_PORT=3306
DB_USERNAME=harve
DB_PASSWORD=password
DB_DRIVER=mysql
FORWARD_DB_PORT=33061

TEMPLATE_DEFAULT_ENGINE=twig
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container app
```sh
docker-compose exec -it php bash
```


Instale as dependências do projeto
```sh
composer install
```


Acesse o projeto
[http://localhost](http://localhost)