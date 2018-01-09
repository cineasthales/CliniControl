############
CliniControl
############

*****************
Resumo do projeto
*****************

Trata-se do planejamento e desenvolvimento de um sistema que permitirá o controle
de procedimentos e suas particularidades em clínicas e em consultórios médicos por
parte de uma ou mais empresas do ramo.

**********************
Tecnologias utilizadas
**********************

* PHP - https://secure.php.net/
* SGBD mySQL - https://www.mysql.com/
* Javascript - https://www.javascript.com/
* HTML e CSS - https://www.w3.org/standards/webdesign/htmlcss
* CodeIgniter 3.1.5 - https://codeigniter.com/
* jQuery 3.2.1 - https://jquery.com/
* FontAwesome - http://fontawesome.io/

************************************
Processos executados por cada membro
************************************

* Felipe Theil: programação voltada ao cliente (Front-End) - https://gitlab.com/felipe_theil
* Igor Silva: programação voltada a testes (Tester) e ao servidor (Back-End) - https://gitlab.com/Maartyr
* Thales Castro: liderança do grupo e programação voltada ao servidor (Back-End) - https://gitlab.com/cineasthales

********
Tutorial
********

Um administrador de clínica ou consultório poderá realizar um cadastro no sistema.
A partir do cadastro com sucesso, o login é liberado e demais dados próprios
podem ser configurados no sistema, incluindo pacientes e empregados que ainda não
estejam cadastrados.

*********************
Como clonar o projeto
*********************

Utilizando a ferramenta SourceTree, acessa-se Arquivo > Clonar / Novo. É só inserir
a URL do gitlab (https://gitlab.com/felipe_theil/clinicontrol.git) e o caminho de destino
e clicar em "Clonar".

*****************************
Como instalar a base de dados
*****************************

Utilizando o phpMyAdmin do localhost, basta importar o arquivo banco.sql na pasta raiz 
do projeto e clicar em "Executar".

***********************************************
Como executar e configurar para o funcionamento
***********************************************

O projeto precisa ser clonado para um servidor local. Por exemplo, na pasta
xampp > htdocs quando se utiliza o XAMPP. Após a clonagem e a instalação da base de dados,
com o servidor executando Apache e mySQL, é só inserir localhost/clinicontrol na barra de URL
em um navegador.