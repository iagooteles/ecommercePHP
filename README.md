### Do readme Later ...

new arrivels quebrado em mobile;
admins estão sendo contados como clientes, contar apenas clientes e não admins;

DEPOIS DE TERMINAR O PROJETO DE VEZ, DESINSTALAR E INSTALAR NOVAMENTE FAZENDO O BUILDME CONFORME...

## Todo:

Arrumar dashboard admin (view da home);

1. Instalar dependências do Composer: Primeiro, instale as dependências do backend (PHP) usando o Composer:

```bash
composer install
```

2. Instalar dependências do Node.js: Para o frontend, instale as dependências do Node.js (caso esteja usando Laravel Mix):

```bash
npm install
```

3. Configuração do .env: Certifique-se de que o arquivo .env está configurado corretamente, com as variáveis necessárias (como DB_CONNECTION, APP_KEY, etc).


4. Configuração do banco de dados: Se você estiver usando o banco de dados, certifique-se de ter configurado corretamente as credenciais no arquivo .env. Após isso, execute as migrações:

```bash
php artisan migrate
```






## Configuração de Teste de Pagamento

Para testar o sistema de pagamento com **Stripe** em ambiente de desenvolvimento, utilize os seguintes dados de cartão de crédito de teste fornecidos pela Stripe:

- **Número do Cartão**: `4242 4242 4242 4242`
- **CVC**: `123`
- **Data de Expiração**: Qualquer data no futuro.

Esses dados de cartão são **dados de teste** fornecidos pela Stripe e podem ser utilizados para realizar transações sem envolver dinheiro real.

### Passos para Testar o Pagamento

1. Certifique-se de que o Stripe está configurado corretamente no seu projeto.
2. Use o número de cartão fornecido acima ao realizar o pagamento em qualquer endpoint de checkout configurado no sistema.
3. Verifique que a transação é realizada com sucesso sem qualquer cobrança real.

### Observações Importantes

- Esses dados são exclusivos para o **modo de teste** da Stripe e não devem ser usados em um ambiente de produção.
- Você pode testar diferentes cenários de falha com outros números de cartões de teste fornecidos pela [documentação oficial da Stripe](https://stripe.com/docs/testing).

### Configuração do Stripe

Para garantir que o Stripe esteja funcionando corretamente, verifique as configurações no seu arquivo `.env` ou na seção de configuração correspondente do seu projeto. Certifique-se de que as chaves da API do Stripe estão corretas e no modo de teste.

```env
STRIPE_KEY=your_test_publishable_key
STRIPE_SECRET=your_test_secret_key
```

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



```bash
```