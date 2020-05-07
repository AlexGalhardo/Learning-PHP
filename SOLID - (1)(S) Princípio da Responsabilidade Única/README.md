## SOLID - Princípio da Responsabilidade Única

#### Source/Credits: http://ramonsilva.net/boas-praticas/solid/solid-principio-da-responsabilidade-unica/

 - Responsabilidade Única é o primeiro principio SOLID da orientação a objetos, representa a letra ´S´.
 - Este principio diz que uma classe deve possuir apenas uma responsabilidade, sendo uma classe coesa e simples. Porém esse parece ser o principio mais difícil de ser seguido, um pouco de distração e nossa classe já está fazendo login, acessando o saldo da conta e fazendo transferências entre usuários.
 - Outra situação clássica, é quando colocamos nossa lógica de negócios na camada de visualização. Se um dia precisamos usar aquela lógica em outro lugar somos obrigados a fazer crtl + c, crtl + v.
 - Especialista em que ?
    - Agora imagine a situação:
    - O pato estava conservando com o peixe, a águia e o coelho.
    - Pato: “Eu sou melhor que vocês, pois eu voo como a águia, nado como o peixe e corro como o coelho.”
    - Então de repente chega um leão e os ataca, o peixe sai nadando e foge, a águia voa bem alto e foge e o coelho rapidamente foge correndo pelo mato. Já o pato, tenta nadar mas é muito lento nadando, tenha voar, mas não voa como a águia e tentar correr mas não é tão veloz como o coelho, então o leão devora o pato.
 - Responsabilidade Única
 - Uma classe deve possuir um único propósito. Vejamos a classe a seguir:

```java
class Conta {
    
    public boolean autenticar(String agencia, String conta, String senha){
        //Lógica de autenticacao
    }
    
    public void trocarSenha(){
        //Lógica de trocar senha
    }
    
    public void depositar(float valor){
        //Lógica para incrementar saldo
    }
    
    public boolean retirar(float valor){
        //Lógica para retirada
    }
    
    public boolean retirar(float valor, Conta destino){
        //Lógica para transferencia
    }
    
    public void imprimirExtratoNaTela(){
        //Lógica para imprimir extrato
    }
    
    public void extratoPorEmail(){
        //Lógica para imprimir extrato
    }           
}
```

 - A classe Conta está com três responsabilidades , fazer a autenticação do usuário, cuidar do saldo e imprimir extrato. A primeira vista pode parecer correto, afinal a responsabilidade da classe é a conta de usuário. Mas se por algum motivo você precisar mudar a lógica de autenticação, você pode sem querer afetar a funcionalidade de transferência entre contas por exemplo.
 - Mantendo a Coesão
    - Agora vamos fazer uma refatoração de código nesta classe para que existem classes mais coesas e com responsabilidade única.

```java
class Conta {
    
    private String agencia;
    private String conta;
    
    public Conta(String agencia, String conta){
        this.agencia = agencia;
        this.conta = conta;
    }
    
    public void depositar(float valor){
        //Lógica para incrementar saldo
    }
    
    public boolean retirar(String agencia, String conta,, float valor){
        //Lógica para retirada
    }
    
    public boolean retirar(float valor, Conta destino){
        //Lógica para transferencia
    }       
}

public class Usuario{
    public boolean autenticar(String agencia, String conta, String senha){
        //Lógica de autenticacao
    }
    
    public void trocarSenha(){
        //Lógica de trocar senha
    }
}

public class Extrato {
    public void imprimirExtratoNaTela(){
        //Lógica para imprimir extrato
    }
    
    public void extratoPorEmail(){
        //Lógica para imprimir extrato
    }
}
```

 - Dessa forma podemos alterar a classe que mantêm a regra de login sem correr o risco de causar problemas em outras funcionalidades. Podemos também reutilizar a lógica de imprimir extratos em outros pontos da aplicação sem precisar levar a lógica de controle de saldo junto.
 - A testabilidade da classe fica muito mais fácil também, agora que cada classes tem um responsabilidade única , os testes ficam mais intuitivos.

