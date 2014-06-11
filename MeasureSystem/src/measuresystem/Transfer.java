/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package measuresystem;

import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.net.SocketException;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.apache.commons.net.ftp.FTP;
import org.apache.commons.net.ftp.FTPClient;

/**
 *
 * @author Florentijn
 */
public class Transfer {

    public Config cfg = new Config();
    
    public void transfer(File file) {
        try {
            // get an ftpClient object
            FTPClient ftpClient = new FTPClient();
            FileInputStream inputStream = null;

            ftpClient.connect(cfg.getVariable("transferIp"), Integer.parseInt(cfg.getVariable("transferPort")));
            ftpClient.login("flo", "flo");
            ftpClient.setBufferSize(1024000);
            ftpClient.setFileType(FTP.BINARY_FILE_TYPE);
            inputStream = new FileInputStream(file);
            boolean uploadOk = ftpClient.storeFile(file.getName(), inputStream);
            System.out.println("Uploading status is: " + uploadOk);
//            ftpClient.completePendingCommand();
            ftpClient.logout();
        } catch (IOException ex) {
            Logger.getLogger(Transfer.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}