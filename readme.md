Pessoal nesse crud quero fazer semelhante a um framework. 

Quero ter um classe banco, que faz a conex�o com o banco e j� tem os m�todos do crud Insert, Select, Update e Delete.

Quero fazer da forma que fique para model a classe banco + (por exemplo usuario) usuario.class.php (nessa classe ficar� os get e set), para controller uma pagina que recebe todas as requisi��es e chama a view expecifica, e viem somente a tela.


Fiz alguma coisa a respeito nessa exemplo, ainda n�o terminei, como fiz meio rapido esta bem bagun�ado.

Preciso de ajuda para a parte de renderizar as view, atualmente estou usando include, queria uma forma que era mais elegante
para chamar a view.

Outra coisa. j� que tenho um classa abstrat banco com o elementos do crud Insert, Select, Update e Delete o ideal � fazer a chamada desses metodos dentro de suas classes? 
ex: tenho uma classe usu�rio, dentro dele os setters e getters + o m�todos inserir select update e delete que s�o herdados da classe banco? ou posso usar direto os da classe banco.

Pessoal me ajuda ai. 

Abra�os.
