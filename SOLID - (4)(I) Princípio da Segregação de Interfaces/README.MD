## SOLID - O Princípio da Segregação de Interfaces

#### Source/Credits: http://ramonsilva.net/boas-praticas/solid/isp-o-principio-da-segregacao-de-interfaces/


 - O Princípio da Segregação de Interfaces é o quarto princípio SOLID, e corresponde a letra “I”.
 - Definição
 - Este princípio nos diz que uma classe consumidora não deve conhecer (depender) métodos que não necessitam.
 - Para ter uma classe coesa e reutilizável, devemos atribuir  a ela uma única responsabilidade . Mas as vezes, mesmo essa única responsabilidade pode ser quebrada em responsabilidades menores ainda, tornando sua interface mais amigável.
 - Violando o Princípio da Segregação de Interfaces

```java
abstract class Funcionario{
    private float salarioBase;
    private String cargo;
    private String nome;
    
    public float getSalarioBase(){
        return this.salarioBase;
    }
    
    abstract float getSalario();
    abstract float getComissao();
}

class Vendedor extends Funcionario {
    private float totalVendas;
    
    public float getSalario(){
        return this.salarioBase + this.getComissao();
    }
    
    public float getComissao(){
        return this.totalVendas * 0.1;
    }
}

class Representante extends Funcionario {
    private float totalVendas;
    
    public float getSalario(){
        return 0.0f;
    }
    
    public float getComissao(){
        return this.totalVendas * 0.3;
    }
}

class AtendenteDeCaixa extends Funcionario {
   
    public float getSalario(){
        return this.getSalarioBase();
    }
    
    public float getComissao(){
        return 0.0f;
    }
}
```

 - Nos temos aqui 4 classes, a classe abstrata Funcionário que possui a lógica básica de um Funcionário, temos Vendedor que é um Funcionário, mas possui um própria lógica de calcular o seu salário e a sua comissão. Temos o Representante que não é exatamente um funcionário, pois não recebe um salário base, porém recebe uma comissão maior sobre suas vendas. E por fim Atendente de Caixa que é um funcionário mas não recebe comissão.
 - Com isso temos vários problemas de Design aí. O primeiro é, Representante não é um funcionário, mas está se passando c como tal para reaproveitar a responsabilidade de Receber um “Salário de Comissionado”, o segundo problema é, o Atende de Caixa não precisa saber como calcular comissão, mas é obrigado a implementar um método getComissao().
 - Aplicando o Princípio da Segregação de Interfaces
    - Aplicando o Princípio da Segregação de Interfaces, iremos fazer uma refatoração no código, e aplicando o método de refatoração Extrair Interface, para extrair as interfaces Assalariado e Comissionável.

```java
interface Assalariado{
    float getSalario();
}

interface Comissionavel(){
    float getComissao();
}

abstract class Funcionario implements Assalariado {
    private float salarioBase;
    private String cargo;
    private String nome;
    
    @override
    public float getSalario(){
        return this.salarioBase;
    }
}

class Vendedor extends Funcionario implements Comissionavel  {
    private float totalVendas;
    
    @overrride
    public float getSalario(){
        return this.salarioBase + this.getComissao();
    }

    @override
    public float getComissao(){
        return this.totalVendas * 0.1;
    }
}

class Representante implements Comissionavel {
    private float totalVendas;
    
    @override
    public float getComissao(){
        return this.totalVendas * 0.3;
    }
}
```

 - Primeiro extraímos as interfaces da Classe Funcionário que deixou de ser abstrata e não possui mais dos métodos abstratos getSalario() e getComissao(). Mas como funcionário ainda recebe um salário, então a classe Funcionário passou a ter a Interface Assalariado, obrigando-a a implementar o método getSalario(). Assim a classe Atendente de Caixa perdeu o sentido de existir e passou ser representada como um Funcionário.
 - Já a nossa classe Vendedor, que é um funcionário, pois extende a classe Funcionário que é um Assalariado. Mas como Vendedor possui sua própria maneira de calcular o salário, então sobrescrevemos o método getSalario(), para que contemple essa sua lógica. E como Vendedor possui uma comissão,  implementamos a interface Comissionavel, para poder calcular sua comissão.
 - Por fim a classe Representante que não é mais trata como um funcionário, implementará apenas a interface Comissionavel, assim podemos ter o seu calculo de comissão, não mais precisamos mais ter conhecimento sobre salário.
 - Conclusão
    - O princípio da Segregação de Interfaces nos ajuda a aumentar a granularidade de nossos objetos, aumentando a coesão de suas interfaces e diminuindo drasticamente o acoplamento. E isso melhora a manutenção do nosso código, pois interfaces mais simples são mais fácies de serem entendidas e implementadas.