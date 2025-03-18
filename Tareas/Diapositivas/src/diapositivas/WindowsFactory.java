/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package diapositivas;

/**
 *
 * @author CJP
 */
//(Fábricas Concretas)
class WindowsFactory implements GUIFactory {
    public Boton crearBoton() {
        return new BotonWindows();
    }
    public Ventana crearVentana() {
        return new VentanaWindows();
    }
}