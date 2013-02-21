Pessoal nesse crud quero fazer semelhante a um framework. 

Quero ter um classe banco, que faz a conexão com o banco e já tem os métodos do crud Insert, Select, Update e Delete.

Quero fazer da forma que fique para model a classe banco + (por exemplo usuario) usuario.class.php (nessa classe ficará os get e set), para controller uma pagina que recebe todas as requisições e chama a view expecifica, e viem somente a tela.


Fiz alguma coisa a respeito nessa exemplo, ainda não terminei, como fiz meio rapido esta bem bagunçado.

Preciso de ajuda para a parte de renderizar as view, atualmente estou usando include, queria uma forma que era mais elegante
para chamar a view.

Outra coisa. já que tenho um classa abstrat banco com o elementos do crud Insert, Select, Update e Delete o ideal é fazer a chamada desses metodos dentro de suas classes? 
ex: tenho uma classe usuário, dentro dele os setters e getters + o métodos inserir select update e delete que são herdados da classe banco? ou posso usar direto os da classe banco.

Pessoal me ajuda ai. 

Abraços.
