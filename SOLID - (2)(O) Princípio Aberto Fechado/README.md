## SOLID - O Princípio Aberto/Fechado

#### Source/Credits: http://ramonsilva.net/boas-praticas/solid/principio-aberto-fechado/

 - OCP (Open/Closed Principle) é o segundo princípio do SOLID, e diz que uma classe deve ser aberta para extensão e fechada para modificação.
 - Mas o que isso significa ? Simples, você a sua classe deve ser projetada de modo que não haja necessidade de fazer alterações no seu código cada vez que um novo comportamento for necessário, e como fazer isso? Separando todo o comportamento mutável da sua classes e manter nela somente aquilo que nunca mudará.
 - O Problema
 - Vejamos com exemplo a classe Funcionário, esse classe tem um método que calcula o salário do funcionário baseado no seu cargo e sua comissão.

```java
class Funcionario{
    
    //Atributos
    
    private float salarioBase;
    private String cargo;
    
    //Outros Methodos
    
    public float getSalario(float totalVendas){
        if(cargo == "Secretaria"){
            return salarioBase;
        }
        
        if(cargo == "Vendedor"){
            return salarioBase + (totalVendas * 0.3);
        }
    }
}
```

 - Essa classe parece correta, está bem coesa e parece não ter responsabilidades demais. Mas imagine agora que você precisa adicionar a essa classe o calculo do salário do supervisor regional.
 - A regra é a seguinte: 10% (dez por cento) da soma das comissões de todos os vendedores sob sua supervisão adicionado de seu salário base.
    - Aberto para modificação
 -Ora, isso é fácil. Então vamos lá

```java
class Funcionario{
    
    //Atributos
    
    private float salarioBase;
    private String cargo;
    private float totalVendas;
    private float vendas;
    
    //Outros Methodos
    
    public float getComissao(List funcionarios){
        if(cargo == "Vendedor"){
            return this.vendas * 0.3;
        }
        
        if(cargo == "Supervisor Regional"){
            float comissao = 0.0f;
            for(Funcionario funcionario : funcionarios){
                comissao += funcionario.getComissao();
            }
            
            return (comissao * 0.1);
        }
    }
    
    public float getSalario(List funcionarios){
        if(cargo == "Secretaria"){
            return salarioBase;
        }
        
        if(cargo == "Vendedor"){
            return salarioBase + (vendas * 0.3);
        }
        
        if(cargo == "Supervisor Regional"){
            float comissao = 0.0f;
            for(Funcionario funcionario : funcionarios){
                comissao += funcionario.getComissao();
            }
            
            return salarioBase + (comissao * 0.1);
        }
        
        if(cargo == "Supervisor Regional"){
            return salarioBase * getComissao(funcionarios);
        }
    }
}
```

 - Por causa de uma coisa apenas, tivemos que fazer uma série de alterações na classe:
    - adicionamos um campo totalVendas, para sabermos quanto cada Funcionário vendeu;
    - criamos um novo método getComissao, para calcular a comissão de cada Vendedor
    - tivemos que modificar o método getSalario, para adicionar o novo tipo de Funcionário Supervisor Regional, além disso precisamos alterar a assinatura do método, o que é muito ruim.
 - Até agora nem questionamos o fato de que o cargo Secretária, não precisa calcular comissão, e por isso os parâmetros, totalVendas e a lista de funcionários sobre a supervisão são TOTALMENTE INÚTEIS.
 - Mais e mais Alterações
    - Agora vem a melhor parte, surge uma nova necessidade, precisamos agora calcular o salário do Gerente de Vendas, seguindo a regra: salário base adicionado de 20% (vinte por cento) do valor total da comissão de cada um dos supervisores sob seu comando, mais um valor fixo que vai de 0 a 20.000 de acordo com metas de vendas.
 - Lá vamos nós mais uma vez alterar a classe funcionário, e cada alteração adiciona mais complexidade e mais chances de bug.

