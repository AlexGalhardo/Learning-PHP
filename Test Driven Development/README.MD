## Test Driven Development

- http://ramonsilva.net/boas-praticas/testes/as-tres-leis-do-tdd/

 - Desenvolvimento Guia por Testes ( do inglês Test Driven Development), ou apenas TDD, é uma prática bem difundida no mercado, mas que poucos desenvolvedores ainda seguem. Essa metodologia foi originalmente criada por Kent Beck, mas rapidamente outros profissionais da área abraçaram a causa e viraram evangelizadores.

 - Em seu livro o Codificador Limpo, Robert C. Martin, descreve as três leis do desenvolvimento guiado por testes. As leis são simples, porém nós desenvolvedores temos uma certa resistência a fazê-lo.

 - As Três Leis do TDD
    - Primeira Lei do TDD
       - Você não pode escrever nenhum código até ter escrito um teste que detecte uma possível falha.
       - Quando começamos a escrever um novo software somos tomados por uma excitação e queremos logo, sair escrevendo o que vêm a cabeça. Mas antes, devemos parar um pouco e pensar no que realmente devemos escrever. Nesse ponto os testes nos ajudam, pois fica claro que devemos escrever algo que passe nos testes. Por isso os testes vêm primeiro.

   - Segunda Lei do TDD
       - Você não pode escrever mais testes de unidade do que o suficiente para detectar a falha – não compilar é não ter efeito.
       - Mais uma vez, somos levados por um sentimento de escrever tudo que vêm a cabeça, mas mais uma vez devemos pensar com clareza sobre o que deve ser escrito, testes também são código. Se escrevermos testes errados, faremos códigos errados, se escrevermos testes demais, acabaremos escrevendo código demais.
   - Terceira Lei do TDD
       - Você não pode escrever mais código do que o suficiente para passar nos testes.
   - Os testes devem vir sempre antes do código, quando escrevemos mais código do que o necessário, acabamos por escrever códigos que não será testados ou pior, escreveremos testes para passar no nosso código. Pense nisso.