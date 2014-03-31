/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javaupload;

import java.io.FileInputStream;
import java.io.IOException;
import java.net.SocketException;
import org.apache.commons.net.ftp.FTPClient;

/**
 *
 * @author Jay
 */
public class JavaUpload {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        test();
    }

    public static void test() {
        // get an ftpClient object
        FTPClient ftpClient = new FTPClient();
        FileInputStream inputStream = null;

        try {
            // pass directory path on server to connect
            ftpClient.connect("ftp.j-richardson.nl");

            // pass username and password, returned true if authentication is
            // successful
            boolean login = ftpClient.login("", "");
                                          // username,   password
            ftpClient.changeWorkingDirectory("/public/sites/www.j-richardson.nl/Uploads");
            if (login) {
                System.out.println("Connection established...");
                inputStream = new FileInputStream("C:\\Users\\Jay\\Desktop\\test.txt");
                
                //file name must be unique
                boolean uploaded = ftpClient.storeFile("test2.txt",
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

    public static void test1() {
        FTPClient client = new FTPClient();
        FileInputStream fis = null;

        try {
            /*
             connect to ftp and loggin
             */
            client.connect("ftp.j-richardson.nl");
            client.login("md331294", "Miquel_21");

            //change directory
            //client.changeWorkingDirectory("/public/sites/www.j-richardson.nl/Uploads");
            String file = "C:\\Users\\Jay\\Desktop\\test.txt";
            fis = new FileInputStream(file);
            client.storeFile("test.txt", fis);
            //client.storeFileStream(file);
            //client.storeUniqueFileStream(file);
            client.logout();
        } catch (IOException e) {
        } finally {
            try {
                if (fis != null) {
                    fis.close();
                }
                client.disconnect();
            } catch (IOException e) {
            }
        }
    }

}
