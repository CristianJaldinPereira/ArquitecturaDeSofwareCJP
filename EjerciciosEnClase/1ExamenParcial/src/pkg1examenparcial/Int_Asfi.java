/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package pkg1examenparcial;

import java.rmi.RemoteException;
import java.util.ArrayList;

/**
 *
 * @author CJP
 */
public interface Int_Asfi {
  public  ArrayList<Cuenta> ConsultarCuentas (String ci, String nombres, String apellidos) throws RemoteException;
  public boolean RetenerMonto(Cuenta cuenta, double monto, String glosa) throws RemoteException;
}
