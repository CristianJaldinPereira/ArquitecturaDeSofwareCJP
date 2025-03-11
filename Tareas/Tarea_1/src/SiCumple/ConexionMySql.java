package SiCumple;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author jharif
 */
public class ConexionMySql extends DBConnection {

    public ConexionMySql() {
        // Asignar la URL, usuario y contraseña correctos
        this.URL = "jdbc:postgresql://localhost:5432/db_persona"; // Asegúrate de que la URL sea correcta
        this.USER = "postgres"; // Usuario de PostgreSQL (por defecto es "postgres")
        this.PASSWORD = "123"; // Cambia esto por tu contraseña
    }

    @Override
    public void setConnection() {
        try {
            // Registrar el controlador JDBC
            Class.forName("org.postgresql.Driver");

            // Establecer la conexión
            this.connection = DriverManager.getConnection(this.URL, this.USER, this.PASSWORD);
            System.out.println("¡Conexión exitosa!");
        } catch (ClassNotFoundException e) {
            System.err.println("Error: No se encontró el controlador JDBC.");
            e.printStackTrace();
        } catch (SQLException e) {
            System.err.println("Error al conectar a la base de datos: " + e.getMessage());
            e.printStackTrace();
        }
    }

    @Override
    public Connection getConnection() {
        // Si la conexión no está establecida, establecerla
        if (this.connection == null) {
            setConnection();
        }
        return this.connection;
    }
}