```java
class Funcionario{
    
    //Atributos
    
    private float salarioBase;
    private String cargo;
    private float totalVendas;
    private float vendas;
    
    //Outros Methodos
    
    public float getComissao(List funcionarios){
        if(cargo == "Vendedor"){
            return this.vendas * 0.3;
        }
        
        if(cargo == "Supervisor Regional"){
            float comissao = 0.0f;
            for(Funcionario funcionario : funcionarios){
                comissao += funcionario.getComissao();
            }
            
            return (comissao * 0.1);
        }
        
        if(cargo == "Gerente"){
            float comissao = 0.0f;
            float vendas = 0.0f;
            
            for(Funcionario funcionario : funcionarios){    
                if(funcionario.getCargo() == "Supervisor Regional"){
                    comissao += funcionario.getComissao();
                    vendas += funcionario.getVendas();
                }
            }
            
            float comissaoPorMeta = 0.0f;
            
            if(vendas &gt; 50.000){
                comissaoPorMeta = 5.000;
            }
            
            if(vendas &gt; 100.000){
                comissaoPorMeta = 8.000;
            }
            
            if(vendas &gt; 200.000){
                comissaoPorMeta = 15.000;
            }
            
            if(vendas &gt; 500.000){
                comissaoPorMeta = 20.000;
            }
            
            return (comissao * 0.2) + comissaoPorMeta;
        }
    }
    
    public float getSalario(List funcionarios){
        if(cargo == "Secretaria"){
            return salarioBase;
        }
        
        if(cargo == "Vendedor"){
            return salarioBase + (vendas * 0.3);
        }
        
        if(cargo == "Supervisor Regional"){
            float comissao = 0.0f;
            for(Funcionario funcionario : funcionarios){
                comissao += funcionario.getComissao();
            }
            
            return salarioBase + (comissao * 0.1);
        }
        
        if(cargo == "Supervisor Regional"){
            return salarioBase * getComissao(funcionarios);
        }
    }
}
```

 - Aberto / Fechado: Aberto para Extensão mas Fechado para Alteração
 - Para cada novo comportamento que adicionamos, a nossa classe fica mais complexa, poderíamos criar métodos separadas getSalarioVendedor(), getSalarioSupervisor, getSalarioSecretaria, getSalarioGerente(). Mais isso só iria tornar a classe mais complexa do ponto de vista de quem a utiliza.
 - Então o que faremos agora? Bom, basta separar o que muda do que não muda.
 - O que nunca muda? A forma como calculamos o salário, é sempre salário base mais comissão. E o que muda? A forma de calcular a comissão!
 - Vamos então refatorar a classe. Primeiro vamos fixar nossa regra de salários.

```java
class Funcionario{

    public float getSalario(float comissao){
        return salarioBase + comissao;
    }   
}
```

 - Veja como nosso método ficou extremamente mais simples, mas isso não é tudo , precisamos ainda resolver como calcular a comissão. Nesse ponto a Orientação a Objetos nos dá uma mãozinha. Vamos usar o polimorfismo!

```java
class Funcionario{
    public float getSalario(CalculadoraDeComissao calculadora){
        return salarioBase + calcauladora.getComissao();
    }   
}

interface CalculadoraDeComissao(){
    float getComissao();
}

public class SemComissao implements CalculadoraDeComissao{
    public float getComissao(){
        return 0.0f;
    }
}

public class ComissaoVendedor implements CalculadoraDeComissao{
    public float getComissao(){
        return return this.vendas * 0.3;
    }
}

//Outras implementacoes
```

 - Pronto! Com isso cada vez que precisamos extender o comportamento da classe, basta criar uma nova classe que contenha esse comportamento e implementar a a interface CalculadoraDeComissao. De quebra implementamos o padrão Strategy sem esforço adicional.
 - Conclusão
    - Seguindo esse principio teremos classes menores e que não precisam de manutenção constante. Isso diminui drasticamente os problemas causados por alterações um ponto da aplicação que causa a quebra de outro ponto.