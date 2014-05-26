/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package measuresystem;

import java.io.File;

/**
 *
 * @author Florentijn
 */
public class MeasureSystem {

    private static Thread ftpThread;
    private static Thread tcpThread;

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ftpThread = new Thread(new FtpServerActivity(), "ftpThread");
        ftpThread.start();
        tcpThread = new Thread(new TCPServer(), "tcpThread");
        tcpThread.start();
//        String uploadDir = "C:/ftp";
//        Transfer tra = new Transfer();
//        File uploadFolder = new File(uploadDir);
//        File[] fileList;
//        while (true) {
//            fileList = uploadFolder.listFiles();
//            if (fileList.length > 0) {
//                System.out.println(fileList[0].getPath());
//                tra.upload(fileList[0].getPath(), fileList[0].getName());
//                return;
//            }
//        }
    }
}
