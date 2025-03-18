/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package diapositivas;

/**
 *
 * @author CJP
 */

//(Cliente)
class Aplicacion {
    private Boton boton;
    private Ventana ventana;

    public Aplicacion(GUIFactory factory) {
        boton = factory.crearBoton();
        ventana = factory.crearVentana();
    }

    public void renderizarUI() {
        boton.renderizar();
        ventana.mostrar();
    }
}
