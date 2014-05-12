/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package serversystem;

import java.io.FileInputStream;
import java.io.IOException;
import java.net.SocketException;
import org.apache.commons.net.ftp.FTPClient;

/**
 *
 * @author Florentijn
 */
public class Transfer {

    public void upload(String path, String fileName) {
        // get an ftpClient object
        FTPClient ftpClient = new FTPClient();
        FileInputStream inputStream = null;

        try {
            // pass directory path on server to connect
            ftpClient.connect("127.0.0.1", 1234);

            // pass username and password, returned true if authentication is
            // successful
            boolean login = ftpClient.login("flo", "flo");// username,   password
            
//            ftpClient.changeWorkingDirectory("");
            if (login) {
                System.out.println("Connection established...");
                inputStream = new FileInputStream(path);
                
                //file name must be unique
                boolean uploaded = ftpClient.storeFile(fileName,
                        inputStream);
              
                if (uploaded) {
                    System.out.println("File uploaded successfully !");
                } else {
                    System.out.println("Error in uploading file !");
                }

                // logout the user, returned true if logout successfully
                boolean logout = ftpClient.logout();
                if (logout) {
                    System.out.println("Connection close...");
                }
            } else {
                System.out.println("Connection fail...");
            }

        } catch (SocketException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } finally {
            try {
                ftpClient.disconnect();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
}