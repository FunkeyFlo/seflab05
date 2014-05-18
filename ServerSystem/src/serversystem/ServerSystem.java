/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package serversystem;

import database.Query;
import java.io.File;
import java.util.Scanner;
import model.Upload;

/**
 *
 * @author Florentijn
 */
public class ServerSystem {

    private static Thread ftpThread;

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
//        ftpThread = new Thread(new FtpServerActivity(), "ftpThread");
//        ftpThread.start();
        Query query = new Query();
        Upload upload;
        Scanner scan = new Scanner(System.in);

        String uploadDir = "C:/uploads/";
        Transfer upl = new Transfer();
//        upl.upload(uploadDir, "commons-io-2.4-bin.zip");
        System.out.println("Enter the name of the file");
        File file = new File(uploadDir + scan.next());
//        System.out.println(file);
//        file.delete();
        upl.upload(file);
        
        upload = query.getNextFileToProcess();
        System.out.println(upload.getFile());
    }
}
