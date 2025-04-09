/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package parcial;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author CJP
 */
public class GestorTareas {
     private List<Tarea> tareas = new ArrayList<>();
    
    public void crearTarea(Tarea tarea) {
        tareas.add(tarea);
    }
    
    public void mostrarTareas() {
        for (Tarea tarea : tareas) {
            System.out.println(tarea.descripcion());
        }
    }
}
