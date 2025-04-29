### Ecommerce PHP

Este é um projeto de ecommerce desenvolvido com PHP (utilizando Laravel), com funcionalidades completas para usuários e administradores. A aplicação é responsiva, inclui sistema de pagamentos com Stripe, gerenciamento de produtos, categorias, pedidos e mais.

---

## 🚀 Funcionalidades

### 👤 Usuário
- Registro e login de usuários
- Adição de produtos ao carrinho
- Sistema de comentários nos produtos
- Finalização de compras usando **cartão de teste Stripe**
- Redirecionamento automático após login
  - Usuário comum: redirecionado à loja
  - Admin: redirecionado ao **painel administrativo**
- Verificação de email (⚠️ *desabilitada por padrão*)

### 🛠️ Administrador
- Dashboard com visão geral
- CRUD de **produtos** e **categorias**
- Visualização e gerenciamento de **ordens**
- Envio de **email para usuários**
- Acesso completo às informações de pedidos realizados

---

Para testar pagamentos com **Stripe**:

- **Número do Cartão**: `4242 4242 4242 4242`
- **CVC**: `123`
- **Validade**: qualquer data futura

📌 Estes dados funcionam apenas em **ambiente de desenvolvimento** e **não realizam cobranças reais**.

- Esses dados são exclusivos para o **modo de teste** da Stripe e não devem ser usados em um ambiente de produção.
- Você pode testar diferentes cenários de falha com outros números de cartões de teste fornecidos pela [documentação oficial da Stripe](https://stripe.com/docs/testing).

Configuração no `.env`:
```env
STRIPE_KEY=your_test_publishable_key
STRIPE_SECRET=your_test_secret_key
```

### Instalação


1. Clone o repositório e acesse a pasta do projeto.

2. Instalar dependências do backend (PHP):

```bash
composer install
```

3. Instalar dependências do frontend:

```bash
npm install
```

4. Configurar o .env com variáveis como:
DB_CONNECTION, DB_HOST, DB_USERNAME, DB_PASSWORD
APP_KEY, STRIPE_KEY, STRIPE_SECRET

⚠️ Copie o .env.example para .env e edite conforme necessário.

4.1 Gerar chave da aplicação:
php artisan key:generate

4.2 - Criar o banco 'ecommercephp' em localhost/phpmyadmin/

5. Configurar o banco de dados: Certifique-se de estar com o XAMPP (Apache e MySQL) rodando.

```bash
php artisan migrate
```

6. Iniciar o servidor:

```bash
php artisan serve
```

O servidor estará executando na porta 8000


### Verificação de email

OBS : Verificação de email retirada para não ser necessário a verificação de email e podermos criar contas fakes sem ter que colocar um email pessoal ou algo parecido
se quiser verificação de email, descomentar linhas em app\Models\User.php => 

```bash
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// class User extends Authenticatable implements MustVerifyEmail
```
e comentar:

```bash
class User extends Authenticatable
```
