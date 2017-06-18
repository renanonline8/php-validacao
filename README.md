# PHP Validação

## Função ValidacaoRetorna
Retorna um array de erros. Ela recebe um array com os campos e um array com as validações.

O array de campos deve conter em cada objeto, nome do campo e valor
Ex:
{ campo1:valor1, campo2:valor2 }

O array de validação deve ter o objeto o nome do campo e no valor suas validações. As validações devem ser expressa em array onde cada indice deve receber o nome da validação
e um valor, alguns podem ter parametros adicionais que deve sem expressos em array
Ex:
{ campo1: {validacao1:'',validacao2:{parametro1:''}}}

## Funções de validação

### Função ValidaObrigatorio
Retorna um array com erro caso o campo esteja em branco

No array de validação para validar deve estar:
{ campo1: {'obrigatorio':''}

### Função ValidaTamanho
Retorna um array com erro caso o campo tenha uma quantidade de caracter maior que o permitido

No array de validação para validar deve estar:
{ campo1: {'tamanho':{'qtde':'30'}}

### Função ValidaData
Retorna um array com erro caso o campo não seja uma data

No array de validação para validar deve estar:
{ campo1: {'data':''}

### Função ValidaEmail
Retorna um array com erro caso o campo não seja um email

No array de validação para validar deve estar:
{ campo1: {'email':''}