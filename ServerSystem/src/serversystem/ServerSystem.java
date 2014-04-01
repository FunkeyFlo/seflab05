/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package serversystem;

import java.io.File;

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
        ftpThread = new Thread(new FtpServerActivity(), "ftpThread");
        ftpThread.start();

        String uploadDir = "C:/uploads";
        Upload upl = new Upload();
        File uploadFolder = new File(uploadDir);
        File[] fileList;
        while (true) {
            fileList = uploadFolder.listFiles();
            if (fileList.length > 0) {
                System.out.println(fileList[0].getPath());
                upl.upload(fileList[0].getPath(), fileList[0].getName());
                return;
            }
        }
    }
}
