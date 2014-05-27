/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package database;

import java.io.File;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import model.Upload;

/**
 *
 * @author Florentijn
 */
public class Query {

    public final String SUCCESS = "success";
    public final String FAILED = "failed";
    private final Manager db = new Manager();
    public final int DEFAULT_INCORRECT_LOGIN = 0;
    public final int NO_ID_CREATED = 0;
    public PreparedStatement preparedStatement = null;

    public Upload getNextVmToProcess() {
        Upload upload = new Upload();
        try {
            db.openConnection();
            preparedStatement = db.connection.prepareStatement("SELECT * "
                    + "FROM unprocessed_uploads "
                    + "WHERE being_processed = 0 "
                    + "ORDER BY uploaded_at "
                    + "LIMIT 1");
            ResultSet rs = preparedStatement.executeQuery();
            rs.next();
            upload = new Upload(rs.getInt("id"),
                    rs.getString("filepath_vm"),
                    rs.getString("filepath_script"),
                    rs.getString("uploaded_at"),
                    rs.getString("name"),
                    rs.getInt("owner_id"));
        } catch (SQLException ex) {
            Logger.getLogger(Query.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            db.closeConnection();
        }
        return upload;
    }

    public Upload getVmBeingProcessed() {
        Upload upload = new Upload();
        try {
            db.openConnection();
            preparedStatement = db.connection.prepareStatement("SELECT * "
                    + "FROM unprocessed_uploads "
                    + "WHERE being_processed = 1 "
                    + "LIMIT 1");
            ResultSet rs = preparedStatement.executeQuery();
            rs.next();
            upload = new Upload(rs.getInt("id"),
                    rs.getString("filepath_vm"),
                    rs.getString("filepath_script"),
                    rs.getString("uploaded_at"),
                    rs.getString("name"),
                    rs.getInt("owner_id"));
        } catch (SQLException ex) {
            Logger.getLogger(Query.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            db.closeConnection();
        }
        return upload;
    }

    public void deleteProcessedVm(Upload upload) {
        try {
            db.openConnection();
            preparedStatement = db.connection.prepareStatement("DELETE "
                    + "FROM unprocessed_uploads "
                    + "WHERE id = ? "
                    + "LIMIT 1");
            preparedStatement.setInt(1, upload.getId());
            preparedStatement.executeUpdate();
        } catch (SQLException ex) {
            Logger.getLogger(Query.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            db.closeConnection();
        }
    }

    public void setToProcessed(String filePath) {
        Upload upload = getVmBeingProcessed();
        try {
            db.openConnection();
            preparedStatement = db.connection.prepareStatement("INSERT INTO processed_uploads "
                    + "(id, filepath_measurement, uploaded_at, `name`, owner_id) "
                    + "VALUES (?,?,?,?,?)");
            preparedStatement.setInt(1, upload.getId());
            preparedStatement.setString(2, filePath);
            preparedStatement.setString(3, upload.getUploadedAt());
            preparedStatement.setString(4, upload.getName());
            preparedStatement.setInt(5, upload.getOwnerId());
            preparedStatement.executeUpdate();
            
            deleteProcessedVm(upload);
        } catch (SQLException ex) {
            Logger.getLogger(Query.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            db.closeConnection();
        }
    }
}
