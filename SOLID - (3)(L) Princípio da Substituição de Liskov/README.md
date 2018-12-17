## SOLID - Princípio da Substituição de Liskov

#### Source/Credits: http://ramonsilva.net/boas-praticas/solid/o-principio-da-substituicao-de-liskov/

 - O Princípio da Substituição de Liskov é o terceiro princípio, e representa a letra ‘L’ do SOLID.
 - Esse método mais do que qualquer outro nos diz: Programe para a interface e não para sua implementação!
 - Teoria
    - Esse princípio tem esse nome pois foi proposto por Barbara Liskov em um de sues artigos em 1988.
    - A teoria diz : “Dado um Tipo T, todos os seus subtipos S podem ser usados como seus substitutos sem que haja impactos no sistema.”
    - Ou seja, caso você possum uma classe qualquer, você pode substituir suas chamadas por chamadas de quaisquer classes que herdem dela.
    - Mas qual a utilidade disso? Isso evita que haja muita desordem nas relações de herança em todo o sistema.
 - Exemplo Simples de violação da Substituição de Liskov
    - Dado que temos um classe Funcionário e dessa classe Herdam as classes Vendedor e Gerente, então:

```java
class Funcionario{
    private float salario;
    private String cargo;
    private String nome;
}

class Vendedor extends Funcionario{
    private float comissao;
    
    public float getSalarioVendedor(){
        return salario + comissao;
    }
}

class Gerente extends Funcionario {
    private float bonus;
    
    public float getSalarioGerente(){
        return salario + bonus;
    }
}
```

 - Olhando essas classes não parece haver qualquer problema, cada classe possui a sua responsabilidade e não necessidade de alterar a classe cada vez que criamos um novo cargo. 
 - Porém, imagine que você possua um módulo que imprima a folha salarial, vejamos como ficaria:

```java
class FolhaSalarial{
    private Date data;
    
    public void imprimirFolhaSalarial(List funcionarios){
        for(Funcionario f : funcionarios){
            
            if(funcionario.getCargo() == "Vendedor"){
                System.io.println(funcionario.getNome() + " ----- " + funcionario.getSalarioVendedor());
            }
            
            if(funcionario.getCargo() == "Gerente"){
                System.io.println(funcionario.getNome() + " ----- " + funcionario.getSalarioGerente());
            }
        }
    } 
}
```
 - Perceba que aqui violamos dois princípios de uma só vez: Substituição de Liskov, pois não podemos substituir Funcionário por um subtipo Gerente ou Vendedor, pois cada subtipo possui um método diferente para calcular o salário. Princípio do Aberto/Fechado, pois cada vez que criarmos um novo cargo, precisamos vir no módulo de folha de pagamento e alterá-lo.
 - Aplicando o Princípio da Substituição de Liskov
    - Para resolver o problema, basta que todos os subtipos tenha o mesmo método para calcular salário. Para isso iremos criar um método abstrato getSalario(), e todas os subtipos terão de implementá-los.
```java
abstract class Funcionario {
    private float salario;
    private String cargo;
    private String nome;
    
    abstract float getSalario();
}

class Vendedor extends Funcionario{
    private float comissao;
    
    public float getSalario(){
        return salario + comissao;
    }
}

class Gerente extends Funcionario {
    private float bonus;
    
    public float getSalario(){
        return salario + bonus;
    }
}

class FolhaSalarial{
    private Date data;
    
    public void imprimirFolhaSalarial(List funcionarios){
        for(Funcionario f : funcionarios){
            System.io.println(funcionario.getNome() + " ----- " + funcionario.getSalario());
        }
    } 
}
```
 - Agora podemos criar quantos subtipos de funcionários desejarmos e nunca precisaremos nos preocupar com o módulo de Folha Salarial, pois ele conhece a abstração de funcionário e sabe que topos os subtipos possuem o método getSalario(), independente de como cada um irá implementar.
 - Violações Sutis do Princípio da Substituição de Liskov
    - Não violar esse princípio é um pouco difícil e por isso devemos ficar sempre atentos. Existem inúmeras maneiras de violá-lo sem perceber, vou mostrar as duas mais comuns
    - Quando um Subtipo lança um exceção diferente que o Supertipo não lança.
- Vejamos nosso novo módulo de de folha de pagamento:

