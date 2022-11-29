A presente aplicação teve o objetivo de tornar-se o mais simples o possivel de acordo com os requisitos pedidos para o desafio. 

Para rodar a aplicação é preciso ter o PHP instalado, junto ao mysql e xampp. Deve estar com o servidor apache iniciado para poder rodar o servidor.

Foi criado uma tabela com o nome cidadao. Com as colunas nis (varchar 45, not null e primary key), e nome (varchar 45).

A aplicação, possui 2 campos. Campo para filtrar NIS e campo para nome. Ao cadastar um nome, aleatoriamente cadastra um valor unico no banco de dados usando a função uniqid com o prefixo GE. Ao filtrar pelo NIS, é pego o nome do cidadão a partir daquele valor do NIS.

A presente aplicação teve como objetivo ser mais simples. Não foi utilizado o quesito de orientação a objetos (somente na conexão ao banco de dados), devido ao uso de memória, e utilizar o codigo mais simples o possivel para ser funcional e seguir com os requisitos.
