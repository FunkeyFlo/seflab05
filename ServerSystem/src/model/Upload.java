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
    public String vmPath;
    public String scriptPath;
    public String uploadedAt;
    public String name;
    public int ownerId;

    public Upload(){
    }

    public Upload(int id, String vmPath, String scriptPath, String uploadedAt, String name, int ownerId) {
        this.id = id;
        this.vmPath = vmPath;
        this.scriptPath = scriptPath;
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

    public String getVmPath() {
        return vmPath;
    }

    public void setVmPath(String vmPath) {
        this.vmPath = vmPath;
    }

    public String getScriptPath() {
        return scriptPath;
    }

    public void setScriptPath(String scriptPath) {
        this.scriptPath = scriptPath;
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
        return "Upload{" + "id=" + id + ", vmPath=" + vmPath + ", scriptPath=" + scriptPath + ", uploadedAt=" + uploadedAt + ", name=" + name + ", ownerId=" + ownerId + '}';
    }
}