```java
class FolhaSalarial {
    private Date data;
    
    abstract void imprimirFolhaSalarial(List funcionarios);
}

class FolhaImpressaEmPapel extends FolhaSalaria {
    private Impressora impressora;
    
    public void imprimirFolhaSalarial(List funcionarios) throws ImpressoraOfflineException {
        
        if(this.impressora.isOffline()){
            throw new ImpressoraOfflineException("A impressora esta offline");
        } else {
            for(Funcionario f : funcionarios){
                this.impressora.imprimirLinha(funcionario.getNome() + " ----- " + funcionario.getSalario());
            }
        }
    } 
}

class FolhaImpressaEmTela extends FolhaSalarial{
    public void imprimirFolhaSalarial(List funcionarios){
        for(Funcionario f : funcionarios){
            System.io.println(funcionario.getNome() + " ----- " + funcionario.getSalario());
        }
    } 
}
```

 - Nesse exemplo, cada parte se substituirmos o modulo FolhaSalarial pelo seu subtipo FolhaImpressaEmPapel, temos que adicionar um novo tratamento de exceção, ou seja, precisamos alterar o sistema. Caso a excessão ImpressoraOfflineException seja um exceção não verificada, temos um cenário ainda pior, pois o sistema pode quebrar sem que ao menos possamos nos precaver.
 - Um maneira de não violar o princípio é se os subtipos lançarem exceções que são subtipos das Exceções lançadas pelo supertipo. 
 - Vamos ver como fica:

```java
class FolhaSalarial{
    private Date data;
    
    abstract void imprimirFolhaSalarial(List funcionarios) throws IOException;
}

class FolhaImpressaEmPapel extends FolhaSalaria {
    private Impressora impressora;
    
    public void imprimirFolhaSalarial(List funcionarios) throws ImpressoraOfflineException {
        
        if(this.impressora.isOffline()){
            throw new ImpressoraOfflineException("A impressora esta offline");
        } else {
            for(Funcionario f : funcionarios){
                this.impressora.imprimirLinha(funcionario.getNome() + " ----- " + funcionario.getSalario());
            }
        }
    } 
}

class FolhaImpressaEmTela extends FolhaSalarial{
    public void imprimirFolhaSalarial(List funcionarios) throws IOException{
        for(Funcionario f : funcionarios){
            System.io.println(funcionario.getNome() + " ----- " + funcionario.getSalario());
        }
    } 
}
```

 - Agora ImpressoraOfflineException sendo um subtipo de IOException não há problema algum, pois já estaremos esperando por esse tipo de Exceção, e trataremos caso ocorra, sem que haja modificações em que utilizar o nosso módulo FolhaSalarial.
 - Perceba também que FolhaImpressaEmTela nunca lançará nenhuma exceção, também não é um problema, pois isso será transparente para quem utilizar o módulo.
 - Clássico caso do Quadrado
    - O exemplo do quadrado é o mais utilizado na literatura, neste exemplo temos duas classes : Retangulo, que é o supertipo e o quadrado que é o subtipo.

```java
class Retangulo {

    private int altura;
    private int largura;

    public void setAltura(int altura){
        this.altura = altura
    }
    
    public void setLargura(int largura){
        this.largura = largura;
    }
    
    public final int getArea(){
        return altura * largura;
    }
}

class Quadrado extends Retangulo{
    public void setAltura(int altura){
        this.altura = altura;
        this.largura = altura;
    }
    
    public void setLargura(int largura){
        this.altura = largura;
        this.largura = largura;
    }
}
```
 - Como sabemos, o quadrado é um retângulo que possui altura e largura iguais, sendo assim, quando alteramos a altura, precisamos alterar a largura também, e vice-versa.
 - Agora quando vamos usar a nossa classe Quadrado, temos:

```java
Retangulo q1 = new Quadrado();
q1.setAltura(5);
q1.setLargura(10);

if(q1.getArea() == 50){
    //comportamento esperado
} else {
    //comportamento inesperado
}
```

 - No código acima o comportamento esperado para um Retângulo seria multiplicar a altura = 5 pela largura = 10, resultando na área  50. Mas ao invés disso, temos altura  = largura = 10, sendo assim, 10 multiplicado por 10 que resulta na área 100. É muito fácil comprovar como isso pode ser errado, basta que termos algum teste unitário para a classe retângulo, que ele logo falharia.

 - Conclusão
    - O princípio da Substituição de Liskov veio para garantir que não criaremos nenhum design estranho enquanto usamos a herança. A herança é um mecanismo muito poderoso da Orientação a Objetos, mas potencialmente pode criar muita confusão e comportamentos estranhos e difíceis  de serem detectados. Seguindo esse princípio os comportamentos ficam mais previsíveis ao longo da cadeia de  heranças.