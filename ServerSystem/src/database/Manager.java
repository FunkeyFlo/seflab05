package database;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import serversystem.Config;

/**
 * @author Florentijn Cornet
 */
public class Manager {

    public final String JDBC_EXCEPTION = "JDBC Exception: ";
    public final String SQL_EXCEPTION = "SQL Exception: ";
    public Config cfg = new Config();
    
    public Connection connection;

    /**
     * Open database connection
     */
    public void openConnection() {
        try {
            Class.forName("com.mysql.jdbc.Driver");

            String url = cfg.getVariable("dbURL")
                    + "?zeroDateTimeBehavior=convertToNull";
            String user = cfg.getVariable("dbUser");
            String pass = cfg.getVariable("dbPass");

            /**
             * Open connection
             */
            connection = DriverManager.getConnection(url, user, pass);
        } catch (ClassNotFoundException e) {
            System.err.println(JDBC_EXCEPTION + e);
        } catch (java.sql.SQLException e) {
            System.err.println(SQL_EXCEPTION + e);
        }
    }

    /**
     * Close database connection
     */
    public void closeConnection() {
        try {
            connection.close();
        } catch (SQLException e) {
            System.err.println(e.getMessage());
        }
    }

    /**
     * Executes a query without result.
     *
     * @param query, the SQl query
     */
    public void executeQuery(String query) {
        openConnection();
        try {
            Statement statement = connection.createStatement();
            statement.executeQuery(query);
        } catch (java.sql.SQLException e) {
            System.err.println(SQL_EXCEPTION + e);
        }
    }

    /**
     * Executes a query with result.
     *
     * @param query, the SQL query
     * @return
     */
    public ResultSet doQuery(String query) {
        openConnection();
        ResultSet result = null;
        try {
            Statement statement = connection.createStatement();
            result = statement.executeQuery(query);
        } catch (java.sql.SQLException e) {
            System.err.println(SQL_EXCEPTION + e);
        }
        return result;        
    }

    /**
     * Executes a query with result.
     *
     * @param query, the SQL query
     * @return 
     */
    public ResultSet insertQuery(String query) {
        openConnection();
        ResultSet result = null;
        try {
            Statement statement = connection.createStatement();
            statement.executeUpdate(query, Statement.RETURN_GENERATED_KEYS);
            result = statement.getGeneratedKeys();
        } catch (java.sql.SQLException e) {
            System.err.println(SQL_EXCEPTION + e);
        }
        return result;
    }
}