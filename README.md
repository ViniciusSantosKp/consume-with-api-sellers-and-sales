# Api tray sales and sellers

Projeto criado utilizando PHP/Laravel e Kool com o objetivo de criar uma api para:
 - cadastrar vendedores e vendas.
 - Listar Vendedores
 - Listar vendas totais.
 - Listar vendas de vendedores específicos.


O motivo de usar o Kool.dev no projeto é simplificar as configurações docker e diminuir a necessidade de muitos comandos.
as configurações do docker estão nos arquivos docker-compose.yml e Dockerfile normalmente.

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

Para consumir essa api, foi criado um outro projeto. Para rodar os dois localmente, foi necessário a utilização de um serviço de tunnel (utilizei o Ngrok)

- **[Instalar o Ngrok](https://ngrok.com/docs/getting-started/)**

Depois de instalado e adicionado a chave de autenticação, rodar no terminal no diretório do projeto

```bash
    ngrok http 8989
```

### OBS****
Outra necessidade é alterar a url da api no arquivo app/Providers/ApiSellersAndSalesProvider na linha 16 no projeto da aplicação que fará o consumo dessa API

```bash
    -'base_uri' => 'https://localhost:8989',
    +'base_uri' => 'https://url-fornecida-pelo-ngrok',
```

Para acessar as funcionalidades de fila, schedule e emails localmente, além de configurar alguma ferramenta de email à sua escolha (como por exemplo o mailtrap) os seguintes comandos serão necessários em terminais distintos:

```bash
    kool run artisan queue:work
    kool run artisan schedule:work
```

Lista de endpoints e payloads esperados:
- **[Documentação API](https://documenter.getpostman.com/view/17242571/2s9Y5cuLqQ)**
