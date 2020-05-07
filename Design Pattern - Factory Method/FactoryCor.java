package pintura;

/**
 * 
 * Classe, fábrica de objetos do tipo cor
 * Do pacote de exemplo Pintura que demonstra o 
 * Padrão de Projeto GOF - Factory Method
 * 
 * @author Thiago Toledo <javaephp@gmail.com>
 * 
 */

public class FactoryCor {
    
    /**
     *
     * @param nomeDaCor
     * @return
     */
    public Cor getCor(String nomeDaCor){
        
        switch (nomeDaCor) {
            
            case "verde":
                return new Verde();
                
            case "azul":
                return new Azul();
                
            case "vermelho":
                return new Vermelho();
                
            default:
                return null;
                
        }        
        
    }
    
}
