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
public class TareaCompuesta implements Tarea{

  private String descripcion;
    private List<Tarea> subtareas = new ArrayList<>();
    
    public TareaCompuesta(String descripcion) {
        this.descripcion = descripcion;
    }
    
    public void agregarSubtarea(Tarea tarea) {
        subtareas.add(tarea);
    }
    
    @Override
    public String descripcion() {
        return descripcion;
    }
    
    @Override
    public void ejecutar() {
        System.out.println("Ejecutando tarea compuesta: " + descripcion);
        for (Tarea subtarea : subtareas) {
            subtarea.ejecutar();
        }
    }
    
}
