

#### Source/Credits: http://ramonsilva.net/arquitetura-de-software/refatoracao-de-codigo/

A Refatoração de código é uma prática que surgiu na década de 80, entre os membros da comunidade de programadores de Smalltalk, logo ganhou força e atingiu outras comunidades de programadores.

Os programadores tinham consciência que não escreviam o código mais correto logo na primeira tentativa, e que precisavam ler, reler e modificar os seus códigos com uma frequência maior do que escreviam novas linhas de código.

Logo alguns termos se tornaram populares entre os programadores que adotavam a refatoração, o mais famoso deles é o termo “badsmell” ou “mau cheiro”, que significa que uma parte do código está estranha e merece ser revista e modificada para que se torne mais legível e flexível.

Atualmente a refatoração tornou-se ganhou ainda mais popularidade graças à comunidade Java que a adotou maciçamente.

A literatura também contribuiu bastante para popularização da refatoração, sobre tudo Martin Fowler que criou muitas das obras mais importantes sobre o tema, além de se tornar um grande evangelista das práticas de refatoração.

As metodologias ágeis de desenvolvimento como XP e Scrum, muito populares nos dias de hoje, têm na refatoração um de seus principais pilares, ajudando-a a se popularizar ainda mais.

Segundo o relatório de do National Standart Institute, o custo de um erro (bug) em fase de desenvolvimento que custa 1 unidade ( entenda unidade como qualquer custo, como por exemplo hora/pessoa, dólares, etc…) e após ir para produção esse mesmo erro pode custar até milhares de dólares. Por isso a refatoração de código, quando implantada desde o início do projeto, resulta em um custo muito menor.

  

Além do beneficio de redução de custos, a refatoração como tarefa diária de desenvolvimento ajuda a manter a equipe mais cuidadosa com o código desenvolvido, pois se um código parece estranho ele logo será corrigido, corrigindo um possível problema o mais cedo possível.

O conhecimento do código também é disseminado mais rapidamente, pois todos os membros da equipe acabam por refatorar códigos escritos por outros desenvolvedores, o que melhora a passagem de conhecimento para novos membros, reduz o impacto causado pela ausência de um membro e os riscos do projeto.

Conceitos
Abaixo temos dois conceitos descritos por Martin Fowler em seu livro (2004, p.46).

Refatoração: uma alteração feita na estrutura interna do software para torá-lo mais compreensível e barato de manter, sem que haja mudança no seu comportamento externo.
Refatorar: é a reestruturação de um software, tendo por base uma série de refatorações, sem alterar o comportamento externo.
Ainda em seu livro, Martin Fowler,  descreve:

Refatoração é uma técnica disciplinada para reestruturar um código fonte existente, alterando sua estrutura interna sem mudar o seu comportamento externo. Sua essência está em uma série de pequenas transformações que preservam comportamento. Cada transformação (chamada de refatoração) faz pouca coisa, mas uma sequência de pequenas transformações produz uma reestruturação significativa.

Ou seja, a refatoração tem como principal objetivo, melhorar a estrutura interna do software, sem afetar suas as interações externas, de modo que o usuário do sistema quase nunca percebe qualquer alteração que possa ter acontecido.  Para garantir que isto ocorra, cada modificação deve ser validada através de cenários de testes ou testes automatizados, para evitar que novos bugs sejam introduzidos ou que o comportamento fique diferente do esperado.

A refatoração torna o código mais fácil de ser entendido. O programador quando escreve uma porção de código ele está informando ao computador o que ele deve fazer, mas outras pessoas também devem ser capazes de ler e entender o que foi escrito, possibilitando que o código possa ser alterado a qualquer hora por qualquer pessoa, até mesmo pelo próprio programador que o tenha escrito tempos atrás e não se lembre de todos os detalhes.

Além disso, a refatoração ajuda os programadores a encontrar Bugs no software, pois com uma melhor compreensão da estrutura do código, fica muito mais claro onde as coisas não estão como deveriam estar. Kent Beck diz ”Não sou um grande programador, mas um programador comum com grandes hábitos.”. ( p.49)

Refatorar ajuda a codificar mais rápido. Codificar novas funcionalidades é mais produtivo que ficar corrigir bugs, e isso só possível quando o software possui uma boa arquitetura. Um software até pode começar sendo desenvolvido muito rapidamente, mas com o tempo a arquitetura deixa de ser tão eficiente e a velocidade do time de desenvolvedores cai. Para evitar que isso ocorra, a refatoração deve ser aplicada, de modo a manter sempre uma boa qualidade e compreensão do código.

