/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package serversystem;

import database.Query;
import java.io.File;
import java.util.logging.Level;
import java.util.logging.Logger;
import model.Upload;
import java.io.*;
import java.net.*;
import java.util.ArrayList;

/**
 *
 * @author Florentijn
 */
public class EntryScanner implements Runnable {

    public Config cfg = new Config();
    
    @Override
    public void run() {
        Query query = new Query();
        Upload upload;
        boolean running = true;

        while (running) {
            upload = query.getNextVmToProcess();
            if (upload.getUploadedAt() == null) {
                try {
                    System.out.println("thread sleeping for 20 seconds... Zzzzzzzzzz.....");
                    Thread.sleep(20000);
                } catch (InterruptedException ex) {
                    Logger.getLogger(EntryScanner.class.getName()).log(Level.SEVERE, null, ex);
                }

            } else {
                String uploadDir = cfg.getVariable("uploadDir");
                Transfer tra = new Transfer();

                File file = new File(uploadDir + upload.getVmPath());
                System.out.println("transferring " + upload.getVmPath());
                tra.transfer(file);
                System.out.println("transferred " + upload.getVmPath());

                System.out.println("");

                File file2 = new File(uploadDir + upload.getScriptPath());
                System.out.println("transferring " + upload.getScriptPath());
                tra.transfer(file2);
                System.out.println("transferred " + upload.getScriptPath());

                try {
                    Socket connection = new Socket(cfg.getVariable("transferIp"), Integer.parseInt(cfg.getVariable("transferPort")));

                    ArrayList<String> parameters = new ArrayList<>();

                    System.out.println("Starting FTP Transmition");
                    
                    parameters.add(file.getName());
                    parameters.add(file2.getName());
                    
                    ObjectOutputStream toServer = new ObjectOutputStream(connection.getOutputStream());
                    toServer.writeObject(parameters);
                } catch (Exception e) {
                    System.out.println(e.toString());
                }

                running = false;
            }
        }
    }
}
