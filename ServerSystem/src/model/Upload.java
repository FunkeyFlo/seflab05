/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package model;

/**
 *
 * @author Florentijn
 */
public class Upload {

    public int id;
    public String filePath;
    public String uploadedAt;
    public String name;
    public int ownerId;

    public Upload(){
        
    }
    
    public Upload(int id, String filePath, String uploadedAt, String name, int ownerId) {
        this.id = id;
        this.filePath = filePath;
        this.uploadedAt = uploadedAt;
        this.name = name;
        this.ownerId = ownerId;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getFilePath() {
        return filePath;
    }

    public void setFilePath(String filePath) {
        this.filePath = filePath;
    }

    public String getUploadedAt() {
        return uploadedAt;
    }

    public void setUploadedAt(String uploadedAt) {
        this.uploadedAt = uploadedAt;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getOwnerId() {
        return ownerId;
    }

    public void setOwnerId(int ownerId) {
        this.ownerId = ownerId;
    }

    @Override
    public String toString() {
        return "Upload{" + "id=" + id + ", filePath=" + filePath + ", uploadedAt=" + uploadedAt + ", name=" + name + ", ownerId=" + ownerId + '}';
    }
}