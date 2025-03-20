# Aplicação Web com AWS RDS e EC2

## Descrição do Projeto
Este projeto consiste em uma aplicação web simples desenvolvida em PHP com integração a um banco de dados MySQL hospedado na AWS RDS. O backend permite a criação e listagem de posts, utilizando uma instância EC2 para hospedar o servidor Apache e um banco de dados RDS.

## Estrutura do Repositório
```
C:.
│   README.md
│
├───assets
│       demo.mp4  # Vídeo de demonstração do deploy na AWS
│
└───src
        config.php  # Configuração da conexão com o banco de dados
        createDatabase.sql  # Script para criação do banco e da tabela
        index.php  # Página principal da aplicação
```

## Tecnologias Utilizadas
- **AWS EC2**: Hospedagem do servidor Apache
- **AWS RDS (MariaDB)**: Gerenciamento do banco de dados
- **PHP**: Desenvolvimento do backend
- **MySQL**: Banco de dados relacional
- **HTML, CSS e JavaScript**: Interface da aplicação

## Demonstração
Assista ao vídeo demonstrando o deploy da aplicação e a execução dos serviços na AWS:
[![Vídeo de Demonstração](assets/demo.mp4)](URL_DO_VIDEO)

## Referências
- [Tutorial AWS RDS](https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/TUT_WebAppWithRDS.html)

