package pintura;

/**
 * 
 * Classe de exemplo mostrando a utilização  
 * do Padrão de Projeto GOF - Factory Method
 * 
 * @author Thiago Toledo <javaephp@gmail.com>
 * 
 */

public class Pincel {
    
    /**
    *    Neste exemplo consideramos que ao chamar o método, serão pintadas as 
    *    cores verde, azul e vermelho, nesta sequência
    */
    
    public void pintar(){
        
        Cor corEscolhida;
        FactoryCor fabricaDeCor = new FactoryCor();
        
        //Pintando de verde
        corEscolhida = fabricaDeCor.getCor("verde"); 
        corEscolhida.colorir();
        
        //Pintando de azul
        corEscolhida = fabricaDeCor.getCor("azul"); 
        corEscolhida.colorir(); 
        
        //Pintando de azul
        corEscolhida = fabricaDeCor.getCor("vermelho"); 
        corEscolhida.colorir(); 
        
    }
    
}