Enquanto desenvolve um código o programador assume dois papéis, o primeiro papel é exercido enquanto o programador cria novas funcionalidades e o segundo papel, enquanto o programador tenta melhorar o código recém-escrito. Durante a sua tarefa de programação fica trocando os papeis constantemente. Essa troca deliberada de papeis não é considerada uma boa prática, o programador deve separar esses dois momentos, para evitar que a perda de foco.

Existem três situações onde a refatoração se faz necessária.

Refatoração de código ao adicionar uma nova funcionalidade
A situação mais comum onde você irá aplicar a refatoração é quando estiver acionando novas funcionalidades. O código onde será adicionada a funcionalidade muitas vezes foi escrito por outra pessoa e precisa ser compreendido antes de ser modificado. Outra razão é que muitas das vezes o código foi escrito de uma maneira que não fica fácil adicionar aquela funcionalidade e talvez se estivesse estruturado de outra forma, a alteração seria menos trabalhosa. Aplicando a refatoração o código fica mais claro e fácil de ser modificado.

Refatoração de código quando um Bug precisa ser corrigido
Quando é preciso corrigir algum Bug, deve-se aplicar a refatoração para que o código fique mais compreensível. A refatoração deve ser aplicada quantas vezes forem necessárias até que com uma melhor compreensão do código o Bug possa ser facilmente identificado.

Refatoração de código durante a revisão de código
Muitas organizações adotam a prática de refatoração de código, durante um período do ciclo de desenvolvimento, a equipe para de desenvolver novas funcionalidades de revisa o código dos outros desenvolvedores da equipe. Esta prática ajuda a disseminar o conhecimento sobre o software entre os membros da equipe e também ajuda na passagem de conhecimento entre os desenvolvedores mais experientes e os menos experientes.

O ideal que durante a revisão, o revisor e o desenvolvedor que escreveu o código fiquem juntos assim, eles podem discutir sobre o entendimento da funcionalidade, e quando esta compressão não está clara para um dos dois, o código deve ser refatorado até se tornar compreensível para todos.


Para iniciar o processo de refatoração, antes é preciso formar uma base sólida, com o auxílio de testes, técnicas e ferramentas. Toda refatoração segue passos básicos: criação de testes, identificação dos pontos de melhoria, aplicação de técnicas de refatoração, execução de testes e validação das alterações.

Abaixo estão listadas algumas técnicas empregadas na refatoração de códigos, essas técnicas foram catalogadas por Martin Fowler em seu livro (Refatoração: Aperfeiçoamento e Projeto), e utilizam fortemente os princípios da Orientação a Objetos. Nele estão listadas as refatorações mais corriqueiras e servem de base para equipes que começarão a refatorar seu código.


Refatoração : Extrair Método (ExtractMethod)
Quando você têm partes similares do código que podem ser agrupadas, geralmente código que está duplicado, então você deve mover essas partes para um novo método que tenha um nome que faça sentido.

A principal motivação para esta refatoração é eliminar do código métodos muito grandes que realizam mais de uma tarefa e geralmente precisam estar cheios de comentários para que seja compreendido.

Métodos menores aumentam a granularidade do código e quando bem nomeados aumentam a clareza do que foi escrito. A nomeação de métodos é vital para que esta técnica funcione, o nome deve dizer claramente o que o método se propõe a fazer, e o tamanho do nome do método não deve ser um entrave, utilize nomes tão grandes quanto necessário (Ex.: ObterUrlDeRedirecionamentoParaSiteParceiro(codigoParceiro)).Extrair Método

Refatoração : Mover Método (Move Method)
Quando você possui um método que será utilizado muitas vezes por outra classe diferente da classe na qual ele foi definido, crie um método similar nesta classe que o está utilizando, depois copie o corpo do método copiado para o novo método, então substitua as chamadas para utilizarem o método local. Pode-se também avaliar se o método original deve ser preservado ou se pode ser eliminado.

Na imagem abaixo vemos o método “aMethod” foi retirado da classe de origem “Class1” e movido para a classe “Class2”, onde ele faz mais sentido existir.

Mover Método

