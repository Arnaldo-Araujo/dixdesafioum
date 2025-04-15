# 📰 Desafio DIX Digital - Sistema de Notícias

Sistema web desenvolvido com **Laravel 11** como parte do processo seletivo da **DIX DIGITAL**, com foco em gerenciamento de usuários e CRUD de notícias. O projeto utiliza o frontend gratuito **White Dashboard Laravel**, garantindo uma interface moderna e responsiva.

---

## ✅ Funcionalidades Implementadas

- [x] Autenticação de usuários (login, registro e logout)
- [x] Gerenciamento de usuários autenticados
- [x] CRUD de notícias (criar, listar, editar e excluir)
- [x] Filtro de pesquisa de notícias por título
- [x] Cada usuário visualiza apenas suas próprias notícias
- [x] Interface baseada no template **White Dashboard Laravel**
- [x] Banco de dados relacional MySQL
- [x] Versionamento com Git (commits organizados por feature/fix/etc.)

---

## 🚀 Tecnologias Utilizadas

- PHP 8.x
- Laravel 11
- MySQL
- Bootstrap 4 (White Dashboard)
- Blade (templating)
- Git + GitHub
- XAMPP (Apache + MySQL para ambiente local)

---

## ⚙️ Requisitos para Rodar Localmente

1. Ter o **XAMPP** instalado com Apache e MySQL ativos.
2. Clonar o projeto:

   ```bash
   git clone https://github.com/seu-usuario/dixdesafioum.git
   cd dixdesafioum

3. Instalar as dependências:

   ```bash
   composer install
   npm install && npm run dev

4. Configurar o .env:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=dixdesafioum
    DB_USERNAME=dixdigital
    DB_PASSWORD=dix12345678o
 
5. Gerar a key do Laravel:

    ```bash
    php artisan key:
6. Rodar as migrations:

    ```bash
    php artisan migrate
7. Iniciar o servidor:

    ```bash
    php artisan serve

Acesse em <http://localhost:8000>

🗃️ Estrutura de Banco (Resumida)
users: id, name, email, password, created_at

noticias: id, titulo, conteudo, user_id (relacionamento), created_at

📂 Estrutura de Diretórios

    app/
        ├── Http/
        │   └── Controllers/
        │       ├── Auth/
        │       ├── NoticiaController.php
        │       └── UserController.php
        resources/
        ├── views/
        │   ├── noticias/
        │   ├── users/
        │   └── auth/
        routes/
        └── web.php
👨‍💻 Autor

Arnaldo Junior
Desenvolvedor Backend | Especialista em Laravel, Java, Spring Boot

5️⃣ Estrutura do Banco de Dados

### Tabela users

|Campo |Tipo  |Descrição        |
|------|-------|----------------|
|id    | bigint| Chave primária |
|name| string| Nome do usuário|
|email| string| Email único|
|password| string| Senha hasheada|
|timestamps| datetime| created_at, updated_at|

### Tabela noticias

|Campo| Tipo| Descrição|
|-----|-----|----------|
|id| bigint| Chave primária|
|titulo| string| Título da notícia|
|conteudo| text| Conteúdo principal|
|user_id| bigint| Relacionamento com users.id|
|timestamps| datetime| created_at, updated_at|

---

## 🌐 Observação sobre deploy no Vercel

Uma tentativa de adaptação foi realizada para o deploy do sistema no Vercel, incluindo:

- Redução de rotas e controllers para limitar o número de Serverless Functions
- Adaptação de conexão com SQLite para evitar uso intenso de MySQL

No entanto, devido às **limitações da conta gratuita (como número reduzido de funções e tempo de build)**, optou-se por **reverter a adaptação** e manter o ambiente local com XAMPP + MySQL.

A tentativa pode ser consultada na branch:
[`vercel-adaptacao-revertida`](https://github.com/Arnaldo-Araujo/dixdesafioum/tree/feature/vercel-adaptacao-reverti)

---
