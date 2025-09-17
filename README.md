## Sistema de Agendamento

### Descrição:
Este projeto foi desenvolvido para gerenciar agendamentos para a empresa Max Faxinas de forma prática e organizada.
O sistema utiliza a arquitetura MVC (Model-View-Controller), garantindo separação de responsabilidades entre camadas.
Ele permite que clientes realizem seus agendamentos através do formulário na página agendamento, que são processados pelo Controller e persistidos no banco de dados por meio do Model.
Além disso, há uma interface administrativa, na página administrador, onde é possível visualizar os registros e atualizar o status para assim gerenciar os agendamentos realizados.

---

### Integrantes da dupla

- Flávia Gabriella de Carvalho Silva
- Julia Rubim Keller

---

### Instalação e Execução

1. Clone este repositório:
  
   git clone https://github.com/julia062006/Projeto-Flaju.git

2. Configure o banco de dados:
    - Crie o banco de dados MySQL.
    - Configure no arquivo `.env` os seus dados de conexão:
      
    ```
    DB_DRIVER=pdo_mysql
    DB_HOST=localhost
    DB_NAME=nome_do_banco
    DB_USER=usuario
    DB_PASS=senha
    ```
    
3. Instale as dependências via Composer:
    
    ```bash
    composer install
    
    ```
    
4. Crie as tabelas no banco de dados:
    
    ```bash
    composer create-db
    
    ```
    
    > Caso queira atualizar após mudanças nas Entities:
    
    ```bash
    composer update-db
    ```
    
5. Inicie o servidor local:
    
    ```bash
    composer start
    ```
    
6. Acesse no navegador:
    
    ```
    http://localhost:8000
    
    ```
    

---

### Link para o DER

Abaixo está o link para o **Diagrama Entidade-Relacionamento (DER)** do sistema, que representa a modelagem do banco de dados utilizado no projeto:

[Visualizar DER](https://dbdiagram.io/d/68a9df061e7a61196746c0ab)
