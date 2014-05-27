/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package serversystem;

/**
 *
 * @author Florentijn
 */
public class ServerSystem {

    private static Thread ftpThread;
    private static Thread entryScanner;

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ftpThread = new Thread(new FtpServerActivity(), "ftpThread");
        ftpThread.start();
        entryScanner = new Thread(new EntryScanner(), "entryScanner");
        entryScanner.start();
    }
}