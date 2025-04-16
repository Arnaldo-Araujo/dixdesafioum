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
- [x] Banco de dados relacional sqlite
- [x] Upload e edição de foto de perfil
- [x] Escolha de cor personalizada do tema do dashboard
- [x] Separação do formulário de atualização de perfil e da foto
- [x] Botão para resetar a foto para o padrão
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
   git clone https://github.com/Arnaldo-Araujo/dixdesafioum.git
   cd dixdesafioum

3. Instalar as dependências:

   ```bash
   composer install
   npm install && npm run dev

4. Configurar o .env:

    ```bash
    DB_CONNECTION=sqlite
    DB_DATABASE=/tmp/database.sqlite
 
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

## 🗃️ Estrutura de Banco (Resumida)
**users:** id, name, email, password, created_at

**noticias:** id, titulo, conteudo, user_id (relacionamento), created_at

📂 Estrutura de Diretórios

```bash
        app/
        ├── Http/
        │   └── Controllers/
        │       ├── Auth/
        │       ├── NoticiaController.php
        │       └── ProfileController.php
        resources/
        ├── views/
        │   ├── noticias/
        │   ├── layouts/
        │   ├── alerts/
        │   ├── profile/
        │   └── auth/
        routes/
        └── web.php
        public/
        └── uploads/
            └── fotos/

                
```


## 5️⃣ Estrutura do Banco de Dados

### Tabela <i>users</i>

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


## 🌐 Observação sobre deploy no Vercel

Uma tentativa de adaptação foi realizada para o deploy do sistema no Vercel, incluindo:

- Redução de rotas e controllers para limitar o número de Serverless Functions
- Adaptação de conexão com SQLite para evitar uso intenso de MySQL

No entanto, devido às **limitações da conta gratuita (como número reduzido de funções e tempo de build)**, optou-se por **reverter a adaptação** e manter o ambiente local com XAMPP + MySQL.

A tentativa pode ser consultada na branch:
[`vercel-adaptacao-revertida`](https://github.com/Arnaldo-Araujo/dixdesafioum/tree/feature/vercel-adaptacao-reverti)


## 🌈 Tema da Sidebar
Cada usuário pode escolher entre:

Azul padrão (primary)

Azul claro (blue)

Verde (green)

Degradê Rosa-Roxo (pink-purple)

Essa cor fica salva no banco e personalizada por usuário.

## 🌿 Estratégia de Versionamento (Git)

Tipo | Prefixo | Exemplo
--- | --- | ---
Nova feature | feature/ | feature/profile-foto-independente
Correção | bugfix/ | bugfix/erro-upload-imagem
Release | release/ | release/v1.0.0


## 📋 Observações
O projeto pode ser publicado no Vercel (versão lite com SQLite) ou demonstrado via AWS EC2

Todas as rotas estão protegidas com middleware auth

Utiliza commits semânticos para versionamento com Git




## 👨‍💻 Autor

Arnaldo Junior
Desenvolvedor Backend | Especialista em Laravel, Java, Spring Boot