Refatoração : Mover Atributo (Move Field)
Similar à técnica Mover Método (seção 2.3.2), Mover Atributo é aplicada quando outra classe diferente da classe onde o atributo foi definido, o utiliza muitas vezes. Nesse caso devemos apenas copiar o atributo de uma classe para outra e alterar as chamadas para que passem a utilizar o atributo local. Mais uma vez cabe avaliar se o atributo original deve ou não ser eliminado.

Abaixo vemos, o atributo “aField” foi retirado da classe de origem “Class1” e movido para a classe de destino “Class2”, onde ele faz mais sentido existir.

Mover Atributo

Refatoração : Extrair Classe (Extract Class)
Quando você possui uma classe que está executando a tarefa de duas, então crie uma nova classe, depois mova todos os atributos relevantes para esta nova classe.

A motivação desta técnica é bastante óbvia, sempre ouvimos falar que cada classe deve ser coesa e ter objetivos bastante claros, mas na prática as classes crescem. Quando um desenvolvedor adiciona uma nova funcionalidade em certa classe, talvez ela não parecesse tão errada, mas com o tempo esta funcionalidade irá crescer, e trazer mais responsabilidades para a classe.

Ao extrair estas responsabilidades da classe e a colocando em outra, há um ganho em coesão, legibilidade e reutilização do código.

Abaixo os atributos “officeAreaCode” e “officeNumber” foram extraídos da classe “Person”, em seguida esses dois atributos foram encapsulados em uma nova classe “TelephoneNumber”, em seguida um uma referência de para a classe “TelephoneNumber” foi adicionada a classe “Person”.

Extrair Classe

Refatoração : Encapsular Atributo (Encapsulate Field)
Quando um atributo é acessado diretamente e isto parecer ser estranho, devem-se criar métodos de acesso a este atributo.

Existem duas escolas que defendem meios diferentes de acessar atributos de uma classe. A primeira diz que os atributos expostos devem ser acessados diretamente, pois isto torna o código mais legível. A segunda diz que devemos criar métodos de acesso a cada atributo exposto da classe, pois isto facilita que subclasses sobrescrevam os métodos de acesso.

O melhor a fazer neste caso é discutir com outros membros da equipe para determinar qual a melhor maneira de dar acesso aos atributos, de modo a manter coerência com o resto do software.

Uma boa maneira de resolver este problema é criar os atributos sendo acessados diretamente e quando isto começar a parecer estranho, substituir por métodos de acesso.

Quando estes atributos que são acessados estão em uma superclasse, primeiro deve-se encapsular o atributo internamente, na superclasse, e em seguida, sobrescrever o método de acesso na classe derivada.

Na Figura 2.4, o atributo “_name” foi encapsulado dentro dos métodos de acesso “getName()” e “setName()”, de modo a diminuir a dependência por parte de outras classes a este atributo.

Encapsular Atributo

Refatoração : Renomear Método (Rename Method)
Quando o nome de um método não revela qual a sua intenção, deve-se altera-lo imediatamente, de modo que o novo nome deve descrever claramente o que ele se propõe a fazer.

Segundo Martin Folwer (2004, p.221) “… lembrem-se códigos são escritos primeiramente para humanos, computadores vem em segundo lugar…”.

Assim como na técnica Extrair Método (seção 2.3.1), o tamanho do nome não deve ser um impeditivo, contanto que ele não deixe dúvidas sobre o que o método faz.
(Ex.: listarFichasTecnicasDeEventosPorSuaCategoria(codigoDaCategoria))

Na Figura 2.5, o método “getinvcdtlmt()” teve o seu nome alterado para “getInvoiceableCreditLimit()”, de modo a dar mais clareza do seu comportamento e melhorar a legibilidade do código. (Ex.: listarFichasTecnicasDeEventosPorSuaCategoria(codigoDaCategoria))

Renomear Método

Estas são as técnicas frequentes propostas por Martin Fowler em seu livro.

Joshua Kirievsky também apresenta um rico catalogo de refatorações focadas em padrões de projeto, em seu livro Refatoração para Padrões. Neste livro podemos ver refatorações como Internalizar Acesso Único (p.143), Formar Método gabarito (p.237), Substituir Lógica Condicional por Estratégia, Extrair Parâmetro (p.381), Extrair Adaptador (p.290), entre outras.

Joshua Bloch em seu livro Java Efetivo lista 78 boas práticas em na linguagem Java, que funcionam também como uma lista de refatorações.