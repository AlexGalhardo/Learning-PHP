package pintura;


/**
 * 
 * Classe, implementação da Interface cor
 * Do pacote de exemplo Pintura que demonstra o 
 * Padrão de Projeto GOF - Factory Method
 * 
 * @author Thiago Toledo <javaephp@gmail.com>
 * 
 */

public class Azul implements Cor {
    
    @Override
    public void colorir(){
        System.out.println("Colorido de Azul");
    }
}
