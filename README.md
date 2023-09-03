# Api tray sales and sellers

Projeto criado utilizando PHP/Laravel, Livewire tailwind.css e Kool com o objetivo de:
 - criar uma API
 - cadastrar vendedores e vendas.
 - Listar Vendedores
 - Listar vendas totais.
 - Listar vendas de vendedores específicos.
 - Consumir a API através de uma aplicação isolada


O motivo de usar o Kool.dev no projeto é simplificar as configurações docker e diminuir a necessidade de muitos comandos.
As configurações do docker estão nos arquivos docker-compose.yml normalmente.

### Environment Requirements

- **[Instalar o Docker](https://docs.docker.com/get-docker/)**
- **[Instalar Docker compose v2](https://docs.docker.com/compose/install/)**
- **[Instalar Kool.dev](https://kool.dev/docs/getting-started/installation)**


### Setup

**Clone o repositório no diretório à sua escolha**
Clone o projeto para o diretório de sua escolha.
Em seguida rode os seguintes comandos no terminal (dentro do diretório do projeto)

```bash
    kool run setup
    kool run artisan migrate
```
Para verificar os comandos disponíveis do Kool, acessar o arquivo Kool.yml

Essa aplicação é uma comodidade para testar localmente a API 'Sellers and Sales' e a aplicação para consumí-la.
Rodar o comando:

```bash
    kool run artisan serve --port=7878
```
acessar o localhost na porta 7878 que o serve utiliza.
