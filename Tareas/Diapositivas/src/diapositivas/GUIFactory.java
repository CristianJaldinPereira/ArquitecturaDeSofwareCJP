/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package diapositivas;

/**
 *
 * @author CJP
 */


// (Fábrica Abstracta)
interface GUIFactory {
    Boton crearBoton();
    Ventana crearVentana();
}